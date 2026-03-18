@extends('layouts.app')

@section('title', config('app.name', 'App'))

@section('content')
<div class="container py-5">
    <h1 class="display-5 fw-bold">Welcome to {{ config('app.name') }}</h1>
    <p class="lead text-muted">Your new Laravel application is running.</p>
</div>
@endsection
