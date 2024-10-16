<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>{{ __('dashboard.qaysegp') }}</title>

    <meta name="description"
          content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description"
          content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{ asset('dashboard') }}/assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{ asset('dashboard') }}/assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('dashboard') }}/assets/css/dashmix.min.css">
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet"
          href="{{ asset('dashboard') }}/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"
          href="{{ asset('dashboard') }}/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
          href="{{ asset('dashboard') }}/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
<!-- Page Container -->
@if (app()->getLocale() == 'ar')
    <div id="page-container"
         class="sidebar-o sidebar-dark enable-page-overlay sidebar-r side-scroll page-header-fixed main-content-narrow page-header-dark  dark-mode rtl-support">
        @else
            <div id="page-container"
                 class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow sidebar-dark page-header-dark dark-mode">
                @endif
                <!-- Side Overlay-->
                @include('layouts.admin._aside')
                <!-- END Side Overlay -->

                <!-- Sidebar -->
                <!--
                    Sidebar Mini Mode - Display Helper classes

                    Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                    Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                      If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                    Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                    Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                    Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
                  -->
                @include('layouts.admin._nav')
                <!-- END Sidebar -->

                <!-- Header -->
                @include('layouts.admin._header')
                <!-- END Header -->

                <!-- Main Container -->
                <main id="main-container">
                    @yield('content')
                </main>
                <!-- END Main Container -->

                <!-- Footer -->
                @include('layouts.admin._footer')
                <!-- END Footer -->
            </div>
            <!-- END Page Container -->

            <!--
              Dashmix JS

              Core libraries and functionality
              webpack is putting everything together at assets/_js/main/app.js
            -->
            <script src="{{ asset('dashboard') }}/assets/js/dashmix.app.min.js"></script>

            <!-- jQuery (required for jQuery Sparkline plugin) -->
            <script src="{{ asset('dashboard') }}/assets/js/lib/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"
                    integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            @stack('js')
            <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

            <script src="{{ asset('dashboard') }}/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
            <script
                src="{{ asset('dashboard') }}/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
            <script
                src="{{ asset('dashboard') }}/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js">
            </script>
            <script
                src="{{ asset('dashboard') }}/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js">
            </script>
            <script
                src="{{ asset('dashboard') }}/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
            <script
                src="{{ asset('dashboard') }}/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
            <script src="{{ asset('dashboard') }}/assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
            <script src="{{ asset('dashboard') }}/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
            <script src="{{ asset('dashboard') }}/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
            <script src="{{ asset('dashboard') }}/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
            <script src="{{ asset('dashboard') }}/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

            <!-- Page JS Code -->
            <script src="{{ asset('dashboard') }}/assets/js/pages/be_tables_datatables.min.js"></script>
            <!-- Page JS Plugins -->
            <script src="{{ asset('dashboard') }}/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
            <script src="{{ asset('dashboard') }}/assets/js/plugins/chart.js/chart.umd.js"></script>

            <!-- Page JS Code -->
            <script src="{{ asset('dashboard') }}/assets/js/pages/be_pages_dashboard_v1.min.js"></script>

            <!-- Page JS Helpers (jQuery Sparkline plugin) -->
            <script>
                Dashmix.helpersOnLoad(['jq-sparkline']);
            </script>
</body>

</html>
