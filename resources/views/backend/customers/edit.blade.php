@extends('layouts.master')
@section('title','Customers')
@push('css')
@endpush
@section('content')


    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Edit {{ __('Customer') }}
                        </h3>
                    </div>
                </div>
            </div>


            <div class="m-portlet__body">
                <div class="col-lg-12">
                    <div class="m-portlet">
                        <form class="m-form" method="post" action="{{ route('admin.customers.update',$user->id) }}"
                              id="create"
                              enctype="multipart/form-data" role="form">
                            @method('patch')
                            @csrf
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="first_name"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('First Name') }}
                                                <span class="mandatorySign">*</span></label>
                                            <input id="first_name" type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror"
                                                   name="first_name" value="{{ old('first_name',$user->first_name) }}"
                                                   autocomplete="first_name" autofocus>

                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Last Name') }}
                                                <span class="mandatorySign">*</span></label>
                                            <input id="last_name" type="text"
                                                   class="form-control @error('last_name') is-invalid @enderror"
                                                   name="last_name" value="{{ old('last_name',$user->last_name) }}"
                                                   autocomplete="last_name" autofocus>

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="email"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}
                                                <span class="mandatorySign">*</span></label>

                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email',$user->email) }}" autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cnic"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('CNIC') }} <span class="mandatorySign">*</span> </label>

                                            <input id="cnic" type="text"
                                                   class="form-control cnic-mask @error('cnic') is-invalid @enderror"
                                                   name="cnic"
                                                   placeholder="_____-_______-_"
                                                   value="{{ old('cnic',$user->cnic) }}" autocomplete="email">

                                            @error('cnic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="address"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Address') }}
                                                <span class="mandatorySign">*</span></label>

                                            <input id="address" type="text"
                                                   class="form-control @error('address') is-invalid @enderror"
                                                   name="address"
                                                   value="{{ old('address',$user->address) }}" autocomplete="address">

                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone_number"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Mobile Number') }}
                                                <span class="mandatorySign">*</span></label>
                                            <input id="phone_number" type="text"
                                                   class="form-control @error('phone_number') is-invalid @enderror"
                                                   name="phone_number"
                                                   value="{{ old('phone_number',$user->phone_number) }}"
                                                   autocomplete="phone_number" autofocus placeholder="03001234567"
                                                   pattern="[03]{2}[0-9]{9}"
                                                   maxlength="11"
                                                   onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                                   title="Phone number with 03 and remaing 9 digit with 0-9">

                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="image"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Profile Pic') }} <span
                                                    class="mandatorySign">*</span></label>
                                            <input value="{{old('image',$user->profile_pic)}}" type="file"
                                                   class="form-control @error('image') is-invalid @enderror"
                                                   onchange="readURL(this)" id="image"
                                                   name="image" style="padding: 9px; cursor: pointer">
                                            <img width="300" height="200" class="img-thumbnail"
                                                 style="display:{{($user->profile_pic) ? 'block' : 'none'}}"
                                                 id="img" src="{{ asset('/uploads/user_profiles/'.$user->profile_pic) }}"
                                                 alt="{{$user->profile_pic}}"/>

                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Status') }} <span
                                                    class="mandatorySign">*</span></label>

                                            <select id="status"
                                                    class="form-control cities @error('status') is-invalid @enderror"
                                                    name="status" autocomplete="status">
                                                <option value="" {{ (old('status') == '') ? 'selected' : '' }}>Select an
                                                    option
                                                </option>
                                                <option
                                                    value="pending" {{ (old('status',$user->status) == 'pending') ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option
                                                    value="verified" {{ (old('status',$user->status) == 'verified') ? 'selected' : '' }}>
                                                    Verified
                                                </option>
                                                <option
                                                    value="suspended" {{ (old('status',$user->status) == 'suspended') ? 'selected' : '' }}>
                                                    Suspended
                                                </option>
                                            </select>

                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit text-md-right">
                                <div class="m-form__actions m-form__actions">
                                    <a href="{{ route('admin.customers.index') }}" class="btn btn-info">Back</a>
                                    <button type="submit" class="btn btn-primary">
                                        SAVE
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')


    <script>
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
    </script>
@endpush
