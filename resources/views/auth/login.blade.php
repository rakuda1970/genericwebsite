@extends('layouts.auth')

@section('title', 'Sign in — ' . config('app.name'))

@section('content')
<div class="card">
    <h1>Sign in</h1>
    <p class="subtitle">Welcome back to {{ config('app.name') }}</p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <div class="field">
            <label for="email">Email address</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                aria-describedby="{{ $errors->has('email') ? 'email-error' : '' }}"
            >
            @error('email')
                <p class="error" id="email-error" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <div class="field-row">
                <label for="password">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link">Forgot password?</a>
                @endif
            </div>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                aria-describedby="{{ $errors->has('password') ? 'password-error' : '' }}"
            >
            @error('password')
                <p class="error" id="password-error" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="checkbox-row">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember me
            </label>
        </div>

        <button type="submit" class="btn">Sign in</button>
    </form>

    @if (Route::has('register'))
        <p class="divider">
            Don't have an account? <a href="{{ route('register') }}" class="link">Create one</a>
        </p>
    @endif
</div>
@endsection
