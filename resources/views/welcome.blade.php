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
        background: var(--brand-primary);
        border-color: var(--brand-primary);
    }

    /* ── Brand scroller ────────────────────────────────── */
    .brand-scroller {
        padding: 2rem 0 2.5rem;
        background: #fff;
        border-top: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
        overflow: hidden;
    }
    .brand-scroller__heading {
        text-align: center;
        font-size: .75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .1em;
        color: #9ca3af;
        margin-bottom: 1.25rem;
    }
    .brand-scroller__viewport {
        position: relative;
        overflow: hidden;
    }
    .brand-scroller__track {
        display: flex;
        transition: transform .45s ease-in-out;
        will-change: transform;
    }
    /* Each "slide" is exactly 1/scrollerSlides of the track and shows 5 tiles */
    .brand-scroller__slide {
        flex: 0 0 100%;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 1rem;
        padding: 0 .5rem;
    }
    .brand-tile {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 1px solid #e5e7eb;
        border-radius: .5rem;
        aspect-ratio: 1 / 1;
        text-decoration: none;
        overflow: hidden;
        transition: box-shadow .15s, transform .15s;
    }
    .brand-tile:hover {
        box-shadow: 0 4px 14px rgba(0,0,0,.12);
        transform: translateY(-2px);
    }
    .brand-tile img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .brand-tile--blank {
        border-color: transparent;
        background: transparent;
        pointer-events: none;
    }
    /* Prev / Next arrows */
    .brand-scroller__btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        background: rgba(255,255,255,.9);
        border: 1px solid #d1d5db;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #374151;
        font-size: 1rem;
        transition: background .15s, box-shadow .15s;
        padding: 0;
    }
    .brand-scroller__btn:hover {
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,.15);
    }
    .brand-scroller__btn--prev { left: .5rem; }
    .brand-scroller__btn--next { right: .5rem; }

    /* ── Featured mini-banner grid ────────────────────── */
    .featured-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto auto;
        gap: .375rem;
        padding: .375rem;
        background: #f3f4f6;
    }
    .featured-banner {
        position: relative;
        display: block;
        overflow: hidden;
        text-decoration: none;
        background: #e5e7eb;
    }
    /* Fixed aspect ratio: wider than tall, like the reference */
    .featured-banner::before {
        content: '';
        display: block;
        padding-top: 52%; /* ~2:1 landscape ratio */
    }
    .featured-banner picture,
    .featured-banner img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .4s ease;
    }
    .featured-banner:hover img {
        transform: scale(1.03);
    }
    /* Responsive: stack to single column on mobile */
    @media (max-width: 575px) {
        .featured-grid {
            grid-template-columns: 1fr;
        }
        .featured-banner::before {
            padding-top: 56%; /* slightly taller on mobile */
        }
    }
    /* ── Distributor Tools section ───────────────────── */
    .dist-tools {
        padding: 3rem 1.5rem 3.5rem;
        background: #fff;
        text-align: center;
    }
    .dist-tools__heading {
        font-size: 1.65rem;
        font-weight: 800;
        color: var(--brand-primary);
        margin-bottom: 2.25rem;
    }
    .dist-tools__grid {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .dist-tool {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .85rem;
        text-decoration: none;
        color: #374151;
        width: 160px;
        transition: color .15s;
    }
    .dist-tool:hover { color: var(--brand-primary); }
    .dist-tool__icon-wrap {
        width: 100px;
        height: 100px;
        border: 2.5px solid var(--brand-primary);
        border-radius: .5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--brand-primary);
        font-size: 2.6rem;
        transition: background .15s, color .15s;
    }
    .dist-tool:hover .dist-tool__icon-wrap {
        background: var(--brand-primary);
        color: #fff;
    }
    .dist-tool__label {
        font-size: .8rem;
        font-weight: 600;
        text-align: center;
        line-height: 1.3;
    }
    @media (max-width: 575px) {
        .dist-tools__grid { gap: 1.25rem; }
        .dist-tool { width: 130px; }
        .dist-tool__icon-wrap { width: 80px; height: 80px; font-size: 2rem; }
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

{{-- ── Brand scroller ──────────────────────────────────────── --}}
@php
    $scrollerColors = [
        '#40C5E7','#A0E1F3','#2993CF','#0F828D','#5B8CCC',
        '#7EC8C8','#3A7BD5','#00B4D8','#48CAE4','#90E0EF',
        '#023E8A','#0077B6','#0096C7','#48B2E3','#56CFE1',
        '#72EFDD','#4EA8DE','#80B3FF','#B8C0FF','#C8B6FF',
    ];
    $allTiles = $scrollerBrands->values()->map(fn($b, $i) => [
        'id'    => $b->id,
        'name'  => $b->name,
        'color' => $scrollerColors[$i % count($scrollerColors)],
        'blank' => false,
    ]);
    for ($p = 0; $p < $scrollerBlanks; $p++) {
        $allTiles->push(['blank' => true]);
    }
    $slides = $allTiles->chunk(5);
@endphp

<section class="brand-scroller" aria-label="Shop by brand">
    <p class="brand-scroller__heading">Shop Our Brands</p>

    <div class="brand-scroller__viewport" id="brandScrollerViewport">
        <div class="brand-scroller__track" id="brandScrollerTrack">
            @foreach($slides as $slide)
                <div class="brand-scroller__slide">
                    @foreach($slide as $tile)
                        @if(!empty($tile['blank']))
                            <div class="brand-tile brand-tile--blank" aria-hidden="true"></div>
                        @else
                            <a class="brand-tile"
                               href="{{ route('products.brand', $tile['id']) }}"
                               title="{{ $tile['name'] }}">
                                <img src="https://placehold.co/200x200/{{ ltrim($tile['color'],'#') }}/ffffff?text={{ urlencode($tile['name']) }}"
                                     alt="{{ $tile['name'] }}"
                                     loading="lazy">
                            </a>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>

        <button class="brand-scroller__btn brand-scroller__btn--prev"
                id="brandScrollerPrev" aria-label="Previous brands">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="brand-scroller__btn brand-scroller__btn--next"
                id="brandScrollerNext" aria-label="Next brands">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</section>

{{-- ── Featured mini-banner grid ──────────────────────────── --}}
@php
    $featuredBanners = [
        [
            'label'       => 'New Arrivals &rsaquo;',
            'label_pos'   => 'right',
            'href'        => route('products.new'),
            'alt'         => 'New Arrivals',
            'bg_desktop'  => '3D5A80/e0fbfc',
            'bg_mobile'   => '3D5A80/e0fbfc',
            'text_desktop'=> 'New+Arrivals',
            'text_mobile' => 'New+Arrivals',
        ],
        [
            'label'       => 'View &amp; Customize 2026 Catalog &rsaquo;',
            'label_pos'   => 'right',
            'href'        => url('/tools/artwork-templates'),
            'alt'         => 'View & Customize 2026 Catalog',
            'bg_desktop'  => 'c9b99a/3d3522',
            'bg_mobile'   => 'c9b99a/3d3522',
            'text_desktop'=> '2026+Catalog',
            'text_mobile' => '2026+Catalog',
        ],
        [
            'label'       => 'Reset &amp; Recharge &rsaquo;',
            'label_pos'   => 'left',
            'href'        => route('products.index'),
            'alt'         => 'Reset & Recharge',
            'bg_desktop'  => 'b5c4b1/2d3a29',
            'bg_mobile'   => 'b5c4b1/2d3a29',
            'text_desktop'=> 'Reset+%26+Recharge',
            'text_mobile' => 'Reset+%26+Recharge',
        ],
        [
            'label'       => 'Tradeshow Faves &rsaquo;',
            'label_pos'   => 'right',
            'href'        => route('products.index'),
            'alt'         => 'Tradeshow Faves',
            'bg_desktop'  => '4a6fa5/e8f0fe',
            'bg_mobile'   => '4a6fa5/e8f0fe',
            'text_desktop'=> 'Tradeshow+Faves',
            'text_mobile' => 'Tradeshow+Faves',
        ],
    ];
@endphp

<section class="featured-grid" aria-label="Featured collections">
    @foreach($featuredBanners as $banner)
        <a class="featured-banner" href="{{ $banner['href'] }}">
            <picture>
                <source media="(max-width: 575px)"
                        srcset="https://placehold.co/600x336/{{ $banner['bg_mobile'] }}?text={{ $banner['text_mobile'] }}">
                <img src="https://placehold.co/900x468/{{ $banner['bg_desktop'] }}?text={{ $banner['text_desktop'] }}"
                     alt="{{ $banner['alt'] }}"
                     loading="lazy">
            </picture>
        </a>
    @endforeach
</section>

{{-- ── Distributor Tools ─────────────────────────────────── --}}
@php
    $distTools = [
        ['icon' => 'fa-solid fa-circle-info',   'label' => 'Information Center',  'href' => url('/tools/information-center')],
        ['icon' => 'fa-solid fa-newspaper',      'label' => 'Flyers',              'href' => url('/tools/flyers')],
        ['icon' => 'fa-solid fa-book-open',      'label' => 'Catalogs &amp; Lookbooks', 'href' => url('/tools/artwork-templates')],
        ['icon' => 'fa-solid fa-circle-play',    'label' => 'Videos',              'href' => url('/tools/videos')],
        ['icon' => 'fa-solid fa-stamp',          'label' => 'Imprinting Hub',      'href' => url('/services/decoration')],
    ];
@endphp

<section class="dist-tools" aria-labelledby="dist-tools-heading">
    <h2 class="dist-tools__heading" id="dist-tools-heading">Distributor Tools</h2>
    <div class="dist-tools__grid">
        @foreach($distTools as $tool)
            <a class="dist-tool" href="{{ $tool['href'] }}">
                <span class="dist-tool__icon-wrap" aria-hidden="true">
                    <i class="{{ $tool['icon'] }}"></i>
                </span>
                <span class="dist-tool__label">{!! $tool['label'] !!}</span>
            </a>
        @endforeach
    </div>
</section>

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

<script>
(function () {
    var track    = document.getElementById('brandScrollerTrack');
    var btnPrev  = document.getElementById('brandScrollerPrev');
    var btnNext  = document.getElementById('brandScrollerNext');
    if (!track || !btnPrev || !btnNext) return;

    var slides  = track.querySelectorAll('.brand-scroller__slide');
    var total   = slides.length;
    var current = 0;

    function goTo(index) {
        current = (index + total) % total;
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        btnPrev.disabled = total <= 1;
        btnNext.disabled = total <= 1;
    }

    btnPrev.addEventListener('click', function () { goTo(current - 1); });
    btnNext.addEventListener('click', function () { goTo(current + 1); });

    // Hide arrows if only one slide
    if (total <= 1) {
        btnPrev.style.display = 'none';
        btnNext.style.display = 'none';
    }
})();
</script>
@endpush
