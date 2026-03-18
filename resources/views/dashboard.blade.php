@extends('layouts.app')

@section('title', 'Dashboard — ' . config('app.name'))

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="h4 fw-bold mb-2">Welcome back, {{ auth()->user()->name }}</h1>
            <p class="text-muted mb-0">You are signed in as <strong>{{ auth()->user()->email }}</strong>.</p>
        </div>
    </div>
</div>
@endsection
