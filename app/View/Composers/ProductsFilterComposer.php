<?php

namespace App\View\Composers;

use App\Models\Brand;
use App\Models\Collection;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductsFilterComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'filterCategories' => ProductCategory::where('type', 'category')
                ->where('name', '!=', 'All Products')
                ->orderBy('sort_order')
                ->get(['id', 'name']),
            'filterBrands' => Brand::orderBy('name')->get(['id', 'name']),
            'filterCollections' => Collection::orderBy('sort_order')->get(['id', 'name']),
            'filterYears' => DB::table('products')
                ->whereNotNull('product_year')
                ->distinct()
                ->orderByDesc('product_year')
                ->pluck('product_year'),
        ]);
    }
}
