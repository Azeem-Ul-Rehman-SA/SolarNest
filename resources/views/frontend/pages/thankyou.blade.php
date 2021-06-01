@extends('frontend.layout.app')
@section('title','Thank You')
@push('css')
@endpush
@section('content')

    <div class="page_banner_area">
        <div class="page_banner">
            <img src="{{ asset('frontend/images/slide2.jpg') }}">
            <div class="page_banner_overlay">
                <div class="page_title">
                    <h1>Thank You</h1>
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
                <div class="about-wrapper">
                    <div class="about_wrap_inner">
                        <div class="about-desc">
                            <p>Thank you for using <a
                                    href="https://solarnest.pk">solarnest.pk</a>
                            </p>
                            <p> {{ Session::get('message') }}</p>
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

