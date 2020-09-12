@extends('main')

@section('content')
	{{-- slider start --}}
    @include('partials.slider')
    {{-- slider end --}}

    {{-- shop-service start --}}
    @include('partials.shop-service')
    {{-- shop-service end --}}

    {{-- small-banner start --}}
    @include('partials.small-banner')
    {{-- small-banner end --}}

    {{-- products start --}}
    @include('partials.products')
    {{-- products end --}}

    {{-- medium-banner start --}}
    @include('partials.medium-banner')
    {{-- medium-banner end --}}

    {{-- populer-products start --}}
    @include('partials.populer-products')
    {{-- populer-products end --}}

    {{-- shop-home-list start --}}
    @include('partials.shop-home-list')
    {{-- shop-home-list end --}}

    {{-- upcoming-product-countdown start --}}
    @include('partials.upcoming-product-countdown')
    {{-- upcoming-product-countdown end --}}

@endsection