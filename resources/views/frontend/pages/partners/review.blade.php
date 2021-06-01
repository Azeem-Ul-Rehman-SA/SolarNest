@extends('frontend.layout.app')
@section('content')
    <div class="page_banner_area">
        <div class="page_banner">
            <img src="{{ asset('frontend/images/slide2.jpg') }}">
            <div class="page_banner_overlay">
                <div class="page_title">
                    <h1 id="company_name">{{ $partner->company_name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="partner_detail_wrapper">
        <div class="container">

            <div class="row">
                <div class="col-md-7 col-lg-7 col-xl-8 col-12">
                    <div class="partner_detail_box">
                        <div class="partner_detailbox_inner">
                            <div class="partner_detailbox_header">
                                <a href="{{ route('existing.partner') }}" class="back-btn"><i
                                        class="fa fa-angle-left "></i></a>
                                <div class="partner_company_logo">
                                    <img src="{{ asset('/uploads/user_profiles/'.$partner->profile_pic) }}">
                                </div>
                            </div>
                            <div class="partner_co_description">
                                <p>{{$partner->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 col-xl-4 col-12">
                    <div class="overall_rating_box">
                        <div class="title">
                            <h3>Overall Rating :</h3>
                        </div>
                        @php
                            $averageStars = \App\Models\Rating::where('partner_id', $partner->id)->selectRaw('SUM(overall_rating)/COUNT(partner_id) AS avg_rating')->first()->avg_rating;;

                        @endphp
                        <div class="rating_wrap">
                            <div class="rating">
                                <h2>{{ round($averageStars,2) }} <span>/5</span></h2>
                            </div>
                            <div class="rating_stars">
                                <ul>
                                    @include('frontend.pages.partners.stars-section.stars')
                                </ul>
                            </div>
                        </div>
                        <div class="rating_types_wrap">
                            <ul>
                                <li>
                                    Quality of Work
                                    @include('frontend.pages.partners.stars-section.quanlity-of-work',['averageStars'=>$qualityOfWork])
                                </li>
                                <li>
                                    Professionalism of the Team
                                    @include('frontend.pages.partners.stars-section.quanlity-of-work',['averageStars'=>$professionalism])
                                </li>
                                <li>
                                    Quality of Materials
                                    @include('frontend.pages.partners.stars-section.quanlity-of-work',['averageStars'=>$qualityOfMaterial])
                                </li>
                                <li>
                                    On time Delivery
                                    @include('frontend.pages.partners.stars-section.quanlity-of-work',['averageStars'=>$onTimeDelivery])
                                </li>
                                <li>
                                    Overall Experience
                                    @include('frontend.pages.partners.stars-section.quanlity-of-work',['averageStars'=>$overallExperience])
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="company_review_listing">
                @if(!empty($ratings) && count($ratings) > 0)
                    @php
                        $id  = null;
                        $partner_id  = null;
                    @endphp
                    <div class="row" id="load-data">

                        @foreach($ratings as $rating)
                            @php
                                $id = $rating->id;
                                $parnter_id = $rating->partner_id;
                            @endphp
                            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                <div class="review_item">
                                    <div class="review_author">
                                        <div class="review_auth_dp">
                                            <img>
                                        </div>
                                        <div class="review_auth_info">
                                            <div class="name">
                                                <h6>{{ ucfirst($rating->name) }}</h6>
                                            </div>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <span>({{ $rating->overall_rating }})</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-text">
                                        <p>{{ $rating->comments }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="view_more col-12 " id="remove-row">
                            <a href="javascript:void(0)" id="btn-more"
                               data-id="{{ $id }}" data-partner-id="{{$partner_id}}"
                               class="view_more_btn fill-border-btn"><span>Load More<i
                                        class="fa fa-angle-right"></i></span> </a>

                        </div>
                    </div>
                @else
                    <div class="view_more col-12" id="remove-row">
                        <a class="view_more_btn fill-border-btn"><span>No Record Found</span> </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('frontend.components.contact')
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#btn-more', function () {
                var id = $(this).data('id');
                var partner_id = $(this).data('partner-id');
                $("#btn-more").html("Loading....");
                $.ajax({
                    url: '{{ route('reviews.load.more') }}',
                    method: "POST",
                    data: {id: id, partner_id: partner_id, _token: "{{csrf_token()}}"},
                    dataType: "text",
                    success: function (data) {
                        if (data != '') {
                            $('#remove-row').remove();
                            $('#load-data').append(data);
                        } else {
                            $('#btn-more').remove();
                        }
                    }
                });
            });
        });
    </script>
@endpush
