<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"    >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('logo/cropped-fav-512x450.png') }}"> 
        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
        <!-- Font Awesome -->
        {{-- <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css')}}"> --}}
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css')}}">
        {{-- <link rel="stylesheet" href="{{ asset('css/custom.css')}}"> --}}
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <!-- front end -->
        <link rel="stylesheet" href="{{ asset('traders-assets/frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('traders-assets/frontend/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('traders-assets/frontend/css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('traders-assets/frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('traders-assets/frontend/css/newstyle.css') }}">
        <link rel="stylesheet" href="{{ asset('traders-assets/frontend/css/all.min.css') }}">

        <!-- Scripts -->
        @routes
            <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:8080/js/bundle.js"></script>
        @endenv

        <!-- jQuery -->
        <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin-lte/dist/js/adminlte.min.js')}}"></script>
        <!-- Ion Slider -->
        <script src="{{ asset('admin-lte/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
        <!-- Bootstrap slider -->
        <script src="{{ asset('admin-lte/plugins/bootstrap-slider/bootstrap-slider.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('admin-lte/dist/js/demo.js')}}"></script>
        <script src="{{ asset('js/quize.js')}}"></script>
        {{-- <script src="https://sdk.scdn.co/spotify-player.js"></script> --}}

        <!-- front end -->
        <script src="{{ asset('traders-assets/frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('traders-assets/frontend/js/popper.min.js') }}"></script>
        {{-- <script src="{{ asset('traders-assets/frontend/js/dataTables.bootstrap5.min.js') }}"></script> --}}
        <script src="{{ asset('traders-assets/frontend/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('traders-assets/frontend/js/custome.js') }}"></script>
        <script src="{{ asset('traders-assets/frontend/js/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <script src="{{ asset('traders-assets/frontend/js/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        {{-- <script src="{{ asset('traders-assets/frontend/js/index.js') }}"></script> --}}
    </body>
</html>
