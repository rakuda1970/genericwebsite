# Project Dev Notes

> Last updated: March 18, 2026

## Table of Contents

- [Stack](#stack)
- [Project Structure](#project-structure)
- [Authentication](#authentication)
- [Layout & Header](#layout--header)
- [Home Page](#home-page)
- [Dashboard](#dashboard)
- [Known Fixes Applied](#known-fixes-applied)
- [Running the App](#running-the-app)

---

## Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 11 |
| Frontend CSS | Bootstrap 5.3.3 (CDN) |
| Icons | Font Awesome 6.5 (CDN) |
| Build tool | Vite (configured but CDN used in dev) |
| Database | MySQL (configured in `.env`) |

---

## Project Structure

```
app/Http/Controllers/Auth/   ← Auth controllers
app/Http/Requests/Auth/      ← Form request validation
app/Models/User.php          ← User model
resources/views/
  layouts/
    app.blade.php            ← Main layout (header, Bootstrap, mega-menu JS)
    auth.blade.php           ← Minimal layout for auth pages
  partials/
    header.blade.php         ← Two-tier fixed header (logo/search + red nav bar)
  auth/
    login.blade.php
    register.blade.php
    forgot-password.blade.php
    reset-password.blade.php
  welcome.blade.php          ← Home page (banner rotator)
  dashboard.blade.php        ← Authenticated user dashboard
routes/web.php               ← All web routes
public/images/banners/       ← SVG banner images (desktop + mobile variants)
```

---

## Authentication

Full custom auth flow — **no Laravel Breeze/Jetstream**.

| Route | Method | Controller | Notes |
|---|---|---|---|
| `/register` | GET / POST | `RegisterController` | `RegisterRequest` validates input |
| `/login` | GET / POST | `LoginController` | `LoginRequest` validates + throttled |
| `/forgot-password` | GET / POST | `ForgotPasswordController` | Throttled 6/min |
| `/reset-password/{token}` | GET / POST | `ResetPasswordController` | |
| `/logout` | POST | `LogoutController` | Auth-protected |
| `/dashboard` | GET | closure | Auth-protected |

- Guest routes are wrapped in `middleware('guest')` — logged-in users are redirected away.
- Protected routes are wrapped in `middleware('auth')`.

---

## Layout & Header

**File:** [`resources/views/layouts/app.blade.php`](resources/views/layouts/app.blade.php)

- Loads Bootstrap 5.3.3 and Font Awesome 6.5 from CDN.
- Includes [`resources/views/partials/header.blade.php`](resources/views/partials/header.blade.php).
- Supports `@stack('styles')` and `@stack('scripts')` for per-page assets.
- Contains vanilla JS for **mega-menu panels** (positioned fixed, below the header).

**File:** [`resources/views/partials/header.blade.php`](resources/views/partials/header.blade.php)

- **Tier 1:** Logo · Search bar · Login/Account icon · Cart icon.
- **Tier 2:** Red Bootstrap navbar — Products, Brands, New, Sales (left) | Lead Time, Services, Tools (right).
- Products and Brands use custom **mega-menu** panels (rendered outside `<header>` so `position: fixed` works).
- Hamburger menu on mobile is wired with **vanilla JS** (Bootstrap data-api disabled to avoid event conflicts — see [Known Fixes](#known-fixes-applied)).
- Auth-aware: shows account icon linking to `/dashboard` when logged in, `/login` when guest.

---

## Home Page

**File:** [`resources/views/welcome.blade.php`](resources/views/welcome.blade.php)

- Extends `layouts.app`.
- Contains a **responsive banner rotator** (3 slides, 5-second auto-advance).
  - Uses `<picture>` + `<source media="(max-width: 767px)">` to serve mobile SVGs on small screens and desktop SVGs on large screens.
  - Images live in [`public/images/banners/`](public/images/banners/): `easy_peasy`, `frankly`, `hello_world` — each with `_desktop.svg` and `_mobile.svg` variants.
  - Small round dot indicators (10 px, grey hollow → red solid when active).
  - Implemented in **vanilla JS** (CSS `translateX` track + direct click listeners on dot buttons — no Bootstrap carousel, see [Known Fixes](#known-fixes-applied)).

---

## Dashboard

**File:** [`resources/views/dashboard.blade.php`](resources/views/dashboard.blade.php)

- Extends `layouts.app` (same header as the home page).
- Displays a welcome card with the authenticated user's name and email.
- Route is auth-protected (`middleware('auth')`).

---

## Known Fixes Applied

### Bootstrap JS data-API conflicts

The site uses a custom mega-menu that calls `e.stopPropagation()` on `document` click events. This blocks Bootstrap's event-delegation-based data-API from working, which caused two issues:

1. **Carousel indicators did nothing** — Fixed by replacing Bootstrap's carousel component entirely with a self-contained vanilla JS rotator (flex track + `translateX`).
2. **Hamburger menu did nothing** — Fixed by removing `data-bs-toggle` at runtime and wiring the collapse toggle manually via vanilla JS.

---

## Running the App

```bash
# Install PHP dependencies
composer install

# Copy and configure environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start the dev server
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000).

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
