@extends('frontend.layout.app')
@section('content')
    <div class="page_banner_area">
        <div class="page_banner">
            <img src="{{ asset('frontend/images/slide2.jpg') }}">
            <div class="page_banner_overlay">
                <div class="page_title">
                    <h1>Partners</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="partners_listing_wrapper">
        <div class="partners_listing_area">
            <div class="partners_listing_borders">
                @if(!empty($existingPartners) && count($existingPartners) > 0)
                    @php
                        $parnter_id  = null;
                    @endphp
                    <div class="row" id="load-data">
                        @foreach($existingPartners as $partner)
                            @php
                                $parnter_id = $partner->id;
                                $averageStars = \App\Models\Rating::where('partner_id', $partner->id)->selectRaw('SUM(overall_rating)/COUNT(partner_id) AS avg_rating')->first()->avg_rating;;
                            @endphp
                            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                <div class="partner">

                                    <div class="company_profile">
                                        <div class="company_logo">
                                            <img src="{{ asset('/uploads/user_profiles/'.$partner->profile_pic) }}">
                                        </div>
                                        <div class="company_reviews">
                                            <div class="review">
                                                <h2>{{ round($averageStars,2) }} <span>/5</span></h2>
                                            </div>
                                            <div class="review_stars">
                                                <ul>

                                                    @include('frontend.pages.partners.stars-section.stars')

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="company_description">
                                        <p>{{\Illuminate\Support\Str::limit($partner->description,170)}} </p>
                                    </div>
                                    <div class="company_average_rating">
                                        <div class="goto_reviews">
                                            <a class="reviews-btn fill-border-btn"
                                               href="{{route('partner.reviews',$partner->id)}}"><span>Reviews<i
                                                        class="fa fa-angle-right"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="view_more col-12" id="remove-row">
                            <a href="javascript:void(0)" id="btn-more"
                               data-id="{{ $parnter_id }}" class="view_more_btn fill-border-btn"><span>Load More<i
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

        // show response from the php script.
        $(document).ready(function () {
            $(document).on('click', '#btn-more', function () {
                var id = $(this).data('id');
                $("#btn-more").html("Loading....");
                $.ajax({
                    url: '{{ route('partners.load.more') }}',
                    method: "POST",
                    data: {id: id, _token: "{{csrf_token()}}"},
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

