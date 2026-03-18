@extends('layouts.auth')

@section('title', 'Forgot password — ' . config('app.name'))

@section('content')
<div class="card">
    <h1>Forgot password?</h1>
    <p class="subtitle">
        Enter your email address and we'll send you a link to reset your password.
    </p>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" novalidate>
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

        <button type="submit" class="btn">Send reset link</button>
    </form>

    <p class="divider">
        <a href="{{ route('login') }}" class="link">Back to sign in</a>
    </p>
</div>
@endsection
