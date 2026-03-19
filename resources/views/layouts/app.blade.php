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
            background: #dc3545; /* matches header bg-danger nav bar */
            color: rgba(255,255,255,.85);
            margin-top: 3rem;
        }

        /* Top band — matches the red nav bar in the header */
        .footer-top {
            padding: 2.5rem 0 2rem;
            border-bottom: 1px solid rgba(255,255,255,.18);
            background: #dc3545;
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
            background: #b02030;
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
            border-top: 3px solid #dc3545;
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
            color: #dc3545;
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
            color: #dc3545;
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
            background: #dc3545;
            color: #fff;
        }

        /* ── Search bar max-width on large screens ─────────── */
        @media (min-width: 992px) {
            .header-search {
                max-width: 560px;
            }
        }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc4s9bIOgUxi8T/jzmA2i69p6z3Sj+MZU8kSBNGn+bme"
            crossorigin="anonymous"></script>

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
</body>
</html>
