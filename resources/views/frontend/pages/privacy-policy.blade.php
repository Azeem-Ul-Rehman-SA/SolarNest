@extends('frontend.layout.app')
@push('css')
@endpush
@section('content')
    <div class="page_banner_area">
        <div class="page_banner">
            <img src="{{ asset('frontend/images/slide2.jpg') }}">
            <div class="page_banner_overlay">
                <div class="page_title">
                    <h1>Privacy Policy</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="privacy_policy_page">
        <div class="back_button">
            <a class="back_btn fill-border-btn" href="{{route('index')}}"><span><i
                        class="fa fa-angle-left"></i>Back</span></a>
        </div>
        <div class="privacy_policy_area">
            <div class="policy_inner">
                <div class="privacy_wrap_inner">
                    <div class="title">
                        <h1>Privacy Policy for SolarNest</h1>
                    </div>
                    <div class="heading">
                        <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>
                    </div>
                    <div class="policies">
                        {!! ($privacyPolicy) ? $privacyPolicy->description : '' !!}
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

