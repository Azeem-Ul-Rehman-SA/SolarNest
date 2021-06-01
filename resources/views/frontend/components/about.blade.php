<div class="testimonial_wrapper">
    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-6 col-12 pl-0 pr-0">
            <div class="testimonial_img">
                <img class="lozad" data-src="{{ asset('frontend/images/solar-panel.png') }}">
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6 col-12 pl-0 pr-0">
            <div class="background_text">
                <!-- <img src="images/AboutUs-bg.png"> -->
                <section>
                    <div class="about_text lozad" data-background-image="{{ asset('frontend/images/AboutUs-bg.png') }}">
                        <h2>
                            Solar power is a big idea,<br> whose time has come.
                        </h2>
                        <p>{{ $about->summary }}
                        </p>
                        <div class="learn_more ">
                            <a class="learn_more_btn fill-border-btn" href="{{ route('about-us') }}"><span>Learn More<i
                                        class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
