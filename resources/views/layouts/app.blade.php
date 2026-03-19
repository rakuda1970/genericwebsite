<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'App'))</title>

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">

    {{-- Font Awesome 6 --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer">

    <style>
        /* ── Colour scheme CSS custom properties ───────────── */
        @php
            $colorScheme = config('app.color_scheme', 'default');
            $schemes = [
                'default'   => ['--brand-primary' => '#dc3545', '--brand-dark'    => '#b02030',
                                '--brand-hover'   => 'rgba(0,0,0,.15)', '--brand-badge-bg' => '#b02030'],
                'ariel-red' => ['--brand-primary' => '#ED1C24', '--brand-dark'    => '#b81219',
                                '--brand-hover'   => 'rgba(0,0,0,.15)', '--brand-badge-bg' => '#b81219'],
                'ariel-gray'=> ['--brand-primary' => '#717171', '--brand-dark'    => '#4f4f4f',
                                '--brand-hover'   => 'rgba(0,0,0,.12)', '--brand-badge-bg' => '#4f4f4f'],
                'steel-blue'=> ['--brand-primary' => '#2993CF', '--brand-dark'    => '#0F828D',
                                '--brand-hover'   => 'rgba(0,0,0,.12)', '--brand-badge-bg' => '#0F828D'],
            ];
            $vars = $schemes[$colorScheme] ?? $schemes['default'];
        @endphp
        :root {
            @foreach($vars as $prop => $val)
                {{ $prop }}: {{ $val }};
            @endforeach
        }

        /* ── Fixed header ──────────────────────────────────── */
        #site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            box-shadow: 0 2px 8px rgba(0,0,0,.12);
        }

        body {
            padding-top: 112px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        /* ─────────────────────────────────────────────────────
           Site footer
        ───────────────────────────────────────────────────── */
        .site-footer {
            background: var(--brand-primary);
            color: rgba(255,255,255,.85);
            margin-top: 3rem;
        }

        /* Top band — matches the primary nav bar in the header */
        .footer-top {
            padding: 2.5rem 0 2rem;
            border-bottom: 1px solid rgba(255,255,255,.18);
            background: var(--brand-primary);
        }
        .footer-top-inner {
            display: flex;
            gap: 2.5rem;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        /* Social block */
        .footer-social {
            min-width: 140px;
        }
        .footer-social__label {
            font-size: .8rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: .6rem;
        }
        .footer-social__icons {
            display: flex;
            gap: 1rem;
        }
        .footer-social__link {
            color: rgba(255,255,255,.8);
            font-size: 1.15rem;
            text-decoration: none;
            transition: color .15s;
        }
        .footer-social__link:hover { color: #fff; }

        /* Nav columns */
        .footer-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem 2.5rem;
            flex: 1;
        }
        .footer-nav__col h6.footer-nav__heading {
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #fff;
            margin-bottom: .6rem;
        }
        .footer-nav__col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-nav__col ul li {
            margin-bottom: .3rem;
        }
        .footer-nav__col ul li a {
            font-size: .8rem;
            color: rgba(255,255,255,.8);
            text-decoration: none;
            transition: color .15s;
        }
        .footer-nav__col ul li a:hover { color: #fff; }

        /* Bottom band — one shade darker to mirror the header-top/header-nav split */
        .footer-bottom {
            padding: 1.5rem 0;
            background: var(--brand-dark);
        }
        .footer-bottom-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .footer-logo__text {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            font-style: italic;
            color: #fff;
            line-height: 1;
            letter-spacing: -.02em;
        }
        .footer-logo__copy {
            display: block;
            font-size: .72rem;
            color: rgba(255,255,255,.75);
            margin-top: .25rem;
        }
        .footer-badges {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            justify-content: flex-end;
        }
        .footer-badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.25);
            border-radius: .375rem;
            padding: .25rem .6rem;
            font-size: .7rem;
            color: #fff;
        }
        .footer-badge i { font-size: .7rem; }
        .footer-badge-img-link {
            display: inline-flex;
            align-items: center;
            opacity: .9;
            transition: opacity .15s;
        }
        .footer-badge-img-link:hover { opacity: 1; }
        .footer-badge-img {
            height: 52px;
            width: auto;
            border-radius: .25rem;
        }

        /* ── Mega panels (live outside <header> in the DOM) ── */
        .mega-panel {
            display: none;
            position: fixed;
            left: 0;
            right: 0;
            background-color: #ffffff;
            z-index: 1040;
            border-top: 3px solid var(--brand-primary);
            box-shadow: 0 6px 16px rgba(0,0,0,.12);
            max-height: 80vh;
            overflow-y: auto;
        }
        .mega-panel.mega-open {
            display: block;
        }
        .mega-toggle .mega-caret {
            font-size: .6rem;
            vertical-align: middle;
            margin-left: .2rem;
        }
        .mega-heading {
            font-size: .9rem;
            font-weight: 700;
            color: var(--brand-primary);
            text-transform: uppercase;
            letter-spacing: .03em;
            margin-bottom: .5rem;
        }
        .mega-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .mega-list li {
            margin-bottom: .3rem;
        }
        .mega-list a {
            color: #212529;
            text-decoration: none;
            font-size: .875rem;
        }
        .mega-list a:hover {
            color: var(--brand-primary);
        }

        /* ── Top-tier logo ─────────────────────────────────── */
        .header-logo img {
            max-height: 54px;
            width: auto;
        }

        /* ── Square icon buttons ───────────────────────────── */
        .btn-icon {
            width: 40px;
            height: 40px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
        }

        /* ── Bootstrap utility overrides for colour scheme ─── */
        /* These override bg-danger and btn-danger to use the active brand colour */
        .bg-danger,
        .btn-danger,
        .header-nav.bg-danger {
            background-color: var(--brand-primary) !important;
            border-color: var(--brand-primary) !important;
        }
        .btn-danger:hover,
        .btn-danger:focus,
        .btn-danger:active {
            background-color: var(--brand-dark) !important;
            border-color: var(--brand-dark) !important;
        }
        .text-danger { color: var(--brand-primary) !important; }

        /* ── Nav hover/active indicator ────────────────────── */
        .header-nav .nav-link {
            font-size: .875rem;
            font-weight: 500;
            white-space: nowrap;
            transition: background .15s;
        }
        .header-nav .nav-link:hover,
        .header-nav .nav-link:focus,
        .header-nav .nav-link.active {
            background: rgba(0,0,0,.15);
        }

        /* ── Dropdown menus ────────────────────────────────── */
        .header-nav .dropdown-menu {
            min-width: 11rem;
            margin-top: 0;
        }
        .header-nav .dropdown-item:hover {
            background: var(--brand-primary);
            color: #fff;
        }

        /* ── Search bar max-width on large screens ─────────── */
        @media (min-width: 992px) {
            .header-search {
                max-width: 560px;
            }
        }

        /* ── Lead Times Modal ──────────────────────────────── */
        #leadTimesModal .modal-header {
            background: var(--brand-primary);
            color: #fff;
            border-radius: 0;
        }
        #leadTimesModal .modal-title { font-weight: 700; }
        #leadTimesModal .btn-close { filter: invert(1) grayscale(100%) brightness(200%); }
        #leadTimesModal .lt-filter-row { background: #f8f9fa; border-radius: .375rem; padding: 1rem 1.25rem .75rem; margin-bottom: 1.25rem; }
        #leadTimesModal .lt-filter-row label { font-size: .75rem; font-weight: 600; text-transform: uppercase; letter-spacing: .04em; color: #495057; margin-bottom: .25rem; }
        #lt-table thead th { background: #f1f3f5; font-size: .8rem; font-weight: 700; text-transform: uppercase; letter-spacing: .04em; color: #495057; border-bottom: 2px solid #dee2e6; white-space: nowrap; }
        #lt-table tbody td { font-size: .875rem; vertical-align: middle; }
        #lt-table tbody td.lt-na { color: #adb5bd; font-style: italic; }
    </style>

    @stack('styles')
</head>
<body>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Bootstrap 5 JS bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    (function () {
        // Position mega panels directly below #site-header
        function positionMegaPanels() {
            var headerH = document.getElementById('site-header').offsetHeight;
            document.querySelectorAll('.mega-panel').forEach(function (p) {
                p.style.top = headerH + 'px';
            });
        }

        // Toggle a mega panel; close all others first
        function openMega(targetId) {
            var all = document.querySelectorAll('.mega-panel');
            var target = document.getElementById(targetId);
            var isOpen = target && target.classList.contains('mega-open');

            all.forEach(function (p) { p.classList.remove('mega-open'); });
            document.querySelectorAll('.mega-toggle').forEach(function (t) {
                t.setAttribute('aria-expanded', 'false');
                t.classList.remove('active');
            });

            if (!isOpen && target) {
                positionMegaPanels();
                target.classList.add('mega-open');
                var toggle = document.querySelector('[data-mega-target="' + targetId + '"]');
                if (toggle) {
                    toggle.setAttribute('aria-expanded', 'true');
                    toggle.classList.add('active');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            positionMegaPanels();
            window.addEventListener('resize', positionMegaPanels);

            // ── Navbar hamburger toggle (vanilla JS) ──────────────
            var navToggler = document.querySelector('#site-header .navbar-toggler');
            if (navToggler) {
                var navMenu = document.querySelector(navToggler.getAttribute('data-bs-target'));
                if (navMenu) {
                    navToggler.removeAttribute('data-bs-toggle');
                    navToggler.addEventListener('click', function () {
                        var isOpen = navMenu.classList.toggle('show');
                        navToggler.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                        navToggler.classList.toggle('collapsed', !isOpen);
                    });
                }
            }

            // ── Bootstrap dropdown menus (vanilla JS) ─────────────
            // Remove data-bs-toggle so the data-API doesn't interfere, then
            // wire each toggle directly. One open at a time.
            document.querySelectorAll('#site-header [data-bs-toggle="dropdown"]').forEach(function (toggle) {
                toggle.removeAttribute('data-bs-toggle');
                var menu = toggle.nextElementSibling;
                if (!menu || !menu.classList.contains('dropdown-menu')) return;

                toggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var isOpen = menu.classList.contains('show');

                    // Close all open dropdowns first
                    document.querySelectorAll('#site-header .dropdown-menu.show').forEach(function (m) {
                        m.classList.remove('show');
                        m.previousElementSibling && m.previousElementSibling.setAttribute('aria-expanded', 'false');
                    });

                    // Also close mega panels
                    document.querySelectorAll('.mega-panel').forEach(function (p) { p.classList.remove('mega-open'); });
                    document.querySelectorAll('.mega-toggle').forEach(function (t) {
                        t.setAttribute('aria-expanded', 'false');
                        t.classList.remove('active');
                    });

                    if (!isOpen) {
                        menu.classList.add('show');
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function (e) {
                if (!e.target.closest('#site-header .dropdown')) {
                    document.querySelectorAll('#site-header .dropdown-menu.show').forEach(function (m) {
                        m.classList.remove('show');
                        m.previousElementSibling && m.previousElementSibling.setAttribute('aria-expanded', 'false');
                    });
                }
            });

            // Bind toggle buttons
            document.querySelectorAll('.mega-toggle').forEach(function (btn) {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    openMega(btn.getAttribute('data-mega-target'));
                });
            });

            // Close mega panels when clicking outside
            document.addEventListener('click', function (e) {
                if (!e.target.closest('.mega-dropdown') && !e.target.closest('.mega-panel')) {
                    document.querySelectorAll('.mega-panel').forEach(function (p) {
                        p.classList.remove('mega-open');
                    });
                    document.querySelectorAll('.mega-toggle').forEach(function (t) {
                        t.setAttribute('aria-expanded', 'false');
                        t.classList.remove('active');
                    });
                }
            });

            // Close on Escape
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.mega-panel').forEach(function (p) {
                        p.classList.remove('mega-open');
                    });
                }
            });

        });
    })();
    </script>

    @stack('scripts')

    {{-- ── Production Lead Times Modal ───────────────────────────────── --}}
    <div class="modal fade" id="leadTimesModal" tabindex="-1"
         aria-labelledby="leadTimesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content rounded-0">

                <div class="modal-header">
                    <h5 class="modal-title" id="leadTimesModalLabel">Production Lead Times</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    {{-- Filter row --}}
                    <div class="lt-filter-row">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="lt-method-filter">Method</label>
                                <select id="lt-method-filter" class="form-select form-select-sm">
                                    <option value="">Select a Method</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="lt-product-filter">Product</label>
                                <select id="lt-product-filter" class="form-select form-select-sm">
                                    <option value="">Select a Product</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="lt-location-filter">Location</label>
                                <select id="lt-location-filter" class="form-select form-select-sm">
                                    <option value="">Select a Location</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Error banner --}}
                    <div id="lt-error" class="alert alert-danger d-none" role="alert">
                        Failed to load lead times data. Please try again later.
                    </div>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table id="lt-table" class="table table-bordered table-hover table-sm mb-0">
                            <thead id="lt-table-head">
                                <tr>
                                    <th>Method</th>
                                    <th>St Louis, MO</th>
                                    <th>San Diego, CA</th>
                                </tr>
                            </thead>
                            <tbody id="lt-table-body">
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        <span class="spinner-border spinner-border-sm text-danger me-2" role="status"></span>
                                        Loading lead times&hellip;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>{{-- /modal-body --}}
            </div>
        </div>
    </div>

    <script>
    (function () {
        var ltData   = null;
        var ltLoaded = false;
        var modalEl  = document.getElementById('leadTimesModal');
        if (!modalEl) return;

        /* ── Bind the trigger link (bottom of body — full DOM available) ─ */
        var ltTrigger = document.getElementById('lt-modal-trigger');
        if (ltTrigger) {
            ltTrigger.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                document.querySelectorAll('.mega-panel').forEach(function (p) { p.classList.remove('mega-open'); });
                document.querySelectorAll('#site-header .dropdown-menu.show').forEach(function (m) { m.classList.remove('show'); });
                new bootstrap.Modal(modalEl).show();
            });
        }

        /* ── Helpers ──────────────────────────────────────── */
        function esc(str) {
            return (str == null ? '' : String(str))
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;');
        }

        function sel(id) { return document.getElementById(id); }

        /* ── Populate filter selects once data arrives ─────── */
        function populateFilters() {
            var methodSel   = sel('lt-method-filter');
            var productSel  = sel('lt-product-filter');
            var locationSel = sel('lt-location-filter');

            // Methods from methodLeadTimeArr
            ltData.methodLeadTimeArr.forEach(function (m) {
                var opt = document.createElement('option');
                opt.value       = m.print_method_name;
                opt.textContent = m.print_method_name;
                methodSel.appendChild(opt);
            });

            // Products (unique print_method_name from productLeadTimeArr)
            var seen = {};
            ltData.productLeadTimeArr.forEach(function (r) {
                if (!seen[r.print_method_name]) {
                    seen[r.print_method_name] = true;
                    var opt = document.createElement('option');
                    opt.value       = r.print_method_name;
                    opt.textContent = r.print_method_name;
                    productSel.appendChild(opt);
                }
            });

            // Locations (unique location_fob_name from productLeadTimeArr)
            var seenLoc = {};
            ltData.productLeadTimeArr.forEach(function (r) {
                if (!seenLoc[r.location_fob_name]) {
                    seenLoc[r.location_fob_name] = true;
                    var opt = document.createElement('option');
                    opt.value       = r.location_fob_name;
                    opt.textContent = r.location_fob_name;
                    locationSel.appendChild(opt);
                }
            });
        }

        /* ── Render table based on current filter values ───── */
        function renderTable() {
            var methodFilter   = sel('lt-method-filter').value;
            var productFilter  = sel('lt-product-filter').value;
            var locationFilter = sel('lt-location-filter').value;

            var thead = sel('lt-table-head');
            var tbody = sel('lt-table-body');
            tbody.innerHTML = '';

            if (productFilter) {
                /* ── Product-specific view (productLeadTimeArr) ── */
                thead.innerHTML =
                    '<tr><th>Print Method</th><th>Run Type</th><th>Lead Days</th><th>Location</th></tr>';

                var rows = ltData.productLeadTimeArr.filter(function (r) {
                    return r.print_method_name === productFilter &&
                           (!locationFilter || r.location_fob_name === locationFilter);
                });

                if (rows.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted py-3">No results found.</td></tr>';
                    return;
                }

                rows.forEach(function (r) {
                    var tr = document.createElement('tr');
                    var td1 = document.createElement('td'); td1.textContent = r.print_method_name;
                    var td2 = document.createElement('td'); td2.textContent = r.run_type_name;
                    var td3 = document.createElement('td'); td3.textContent = r.lead_days;
                    var td4 = document.createElement('td'); td4.textContent = r.location_fob_name;
                    tr.append(td1, td2, td3, td4);
                    tbody.appendChild(tr);
                });

            } else {
                /* ── Standard method view (methodLeadTimeArr) ─── */
                thead.innerHTML =
                    '<tr><th>Method</th><th>St Louis, MO</th><th>San Diego, CA</th></tr>';

                var rows = ltData.methodLeadTimeArr.filter(function (r) {
                    return !methodFilter || r.print_method_name === methodFilter;
                });

                if (rows.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="3" class="text-center text-muted py-3">No results found.</td></tr>';
                    return;
                }

                rows.forEach(function (r) {
                    var tr  = document.createElement('tr');
                    var td1 = document.createElement('td');
                    td1.textContent = r.print_method_name;

                    var td2 = document.createElement('td');
                    if (r.mo_lead_days) { td2.textContent = r.mo_lead_days; }
                    else { td2.textContent = 'Not Available'; td2.className = 'lt-na'; }

                    var td3 = document.createElement('td');
                    if (r.wc_lead_days) { td3.textContent = r.wc_lead_days; }
                    else { td3.textContent = 'Not Available'; td3.className = 'lt-na'; }

                    tr.append(td1, td2, td3);
                    tbody.appendChild(tr);
                });
            }
        }

        /* ── Fetch data once, then render ──────────────────── */
        function loadData() {
            if (ltLoaded) { renderTable(); return; }

            fetch('{{ route("api.lead-times") }}')
                .then(function (res) {
                    if (!res.ok) throw new Error('HTTP ' + res.status);
                    return res.json();
                })
                .then(function (data) {
                    ltData   = data;
                    ltLoaded = true;
                    populateFilters();
                    renderTable();
                })
                .catch(function () {
                    sel('lt-table-body').innerHTML =
                        '<tr><td colspan="3" class="text-center py-3"></td></tr>';
                    sel('lt-error').classList.remove('d-none');
                });
        }

        /* ── Bind modal open event ─────────────────────────── */
        modalEl.addEventListener('show.bs.modal', loadData);

        /* ── Bind filter changes (DOM is fully loaded at this point) ─── */
        ['lt-method-filter', 'lt-product-filter', 'lt-location-filter'].forEach(function (id) {
            var el = sel(id);
            if (!el) return;
            el.addEventListener('change', function () {
                // Method and Product are mutually exclusive datasets
                if (id === 'lt-method-filter' && this.value) {
                    sel('lt-product-filter').value  = '';
                    sel('lt-location-filter').value = '';
                }
                if (id === 'lt-product-filter' && this.value) {
                    sel('lt-method-filter').value = '';
                }
                if (ltLoaded) renderTable();
            });
        });

    })();
    </script>
</body>
</html>
