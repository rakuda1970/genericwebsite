@extends('layouts.app')

@section('title', config('app.name', 'App'))

@push('styles')
<style>
    /* ── Banner carousel ───────────────────────────────── */
    .banner-rotator {
        position: relative;
        overflow: hidden;
        background: #f3f4f6;
        line-height: 0;
    }
    .banner-rotator__track {
        display: flex;
        transition: transform .55s ease-in-out;
        will-change: transform;
    }
    .banner-rotator__slide {
        flex: 0 0 100%;
        width: 100%;
    }
    .banner-rotator__slide picture,
    .banner-rotator__slide img {
        display: block;
        width: 100%;
        height: auto;
    }

    /* ── Small round indicators ────────────────────────── */
    .banner-rotator__dots {
        position: absolute;
        bottom: .75rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: .45rem;
        list-style: none;
        margin: 0;
        padding: 0;
        z-index: 10;
    }
    .banner-rotator__dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 2px solid #adb5bd;
        background: transparent;
        cursor: pointer;
        padding: 0;
        transition: background .2s, border-color .2s;
    }
    .banner-rotator__dot.is-active {
        background: #dc3545;
        border-color: #dc3545;
    }
</style>
@endpush

@section('content')

{{-- ── Responsive banner rotator ──────────────────────────── --}}
<div class="banner-rotator" id="bannerRotator" aria-label="Banner slideshow">

    <div class="banner-rotator__track" id="bannerTrack">

        <div class="banner-rotator__slide">
            <picture>
                <source media="(max-width: 767px)"
                        srcset="{{ asset('images/banners/easy_peasy_mobile.svg') }}">
                <img src="{{ asset('images/banners/easy_peasy_desktop.svg') }}"
                     alt="Easy Peasy">
            </picture>
        </div>

        <div class="banner-rotator__slide">
            <picture>
                <source media="(max-width: 767px)"
                        srcset="{{ asset('images/banners/frankly_mobile.svg') }}">
                <img src="{{ asset('images/banners/frankly_desktop.svg') }}"
                     alt="Frankly">
            </picture>
        </div>

        <div class="banner-rotator__slide">
            <picture>
                <source media="(max-width: 767px)"
                        srcset="{{ asset('images/banners/hello_world_mobile.svg') }}">
                <img src="{{ asset('images/banners/hello_world_desktop.svg') }}"
                     alt="Hello World">
            </picture>
        </div>

    </div>

    <ul class="banner-rotator__dots" id="bannerDots" aria-label="Slide indicators">
        <li><button class="banner-rotator__dot is-active" aria-label="Slide 1"></button></li>
        <li><button class="banner-rotator__dot" aria-label="Slide 2"></button></li>
        <li><button class="banner-rotator__dot" aria-label="Slide 3"></button></li>
    </ul>

</div>

@endsection

@push('scripts')
<script>
(function () {
    var track  = document.getElementById('bannerTrack');
    var dots   = document.querySelectorAll('#bannerDots .banner-rotator__dot');
    var total  = dots.length;
    var current = 0;
    var timer;

    function goTo(index) {
        current = (index + total) % total;
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        dots.forEach(function (d, i) {
            d.classList.toggle('is-active', i === current);
        });
    }

    function next() { goTo(current + 1); }

    function startTimer() {
        clearInterval(timer);
        timer = setInterval(next, 5000);
    }

    // Bind indicator buttons directly — no Bootstrap data-api needed
    dots.forEach(function (dot, i) {
        dot.addEventListener('click', function () {
            goTo(i);
            startTimer(); // reset timer on manual navigation
        });
    });

    startTimer();
})();
</script>
@endpush
