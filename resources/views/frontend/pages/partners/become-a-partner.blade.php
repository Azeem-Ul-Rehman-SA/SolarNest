@extends('frontend.layout.app')
@section('title','Become a Partner')
@push('css')
    <style>
        .invalid-feedback {
            display: block !important;
            margin-top: -0.75rem !important;

        }
    </style>
@endpush
@section('content')
    <div class="become-partner-wrapper" style="background-image: url({{ asset('frontend/images/faded-bg.png') }});">
        <div class="container">
            <div class="become-partner-inner">
                <div class="row flex-wrap-revs">
                    <div class="col-md-12 col-lg-7 col-xl-7 col-12">
                        <div class="become-partner-form-wrap"
                             style="background-image: url({{ asset('frontend/images/Partner2-bg.png') }});">
                            <div class="title">
                                <h3>Become a Partner</h3>
                                <p><span>*</span>Required fields</p>
                            </div>
                            <p>Are you an installer who wants to partner up with us to increase your market share and
                                help
                                create a sustainable energy ecosystem?</p>
                            <div class="become_partner_form">
                                <div class="form">
                                    <form action="{{ route('save.partner') }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                                <div class="form-colm @error('first_name') is-invalid @enderror">
                                                    <input placeholder="First name*" id="first_name" type="text"
                                                           value="{{ old('first_name') }}"
                                                           name="first_name">
                                                </div>
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                                <div class="form-colm @error('last_name') is-invalid @enderror">
                                                    <input placeholder="Last Name*" id="last_name" type="text"
                                                           value="{{ old('last_name') }}"
                                                           name="last_name">
                                                </div>
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                                <div class="form-colm @error('company_name') is-invalid @enderror">
                                                    <input placeholder="Company name*" id="company_name" type="text"
                                                           value="{{ old('company_name') }}"
                                                           name="company_name">
                                                </div>
                                                @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                                <div class="form-colm @error('phone_number') is-invalid @enderror">
                                                    <input
                                                        name="phone_number" value="{{ old('phone_number') }}"
                                                        autocomplete="phone_number"
                                                        placeholder="Phone Number*"
                                                        pattern="[03]{2}[0-9]{9}"
                                                        maxlength="11"
                                                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                                        title="Phone number with 03 and remaing 9 digit with 0-9">
                                                </div>
                                                @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            {{--                                            <div class="col-md-6 col-lg-6 col-xl-6 col-12">--}}
                                            {{--                                                <div class="form-colm  @error('cnic') is-invalid @enderror">--}}
                                            {{--                                                    <input placeholder="_____-_______-_" id="cnic" name="cnic"--}}
                                            {{--                                                           type="text"--}}
                                            {{--                                                           class="cnic-mask">--}}
                                            {{--                                                </div>--}}
                                            {{--                                                @error('cnic')--}}
                                            {{--                                                <span class="invalid-feedback" role="alert">--}}
                                            {{--                                                    <strong>{{ $message }}</strong>--}}
                                            {{--                                                </span>--}}
                                            {{--                                                @enderror--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                                                <div class="form-colm  @error('address') is-invalid @enderror">
                                                    <input placeholder="Address (optional)" id="address" type="text"
                                                           name="address" value="{{ old('address') }}">
                                                </div>
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                                                <div class="form-colm @error('email') is-invalid @enderror">
                                                    <input placeholder="Email Address*" id="email" type="email"
                                                           name="email"
                                                           value="{{ old('email') }}">
                                                </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                                            <div class="become-partner">
                                                <button class="become-partner-btn fill-border-btn" type="submit">
                                                <span>Become Partner<i
                                                        class="fa fa-angle-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 col-xl-5 col-12 pr-0 pl-0">
                        <div class="become_partner_cover">
                            <img src="{{ asset('frontend/images/solar1.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.components.contact')
@endsection
@push('js')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!--end::Page Scripts -->
    <script type="text/javascript">

        $(document).ready(function () {
            if ($('.cnic-mask').length) {
                $('.cnic-mask').mask('00000-0000000-0');
            }
            $('#cnic').focusout(function () {
                cnic_no_regex = /^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/;

                if (cnic_no_regex.test($(this).val())) {
                } else {

                    $(this).val('');
                }
            });
            $('#phone_number').focusout(function () {
                if (/^(03)\d{9}$/.test($(this).val())) {
                    // value is ok, use it
                } else {

                }
            });

        });
    </script>

@endpush

