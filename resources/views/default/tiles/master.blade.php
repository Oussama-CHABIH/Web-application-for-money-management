<!doctype html>
<html class="fixed sidebar-left-collapsed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Dashboard | SHARED ON THEMELOCK.COM</title>
        <meta name="keywords" content="Application de Gestion de monétaire" />
        <meta name="description" content="Application de Gestion de monétaire">
        <meta name="author" content="Oussama chabih">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

        @yield('css')

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">

        <!-- Head Libs -->
        <script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>

    </head>
    <body>
        <section class="body">
            @include('default.tiles.header')
            <div class="inner-wrapper">
                @include('default.tiles.aside')
                @yield('contenu')
            </div>
        </section>
        <!-- Vendor -->
        <script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>


        <!-- Theme Base, Components and Settings -->
        <script src="{{asset('assets/javascripts/theme.js')}}"></script>

        <!-- Theme Custom -->
        <script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>

        <!-- Theme Initialization Files -->
        <script src="{{asset('assets/javascripts/theme.init.js')}}"></script>
        @yield('js')

    </body>
</html>