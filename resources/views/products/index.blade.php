@extends('layouts.app')

@section('title', $heading . ' — ' . config('app.name'))

@push('styles')
<style>
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
        color: #dc3545;
        margin: 0;
    }
    .products-count {
        font-size: .875rem;
        color: #6c757d;
    }

    /* ── Product grid ──────────────────────────────────── */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
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
        color: #dc3545;
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
        margin-top: 2rem;
        display: flex;
        justify-content: center;
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
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }
    .pagination-wrap .page-link:hover {
        background: #f3f4f6;
        color: #dc3545;
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

    {{-- Page header --}}
    <div class="products-header">
        <h1>
            {{ $heading }}
            @if(!empty($searchQuery ?? ''))
                <a href="{{ route('products.index') }}"
                   class="btn btn-sm btn-outline-secondary ms-2 align-middle fw-normal"
                   style="font-size:.75rem"
                   title="Clear search">
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
            @if(!empty($searchQuery ?? ''))
                <p class="mb-1">No products found matching <strong>"{{ $searchQuery }}"</strong>.</p>
                <a href="{{ route('products.index') }}" class="text-danger">Browse all products</a>
            @else
                <p class="mb-0">No products found.</p>
            @endif
        </div>
    @else
        {{-- Product grid --}}
        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-card">
                    {{-- Placeholder image (swap with real product image when available) --}}
                    <img src="https://placehold.co/300x300/f3f4f6/9ca3af?text={{ urlencode($product->item_master_id ?? 'SKU') }}"
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

        {{-- Pagination --}}
        @if($products->lastPage() > 1)
            <div class="pagination-wrap">
                {{ $products->links() }}
            </div>
        @endif
    @endif

</div>
@endsection
