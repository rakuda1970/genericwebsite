@extends('layouts.app')

@section('title', $heading . ' — ' . config('app.name'))

@push('styles')
<style>
    /* ── Two-column layout ─────────────────────────────── */
    .products-layout {
        display: flex;
        align-items: stretch;   /* sidebar col must be as tall as the products col for sticky to travel */
        gap: 0;
        min-height: 60vh;
    }

    /* ── Filter sidebar ────────────────────────────────── */
    .filter-sidebar-col {
        width: 270px;
        flex-shrink: 0;
        /* stretches to full row height so position:sticky has room to move */
    }
    .filter-sidebar {
        position: sticky;
        top: 7.5rem; /* clears the fixed two-tier header */
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: .5rem;
        padding: 1.25rem 1rem;
        max-height: calc(100vh - 8.5rem);
        overflow-y: auto;
    }
    .filter-sidebar::-webkit-scrollbar { width: 4px; }
    .filter-sidebar::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }

    .filter-sidebar h5 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 1.1rem;
    }
    .filter-label {
        font-size: .7rem;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: .05em;
        margin-bottom: .2rem;
    }
    .filter-sidebar .form-control,
    .filter-sidebar .form-select {
        font-size: .8rem;
        border-color: #d1d5db;
        border-radius: .25rem;
        padding: .35rem .5rem;
    }
    .filter-sidebar .form-select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='{{ urlencode(config('app.color_scheme') === 'ariel-gray' ? '#717171' : (config('app.color_scheme') === 'ariel-red' ? '#ED1C24' : (config('app.color_scheme') === 'steel-blue' ? '#2993CF' : '#dc3545'))) }}' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right .6rem center;
        padding-right: 1.8rem;
    }
    .filter-price-row {
        display: flex;
        align-items: center;
        gap: .4rem;
    }
    .filter-price-row .form-control {
        min-width: 0;
    }
    .filter-price-sep {
        color: #9ca3af;
        flex-shrink: 0;
        font-size: .85rem;
    }
    .filter-sidebar .btn-search {
        background: var(--brand-primary);
        border-color: var(--brand-primary);
        color: #fff;
        font-size: .8rem;
        font-weight: 600;
        width: 100%;
        padding: .45rem;
        border-radius: .25rem;
        margin-top: .25rem;
    }
    .filter-sidebar .btn-search:hover { background: var(--brand-dark); border-color: var(--brand-dark); }
    .filter-sidebar .btn-reset {
        background: #e9ecef;
        border-color: #dee2e6;
        color: #495057;
        font-size: .8rem;
        font-weight: 600;
        width: 100%;
        padding: .45rem;
        border-radius: .25rem;
    }
    .filter-sidebar .btn-reset:hover { background: #dee2e6; }
    .filter-divider { border-color: #f3f4f6; margin: .85rem 0; }

    /* ── Main products column ──────────────────────────── */
    .products-main {
        flex: 1;
        min-width: 0;
        padding-left: 1.5rem;
    }

    /* ── Page header ───────────────────────────────────── */
    .products-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: .75rem;
        margin-bottom: 1.5rem;
    }
    .products-header h1 {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--brand-primary);
        margin: 0;
    }
    .products-count {
        font-size: .875rem;
        color: #6c757d;
    }

    /* ── Product grid ──────────────────────────────────── */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 1.25rem;
    }

    /* ── Product card ──────────────────────────────────── */
    .product-card {
        border: 1px solid #e5e7eb;
        border-radius: .5rem;
        background: #fff;
        display: flex;
        flex-direction: column;
        transition: box-shadow .15s;
        overflow: hidden;
    }
    .product-card:hover {
        box-shadow: 0 4px 14px rgba(0,0,0,.1);
    }
    .product-card__img {
        width: 100%;
        aspect-ratio: 1 / 1;
        object-fit: contain;
        background: #f9fafb;
        padding: 1rem;
    }
    .product-card__body {
        padding: .875rem;
        display: flex;
        flex-direction: column;
        gap: .25rem;
        flex: 1;
    }
    .product-card__desc {
        font-size: .875rem;
        font-weight: 600;
        color: #111827;
        line-height: 1.35;
    }
    .product-card__sku {
        font-size: .75rem;
        color: #6b7280;
    }
    .product-card__brand {
        font-size: .75rem;
        color: var(--brand-primary);
        font-weight: 600;
        margin-top: auto;
        padding-top: .375rem;
    }
    .product-card__dims {
        font-size: .7rem;
        color: #9ca3af;
    }

    /* ── Pagination ────────────────────────────────────── */
    .pagination-wrap {
        display: flex;
        justify-content: flex-end;
    }
    .pagination-wrap.pagination-top {
        margin-bottom: 1.25rem;
    }
    .pagination-wrap.pagination-bottom {
        margin-top: 2rem;
    }
    .pagination-wrap .pagination {
        gap: .2rem;
    }
    .pagination-wrap .page-link {
        border-radius: .375rem !important;
        font-size: .875rem;
        color: #374151;
        border-color: #d1d5db;
    }
    .pagination-wrap .page-item.active .page-link {
        background-color: var(--brand-primary);
        border-color: var(--brand-primary);
        color: #fff;
    }
    .pagination-wrap .page-link:hover {
        background: #f3f4f6;
        color: var(--brand-primary);
    }

    /* ── Empty state ───────────────────────────────────── */
    .empty-state {
        text-align: center;
        padding: 4rem 1rem;
        color: #6b7280;
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-4 py-4">
<div class="products-layout">

    {{-- ── Sticky filter sidebar ─────────────────────────────────────────── --}}
    <div class="filter-sidebar-col">
        <div class="filter-sidebar">
            <h5>Refine Your Search</h5>

            <form method="GET" action="{{ route('products.index') }}" id="filter-form">

                {{-- Search terms --}}
                <div class="mb-3">
                    <div class="filter-label">Search Terms</div>
                    <input type="text"
                           name="q"
                           class="form-control"
                           placeholder="Keyword, SKU, material…"
                           value="{{ $searchQuery ?? '' }}"
                           maxlength="100">
                </div>

                <hr class="filter-divider">

                {{-- Price range (placeholder — no price data yet) --}}
                <div class="mb-3">
                    <div class="filter-label">Price Range</div>
                    <div class="filter-price-row">
                        <input type="number" name="price_min" class="form-control"
                               placeholder="Min." min="0" step="0.01"
                               value="{{ request('price_min') }}">
                        <span class="filter-price-sep">—</span>
                        <input type="number" name="price_max" class="form-control"
                               placeholder="Max." min="0" step="0.01"
                               value="{{ request('price_max') }}">
                    </div>
                </div>

                <hr class="filter-divider">

                {{-- Category --}}
                <div class="mb-2">
                    <select name="category_id" class="form-select">
                        <option value="0">Search By Category</option>
                        @foreach($filterCategories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ ($activeCatId ?? 0) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Brand --}}
                <div class="mb-2">
                    <select name="brand_id" class="form-select">
                        <option value="0">Search By Brand</option>
                        @foreach($filterBrands as $brand)
                            <option value="{{ $brand->id }}"
                                {{ ($activeBrandId ?? 0) == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Collection --}}
                <div class="mb-2">
                    <select name="collection_id" class="form-select">
                        <option value="0">Search By Collection</option>
                        @foreach($filterCollections as $col)
                            <option value="{{ $col->id }}"
                                {{ ($activeColId ?? 0) == $col->id ? 'selected' : '' }}>
                                {{ $col->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Year --}}
                <div class="mb-3">
                    <select name="year" class="form-select">
                        <option value="0">Search By Year</option>
                        @foreach($filterYears as $yr)
                            <option value="{{ $yr }}"
                                {{ ($activeYear ?? 0) == $yr ? 'selected' : '' }}>
                                {{ $yr }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-search mb-2">Search</button>
                <a href="{{ route('products.index') }}" class="btn btn-reset">Reset Search</a>

            </form>
        </div>
    </div>{{-- /filter-sidebar-col --}}

    {{-- ── Main products column ───────────────────────────────────────────── --}}
    <div class="products-main">

        {{-- Page header --}}
        <div class="products-header">
            <h1>
                {!! $heading !!}
                @if(!empty($searchQuery ?? '') || ($activeCatId ?? 0) || ($activeBrandId ?? 0) || ($activeColId ?? 0) || ($activeYear ?? 0))
                    <a href="{{ route('products.index') }}"
                       class="btn btn-sm btn-outline-secondary ms-2 align-middle fw-normal"
                       style="font-size:.75rem"
                       title="Clear all filters">
                        <i class="fa-solid fa-xmark me-1"></i>Clear
                    </a>
                @endif
            </h1>
            <span class="products-count">
                {{ $products->total() }} product{{ $products->total() !== 1 ? 's' : '' }}
                @if($products->lastPage() > 1)
                    &mdash; page {{ $products->currentPage() }} of {{ $products->lastPage() }}
                @endif
            </span>
        </div>

        @if($products->isEmpty())
            <div class="empty-state">
                <p class="mb-1">No products found matching your search.</p>
                <a href="{{ route('products.index') }}" style="color: var(--brand-primary)">Browse all products</a>
            </div>
        @else
            {{-- Pagination (top) --}}
            @if($products->lastPage() > 1)
                <div class="pagination-wrap pagination-top">
                    {{ $products->links() }}
                </div>
            @endif

            {{-- Product grid --}}
            <div class="product-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <img src="{{ $product->main_image_url ?? 'https://placehold.co/300x300/f3f4f6/9ca3af?text=' . urlencode($product->item_master_id ?? 'SKU') }}"
                             alt="{{ $product->item_description }}"
                             class="product-card__img"
                             loading="lazy">

                        <div class="product-card__body">
                            <div class="product-card__desc">{{ $product->item_description }}</div>
                            <div class="product-card__sku">{{ $product->item_master_id }}</div>

                            @if($product->item_length || $product->item_width || $product->item_height)
                                <div class="product-card__dims">
                                    @if($product->item_length && $product->item_width && $product->item_height)
                                        {{ $product->item_length }}" × {{ $product->item_width }}" × {{ $product->item_height }}"
                                    @elseif($product->item_diameter)
                                        ⌀ {{ $product->item_diameter }}"
                                    @endif
                                    @if($product->item_weight) · {{ $product->item_weight }} lb @endif
                                </div>
                            @endif

                            <div class="product-card__brand">{{ $product->item_brand_id }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination (bottom) --}}
            @if($products->lastPage() > 1)
                <div class="pagination-wrap pagination-bottom">
                    {{ $products->links() }}
                </div>
            @endif
        @endif

    </div>{{-- /products-main --}}

</div>{{-- /products-layout --}}
</div>{{-- /container-fluid --}}
@endsection
