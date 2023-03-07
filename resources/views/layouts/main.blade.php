<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href=".">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fav Icon  -->
    {{-- <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"> --}}
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs/fontawesome-icons.css') }}">
    <script src="https://kit.fontawesome.com/6b5b180fe0.js" crossorigin="anonymous"></script>

    <style>
        .asset-title-logo h3{
            color: #FFED00;
            font-family: 'Lobster', cursive;
            text-shadow: -1px 2px 1px #ccc;
        }
    </style>

    @stack('style_css')
    @stack('scripts_top')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">

            @include('layouts.components.sidebar');
            <!-- wrap @s -->
            <div class="nk-wrap ">

                @include('layouts.components.header')

                <!-- content @s -->
                @yield('content')
                <!-- content @e -->
                <!-- footer @s -->
                @include('layouts.components.footer')
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
        @include('modal_general_form')
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/libs/jquery-steps/lib/jquery-1.11.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="./assets/js/bundle.js?ver=3.1.2"></script>
    <script src="./assets/js/scripts.js?ver=3.1.2"></script>
    <script src="{{ asset('assets/js/charts/gd-default.js?ver=3.1.2') }}"></script>
    <script>
        // Ajax send csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
    </script>

    @stack('scripts_bottom')
</body>
</html>
