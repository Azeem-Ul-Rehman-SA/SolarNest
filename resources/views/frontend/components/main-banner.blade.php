<div class="main_slider">
    <div id="mainCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('frontend/images/slide1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('frontend/images/slide2.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('frontend/images/slide3.jpg') }}" alt="Third slide">
            </div>
            <div class="carousel_overlay">
                <div class="overlay_content">
                            <h1>{{$settings->company_name}}</h1>
                            <h5>{{$settings->tag_line}}</h5>
                            <p>Simple, Reliable and at the best possible price</p>
                            <a class="qoute_btn fill-border-btn banner-qoute" href="{{ route('get.quote.now') }}"><span>Get Quote Now<i
                                        class="fa fa-angle-right"></i></span> </a>

                </div>
                <div class="tagline_banner">
                    <p>HomeOwners who get Multiple Quotes save 10% or more</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true">
                          <i class="fa fa-angle-left"></i>
                      </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true">
                        <i class="fa fa-angle-right"></i>
                      </span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
