@extends('frontend.layout.app')
@section('title','Get Quote Now')
@push('css')
    <style>
        #mapImage {
            width: 100%;
        }

        .next, .previous, .lableCity, .natureOfBuilding, .sizeOfDwelling, .netMetering, .backupSystem, #submit-btn {
            cursor: pointer;
        }

    </style>
@endpush
@section('content')


    <div class="questionair_wrapper" style="background-image: url({{ asset('frontend/images/faded-img2.png') }});">
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="col-11 col-sm-9 col-md-9 col-lg-9 text-center p-0 mb-2">
                    <div class="card px-0 pb-0 mb-3">
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="city"></li>
                                        <li id="building"></li>
                                        <li id="size"></li>
                                        <li id="electricBill"></li>
                                        <li id="metering"></li>
                                        <li id="backup"></li>
                                    </ul> <!-- fieldsets -->
                                    <fieldset data-id="1">
                                        <div class="form-card">
                                            <h2 class="fs-title">Answer these questions</h2>
                                            <div class="card_content_area">
                                                <div class="row align-center">
                                                    <div class="col-md-12 col-lg-6 col-xl-6 col-12 ">
                                                        <div class="select__wraper">
                                                            <h5>Select Your City</h5>
                                                            <div class="section over-hide z-bigger">
                                                                <div class="section over-hide z-bigger">
                                                                    <div class="container pl-0 pr-0">
                                                                        <div class="row justify-content-center">

                                                                            <div class="select_city">
                                                                                <input class="checkbox-tools"
                                                                                       type="radio" id="lahore"
                                                                                       name="tools">
                                                                                <label
                                                                                    class="for-checkbox-tools lableCity"
                                                                                    for="lahore"
                                                                                    data-checked-value="lahore">
                                                                                    Lahore
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       id="islamabad"
                                                                                       name="tools">
                                                                                <label
                                                                                    class="for-checkbox-tools lableCity"
                                                                                    for="islamabad"
                                                                                    data-checked-value="islamabad">
                                                                                    islamabad
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       id="karachi"
                                                                                       name="tools">
                                                                                <label
                                                                                    class="for-checkbox-tools lableCity"
                                                                                    for="karachi"
                                                                                    data-checked-value="karachi">
                                                                                    Karachi
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       id="multan"
                                                                                       name="tools">
                                                                                <label
                                                                                    class="for-checkbox-tools lableCity"
                                                                                    for="multan"
                                                                                    data-checked-value="multan">
                                                                                    Multan
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-6 col-xl-6 col-12">
                                                        <div class="map">
                                                            <img class="default" id="mapImage"
                                                                 src="{{ asset('frontend/images/map_new.png') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button_area">
                                            <div class="selected_region">
                                                <p>Region: <span id="region"></span></p>
                                            </div>
                                            <div class="next_btn">
                                                <input type="button" name="next" class="next action-button"
                                                       value="Next"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- nature of building -->
                                    <fieldset data-id="2">
                                        <div class="form-card">
                                            <h2 class="fs-title">Answer
                                                these questions </h2>
                                            <div class="card_content_area">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                                                        <div class="select__wraper mt-40">
                                                            <h5>Nature of the Building</h5>
                                                            <div class="section over-hide z-bigger">
                                                                <div class="section over-hide z-bigger">
                                                                    <div class="container">
                                                                        <div class="row justify-content-center">

                                                                            <div class="select_building">
                                                                                <input class="checkbox-tools"
                                                                                       type="radio" name="tools"
                                                                                       id="Residential">
                                                                                <label
                                                                                    class="for-checkbox-tools natureOfBuilding"
                                                                                    for="Residential"
                                                                                    data-checked-value="Residential">
                                                                                    <img class="building"
                                                                                         id="ResidentialImg"
                                                                                         src="{{ asset('frontend/images/Residential.png') }}">
                                                                                    Residential
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="Commercial">
                                                                                <label
                                                                                    class="for-checkbox-tools natureOfBuilding"
                                                                                    for="Commercial"
                                                                                    data-checked-value="Commercial">
                                                                                    <img class="building"
                                                                                         id="CommercialImg"
                                                                                         src="{{ asset('frontend/images/Commercial.png') }}">
                                                                                    Commercial
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="button_area">

                                            <div class="prev_btn">
                                                <input type="button" name="previous"
                                                       class="previous action-button-previous"
                                                       value="Previous"/>
                                            </div>
                                            <div class="next_btn">
                                                <input type="button" name="next" class="next action-button"
                                                       value="Next"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- Size of the Dwelling. -->
                                    <fieldset data-id="3">
                                        <div class="form-card">
                                            <h2 class="fs-title">Answer these
                                                questions </h2>
                                            <div class="card_content_area">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                                                        <div class="select__wraper mt-40">
                                                            <h5>Size of the Dwelling. <span
                                                                    id="setNatureOfBuilding"></span></h5>
                                                            <div class="section over-hide z-bigger">
                                                                <div class="section over-hide z-bigger">
                                                                    <div class="container">
                                                                        <div class="row justify-content-center">

                                                                            <div class="select_area residentialOptions"
                                                                                 style="display: none">
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="5marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="5marla"
                                                                                    for="5marla">

                                                                                    <span>5</span>
                                                                                    Marla
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="10marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="10marla"
                                                                                    for="10marla">
                                                                                    <span>10</span>
                                                                                    Marla
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="15marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="15marla"
                                                                                    for="15marla">

                                                                                    <span>15</span>
                                                                                    Marla
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="1kanal">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="1kanal"
                                                                                    for="1kanal">
                                                                                    <span>1</span>
                                                                                    Kanal
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="2kanal">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="2kanal"
                                                                                    for="2kanal">

                                                                                    <span>2</span>
                                                                                    Kanal
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="3kanal">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="3kanal"
                                                                                    for="3kanal">

                                                                                    <span>3</span>
                                                                                    Kanal
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="4kanal">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="4kanal"
                                                                                    for="4kanal">
                                                                                    <span>4</span>
                                                                                    Kanal
                                                                                </label>
                                                                            </div>
                                                                            <div class="select_area commericalOptions"
                                                                                 style="display:none;">
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="2marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="2marla"
                                                                                    for="2marla">

                                                                                    <span>2</span>
                                                                                    Marla
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="3marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="3marla"
                                                                                    for="3marla">

                                                                                    <span>3</span>
                                                                                    Marla
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="4marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="4marla"
                                                                                    for="4marla">

                                                                                    <span>4</span>
                                                                                    Marla
                                                                                </label>

                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="5marlaC">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="5marlaC"
                                                                                    for="5marlaC">

                                                                                    <span>5</span>
                                                                                    Marla
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="6marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="6marla"
                                                                                    for="6marla">

                                                                                    <span>6</span>
                                                                                    Marla
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="7marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="7marla"
                                                                                    for="7marla">

                                                                                    <span>7</span>
                                                                                    Marla
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="8marla">
                                                                                <label
                                                                                    class="for-checkbox-tools sizeOfDwelling"
                                                                                    data-checked-value="8marla"
                                                                                    for="8marla">

                                                                                    <span>8</span>
                                                                                    Marla
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button_area">
                                            <div class="prev_btn">
                                                <input type="button" name="previous"
                                                       class="previous action-button-previous"
                                                       value="Previous"/>
                                            </div>
                                            <div class="next_btn">
                                                <input type="button" name="next" class="next action-button"
                                                       value="Next"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- ELECTRICITY BILL -->
                                    <fieldset data-id="4">
                                        <div class="form-card">
                                            <h2 class="fs-title">Answer these
                                                questions </h2>
                                            <div class="card_content_area">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                                                        <div class="select__wraper mt-40">
                                                            <h5>Please enter the highest
                                                                <span>&nbsp;electric bill</span> for your property
                                                                in last year
                                                            </h5>
                                                            <div class="section over-hide z-bigger">
                                                                <div class="section over-hide z-bigger">
                                                                    <div class="">
                                                                        <div class="row justify-content-center">

                                                                            <div class="select_area bill_area">
                                                                                <label for="electricity">RS</label>
                                                                                <input
                                                                                    class="bill_input electricity numberValues"
                                                                                    autocomplete="off"
                                                                                    id="electricity">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button_area">
                                            <div class="prev_btn">
                                                <input type="button" name="previous"
                                                       class="previous action-button-previous"
                                                       value="Previous"/>
                                            </div>
                                            <div class="next_btn">
                                                <input type="button" name="next" class="next action-button"
                                                       value="Next"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- NET METERING -->
                                    <fieldset data-id="5">
                                        <div class="form-card metering-card">
                                            <h2 class="fs-title">Answer these
                                                questions </h2>
                                            <div class="card_content_area">
                                                <div class="row align-center flex-wrap-revs">
                                                    <div class="col-md-12 col-lg-8 col-xl-8 col-12">
                                                        <div class="select__wraper mt-40">
                                                            <h5>Do you
                                                                want<span> net metering with your system ?</span>
                                                            </h5>
                                                            <div class="section over-hide z-bigger">
                                                                <div class="section over-hide z-bigger">
                                                                    <div class=" mb-30">
                                                                        <div class="row justify-content-center">

                                                                            <div class="select_area metering_area">
                                                                                <div class="metering_desc">
                                                                                    <p>Net metering allows you to sell
                                                                                        back the extra electricity
                                                                                        produced by Solar System back to
                                                                                        grid which would decrease your
                                                                                        electricity bills.</p>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="select_area slecting_options">
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="net-metering-yes">
                                                                                <label
                                                                                    class="for-checkbox-tools netMetering"
                                                                                    data-checked-value="net-metering-yes"
                                                                                    for="net-metering-yes">

                                                                                    <span>Yes</span>
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="net-metering-no">
                                                                                <label
                                                                                    class="for-checkbox-tools netMetering"
                                                                                    data-checked-value="net-metering-no"
                                                                                    for="net-metering-no">

                                                                                    <span>No</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-4 col-xl-4 col-12">
                                                        <img class="mtring_pic"
                                                             src="{{ asset('frontend/images/net-mtr.png') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button_area">
                                            <div class="prev_btn">
                                                <input type="button" name="previous"
                                                       class="previous action-button-previous"
                                                       value="Previous"/>
                                            </div>
                                            <div class="next_btn">
                                                <input type="button" name="next" class="next action-button"
                                                       value="Next"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- back-up system -->
                                    <fieldset data-id="6">
                                        <div class="form-card">
                                            <h2 class="fs-title">Answer these
                                                questions </h2>
                                            <div class="card_content_area">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                                                        <div class="select__wraper mt-40">
                                                            <h5>Do you want a battery<span> back-up system ?</span>
                                                            </h5>
                                                            <div class="section over-hide z-bigger">
                                                                <div class="section over-hide z-bigger">
                                                                    <div class=" mb-30">
                                                                        <div class="row justify-content-center">

                                                                            <div class="select_area backup_area">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-md-6 col-lg-6 col-xl-6 col-12 pl-0">
                                                                                        <ul>
                                                                                            <li>Household or
                                                                                                businesses can keep
                                                                                                their lights on
                                                                                                during load
                                                                                                shedding.
                                                                                            </li>
                                                                                            <li>Environmentally
                                                                                                friendly.
                                                                                            </li>
                                                                                            <li>Save on electricity
                                                                                                bills.
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-md-6 col-lg-6 col-xl-6 col-12 pl-0">
                                                                                        <ul>
                                                                                            <li>Reduce Your Reliance
                                                                                                on the Grid.
                                                                                            </li>
                                                                                            <li>Optimize Your Solar
                                                                                                Power Consumption..
                                                                                            </li>
                                                                                            <li>Be Prepared for
                                                                                                Potential Disasters.
                                                                                            </li>
                                                                                            <li>Leave a Smaller
                                                                                                Carbon Footprint
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="select_area slecting_options">
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="backup-system-yes">
                                                                                <label
                                                                                    class="for-checkbox-tools backupSystem"
                                                                                    data-checked-value="backup-system-yes"
                                                                                    for="backup-system-yes">

                                                                                    <span>Yes</span>
                                                                                </label>
                                                                                <input class="checkbox-tools"
                                                                                       type="radio"
                                                                                       name="tools"
                                                                                       id="backup-system-no">
                                                                                <label
                                                                                    class="for-checkbox-tools backupSystem"
                                                                                    data-checked-value="backup-system-no"
                                                                                    for="backup-system-no">

                                                                                    <span>No</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-graphic">
                                                    <img src="{{ asset('frontend/images/bttryu.png') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button_area">
                                            <div class="prev_btn">
                                                <input type="button" name="previous"
                                                       class="previous action-button-previous"
                                                       value="Previous"/>
                                            </div>
                                            <div class="next_btn">
                                                <input type="button" name="next" class="next action-button"
                                                       value="Next"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- thanks -->
                                    <fieldset data-id="7" id="thankyou">
                                        <div class="form-card">
                                            <div class="thanks_area">
                                                <h2>Thank you!</h2>
                                                <p>The System will now evaluate & present you with a
                                                    optimized offer according to your need.</p>
                                                <p>Please press submit to continue.</p>
                                            </div>
                                        </div>
                                        <form action="#" id="form-data">
                                            <div>
                                                <input type="hidden" name="city" id="offer_city" value="">
                                                <input type="hidden" name="building" id="offer_building" value="">
                                                <input type="hidden" name="size_of_dwelling"
                                                       id="offer_size_of_dwelling"
                                                       value="">
                                                <input type="hidden" name="electricity_bill"
                                                       id="offer_electricity_bill"
                                                       value="">
                                                <input type="hidden" name="net_metering" id="offer_net_metering"
                                                       value="">
                                                <input type="hidden" name="backup_system" id="offer_backup_system"
                                                       value="">
                                                <div class="button_area">
                                                    <div class="submit">
                                                        <button class="action-button submit-btn" type="button"
                                                                id="submit-btn">Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>

                                    </fieldset>
                                </form>
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
            if (/iP(hone|od|ad)/.test(navigator.platform)) {
                $("*").css({"cursor": "pointer"});
            }
        });
        $(".questionair_wrapper").keypress(function (e) {
            if (e.which == 13) {
                return false;
            }
        });
        $('.numberValues').keypress(function (e) {
            if (isNaN(this.value + "" + String.fromCharCode(e.charCode))) return false;
        }).on("cut copy paste", function (e) {
            e.preventDefault();
        });


        // questionnair page steps js
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $('.next').on('click', function () {

            current_fs = $(this).parent().parent().parent();
            if (current_fs.data('id') === 1 && $('#offer_city').val() === '') {
                toastr.error("Please Select City to Continue.");
                return false;
            }
            if (current_fs.data('id') === 2 && $('#offer_building').val() === '') {
                toastr.error("Please Select Nature of Building to Continue.");
                return false;
            }
            if (current_fs.data('id') === 3 && $('#offer_size_of_dwelling').val() === '') {
                toastr.error("Please Select Size of Dwelling to Continue.");
                return false;
            }
            if (current_fs.data('id') === 4 && $('#offer_electricity_bill').val() === '') {
                toastr.error("Please Enter Electricity Bill to Continue.");
                return false;
            }
            if (current_fs.data('id') === 5 && $('#offer_net_metering').val() === '') {
                toastr.error("Please Select Net Metering to Continue.");
                return false;
            }
            if (current_fs.data('id') === 6 && $('#offer_backup_system').val() === '') {
                toastr.error("Please Select Backup System to Continue.");
                return false;
            }
            next_fs = $(this).parent().parent().parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });

        $('.previous').on('click', function () {
            current_fs = $(this).parent().parent().parent();
            previous_fs = $(this).parent().parent().parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });

        //Step 1
        $('.lableCity').on('click touchstart', function () {
            resetCityLabels('{{ asset('frontend/images/map_new.png') }}');
            if ($(this).data('checked-value') == 'lahore') {
                cityRegion('Punjab', 'lahore', '{{ asset('frontend/images/lahore.png') }}');
            }
            if ($(this).data('checked-value') == 'islamabad') {
                toastr.error("We are Coming to your City Soon");
                {{--cityRegion('Punjab', 'islamabad', '{{ asset('frontend/images/islamabad.png') }}');--}}
            }
            if ($(this).data('checked-value') == 'karachi') {
                toastr.error("We are Coming to your City Soon");
                {{--cityRegion('Sindh', 'karachi', '{{ asset('frontend/images/karachi.png') }}');--}}
            }
            if ($(this).data('checked-value') == 'multan') {
                toastr.error("We are Coming to your City Soon");
                {{--cityRegion('Punjab', 'multan', '{{ asset('frontend/images/multan.png') }}');--}}

            }
        });

        function cityRegion(region, city, map) {
            $('#mapImage').attr('src', map);
            $('#region').text(region);
            $('#' + city).prop('checked', true);
            $('#offer_city').val(city);
        }

        function resetCityLabels(map) {
            $('#mapImage').attr('src', map);
            $('#region').text('');
            $('#lahore').prop('checked', false);
            $('#karachi').prop('checked', false);
            $('#islamabad').prop('checked', false);
            $('#multan').prop('checked', false);
            $('#offer_city').val('');
        }

        //Step 2
        $('.natureOfBuilding').on('click touchstart', function () {

            if ($(this).data('checked-value') == 'Residential') {
                $('.residentialOptions').show();
                $('.commericalOptions').hide();
                natureOfBuilding('Residential', '{{ asset('frontend/images/residential-toogl.png') }}');
            }
            if ($(this).data('checked-value') == 'Commercial') {
                $('.residentialOptions').hide();
                $('.commericalOptions').show();
                natureOfBuilding('Commercial', '{{ asset('frontend/images/commercial-toogle.png') }}');
            }
        });

        function natureOfBuilding(building, img) {
            $('#' + building + 'Img').attr('src', img);
            $('#' + building).prop('checked', true);
            $('#offer_building').val(building);
            $('#setNatureOfBuilding').text(building);
        }

        //Step 3
        $('.sizeOfDwelling').on('click touchstart', function () {

            if ($(this).data('checked-value') == '2marla') {
                sizeOfDwelling('2marla');
            }
            if ($(this).data('checked-value') == '3marla') {
                sizeOfDwelling('3marla');
            }
            if ($(this).data('checked-value') == '4marla') {
                sizeOfDwelling('4marla');
            }
            if ($(this).data('checked-value') == '5marla') {
                sizeOfDwelling('5marla');
            }
            if ($(this).data('checked-value') == '5marlaC') {
                sizeOfDwelling('5marla');
            }
            if ($(this).data('checked-value') == '6marla') {
                sizeOfDwelling('6marla');
            }
            if ($(this).data('checked-value') == '7marla') {
                sizeOfDwelling('6marla');
            }
            if ($(this).data('checked-value') == '8marla') {
                sizeOfDwelling('6marla');
            }
            if ($(this).data('checked-value') == '10marla') {
                sizeOfDwelling('10marla');
            }
            if ($(this).data('checked-value') == '15marla') {
                sizeOfDwelling('15marla');
            }
            if ($(this).data('checked-value') == '1kanal') {
                sizeOfDwelling('1kanal');
            }
            if ($(this).data('checked-value') == '2kanal') {
                sizeOfDwelling('2kanal');
            }
            if ($(this).data('checked-value') == '3kanal') {
                sizeOfDwelling('3kanal');
            }
            if ($(this).data('checked-value') == '4kanal') {
                sizeOfDwelling('4kanal');
            }
        });

        function sizeOfDwelling(size) {
            $('#' + size).prop('checked', true);
            $('#offer_size_of_dwelling').val(size);
        }

        //Step 4
        $('.electricity').on('change focusout', function () {
            $('#offer_electricity_bill').val($(this).val());
        });


        //Step 5
        $('.netMetering').on('click touchstart', function () {

            if ($(this).data('checked-value') == 'net-metering-yes') {
                netMetering('net-metering-yes', 'yes');
            }
            if ($(this).data('checked-value') == 'net-metering-no') {
                netMetering('net-metering-no', 'no',);
            }
        });

        function netMetering(id, value) {
            $('#' + id).prop('checked', true);
            $('#offer_net_metering').val(value);
        }

        //Step 6
        $('.backupSystem').on('click touchstart', function () {

            if ($(this).data('checked-value') == 'backup-system-yes') {
                backupSystem('backup-system-yes', 'yes');
            }
            if ($(this).data('checked-value') == 'backup-system-no') {
                backupSystem('backup-system-no', 'no');
            }
        });

        function backupSystem(id, value) {
            $('#' + id).prop('checked', true);
            $('#offer_backup_system').val(value);
        }


        //Step 7
        $('#submit-btn').on('click touchstart', function () {

            var city = $('#offer_city').val();
            var region = $('#region').text();
            var building = $('#offer_building').val();
            var dwelling = $('#offer_size_of_dwelling').val();
            var electricityBill = $('#offer_electricity_bill').val();
            var netMetering = $('#offer_net_metering').val();
            var backupSystem = $('#offer_backup_system').val();
            window.location.href = '/offers/?city=' + city + '&region=' + region + '&building=' + building + '&size_of_dwelling=' + dwelling + '&electricity_bill=' + electricityBill + '&net_metering=' + netMetering + '&backup_system=' + backupSystem + '';
        });

    </script>
@endpush
