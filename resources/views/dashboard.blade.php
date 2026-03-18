<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard — {{ config('app.name') }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                font-family: ui-sans-serif, system-ui, -apple-system, sans-serif;
                background: #f3f4f6;
                color: #111827;
                min-height: 100vh;
            }
            header {
                background: #fff;
                border-bottom: 1px solid #e5e7eb;
                padding: 0 1.5rem;
                height: 3.5rem;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .brand { font-weight: 700; font-size: 1.125rem; color: #4f46e5; }
            .nav-right { display: flex; align-items: center; gap: 1rem; font-size: 0.875rem; }
            .user-name { color: #374151; }
            .btn-logout {
                padding: 0.375rem 0.875rem;
                background: transparent;
                border: 1px solid #d1d5db;
                border-radius: 0.375rem;
                font-size: 0.875rem;
                color: #374151;
                cursor: pointer;
                transition: background 0.15s, border-color 0.15s;
            }
            .btn-logout:hover { background: #f9fafb; border-color: #9ca3af; }
            main { max-width: 56rem; margin: 2.5rem auto; padding: 0 1.5rem; }
            .card {
                background: #fff;
                border-radius: 0.75rem;
                box-shadow: 0 1px 3px rgba(0,0,0,.1);
                padding: 2rem;
            }
            h1 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; }
            p { color: #6b7280; font-size: 0.95rem; line-height: 1.6; }
        </style>
    @endif
</head>
<body>
    <header>
        <span class="brand">{{ config('app.name') }}</span>
        <div class="nav-right">
            <span class="user-name">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Sign out</button>
            </form>
        </div>
    </header>

    <main>
        <div class="card">
            <h1>Welcome back, {{ auth()->user()->name }}</h1>
            <p>You are signed in as <strong>{{ auth()->user()->email }}</strong>.</p>
        </div>
    </main>
</body>
</html>
