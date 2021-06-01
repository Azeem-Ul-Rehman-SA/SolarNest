@extends('frontend.layout.app')
@section('title','Calculator')
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

        .tooltip {
            position: relative;
            border-bottom: 1px dotted black;
            color: #fff !important;
            display: contents;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
    </style>
@endpush
@section('content')
    <div class="solar-calculator-wrapper" style="background-image: url({{ asset('frontend/images/calc-bg.png') }});">
        <div class="container">
            <div class="calculator-wrap-inner">
                <div class="solar-calculator">
                    <div class="row flex-wrap-revs">
                        <div class="col-md-12 col-lg-8 col-xl-8 col-12">
                            <div class="calculator-form-wrap"
                                 style="background-image: url({{ asset('frontend/images/Calculator.png') }});">
                                <div class="title">
                                    <h3>Solar Calculator</h3>
                                    <p>Plan on saving up long term ? Fill out the following and we'll predict your
                                        saving.</p>
                                </div>
                                <span class="separator"></span>
                                <div class="system_requirements">

                                    <div class="row">
                                        <div class="col-md-4 col-xl-4 col-lg-4 col-12">
                                            <div class="requirement">
                                                <label>System Size (KW) </label>
                                                <input id="system_size" type="text"
                                                class="numberValues"
                                                name="system_size" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4 col-lg-4 col-12">
                                            <div class="requirement">
                                                <label>System Price </label>
                                                <div class="price_input">
                                                    <span>Rs</span>
                                                    <input id="system_price" type="text"
                                                        class="numberValues"
                                                        name="system_price" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4 col-lg-4 col-12 align-self-end">
                                            <div class="submit">
                                                <a class="submit_btn fill-border-btn" href="javascript:void(0)"
                                                id="submit"><span>Submit<i
                                                            class="fa fa-angle-right"></i></span> </a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <span class="separator"></span>
                                <div class="saving">
                                    <p>
                                        <i class="fa fa-thumbs-up"></i>
                                        You're <span>SAVING </span>
                                    </p>
                                </div>
                                <div class="savings_wrap">
                                    <div class="saving_item">
                                        <div class="row">
                                            <div class="col-md-5 col-xl-5 col-lg-5 col-12">
                                                <div class="label">
                                                    <p>Payback Period</p>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xl-7 col-lg-7 col-12 pl-0 pr-0">
                                                <div class="highlited">
                                                    <p id="paybackPeriod"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="saving_item">
                                        <div class="row">
                                            <div class="col-md-5 col-xl-5 col-lg-5 col-12">
                                                <div class="label">
                                                    <p>Total
                                                    <span class="tooltip">Earning<span class="tooltiptext">Total Earning</span></span> in <span>10 Years</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xl-7 col-lg-7 col-12 pl-0 pr-0">
                                                <div class="highlited">
                                                    <p id="totalEarning"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="saving_item">
                                        <div class="row">
                                            <div class="col-md-5 col-xl-5 col-lg-5 col-12">
                                                <div class="label">
                                                    <p>Total <span class="tooltip">Saving<span class="tooltiptext">Total Saving</span></span> in <span>10 Years</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xl-7 col-lg-7 col-12 pl-0 pr-0">
                                                <div class="highlited">
                                                    <p id="totalSaving"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xl-4 col-12 pr-0 pl-0">
                            <div class="calculator-cover">
                                <img src="{{ asset('frontend/images/sweet-homes.png') }}">
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

    <!--end::Page Scripts -->
    <script type="text/javascript">

        $(document).ready(function () {
            var months = 120;
            var price = '{{$settings->unitPrice}}';
            var unitPrice = parseInt(price);
            var averageUnitPrice = (unitPrice / 100) * 10;
            var one_kilo_watt = 3.8;
            var days_in_one_year = 365;
            var months_in_one_year = 12;
            var perMonthPrice = 0;
            var newPrice = 0;
            var paybackYear = 0;
            var savingAmount = 0;


            $('.numberValues').keypress(function (e) {
                if (isNaN(this.value + "" + String.fromCharCode(e.charCode))) return false;
            }).on("cut copy paste", function (e) {
                e.preventDefault();
            });
            // $('.numberValues').on('keydown', function (e) {
            //     if (!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) || e.keyCode == 8)) {
            //         return false;
            //     }
            // });

            function resetFields() {
                months = 120;
                price = '{{$settings->unitPrice}}';
                unitPrice = parseInt(price);
                averageUnitPrice = (unitPrice / 100) * 10;
                one_kilo_watt = 3.8;
                days_in_one_year = 365;
                months_in_one_year = 12;
                perMonthPrice = 0;
                newPrice = 0;
                paybackYear = 0;
                savingAmount = 0;
                $('#paybackPeriod').text('');
                $('#totalEarning').text('');
                $('#totalSaving').text('');

            }

            $('#submit').on('click', function () {
                resetFields();
                var systemPrice = parseFloat($('#system_price').val());
                var systemSize = parseFloat($('#system_size').val());
                if ($('#system_price').val() === '') {
                    toastr.error("System Price is required.");
                } else if ($('#system_size').val() === '') {
                    toastr.error("System Size is required.");
                } else {
                    perMonthPrice = (parseFloat(systemSize) * one_kilo_watt * unitPrice * days_in_one_year) / months_in_one_year;
                    for (var i = 1; i <= months; i++) {
                        if (i >= 1 && i <= 12) {
                            updateCalculation(i, 12, systemPrice, systemSize);
                        }
                        if (i > 12 && i <= 24) {
                            updateCalculation(i, 24, systemPrice, systemSize);
                        }
                        if (i > 24 && i <= 36) {
                            updateCalculation(i, 36, systemPrice, systemSize);
                        }
                        if (i > 36 && i <= 48) {
                            updateCalculation(i, 48, systemPrice, systemSize);
                        }
                        if (i > 48 && i <= 60) {
                            updateCalculation(i, 60, systemPrice, systemSize);
                        }
                        if (i > 60 && i <= 72) {
                            updateCalculation(i, 72, systemPrice, systemSize);
                        }
                        if (i > 72 && i <= 84) {
                            updateCalculation(i, 84, systemPrice, systemSize);
                        }
                        if (i > 84 && i <= 96) {
                            updateCalculation(i, 96, systemPrice, systemSize);
                        }
                        if (i > 96 && i <= 108) {
                            updateCalculation(i, 108, systemPrice, systemSize);
                        }
                        if (i > 108 && i <= 120) {
                            updateCalculation(i, 120, systemPrice, systemSize);
                        }
                    }
                    paybackYearText = getWords(paybackYear);
                    totalEarningsTenYears = savingAmount;
                    totalSavingsTenYears = totalEarningsTenYears - systemPrice;


                    $('#paybackPeriod').text(paybackYearText);
                    $('#totalEarning').text('Rs ' + (parseInt(totalEarningsTenYears).toLocaleString()));
                    $('#totalSaving').text('Rs ' + (parseInt(totalSavingsTenYears).toLocaleString()));
                    // $('#totalEarning').text('Rs ' + convertNumberToWords(parseInt(totalEarningsTenYears)));
                    // $('#totalSaving').text('Rs ' + convertNumberToWords(parseInt(totalSavingsTenYears)));
                }
            });

            function updateCalculation(index, current, systemPrice, systemSize) {

                newPrice = newPrice + perMonthPrice;
                savingAmount = savingAmount + perMonthPrice;
                if (newPrice < systemPrice) {
                    paybackYear++;
                }
                if (index === current) {
                    unitPrice = (unitPrice + averageUnitPrice);
                    averageUnitPrice = (unitPrice / 100) * 10;
                    perMonthPrice = (parseFloat(systemSize) * one_kilo_watt * (unitPrice) * days_in_one_year) / months_in_one_year;
                }
            }

            function getWords(monthCount) {
                function getPlural(number, word) {
                    return number === 1 && word.one || word.other;
                }

                var months = {one: 'Month', other: 'Months'},
                    years = {one: 'Year', other: 'Years'},
                    m = monthCount % 12,
                    y = Math.floor(monthCount / 12),
                    result = [];

                y && result.push(y + ' ' + getPlural(y, years));
                m && result.push(m + ' ' + getPlural(m, months));
                return result.join(' & ');
            }

            function convertNumberToWords(amount) {
                var words = new Array();
                words[0] = '';
                words[1] = 'One';
                words[2] = 'Two';
                words[3] = 'Three';
                words[4] = 'Four';
                words[5] = 'Five';
                words[6] = 'Six';
                words[7] = 'Seven';
                words[8] = 'Eight';
                words[9] = 'Nine';
                words[10] = 'Ten';
                words[11] = 'Eleven';
                words[12] = 'Twelve';
                words[13] = 'Thirteen';
                words[14] = 'Fourteen';
                words[15] = 'Fifteen';
                words[16] = 'Sixteen';
                words[17] = 'Seventeen';
                words[18] = 'Eighteen';
                words[19] = 'Nineteen';
                words[20] = 'Twenty';
                words[30] = 'Thirty';
                words[40] = 'Forty';
                words[50] = 'Fifty';
                words[60] = 'Sixty';
                words[70] = 'Seventy';
                words[80] = 'Eighty';
                words[90] = 'Ninety';
                amount = amount.toString();
                var atemp = amount.split(".");
                var number = atemp[0].split(",").join("");
                var n_length = number.length;
                var words_string = "";
                if (n_length <= 9) {
                    var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
                    var received_n_array = new Array();
                    for (var i = 0; i < n_length; i++) {
                        received_n_array[i] = number.substr(i, 1);
                    }
                    for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                        n_array[i] = received_n_array[j];
                    }
                    for (var i = 0, j = 1; i < 9; i++, j++) {
                        if (i == 0 || i == 2 || i == 4 || i == 7) {
                            if (n_array[i] == 1) {
                                n_array[j] = 10 + parseInt(n_array[j]);
                                n_array[i] = 0;
                            }
                        }
                    }
                    value = "";
                    for (var i = 0; i < 9; i++) {
                        if (i == 0 || i == 2 || i == 4 || i == 7) {
                            value = n_array[i] * 10;
                        } else {
                            value = n_array[i];
                        }
                        if (value != 0) {
                            words_string += words[value] + " ";
                        }
                        if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                            words_string += "Crores ";
                        }
                        if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                            words_string += "Lakhs ";
                        }
                        if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                            words_string += "Thousand ";
                        }
                        if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                            words_string += "Hundred and ";
                        } else if (i == 6 && value != 0) {
                            words_string += "Hundred ";
                        }
                    }
                    words_string = words_string.split("  ").join(" ");
                }
                return words_string;
            }
        });

    </script>

@endpush

