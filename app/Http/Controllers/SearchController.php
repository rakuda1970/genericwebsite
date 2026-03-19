<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Handle GET /products?q=
     *
     * When $q is present the results are filtered across four surfaces:
     *   1. item_description — the product name / description
     *   2. material         — e.g. "rubber", "cotton", "stainless steel"
     *   3. item_master_id   — the human-readable SKU
     *   4. brand name       — via the products→brands relationship
     *
     * All four conditions are OR-ed together so "Sweda stress" would return
     * anything whose description/material/SKU contains that phrase *or* whose
     * brand name contains it.
     *
     * The FULLTEXT index added in the accompanying migration is available for
     * a future MATCH … AGAINST switch when the catalogue grows large enough
     * that LIKE table-scans become a bottleneck.
     */
    public function index(Request $request): View
    {
        // Text search — trim, hard-cap at 100 chars
        $q = substr(trim((string) $request->input('q', '')), 0, 100);

        // Sidebar filters
        $categoryId   = (int) $request->input('category_id', 0);
        $brandId      = (int) $request->input('brand_id', 0);
        $collectionId = (int) $request->input('collection_id', 0);
        $year         = (int) $request->input('year', 0);

        $query = Product::query();

        if ($q !== '') {
            $like = '%' . $q . '%';
            $query->where(function ($sub) use ($like) {
                $sub->where('item_description', 'LIKE', $like)
                    ->orWhere('material',        'LIKE', $like)
                    ->orWhere('item_master_id',  'LIKE', $like)
                    ->orWhereHas('brands', fn ($bq) => $bq->where('name', 'LIKE', $like))
                    ->orWhereHas('meta',   fn ($mq) => $mq->where('keywords', 'LIKE', $like));
            });
        }

        if ($categoryId > 0) {
            $query->whereHas('categories', fn ($q) => $q->where('product_categories.id', $categoryId));
        }

        if ($brandId > 0) {
            $query->whereHas('brands', fn ($q) => $q->where('brands.id', $brandId));
        }

        if ($collectionId > 0) {
            $query->whereHas('collections', fn ($q) => $q->where('collections.id', $collectionId));
        }

        if ($year > 0) {
            $query->where('product_year', $year);
        }

        $products = $query->orderBy('item_description')
            ->paginate(24)
            ->withQueryString();

        // Build heading
        $heading = 'All Products';
        if ($q !== '') {
            $heading = 'Results for &ldquo;' . e($q) . '&rdquo;';
        }

        return view('products.index', [
            'products'      => $products,
            'heading'       => $heading,
            'scope'         => null,
            'searchQuery'   => $q,
            'activeCatId'   => $categoryId,
            'activeBrandId' => $brandId,
            'activeColId'   => $collectionId,
            'activeYear'    => $year,
        ]);
    }
}
