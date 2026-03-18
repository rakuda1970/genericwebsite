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
        // Sanitise: trim, hard-cap at 100 chars
        $q = substr(trim((string) $request->input('q', '')), 0, 100);

        if ($q !== '') {
            $like = '%' . $q . '%';

            $products = Product::where(function ($query) use ($like) {
                $query->where('item_description', 'LIKE', $like)
                      ->orWhere('material',        'LIKE', $like)
                      ->orWhere('item_master_id',  'LIKE', $like)
                      ->orWhereHas('brands', fn ($bq) => $bq->where('name', 'LIKE', $like))
                      ->orWhereHas('meta', fn ($mq) => $mq->where('keywords', 'LIKE', $like));
            })
            ->orderBy('item_description')
            ->paginate(24)
            ->withQueryString();

            $heading = 'Results for "' . $q . '"';
        } else {
            $products = Product::orderBy('item_description')
                ->paginate(24)
                ->withQueryString();

            $heading = 'All Products';
        }

        return view('products.index', [
            'products'    => $products,
            'heading'     => $heading,
            'scope'       => null,
            'searchQuery' => $q,
        ]);
    }
}
