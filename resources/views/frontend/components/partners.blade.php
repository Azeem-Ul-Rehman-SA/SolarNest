<div class="partners_Wrap">
    <div class="row">
        <div class="col-md-12 col-xl-6 col-lg-6 col-sm-12 col-12 pl-0 pr-0">
            <div class="img_bannerr">
                <img class="lozad" data-src="{{ asset('frontend/images/partners_banner.png') }}">
            </div>
        </div>
        <div class="col-md-12 col-xl-6 col-lg-6 col-sm-12 col-12 pl-0 pr-0">
            <div class="become_partner_wrap"
            >
                <div class="partners_text" style="background-image: url({{ asset('frontend/images/Partnertxt-bg.png') }});">
                    <h3>Become a Partner</h3>
                    <p>Are you an installer who wants to partner up with
                        us to increase your market share and help
                        create a sustainable energy ecosystem?</p>
                    <div class="learn_more ">
                        <a class="learn_more_btn fill-border-btn" href="{{ route('become.partner') }}"><span>Learn More<i
                                    class="fa fa-angle-right"></i></span> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($partners) && count($partners) > 0)
        <div class="partners_listing_wrap"
             style="background-image: url({{ asset('frontend/images/Partner-bg.png') }});">
            <div class="partners_listing">
                <div class="owl-carousel partnersCarousal">
                    @foreach($partners as $partner)
                        <div class="partner">
                            <img src="{{ asset('/uploads/partners_logos/'.$partner->logo) }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
