@extends('frontend.layout.app')
@push('css')
@endpush
@section('content')

    <div class="page_banner_area">
        <div class="page_banner">
            <img src="{{ asset('frontend/images/slide2.jpg') }}">
            <div class="page_banner_overlay">
                <div class="page_title">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us-page">
        <div class="back_button">
            <a class="back_btn fill-border-btn" href="{{ route('index') }}"><span><i
                        class="fa fa-angle-left"></i>Back</span></a>
        </div>
        <div class="about-us-area">
            <div class="about_inner">
                <div class="about-wrapper" style="background-image: url({{ asset('frontend/images/About-Us.png') }});">
                    <div class="about_wrap_inner">
                        <div class="title">
                            <h3>About Us</h3>
                        </div>
                        <div class="about-desc">
                            {!! ($aboutus) ? $aboutus->description : '' !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('frontend.components.contact')

@endsection
@push('models')

@endpush
@push('js')

@endpush

