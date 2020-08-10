<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag -->
    <title>First Rays - Online Shopping in Bangladesh</title>


    {{-- css links --}}
    @include('partials.assets-link.css-links')

</head>
<body>
    <div class="overlay"></div>

    {{-- header start --}}
    @include('partials.header')
    {{-- header end --}}


    {{-- content section start --}}
    @yield('content')
    {{-- content section end --}}
    

    {{-- Footer start --}}
    @include('partials.footer')
    {{-- Footer end --}}

    {{-- javascript links --}}
    @include('partials.assets-link.js-links')
</body>
</html>
