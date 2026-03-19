{{-- ═══════════════════════════════════════════════════════
     Two-layer fixed header
     Layer 1 : logo | search | login + cart icons
     Layer 2 : left nav dropdowns | right nav dropdowns
════════════════════════════════════════════════════════ --}}
<header id="site-header">

    {{-- ── Tier 1 ─────────────────────────────────────────────── --}}
    <div class="header-top bg-white border-bottom py-2">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center gap-3">

                {{-- Logo --}}
                <a href="{{ url('/') }}" class="header-logo flex-shrink-0 me-3">
                    <img src="{{ asset('images/company_logo.jpg') }}"
                         alt="{{ config('app.name') }} logo"
                         height="54">
                </a>

                {{-- Search bar --}}
                <form class="header-search d-flex align-items-center flex-grow-1 me-3"
                      method="GET" action="{{ route('products.index') }}" role="search">
                    <div class="input-group">
                        <input type="search"
                               name="q"
                               class="form-control border-end-0"
                               placeholder="Search by brand, product or SKU"
                               aria-label="Search"
                               value="{{ request('q') }}">
                        <button class="btn btn-danger px-3" type="submit" aria-label="Submit search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

                {{-- Right icons: login + cart --}}
                <div class="d-flex align-items-center gap-2 flex-shrink-0">

                    {{-- Login / account --}}
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="btn btn-danger btn-icon"
                           title="My account">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="btn btn-danger btn-icon"
                           title="Sign in">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    @endauth

                    {{-- Shopping cart --}}
                    <a href="{{ url('/cart') }}"
                       class="btn btn-danger btn-icon position-relative"
                       title="Shopping cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        {{-- Cart badge — swap 0 for a real cart count variable when ready --}}
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark"
                              style="font-size:.6rem">
                            0
                            <span class="visually-hidden">items in cart</span>
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{-- ── Tier 2 ─────────────────────────────────────────────── --}}
    <nav class="header-nav navbar navbar-expand-lg navbar-dark bg-danger py-0"
         aria-label="Main navigation">
        <div class="container-fluid px-4 position-static">

            <button class="navbar-toggler border-0 ms-auto my-1"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">

                {{-- ── Left menus ────────────────────────── --}}
                <ul class="navbar-nav me-auto">

                    {{-- Products — mega menu (custom toggle, no Popper) --}}
                    <li class="nav-item mega-dropdown">
                        <a class="nav-link mega-toggle px-3 py-3" href="#"
                           data-mega-target="mega-products"
                           aria-expanded="false" aria-controls="mega-products">
                            Products <span class="mega-caret">&#9660;</span>
                        </a>
                    </li>

                    {{-- Brands — mega menu (custom toggle, no Popper) --}}
                    <li class="nav-item mega-dropdown">
                        <a class="nav-link mega-toggle px-3 py-3" href="#"
                           data-mega-target="mega-brands"
                           aria-expanded="false" aria-controls="mega-brands">
                            Brands <span class="mega-caret">&#9660;</span>
                        </a>
                    </li>

                    {{-- New --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3 py-3" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            New
                        </a>
                        <ul class="dropdown-menu rounded-0 border-0 shadow-sm">
                            <li><a class="dropdown-item" href="{{ route('products.new') }}">New Arrivals</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.year', 2025) }}">2025 Products</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.year', 2024) }}">2024 Products</a></li>
                        </ul>
                    </li>

                    {{-- Sales --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3 py-3" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sales
                        </a>
                        <ul class="dropdown-menu rounded-0 border-0 shadow-sm">
                            <li><h6 class="dropdown-header text-danger fw-bold">Promotions</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/sales/current') }}">Current Sales</a></li>
                            <li><a class="dropdown-item" href="{{ url('/sales/clearance') }}">Clearance</a></li>
                            <li><a class="dropdown-item" href="{{ url('/sales/closeouts') }}">Closeouts</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header text-danger fw-bold">Deals</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/sales/bulk-discounts') }}">Bulk Discounts</a></li>
                            <li><a class="dropdown-item" href="{{ url('/sales/promo-codes') }}">Promo Codes</a></li>
                        </ul>
                    </li>

                </ul>

                {{-- ── Right menus ───────────────────────── --}}
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link px-3 py-3" href="#" id="lt-modal-trigger">Lead Time</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3 py-3" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end rounded-0 border-0 shadow-sm">
                            <li><h6 class="dropdown-header text-danger fw-bold">What We Offer</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/services/decoration') }}">Decoration Services</a></li>
                            <li><a class="dropdown-item" href="{{ url('/services/custom-orders') }}">Custom Orders</a></li>
                            <li><a class="dropdown-item" href="{{ url('/services/rush-orders') }}">Rush Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/services/contact') }}">Contact a Rep</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3 py-3" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tools
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end rounded-0 border-0 shadow-sm">
                            <li><h6 class="dropdown-header text-danger fw-bold">Resources</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/tools/price-calculator') }}">Price Calculator</a></li>
                            <li><a class="dropdown-item" href="{{ url('/tools/compare') }}">Compare Products</a></li>
                            <li><a class="dropdown-item" href="{{ url('/tools/artwork-templates') }}">Artwork Templates</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/tools/order-history') }}">Order History</a></li>
                            <li><a class="dropdown-item" href="{{ url('/tools/saved-lists') }}">Saved Lists</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</header>

{{-- ══ Mega panels — OUTSIDE <header> so position:fixed works correctly ══ --}}

<div id="mega-products" class="mega-panel p-4" role="region" aria-label="Products menu">
    <div class="container-fluid">

        <p class="mega-heading">Product Categories</p>
        <hr class="mt-0 mb-3">
        <div class="row mb-4">
            @php
                $allProductsCat = $navCategories->firstWhere('id', 1);
                $otherCats      = $navCategories->reject(fn($c) => $c->id === 1)->values();
                $catCols        = $otherCats->chunk((int) ceil($otherCats->count() / 3));
            @endphp
            @foreach($catCols as $colIndex => $col)
                <div class="col-lg-4">
                    <ul class="mega-list">
                        @if($colIndex === 0 && $allProductsCat)
                            <li><a href="{{ route('products.index') }}">{{ $allProductsCat->name }}</a></li>
                        @endif
                        @foreach($col as $cat)
                            <li><a href="{{ route('products.category', $cat->id) }}">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <p class="mega-heading">Featured</p>
        <hr class="mt-0 mb-3">
        <div class="row">
            @php $featCols = $navFeatured->chunk((int) ceil($navFeatured->count() / 3)); @endphp
            @foreach($featCols as $col)
                <div class="col-lg-4">
                    <ul class="mega-list">
                        @foreach($col as $cat)
                            <li><a href="{{ route('products.category', $cat->id) }}">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

    </div>
</div>

<div id="mega-brands" class="mega-panel p-4" role="region" aria-label="Brands menu">
    <div class="container-fluid">

        <p class="mega-heading">Shop by Brand</p>
        <hr class="mt-0 mb-3">
        <div class="row mb-4">
            @php $brandCols = $navBrands->chunk((int) ceil($navBrands->count() / 3)); @endphp
            @foreach($brandCols as $col)
                <div class="col-lg-4">
                    <ul class="mega-list">
                        @foreach($col as $brand)
                            <li><a href="{{ route('products.brand', $brand->id) }}">{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <p class="mega-heading">Collections</p>
        <hr class="mt-0 mb-3">
        <div class="row">
            @php $collCols = $navCollections->chunk((int) ceil($navCollections->count() / 3)); @endphp
            @foreach($collCols as $col)
                <div class="col-lg-4">
                    <ul class="mega-list">
                        @foreach($col as $collection)
                            <li><a href="{{ route('products.collection', $collection->id) }}">{{ $collection->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

    </div>
</div>
