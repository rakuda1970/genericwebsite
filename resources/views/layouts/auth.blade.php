<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'App'))</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                font-family: ui-sans-serif, system-ui, -apple-system, sans-serif;
                background: #f3f4f6;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #111827;
            }
            .card {
                background: #fff;
                border-radius: 0.75rem;
                box-shadow: 0 1px 3px rgba(0,0,0,.1), 0 1px 2px rgba(0,0,0,.06);
                padding: 2rem;
                width: 100%;
                max-width: 420px;
                margin: 1rem;
            }
            h1 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.375rem; }
            .subtitle { color: #6b7280; font-size: 0.875rem; margin-bottom: 1.5rem; }
            .field { margin-bottom: 1rem; }
            label {
                display: block;
                font-size: 0.875rem;
                font-weight: 500;
                color: #374151;
                margin-bottom: 0.3rem;
            }
            input[type="email"],
            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 0.5rem 0.75rem;
                border: 1px solid #d1d5db;
                border-radius: 0.375rem;
                font-size: 0.875rem;
                color: #111827;
                outline: none;
                transition: border-color 0.15s, box-shadow 0.15s;
            }
            input:focus {
                border-color: #6366f1;
                box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
            }
            .field-row {
                display: flex;
                justify-content: space-between;
                align-items: baseline;
                margin-bottom: 0.3rem;
            }
            .field-row label { margin-bottom: 0; }
            .error { color: #dc2626; font-size: 0.75rem; margin-top: 0.25rem; }
            .alert {
                padding: 0.75rem 1rem;
                border-radius: 0.375rem;
                font-size: 0.875rem;
                margin-bottom: 1.25rem;
            }
            .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; }
            .btn {
                display: block;
                width: 100%;
                padding: 0.625rem 1rem;
                background: #4f46e5;
                color: #fff;
                border: none;
                border-radius: 0.375rem;
                font-size: 0.875rem;
                font-weight: 600;
                cursor: pointer;
                text-align: center;
                transition: background 0.15s;
                margin-top: 1.25rem;
            }
            .btn:hover { background: #4338ca; }
            a.link { color: #4f46e5; font-size: 0.875rem; text-decoration: underline; }
            a.link:hover { color: #4338ca; }
            .divider {
                text-align: center;
                color: #6b7280;
                font-size: 0.875rem;
                margin-top: 1.25rem;
            }
            .checkbox-row {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-size: 0.875rem;
                color: #374151;
            }
        </style>
    @endif
</head>
<body>
    @yield('content')
</body>
</html>
