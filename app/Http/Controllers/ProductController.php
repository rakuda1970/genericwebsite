<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderBy('item_description')->paginate(24);

        return view('products.index', [
            'products' => $products,
            'heading'  => 'All Products',
            'scope'    => null,
        ]);
    }

    public function byCategory(int $id): View
    {
        $category = ProductCategory::findOrFail($id);

        $products = Product::whereHas('categories', fn ($q) => $q->where('product_categories.id', $id))
            ->orderBy('item_description')
            ->paginate(24);

        return view('products.index', [
            'products' => $products,
            'heading'  => $category->name,
            'scope'    => $category,
        ]);
    }

    public function byBrand(int $id): View
    {
        $brand = Brand::findOrFail($id);

        $products = Product::whereHas('brands', fn ($q) => $q->where('brands.id', $id))
            ->orderBy('item_description')
            ->paginate(24);

        return view('products.index', [
            'products' => $products,
            'heading'  => $brand->name,
            'scope'    => $brand,
        ]);
    }

    public function byYear(int $year): View
    {
        abort_if($year < 2000 || $year > (int) date('Y'), 404);

        $products = Product::where('product_year', $year)
            ->orderBy('item_description')
            ->paginate(24);

        return view('products.index', [
            'products' => $products,
            'heading'  => $year . ' Products',
            'scope'    => null,
        ]);
    }

    public function newArrivals(): View
    {
        $currentYear = (int) date('Y');

        $products = Product::where('product_year', $currentYear)
            ->orderBy('item_description')
            ->paginate(24);

        return view('products.index', [
            'products' => $products,
            'heading'  => 'New Arrivals',
            'scope'    => null,
        ]);
    }

    public function byCollection(int $id): View
    {
        $collection = Collection::findOrFail($id);

        $products = Product::whereHas('collections', fn ($q) => $q->where('collections.id', $id))
            ->orderBy('item_description')
            ->paginate(24);

        return view('products.index', [
            'products' => $products,
            'heading'  => $collection->name,
            'scope'    => $collection,
        ]);
    }
}
