@extends('frontend.layout.app')
@section('title','Login')
@push('css')
    <style>
        .invalid-feedback {
            display: block !important;
            margin-top: 0.25rem !important;

        }
    </style>
@endpush
@section('content')
    <div class="login_area">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6 col-12 pl-0 pr-0">
                <div class="login_area_banner">
                    <img src="{{ asset('frontend/images/login-banner.png') }}">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="login_form">
                    <div class="logo">
                        <img src="{{ asset('uploads/company_logos/'.$settings->logo.'') }}">
                    </div>
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="form-wrapper">
                            <div class="form">
                                <input class="@error('email') is-invalid @enderror" type="email"
                                       name="email" id="email" value="{{ old('email') }}"
                                       placeholder="example@gmail.com"
                                       autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form" type="password">
                                <input id="password" type="password" placeholder="**********"
                                       class=" @error('password') is-invalid @enderror" name="password"
                                       autocomplete="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="learn_more login-btn">
                            <button type="submit" class="learn_more_btn fill-border-btn"><span>Login<i
                                        class="fa fa-angle-right"></i></span>
                            </button>
                        </div>
                    </form>
                    <!-- <div class="social-icons">
                        <a href="{{$settings->facebook_url}}">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="{{$settings->instagram_url}}">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="{{$settings->linkedin_url}}">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="{{$settings->youtube_url}}">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="{{$settings->whatsapp_url}}">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
