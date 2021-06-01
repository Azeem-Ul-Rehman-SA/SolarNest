@extends('frontend.layout.app')
@section('title','Comparison')
@push('css')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .noUi-handle, .order-select, #smart_monitoring_application_check, #slider-range {
            cursor: pointer;
        }

        .emptyRecord {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 3px solid #003466;
        }

    </style>
@endpush
@section('content')
    <div class="comparison-wrapper" style="background-image: url({{ asset('frontend/images/calc-bg.png') }});">
        <div class="jumbotron" style="background-image: url({{ asset('frontend/images/Comparison.png') }});">
            <div class="comparison-wrap-inner">
                <div class="title">
                    <h3>Offers Comparison</h3>
                    <p>Select a Installer and we'll be right over !</p>
                </div>
                <div class="comparison-filters">
                    <div class="filters_tag">Advanced Filter</div>
                    <form action="{{ route('offer.comparison.index') }}" method="get">
                        <input type="hidden" name="building" value="{{$data['building']}}">
                        <input type="hidden" name="electricity_bill" value="{{$data['electricity_bill']}}">
                        <input type="hidden" name="size_of_dwelling" value="{{$data['size_of_dwelling']}}">
                        <input type="hidden" name="net_metering" value="{{$data['net_metering']}}">
                        <input type="hidden" name="backup_system" value="{{$data['backup_system']}}">
                        <input type="hidden" name="city" value="{{$data['city']}}">
                        <input type="hidden" name="region" value="{{$data['region']}}">
                        <input type="hidden" id="smart_monitoring_application" name="smart_monitoring_application"
                               value="{{ (isset($_GET['smart_monitoring_application']) && !is_null($_GET['smart_monitoring_application'])) ? 'yes' : 'no' }}">
                        <div class="row">
                            @php
                                if($data['backup_system'] == 'yes'){
                                    $class = 'col-xl-3 col-lg-3';
                                } else{
                                    $class = 'col-xl-4 col-lg-4';
                                }
                            @endphp
                            <div class="col-md-6 {{$class}} col-12">
                                <div class="dropdown-box">
                                    <label for="panel_type"><img src="{{ asset('frontend/images/solar-icon.png') }}">Panel
                                        Type</label>
                                    <div class="dropdown">
                                        <select name="panel_type" id="panel_type" class="dropbtn">
                                            <option value="">Select Panel Type</option>
                                            @if(!empty($panelType) && count($panelType) > 0)
                                                @foreach($panelType as $type)
                                                    <option
                                                        value="{{$type}}" {{ (old('panel_type',request()->get('panel_type')) == $type) ? 'selected' : '' }}>{{$type}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if($data['backup_system'] == 'yes')
                                <div class="col-md-6 {{$class}} col-12">
                                    <div class="dropdown-box">
                                        <label for="battery_type"><img src="{{ asset('frontend/images/battery.png') }}">Battery
                                            Type</label>
                                        <div class="dropdown">
                                            <select name="battery_type" id="battery_type" class="dropbtn">
                                                <option value="">Select Battery Type</option>
                                                @if(!empty($batterySystem) && count($batterySystem) > 0)
                                                    @foreach($batterySystem as $row)
                                                        <option
                                                            value="{{$row}}" {{ (old('battery_bank_type',request()->get('battery_bank_type')) == $row) ? 'selected' : '' }}>
                                                            {{ str_replace('-',' ',$row)}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6 {{$class}} col-12">
                                <div class="dropdown-box">
                                    <label for="warranty_of_batteries"><img
                                            src="{{ asset('frontend/images/battery.png') }}">Battery
                                        Warranty</label>
                                    <div class="dropdown">
                                        <select name="warranty_of_batteries" id="warranty_of_batteries"
                                                class="dropbtn">
                                            <option value="">Select Years</option>
                                            <option
                                                value="1-3" {{ (old('warranty_of_batteries',request()->get('warranty_of_batteries')) == '1-3') ? 'selected' : '' }}>
                                                1-3 Years
                                            </option>
                                            <option
                                                value="3-5" {{ (old('warranty_of_batteries',request()->get('warranty_of_batteries')) == '3-5') ? 'selected' : '' }}>
                                                3-5 Years
                                            </option>
                                            <option
                                                value="5-8" {{ (old('warranty_of_batteries',request()->get('warranty_of_batteries')) == '5-8') ? 'selected' : '' }}>
                                                5-8 Years
                                            </option>
                                            <option
                                                value="8-10" {{ (old('warranty_of_batteries',request()->get('warranty_of_batteries')) == '8-100') ? 'selected' : '' }}>
                                                8+ Years
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 {{$class}} col-12">
                                <div class="dropdown-box">
                                    <label for="warranty_of_inverter"><img src="{{ asset('frontend/images/app.png') }}">Invertor
                                        Warranty</label>
                                    <div class="dropdown">
                                        <select name="warranty_of_inverter" id="warranty_of_inverter" class="dropbtn">
                                            <option value="">Select Years</option>
                                            <option
                                                value="1-3" {{ (old('warranty_of_inverter',request()->get('warranty_of_inverter')) == '1-3') ? 'selected' : '' }}>
                                                1-3 Years
                                            </option>
                                            <option
                                                value="3-5" {{ (old('warranty_of_inverter',request()->get('warranty_of_inverter')) == '3-5') ? 'selected' : '' }}>
                                                3-5 Years
                                            </option>
                                            <option
                                                value="5-8" {{ (old('warranty_of_inverter',request()->get('warranty_of_inverter')) == '5-8') ? 'selected' : '' }}>
                                                5-8 Years
                                            </option>
                                            <option
                                                value="8-10" {{ (old('warranty_of_inverter',request()->get('warranty_of_inverter')) == '8-100') ? 'selected' : '' }}>
                                                8+ Years
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comparison_options">
                            <div class="row align-center">
                                <div class="col-md-3 col-lg-3 col-xl-3 col-12">
                                    <div class="dropdown-box">
                                        <label for="smart_monitoring_application"><img src="{{ asset('frontend/images/app.png') }}"> Smart App</label>
                                        <div class="dropdown">
                                            <select name="smart_monitoring_application"
                                                    id="smart_monitoring_application"
                                                    class="dropbtn">
                                                <option value="">Select Smart App</option>
                                                <option
                                                    value="yes" {{ (old('smart_monitoring_application',request()->get('smart_monitoring_application')) == 'yes') ? 'selected' : '' }}>
                                                    Yes
                                                </option>
                                                <option
                                                    value="no" {{ (old('smart_monitoring_application',request()->get('smart_monitoring_application')) == 'no') ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                        </div>

                                        {{--                                        <input type="checkbox" id="smart_monitoring_application_check"--}}
                                        {{--                                               name="smart_monitoring_application_checked"--}}
                                        {{--                                               value="{{ (isset($_GET['smart_monitoring_application']) && !is_null($_GET['smart_monitoring_application']) && $_GET['smart_monitoring_application'] == 'yes') ? 'yes' : 'no' }}" {{ (isset($_GET['smart_monitoring_application']) && !is_null($_GET['smart_monitoring_application']) && $_GET['smart_monitoring_application'] == 'yes') ? 'checked' : '' }}>--}}
                                    </div>
                                </div>
                                <div class="col-md-9 col-lg-7 col-xl-7 col-12">
                                    <div class="price-slider">
                                        <label><img src="{{asset('frontend/images/wallet.png')}}">Price Range</label>
                                        <div class="container pl-0 pr-0">
                                            <div class="row">
                                                <div class="col-sm-12 pl-0">
                                                    <div id="slider-range"></div>
                                                </div>
                                            </div>
                                            <div class="row mt-10">
                                                <div class="col-6 caption pl-0">
                                                    <strong></strong> <span
                                                        id="slider-range-value1">{{ (isset($_GET['min_value']) && !is_null($_GET['min_value'])) ? $_GET['min_value'] : 500000 }}</span>
                                                </div>
                                                <div class="col-6 text-right caption">
                                                    <strong></strong> <span
                                                        id="slider-range-value2">{{ (isset($_GET['max_value']) && !is_null($_GET['max_value'])) ? $_GET['max_value'] : 3000000 }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <form>
                                                        <input type="hidden" name="min_value" id="min_value"
                                                               value="{{ (isset($_GET['min_value']) && !is_null($_GET['min_value'])) ? $_GET['min_value'] : 500000 }}">
                                                        <input type="hidden" name="max_value" id="max_value"
                                                               value="{{ (isset($_GET['max_value']) && !is_null($_GET['max_value'])) ? $_GET['max_value'] : 3000000 }}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-2 col-lg-2 col-12">
                                    <div class="submit_form">
                                        <button type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- installers slider -->
                <div class="installers_slider">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 col-6">
                            <div class="measuring-marameters">
                                <div class="header">
                                    <h3>Measuring Parameters </h3>
                                </div>
                                <div class="parameters_wrap">
                                    <div class="parameter-box solar_panel">
                                        <div class="sidebar-left-box">
                                            <P>Solar Panels</P>
                                        </div>
                                        <div class="sidebar-right-box">
                                            <div class="system_parameters">
                                                <ul>
                                                    <li><img src="{{ asset('frontend/images/power-icon.png') }}">System
                                                        Wattage
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/solary-icon.png') }}">Panel
                                                        Model
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/solary-icon.png') }}">Panel
                                                        Type
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/chip-icon.png') }}">Inverter
                                                        Brand
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/appy-icon.png') }}">Smart
                                                        App
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/user-icon.png') }}">24/7
                                                        Support
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="parameter-box battery">
                                        <div class="sidebar-left-box">
                                            <P>Battery</P>
                                        </div>
                                        <div class="sidebar-right-box">
                                            <div class="system_parameters">
                                                <ul>
                                                    <li><img src="{{ asset('frontend/images/battryy-icon.png') }}">Battery
                                                        System
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/bttry-type.png') }}">Battery
                                                        Bank Type
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="parameter-box Warrenty">
                                        <div class="sidebar-left-box">
                                            <P>Warranty</P>
                                        </div>
                                        <div class="sidebar-right-box">
                                            <div class="system_parameters">
                                                <ul>
                                                    <li><img src="{{ asset('frontend/images/solary-icon.png') }}">Panels
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/battryy-icon.png') }}">Batteries
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/chip-icon.png') }}">Invertor
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="parameter-box financial">
                                        <div class="sidebar-left-box">
                                            <P>Financial</P>
                                        </div>
                                        <div class="sidebar-right-box">
                                            <div class="system_parameters">
                                                <ul>
                                                    <li><img src="{{ asset('frontend/images/payback-icon.png') }}">Payback
                                                        Period
                                                    </li>
                                                    <li class="mobile-yrs"><img
                                                            src="{{ asset('frontend/images/calender-icon.png') }}">Saving
                                                        for 10 Yrs
                                                    </li>
                                                    <li class="desktop-yrs"><img
                                                            src="{{ asset('frontend/images/calender-icon.png') }}">Saving
                                                        for 10 Years
                                                    </li>
                                                    <li><img src="{{ asset('frontend/images/options-icon.png') }}">Financing
                                                        Options
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="total_price_footer">
                                    <h3>Total Price</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xl-9 col-sm-9 col-6">
                            <div class="installer-slides">
                                @if(!empty($offers) && count($offers) > 0)
                                    <div class="slick-carousel">

                                        @foreach($offers as $key=>$offer)
                                            <div>
                                                <div class="card">
                                                    <div class="installer-item">
                                                        <div class="header">
                                                            <h3><img
                                                                    src="{{ asset('frontend/images/solary-icon.png') }}">Installer
                                                                {{ $key+1 }}</h3>
                                                        </div>
                                                        <div class="specs_wrap">
                                                            <div class="system_specs solar_panel">
                                                                <ul>
                                                                    <li>{{$offer->system_wattage}} KW</li>
                                                                    <li>{{$offer->panel_model}}</li>
                                                                    <li>{{$offer->panel_type}}</li>
                                                                    <li>{{$offer->inverter_brand}}</li>
                                                                    <li>
                                                                        <i class="@if($offer->smart_monitoring_application == 'yes' ) fa fa-check-circle avaialable @else fa fa-times-circle not-avaialable not-avaialable @endif"></i>
                                                                    </li>
                                                                    <li>{{$offer->customer_support}}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="system_specs battery">
                                                                <ul>
                                                                    <li>{{$offer->batter_storage_capacity}} KW</li>
                                                                    <li>{{ $offer->battery_bank_type }}</li>
                                                                </ul>
                                                            </div>
                                                            <div class="system_specs Warrenty">
                                                                <ul>
                                                                    <li>{{ $offer->warranty_of_panel }} Years</li>
                                                                    <li>{{ $offer->warranty_of_batteries }} Years</li>
                                                                    <li>{{ $offer->warranty_of_inverter }} Years</li>
                                                                </ul>
                                                            </div>
                                                            <div class="system_specs financial">
                                                                <ul>
                                                                    <li class="mobile-yrs">{{ $offer->payback_period_in_years }}
                                                                        Yrs
                                                                        & {{ $offer->payback_period_in_months }} Mth
                                                                    </li>
                                                                    <li class="desktop-yrs">{{ $offer->payback_period_in_years }}
                                                                        Years
                                                                        & {{ $offer->payback_period_in_months }} Months
                                                                    </li>
                                                                    <li>Rs {{ $offer->savings_for_ten_years }}</li>
                                                                    <li>
                                                                        <i class=" @if($offer->financing_options == 'yes' ) fa fa-check-circle avaialable @else fa fa-times-circle not-avaialable @endif"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pkg_price">
                                                            <h3>Rs {{ $offer->total_price_of_offering }}</h3>
                                                        </div>

                                                    </div>
                                                    <div class="order-now">
                                                        <span>
                                                            <button class="order-select"
                                                                    id="order-select"
                                                                    data-id="{{$offer->id}}"
                                                                    data-key="{{$key + 1}}"
                                                                    data-partner-id="{{$offer->partner_id}}"
                                                                    data-price="{{ $offer->total_price_of_offering }}">Order Now
                                                                <i class="fa fa-angle-right"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                @else
                                    <div class="empty-list emptyRecord">
                                        <p style="    font-size: 15px;
    margin: 6px;">Sorry. No offer found as per your criteria in your
                                            city. Kindly review the required specifications again</p>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>


                <!-- installers slider section end -->

                <div class="customer_info_form_wrap" id="order-selected-information" style="display: none;">
                    <div class="row">
                        <div class="col-md-12 col-xl-4 col-lg-4 col-12 pr-0 pl-0">
                            <div class="selected_offer_Wrap">
                                <div class="title">
                                    <h3><img src="{{ asset('frontend/images/solar-icon.png') }}">Offer Selected :</h3>
                                </div>
                                <div class="installer_info">
                                    <div class="installer_name">
                                        <h2>Installer No <span id="installer-key"></span></h2>
                                    </div>

                                    <div class="system_info_box">
                                        <div class="system_info">
                                            <p>System Wattage</p>
                                            <p><span id="system-wattage"></span> KW</p>
                                        </div>
                                        <div class="system_info">
                                            <p>Net Metering</p>
                                            <p><i class="fa fa-check-circle " id="net-metering"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="total_pkg_price">
                                    <p>Total Price</p>
                                    <h3>Rs <span id="system-price"></span></h3>
                                </div>

                            </div>
                        </div>
                        <div class=" col-md-12 col-lg-8 col-xl-8 col-12 pl-0 pr-0">
                            <div class="customer_info">
                                <div class="container"
                                     style="background-image: url({{ asset('frontend/images/Offer.png') }});">
                                    <div class="info">
                                        <h3>Customer Info</h3>
                                        <div class="required_text"><span>*</span>Required fields</div>
                                        <p>After your Select and Fill out the required data asked below we'll send in a
                                            confirmation email, Please Check your provided Email Address</p>
                                    </div>
                                    <div class="form_wrap">
                                        <form method="post" action="{{ route('book.offer.store') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="offer_id" id="offer_id" value=""/>
                                            <input type="hidden" name="partner_id" id="partner_id" value=""/>
                                            <div class="row">
                                                <div class="col-md-6 col-xl-6 col-lg-6 col-12">
                                                    <input type="text" placeholder="First Name *" name="first_name"
                                                           class="@error('first_name') is-invalid @enderror" required
                                                           value="{{ old('first_name') }}"
                                                           id="first_name">
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-xl-6 col-lg-6 col-12">
                                                    <input type="text" placeholder="Last Name *" name="last_name"
                                                           class="@error('last_name') is-invalid @enderror" required
                                                           value="{{ old('last_name') }}"
                                                           id="last_name">
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-xl-6 col-lg-6 col-12">
                                                    <input type="email" placeholder="Email Address *" name="email"
                                                           class="@error('email') is-invalid @enderror" required
                                                           value="{{ old('email') }}"
                                                           id="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-xl-6 col-lg-6 col-12">
                                                    <input id="phone_number" type="text"
                                                           class="form-control @error('phone_number') is-invalid @enderror"
                                                           name="phone_number" value="{{ old('phone_number') }}"
                                                           autocomplete="phone_number" autofocus
                                                           placeholder="Phone Number*"
                                                           {{--                                                           pattern="[03]{2}[0-9]{9}"--}}
                                                           {{--                                                           maxlength="11"--}}
                                                           required
                                                           onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                                        {{--                                                           title="Phone number with 03 and remaing 9 digit with 0-9"--}}
                                                    >
                                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-xl-12 col-lg-12 col-12">
                                                    <input class="adress @error('address') is-invalid @enderror"
                                                           placeholder="Address*" required
                                                           name="address" id="address" type="text">
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="submit-form-btn">
                                                            <span>
                                                                <button type="submit">Submit<i
                                                                        class="fa fa-angle-right"></i></button>
                                                            </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            if (/iP(hone|od|ad)/.test(navigator.platform)) {
                $("*").css({"cursor": "pointer"});
            }
        });

        $('#phone_number').focusout(function () {
            if (/^(03)\d{9}$/.test($(this).val())) {
                // value is ok, use it
            } else {

            }
        })


        // Initialize slider:
        $(document).ready(function () {
            var minimumValue = '{{ (isset($_GET['min_value']) && !is_null($_GET['min_value'])) ? $_GET['min_value'] : 500000 }}';
            var maximumValue = '{{ (isset($_GET['max_value']) && !is_null($_GET['max_value'])) ? $_GET['max_value'] : 3000000 }}';

            if (minimumValue == '') {
                minimumValue = 500000;
            }
            if (maximumValue == '') {
                maximumValue = 3000000;
            }
            $('.noUi-handle').on('click change touchstart', function () {
                $(this).width(50);
            });
            var rangeSlider = document.getElementById('slider-range');
            var moneyFormat = wNumb({
                decimals: 0,
                thousand: ',',
                prefix: 'Rs'
            });
            noUiSlider.create(rangeSlider, {
                start: [parseInt(minimumValue), parseInt(maximumValue)],
                step: 1,
                range: {
                    'min': [10000],
                    'max': [3000000]
                },
                format: moneyFormat,
                connect: true
            });

            // Set visual min and max values and also update value hidden form inputs
            rangeSlider.noUiSlider.on('update', function (values, handle) {
                document.getElementById('slider-range-value1').innerHTML = values[0];
                document.getElementById('slider-range-value2').innerHTML = values[1];
                document.getElementsByName('min-value').value = moneyFormat.from(
                    values[0]);
                document.getElementsByName('max-value').value = moneyFormat.from(
                    values[1]);
                var minValue = $('#slider-range-value1').text().split(",").join("").split("Rs").join("");
                var maxValue = $('#slider-range-value2').text().split(",").join("").split("Rs").join("");
                $('#min_value').val(minValue);
                $('#max_value').val(maxValue);
            });
        });


        // slick slider js
        $(document).ready(function () {
            $('.slick-carousel').slick({
                speed: 700,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                dots: false,
                centerMode: false,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        // centerMode: true,

                    }

                }, {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        infinite: true,

                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        infinite: true,
                        autoplay: false,
                        autoplaySpeed: 2000,
                    }
                }]
            });
        });

    </script>
    <script src="{{ asset('frontend/js/range-slider.js') }}" type="text/javascript"></script>
    <script>

        $('#smart_monitoring_application_check').on('click touchstart change', function () {

            if ($(this).is(':checked') == true) {
                $(this).val('yes');
                $('#smart_monitoring_application').val('yes');
            } else {
                $(this).val('no');
                $('#smart_monitoring_application').val('no');
            }
        })
        $('.order-select').on('click touchstart', function () {
            var id = $(this).data('id');
            var partner_id = $(this).data('partner-id');
            var key = $(this).data('key');
            var price = $(this).data('price');
            var netMetering = '{{$data['net_metering']}}';
            var systemWattage = '{{$size}}';
            if (netMetering === 'yes') {
                $('#net-metering').removeClass('not-avaialable');
                $('#net-metering').addClass('avaialable');
            } else {
                $('#net-metering').removeClass('avaialable');
                $('#net-metering').addClass('not-avaialable');
            }
            $('#installer-key').text(key);
            $('#system-price').text(price);
            $('#system-wattage').text(systemWattage);
            $('#order-selected-information').show();

            $('#offer_id').val(id);
            $('#partner_id').val(partner_id);

            $('html,body').animate({
                scrollTop: $("#order-selected-information").offset().top
            }, 'easeIn');
        });
        $('#slider-range').on('click change touchstart', function () {
            var minValue = $('#slider-range-value1').text().split(",").join("").split("Rs").join("");
            var maxValue = $('#slider-range-value2').text().split(",").join("").split("Rs").join("");
            $('#min_value').val(minValue);
            $('#max_value').val(maxValue);
        });
    </script>
@endpush
