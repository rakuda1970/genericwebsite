@extends('layouts.auth')

@section('title', 'Create account — ' . config('app.name'))

@section('content')
<div class="card">
    <h1>Create account</h1>
    <p class="subtitle">Get started with {{ config('app.name') }}</p>

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <div class="field">
            <label for="name">Full name</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                aria-describedby="{{ $errors->has('name') ? 'name-error' : '' }}"
            >
            @error('name')
                <p class="error" id="name-error" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="email">Email address</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                aria-describedby="{{ $errors->has('email') ? 'email-error' : '' }}"
            >
            @error('email')
                <p class="error" id="email-error" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                aria-describedby="password-hint {{ $errors->has('password') ? 'password-error' : '' }}"
            >
            <p id="password-hint" style="font-size:0.75rem;color:#6b7280;margin-top:0.25rem">
                At least 8 characters with uppercase, lowercase, number, and symbol.
            </p>
            @error('password')
                <p class="error" id="password-error" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="password_confirmation">Confirm password</label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            >
        </div>

        <button type="submit" class="btn">Create account</button>
    </form>

    @if (Route::has('login'))
        <p class="divider">
            Already have an account? <a href="{{ route('login') }}" class="link">Sign in</a>
        </p>
    @endif
</div>
@endsection
