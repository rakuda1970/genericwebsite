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
                      method="GET" action="{{ url('/search') }}" role="search">
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
                            <li><a class="dropdown-item" href="{{ url('/new/arrivals') }}">New Arrivals</a></li>
                            <li><a class="dropdown-item" href="{{ url('/new/product-preview') }}">Product Preview</a></li>
                            <li><a class="dropdown-item" href="{{ url('/new/2025-products') }}">2025 Products</a></li>
                            <li><a class="dropdown-item" href="{{ url('/new/2024-products') }}">2024 Products</a></li>
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
                        <a class="nav-link px-3 py-3" href="{{ url('/lead-time') }}">Lead Time</a>
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
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/products/all') }}">All Products</a></li>
                    <li><a href="{{ url('/products/auto') }}">Auto</a></li>
                    <li><a href="{{ url('/products/bags') }}">Bags</a></li>
                    <li><a href="{{ url('/products/blankets-towels') }}">Blankets &amp; Towels</a></li>
                    <li><a href="{{ url('/products/drinkware') }}">Drinkware</a></li>
                    <li><a href="{{ url('/products/eco-friendly') }}">Eco Friendly &amp; Sustainable</a></li>
                    <li><a href="{{ url('/products/emergency-preparedness') }}">Emergency Preparedness</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/products/health-wellness') }}">Health &amp; Wellness</a></li>
                    <li><a href="{{ url('/products/home') }}">Home</a></li>
                    <li><a href="{{ url('/products/hot-cold-relief') }}">Hot &amp; Cold Relief Packs</a></li>
                    <li><a href="{{ url('/products/journals-notebooks') }}">Journals &amp; Notebooks</a></li>
                    <li><a href="{{ url('/products/lights-tools') }}">Lights &amp; Tools</a></li>
                    <li><a href="{{ url('/products/novelties') }}">Novelties</a></li>
                    <li><a href="{{ url('/products/office') }}">Office</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/products/outdoors-leisure') }}">Outdoors &amp; Leisure</a></li>
                    <li><a href="{{ url('/products/packaging') }}">Packaging</a></li>
                    <li><a href="{{ url('/products/sports-fitness') }}">Sports &amp; Fitness</a></li>
                    <li><a href="{{ url('/products/stress-relievers') }}">Stress Relievers</a></li>
                    <li><a href="{{ url('/products/technology') }}">Technology</a></li>
                    <li><a href="{{ url('/products/travel') }}">Travel</a></li>
                </ul>
            </div>
        </div>
        <p class="mega-heading">Featured</p>
        <hr class="mt-0 mb-3">
        <div class="row">
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/featured/best-sellers') }}">Best Sellers</a></li>
                    <li><a href="{{ url('/featured/choosing-community') }}">Choosing Community</a></li>
                    <li><a href="{{ url('/featured/fidgets-fun') }}">Fidgets &amp; Fun</a></li>
                    <li><a href="{{ url('/featured/new-products') }}">New Products</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/featured/purposeful-energy') }}">Purposeful Energy</a></li>
                    <li><a href="{{ url('/featured/quiet-luxury') }}">Quiet Luxury</a></li>
                    <li><a href="{{ url('/featured/retail-inspired') }}">Retail Inspired Picks</a></li>
                    <li><a href="{{ url('/featured/revitalized-self') }}">Revitalized Self</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/featured/sustainable-solutions') }}">Sustainable Solutions</a></li>
                    <li><a href="{{ url('/featured/tech-future') }}">Tech Future</a></li>
                    <li><a href="{{ url('/featured/value-finds') }}">Value Finds</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="mega-brands" class="mega-panel p-4" role="region" aria-label="Brands menu">
    <div class="container-fluid">
        <p class="mega-heading">Shop by Brand</p>
        <hr class="mt-0 mb-3">
        <div class="row mb-4">
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/brands/all') }}">All Brands</a></li>
                    <li><a href="{{ url('/brands/adidas') }}">Adidas</a></li>
                    <li><a href="{{ url('/brands/bic') }}">BIC</a></li>
                    <li><a href="{{ url('/brands/cutter-buck') }}">Cutter &amp; Buck</a></li>
                    <li><a href="{{ url('/brands/hanes') }}">Hanes</a></li>
                    <li><a href="{{ url('/brands/koozie') }}">Koozie</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/brands/leatherman') }}">Leatherman</a></li>
                    <li><a href="{{ url('/brands/moleskine') }}">Moleskine</a></li>
                    <li><a href="{{ url('/brands/nike') }}">Nike</a></li>
                    <li><a href="{{ url('/brands/ogio') }}">OGIO</a></li>
                    <li><a href="{{ url('/brands/port-authority') }}">Port Authority</a></li>
                    <li><a href="{{ url('/brands/stormtech') }}">Stormtech</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/brands/thermos') }}">Thermos</a></li>
                    <li><a href="{{ url('/brands/titleist') }}">Titleist</a></li>
                    <li><a href="{{ url('/brands/under-armour') }}">Under Armour</a></li>
                    <li><a href="{{ url('/brands/yeti') }}">YETI</a></li>
                    <li><a href="{{ url('/brands/zebra') }}">Zebra</a></li>
                </ul>
            </div>
        </div>
        <p class="mega-heading">Collections</p>
        <hr class="mt-0 mb-3">
        <div class="row">
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/brands/collections/luxury') }}">Luxury Collection</a></li>
                    <li><a href="{{ url('/brands/collections/eco') }}">Eco Collection</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/brands/collections/sport') }}">Sport Collection</a></li>
                    <li><a href="{{ url('/brands/collections/tech') }}">Tech Collection</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="mega-list">
                    <li><a href="{{ url('/brands/collections/value') }}">Value Collection</a></li>
                    <li><a href="{{ url('/brands/collections/corporate') }}">Corporate Picks</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
