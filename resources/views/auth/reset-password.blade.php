@extends('layouts.auth')

@section('title', 'Reset password — ' . config('app.name'))

@section('content')
<div class="card">
    <h1>Reset password</h1>
    <p class="subtitle">Choose a new strong password for your account.</p>

    <form method="POST" action="{{ route('password.update') }}" novalidate>
        @csrf

        {{-- Token is passed via hidden field; never exposed to the user --}}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="field">
            <label for="email">Email address</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email', $email) }}"
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
            <label for="password">New password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                aria-describedby="{{ $errors->has('password') ? 'password-error' : '' }}"
            >
            @error('password')
                <p class="error" id="password-error" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="password_confirmation">Confirm new password</label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            >
        </div>

        <button type="submit" class="btn">Reset password</button>
    </form>
</div>
@endsection
