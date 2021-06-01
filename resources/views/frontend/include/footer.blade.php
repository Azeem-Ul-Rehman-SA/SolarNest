<!-- footer area -->
<div class="footer">
    <div class="row align-center">
        <div class="col-md-12 col-lg-3 col-xl-3 col-12">
            <div class="footer_logo">
                <img src="{{ asset('uploads/footer_logos/'.$settings->footer_logo)  }}">
            <!-- <p>
                    © {{ date('Y') }} SolarNest (Pvt) Ltd. All Rights Reserved SolarNest.
                </p> -->
            </div>
        </div>
        <div class="col-md-10 col-lg-6 col-xl-7 col-12 footer-links">
            <div class="row">
            <!-- <div class="col-md-3 col-lg-3 col-xl-3 col-4">
                    <div class="footer_links">
                        {{--                        <h5><a href="#">Partners </a></h5>--}}
            {{--                        <h5><a href="#">Saving Calculator </a></h5>--}}
                </div>
            </div> -->
                <div class="col-md-6 col-lg-6 col-xl-6 col-6">
                    <div class="footer_links">
                        <h5><a href="{{ route('existing.partner') }}">Partners </a></h5>
                        <h5><a href="{{route('solar.calculator')}}">Saving Calculator </a></h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-6">
                    <div class="footer_links">
                        <h5><a href="{{ route('about-us') }}">About Us </a></h5>
                        <h5><a href="{{ route('privacy.policy') }}">Privacy Policy </a></h5>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-2 col-lg-3 col-xl-2 col-12">
            <div class="footer_social_icons">
                <a href="{{$settings->facebook_url}}">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="{{$settings->instagram_url}}">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="{{$settings->linkedin_url}}">
                    <i class="fa fa-linkedin"></i>
                </a>
            <!-- <a href="{{$settings->youtube_url}}">
                    <i class="fa fa-youtube"></i>
                </a> -->
                <a href="{{$settings->whatsapp_url}}">
                    <i class="fa fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="copywrites">
        <p>© copyright SolarNest 2021 (Designed & Developed by: <a href="https://www.creative-dots.com/">Creative
                Dots</a>)</p>
    </div>
</div>
