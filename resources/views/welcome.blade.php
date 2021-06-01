@extends('frontend.layout.app')

@push('css')
    <style>
        .partner{
            /* height: 100%;
            width: 100%; */
            display: flex;
            align-items: center;
        }

    </style>
@endpush
@section('content')
    <div class="content_wrapper">
        <!-- main slider  -->
    @include('frontend.components.main-banner')
    <!-- main slider end-->
        <!-- about section -->
    @include('frontend.components.about')
    <!-- about section end-->
        <!-- how we work wap -->
    @include('frontend.components.info-graphic')
    <!-- how we work wap end-->
        <!-- partners wrap -->
    @include('frontend.components.partners')
    <!-- partners wrap end -->
        <!-- blog wrap start -->
    @include('frontend.components.blog')
    <!-- blog wrap end-->
        <!-- contact wrap start -->
    @include('frontend.components.contact')
    <!-- contact wrap end-->
    </div>
@endsection
@push('js')
    <script>
        $(window).on('load', function () {
            // bs4 carousel
            $('.carousel').carousel({
                interval: false,
            });

            // owl's carousel
            // $('.owl-carousel').owlCarousel({
            //     margin:10,
            //     loop:false,
            //     nav:true,
            //     respo(nsive: {
            //         0: {
            //             items: 4,
            //             autoplay:true,
            //             autoplayTimeout:4000,
            //             autoplayHoverPause:true
            //         },
            //         320: {
            //             items: 1,
            //             autoplay:true,
            //             autoplayTimeout:4000,
            //             autoplayHoverPause:true
            //         },
            //         600: {
            //             items: 3,
            //             autoplay:true,
            //             autoplayTimeout:4000,
            //             autoplayHoverPause:true
            //         },
            //         1000: {
            //             items: 4,
            //             autoplay:true,
            //             autoplayTimeout:4000,
            //             autoplayHoverPause:true,
            //             autoWidth:true,
            //         },
            //         1200: {
            //             items: 5,
            //             autoWidth:true,
            //             autoplay:true,
            //             autoplayTimeout:4000,
            //             autoplayHoverPause:true
            //         }
            //     }
            // });
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items: 1,
                    },
                    320:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:true
                    },
                    800:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:6,
                        nav:true,
                        loop:false
                    }
                }
            });
        });

    </script>
@endpush
