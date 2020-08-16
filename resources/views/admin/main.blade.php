<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href="../../"> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    
    <!-- Page Title  -->
    <title>First Rays | Admin</title>

    {{-- css links--}}
    @include('admin.partials.assets-link.css-links')
    {{-- css section --}}
    @yield('admin-style')

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        
        <!-- main @s -->
        <div class="nk-main ">

            <!-- sidebar @s -->
            @include('admin.partials.sidebar')
            <!-- sidebar @e -->

            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('admin.partials.header')
                <!-- main header @e -->

                <!-- content @s -->
                @yield('content')
                <!-- content @e -->

                <!-- footer @s -->
                @include('admin.partials.footer')
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->

        </div>
        <!-- main @e -->

    </div>
    <!-- app-root @e -->


    <!-- JavaScript links -->
    @include('admin.partials.assets-link.js-links')
    {{-- js section --}}
    @yield('admin-js')

</body>

</html>