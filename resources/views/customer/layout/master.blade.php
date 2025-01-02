<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    {!! SEO::generate() !!}
    <meta name="author" content="Fotuman">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/coinblare-favicon.png') }}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @livewireStyles()
    <style>
        #scroll{
            overflow-y: scroll;
            height: 430px;
        }
    </style>
</head>

<body class="nk-body npc-crypto bg-white has-sidebar dark-mode">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @include('customer.layout.sidebar')
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('customer.layout.topbar')
                <!-- main header @e -->
                <!-- content @s -->
                @include('customer.layout.alert')
                @yield('content')
                <!-- content @e -->
                @include('customer.layout.footer')
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @livewireScripts()
    <script src="{{ asset('assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('assets/js/charts/chart-crypto.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    @stack('script')
</body>

</html>
