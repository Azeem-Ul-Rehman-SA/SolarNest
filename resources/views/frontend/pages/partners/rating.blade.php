@extends('frontend.layout.app')
@section('title','Rate Us')
@push('css')

    <style>

        .rating-stars ul > li.star {
            display: inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul > li.star > i.fa {
            font-size: 18px; /* Change the size of the stars */
            color: #256EB4; /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul > li.star.hover > i.fa {
            color: #FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star.selected > i.fa {
            color: #FFCC36;
        }

        .invalid-feedback {
            display: block !important;
            margin-top: 0.25rem !important;

        }


    </style>

@endpush
@section('content')
    <div class="review-form-wrapper" style="background-image: url('{{ asset('frontend/images/calc-bg.png') }}');">
        <div class="container">
            <div class="review-wrap-inner">
                <div class="review-form">
                    <div class="row flex-wrap-revs">
                        <div class="col-md-12 col-lg-6 col-xl-6 col-12">
                            <div class="rewiew-form-wrap"
                                 style="background-image: url({{ asset('frontend/images/Rate-us.png') }});">
                                <div class="title">
                                    <h3>Hello &nbsp;<span>{{ $order->user->fullName() }}</span></h3>
                                    <p>Tell us about your experience working with
                                        <span>{{$order->partner->company_name}}</span></p>
                                </div>
                                <div class="review_box">
                                    <!-- <div class="name-put">
                                        <input placeholder="name* " required>
                                    </div> -->
                                    <div class="rating_types">
                                        <ul>
                                            <li>
                                                Quality of Work
                                                <div class="rating-stars">
                                                    <ul id="stars">
                                                        <li class="star" title="Poor" data-value="1"
                                                            data-type="quality_of_work">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Fair" data-value="2"
                                                            data-type="quality_of_work">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Good" data-value="3"
                                                            data-type="quality_of_work">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Excellent" data-value="4"
                                                            data-type="quality_of_work">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="WOW!!!" data-value="5"
                                                            data-type="quality_of_work">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </li>
                                            @error('quality_of_work')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <li>
                                                Professionalism of the Team

                                                <div class="rating-stars">
                                                    <ul id="stars">
                                                        <li class="star" title="Poor" data-value="1"
                                                            data-type="professionalism">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Fair" data-value="2"
                                                            data-type="professionalism">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Good" data-value="3"
                                                            data-type="professionalism">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Excellent" data-value="4"
                                                            data-type="professionalism">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="WOW!!!" data-value="5"
                                                            data-type="professionalism">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                    </ul>
                                                </div>


                                            </li>
                                            @error('professionalism')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <li>
                                                Quality of Materials

                                                <div class="rating-stars">
                                                    <ul id="stars">
                                                        <li class="star" title="Poor" data-value="1"
                                                            data-type="quality_of_material">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Fair" data-value="2"
                                                            data-type="quality_of_material">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Good" data-value="3"
                                                            data-type="quality_of_material">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Excellent" data-value="4"
                                                            data-type="quality_of_material">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="WOW!!!" data-value="5"
                                                            data-type="quality_of_material">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                    </ul>
                                                </div>


                                            </li>
                                            @error('quality_of_material')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <li>
                                                On time Delivery

                                                <div class="rating-stars">
                                                    <ul id="stars">
                                                        <li class="star" title="Poor" data-value="1"
                                                            data-type="on_time_delivery">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Fair" data-value="2"
                                                            data-type="on_time_delivery">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Good" data-value="3"
                                                            data-type="on_time_delivery">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Excellent" data-value="4"
                                                            data-type="on_time_delivery">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="WOW!!!" data-value="5"
                                                            data-type="on_time_delivery">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                    </ul>
                                                </div>


                                            </li>
                                            @error('on_time_delivery')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <li>
                                                Overall Experience

                                                <div class="rating-stars">
                                                    <ul id="stars">
                                                        <li class="star" title="Poor" data-value="1"
                                                            data-type="overall_experience">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Fair" data-value="2"
                                                            data-type="overall_experience">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Good" data-value="3"
                                                            data-type="overall_experience">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Excellent" data-value="4"
                                                            data-type="overall_experience">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="WOW!!!" data-value="5"
                                                            data-type="overall_experience">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                    </ul>
                                                </div>


                                            </li>
                                            @error('overall_experience')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </ul>
                                    </div>
                                </div>

                                <form action="{{ route('partner.rating.store') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" id="order_id" value="{{$id}}">
                                    <input type="hidden" name="quality_of_work" id="quality_of_work" value="">
                                    <input type="hidden" name="professionalism" id="professionalism" value="">
                                    <input type="hidden" name="quality_of_material" id="quality_of_material" value="">
                                    <input type="hidden" name="on_time_delivery" id="on_time_delivery" value="">
                                    <input type="hidden" name="overall_experience" id="overall_experience" value="">
                                    <div class="suggestion_box">
                                        <p>Please write a review of your experience with {{$order->partner->fullName()}}
                                            .</p>
                                        <div class="seggestion_area">
                                            <textarea placeholder="Please write a review" name="comment"
                                                      id="comment"></textarea>
                                            @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="submit-review-button">
                                        <button class="submit-button fill-border-btn"><span>Submit<i
                                                    class="fa fa-angle-right"></i></span></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-6 col-12 pr-0">
                            <div class="review-cover">
                                <img src="{{ asset('frontend/images/rating-solar.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.components.contact')
@endsection
@push('js')

    <script>

        $(document).ready(function () {
            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function (e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function () {
                $(this).parent().children('li.star').each(function (e) {
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                var selectedRating = $('#stars li.selected').last().data('type');

                if (selectedRating === 'quality_of_work') {
                    $('#quality_of_work').val(ratingValue);
                }
                if (selectedRating === 'professionalism') {
                    $('#professionalism').val(ratingValue);
                }
                if (selectedRating === 'quality_of_material') {
                    $('#quality_of_material').val(ratingValue);
                }
                if (selectedRating === 'on_time_delivery') {
                    $('#on_time_delivery').val(ratingValue);
                }
                if (selectedRating === 'overall_experience') {
                    $('#overall_experience').val(ratingValue);
                }

            });


        });

    </script>
@endpush
