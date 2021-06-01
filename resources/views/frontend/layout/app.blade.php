<!DOCTYPE html>
<html lang="en">
<head>

@include('frontend.include.meta-tags')
<!-------- font awesome-->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <!-------- FAVICON-->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="">
    <link rel="msapplication-TileImage" href="">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="" type="image/x-icon">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.css') }}">--}}

    <link rel="preload" as="font" href="{{ asset('frontend/fonts/Exo-Regular.woff') }}" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" as="font" href="{{ asset('frontend/fonts/Exo-Regular.woff2') }}" type="font/woff2"
          crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">--}}
{{--    <!-- Toastr -->--}}
{{--    <link rel="stylesheet" href="{{ asset('frontend/css/toastr.min.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">

    @stack('css')
</head>
<body>
<div class="wrapper">
    @if( Route::currentRouteName() != 'login')
        @include('frontend.include.header')
    @endif
    @yield('content')
    @if( Route::currentRouteName() != 'login')
        @include('frontend.include.footer')
    @endif
</div>

<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/bootstrap.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>--}}
{{--<!-- Toastr -->--}}
{{--<script src="{{ asset('frontend/js/toastr.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/custom.js') }}"></script>--}}
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>

@stack('models')
@stack('js')
{{--<!-- IntersectionObserver polyfill -->--}}
{{--<script src="https://raw.githubusercontent.com/w3c/IntersectionObserver/master/polyfill/intersection-observer.js"></script>--}}

<!-- Lozad.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/lozad"></script>
<script>

    // Initialize library
    lozad('.lozad').observe()


    @if(Session::has('flash_message'))
    var type = "{{ Session::get('flash_status') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('flash_message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('flash_message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('flash_message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('flash_message') }}");
            break;
    }
    @endif

</script>

</body>
</html>
