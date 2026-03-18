<?php

namespace App\View\Composers;

use App\Models\Brand;
use App\Models\Collection;
use App\Models\ProductCategory;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view): void
    {
        // Split into category vs featured, ordered by sort_order
        $allCategories = ProductCategory::orderBy('sort_order')->get();

        $view->with([
            'navCategories'  => $allCategories->where('type', 'category')->values(),
            'navFeatured'    => $allCategories->where('type', 'featured')->values(),
            'navBrands'      => Brand::orderBy('sort_order')->get(),
            'navCollections' => Collection::orderBy('sort_order')->get(),
        ]);
    }
}
