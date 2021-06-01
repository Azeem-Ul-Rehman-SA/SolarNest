{{--@if( Route::currentRouteName() == 'category.blogs' || Route::currentRouteName() == 'blog.show' || Route::currentRouteName() == 'index')--}}
{{--    <title>SolarNest | @yield('title')</title>--}}
{{--    <meta name="description" content="@yield('description')">--}}
{{--    <meta name="keywords" content="@yield('keywords')">--}}
{{--@else --}}
@if(is_null($meta_information))
    <title>SolarNest | @yield('title')</title>
    <meta name="description"
          content="SolarNest">
    <meta name="keywords" content="SolarNest">
@else
    <title>{{$meta_information->title}}</title>
    <meta name="description" content="{{ $meta_information->description }}">
    <meta name="keywords" content="{{ $meta_information->keywords }}">
@endif


