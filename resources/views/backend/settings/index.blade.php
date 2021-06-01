@extends('layouts.master')
@section('title','Settings')
@section('content')


    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ __('Settings') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="col-lg-12">
                    <div class="m-portlet">
                        <form class="m-form" method="post"
                              action="{{ route('admin.settings.update', $setting->id) }}"
                              enctype="multipart/form-data" role="form">
                            @csrf
                            @method('patch')
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">


                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="company_name"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Company Name') }}</label>
                                            <input id="company_name" type="text"
                                                   class="form-control @error('company_name') is-invalid @enderror"
                                                   name="company_name"
                                                   value="{{ ($setting) ? $setting->company_name : '' }}"
                                                   autocomplete="company_name" autofocus>

                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tag_line"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Tag Line') }}</label>
                                            <input id="tag_line" type="text"
                                                   class="form-control @error('tag_line') is-invalid @enderror"
                                                   name="tag_line"
                                                   value="{{ ($setting) ? $setting->tag_line : '' }}"
                                                   autocomplete="tag_line" autofocus>

                                            @error('tag_line')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="facebook_url"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Facebook URL') }}</label>
                                            <input id="facebook_url" type="text"
                                                   class="form-control @error('facebook_url') is-invalid @enderror"
                                                   name="facebook_url"
                                                   value="{{ ($setting) ? $setting->facebook_url : '' }}"
                                                   autocomplete="facebook_url" autofocus>

                                            @error('facebook_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="instagram_url"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Instagram URL') }}</label>
                                            <input id="instagram_url" type="text"
                                                   class="form-control @error('instagram_url') is-invalid @enderror"
                                                   name="instagram_url"
                                                   value="{{ ($setting) ? $setting->instagram_url : '' }}"
                                                   autocomplete="instagram_url" autofocus>

                                            @error('instagram_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="linkedin_url"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Linkedin URL') }}</label>
                                            <input id="linkedin_url" type="text"
                                                   class="form-control @error('linkedin_url') is-invalid @enderror"
                                                   name="linkedin_url"
                                                   value="{{ ($setting) ? $setting->linkedin_url : '' }}"
                                                   autocomplete="linkedin_url" autofocus>

                                            @error('linkedin_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="youtube_url"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Youtube URL') }}</label>
                                            <input id="youtube_url" type="text"
                                                   class="form-control @error('youtube_url') is-invalid @enderror"
                                                   name="youtube_url"
                                                   value="{{ ($setting) ? $setting->youtube_url : '' }}"
                                                   autocomplete="youtube_url" autofocus>
                                            @error('youtube_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="whatsapp_url"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Whatsapp URL') }}</label>
                                            <input id="whatsapp_url" type="text"
                                                   class="form-control @error('whatsapp_url') is-invalid @enderror"
                                                   name="whatsapp_url"
                                                   value="{{ ($setting) ? $setting->whatsapp_url : '' }}"
                                                   autocomplete="whatsapp_url" autofocus>

                                            @error('whatsapp_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Address') }}</label>
                                            <input id="address" type="text"
                                                   class="form-control @error('address') is-invalid @enderror"
                                                   name="address"
                                                   value="{{ ($setting) ? $setting->address : '' }}"
                                                   autocomplete="address" autofocus>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="contact_number"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Contact Number') }}</label>
                                            <input id="contact_number" type="text"
                                                   class="form-control @error('contact_number') is-invalid @enderror"
                                                   name="contact_number"
                                                   value="{{ ($setting) ? $setting->contact_number : '' }}"
                                                   autocomplete="contact_number" autofocus>

                                            @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
                                            <input id="email" type="text"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ ($setting) ? $setting->email : '' }}"
                                                   autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="unitPrice"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Unit Price') }}</label>
                                            <input id="unitPrice" type="text"
                                                   class="form-control @error('unitPrice') is-invalid @enderror"
                                                   name="unitPrice"
                                                   value="{{ ($setting) ? $setting->unitPrice : '' }}"
                                                   autocomplete="unitPrice" autofocus>

                                            @error('unitPrice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="image"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Logo') }} <span
                                                    class="mandatorySign">*</span></label>
                                            <input value="{{$setting->logo}}" type="file"
                                                   class="form-control @error('image') is-invalid @enderror"
                                                   onchange="readURL(this)" id="image"
                                                   name="image" style="padding: 9px; cursor: pointer">
                                            <img width="300" height="200" class="img-thumbnail"
                                                 style="display:{{($setting->logo) ? 'block' : 'none'}};"
                                                 id="img"
                                                 src="{{ asset('/uploads/company_logos/'.$setting->logo) }}"
                                                 alt="your image"/>

                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="footer_logo"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Footer Logo') }}
                                                <span
                                                    class="mandatorySign">*</span></label>
                                            <input value="{{$setting->footer_logo}}" type="file"
                                                   class="form-control @error('footer_logo') is-invalid @enderror"
                                                   onchange="readURLFooter(this)" id="footer_logo"
                                                   name="footer_logo" style="padding: 9px; cursor: pointer">
                                            <img width="300" height="200" class="img-thumbnail"
                                                 style="display:{{($setting->footer_logo) ? 'block' : 'none'}};"
                                                 id="imgFooter"
                                                 src="{{ asset('/uploads/footer_logos/'.$setting->footer_logo) }}"
                                                 alt="{{$setting->footer_logo}}"/>

                                            @error('footer_logo')
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
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('SAVE') }}
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
        function readURLFooter(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {

                    $('#imgFooter').attr('src', e.target.result);
                    $('#imgFooter').css("display", "block");
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
