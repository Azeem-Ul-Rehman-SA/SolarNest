@extends('layouts.master')
@section('title','Partner Offer')
@push('css')
@endpush
@section('content')


    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Add {{ __('Offer') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="col-lg-12">
                    <div class="m-portlet">
                        <form class="m-form" method="post" action="{{ route('admin.offers.store') }}" id="create"
                              enctype="multipart/form-data" role="form">
                            @csrf

                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="partner_id"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Partners') }}
                                                <span
                                                    class="mandatorySign">*</span></label>
                                            <select id="partner_id"
                                                    class="form-control partners @error('partner_id') is-invalid @enderror"
                                                    name="partner_id" autocomplete="partner_id">
                                                <option value="" {{ (old('partner_id') == '') ? 'selected' : '' }}>
                                                    Select a Partner
                                                </option>
                                                @if(!empty($partners) && count($partners) > 0)
                                                    @foreach($partners as $partner)
                                                        <option
                                                            value="{{$partner->id}}" {{ old('partner_id') == $partner->id ? 'selected' : ''}}>{{ $partner->fullname() }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('partner_id')
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
                                                    value="active" {{ (old('status') == 'active') ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option
                                                    value="inactive" {{ (old('status') == 'inactive') ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>

                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="system_wattage"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('System Wattage') }}
                                                <span class="mandatorySign">*</span></label>
                                            <input id="system_wattage" type="text"
                                                   class="form-control @error('system_wattage') is-invalid @enderror"
                                                   name="system_wattage" value="{{ old('system_wattage') }}"
                                                   autocomplete="system_wattage" autofocus>

                                            @error('system_wattage')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="net_metering"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Net Metering') }}
                                                <span class="mandatorySign">*</span></label>
                                            <select id="net_metering"
                                                    class="form-control partners @error('net_metering') is-invalid @enderror"
                                                    name="net_metering" autocomplete="net_metering">
                                                <option
                                                    value="yes" {{ (old('net_metering') == 'yes') ? 'selected' : '' }}>
                                                    Yes
                                                <option
                                                    value="no" {{ (old('net_metering') == 'no') ? 'selected' : '' }}>No
                                                </option>
                                            </select>
                                            @error('net_metering')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="battery_system"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Battery System') }}
                                                <span class="mandatorySign">*</span></label>
                                            <select id="battery_system"
                                                    class="form-control  @error('battery_system') is-invalid @enderror"
                                                    name="battery_system" autocomplete="battery_system">
                                                <option
                                                    value="yes" {{ (old('battery_system') == 'yes') ? 'selected' : '' }}>
                                                    Yes
                                                <option
                                                    value="no" {{ (old('battery_system') == 'no') ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                            @error('battery_system')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="panel_model"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Panel Manufacturer/Model') }}
                                                <span
                                                    class="mandatorySign">*</span></label>

                                            <input id="panel_model" type="text"
                                                   class="form-control  @error('panel_model') is-invalid @enderror"
                                                   name="panel_model"
                                                   value="{{ old('panel_model') }}" autocomplete="panel_model">

                                            @error('panel_model')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="panel_type"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Panel Type') }}
                                                <span class="mandatorySign">*</span></label>

                                            <select id="panel_type"
                                                    class="form-control partners @error('panel_type') is-invalid @enderror"
                                                    name="panel_type" autocomplete="panel_type">
                                                <option
                                                    value="Monocrystalline" {{ (old('panel_type') == 'Monocrystalline') ? 'selected' : '' }}>
                                                    Monocrystalline
                                                <option
                                                    value="Polycrystalline" {{ (old('panel_type') == 'Polycrystalline') ? 'selected' : '' }}>Polycrystalline
                                                </option>
                                                <option
                                                    value="Thinfilm" {{ (old('panel_type') == 'Thinfilm') ? 'selected' : '' }}>Thin-film
                                                </option>
                                            </select>

                                            @error('panel_type')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inverter_brand"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Inverter Brand') }}
                                                <span class="mandatorySign">*</span></label>
                                            <input id="inverter_brand" type="text"
                                                   class="form-control @error('inverter_brand') is-invalid @enderror"
                                                   name="inverter_brand" value="{{ old('inverter_brand') }}"
                                                   autocomplete="inverter_brand" autofocus>

                                            @error('inverter_brand')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="battery_bank_type"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Battery Bank Type') }}
                                                <span class="mandatorySign">*</span></label>

                                            <select id="battery_bank_type"
                                                    class="form-control partners @error('battery_bank_type') is-invalid @enderror"
                                                    name="battery_bank_type" autocomplete="battery_bank_type">
                                                <option
                                                    value="Lead-acid" {{ (old('battery_bank_type') == 'Lead-acid') ? 'selected' : '' }}>
                                                    Lead acid
                                                </option>
                                                <option
                                                    value="Lithium-ion" {{ (old('battery_bank_type') == 'Lithium-ion') ? 'selected' : '' }}>Lithium ion
                                                </option>
                                                <option
                                                    value="Nickel-Cadmium" {{ (old('battery_bank_type') == 'Nickel-Cadmium') ? 'selected' : '' }}>Nickel Cadmium
                                                </option>
                                            </select>

                                            @error('battery_bank_type')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="batter_storage_capacity"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Battery Storage Capacity') }}
                                                <span class="mandatorySign">*</span></label>
                                            <input id="batter_storage_capacity"  type="text"
                                                   class="form-control numberValues @error('batter_storage_capacity') is-invalid @enderror"
                                                   name="batter_storage_capacity"
                                                   value="{{ old('batter_storage_capacity') }}"
                                                   autocomplete="batter_storage_capacity" autofocus>

                                            @error('batter_storage_capacity')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="smart_monitoring_application"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Smart Monitoring Application') }}
                                                <span class="mandatorySign">*</span></label>
                                            <select id="smart_monitoring_application"
                                                    class="form-control  @error('smart_monitoring_application') is-invalid @enderror"
                                                    name="smart_monitoring_application"
                                                    autocomplete="smart_monitoring_application">
                                                <option
                                                    value="yes" {{ (old('smart_monitoring_application') == 'yes') ? 'selected' : '' }}>
                                                    Yes
                                                <option
                                                    value="no" {{ (old('smart_monitoring_application') == 'no') ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                            @error('smart_monitoring_application')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="customer_support"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Customer Support') }}
                                                <span class="mandatorySign">*</span></label>

                                            <input id="customer_support" type="text"
                                                   class="form-control @error('customer_support') is-invalid @enderror"
                                                   name="customer_support"
                                                   value="{{ old('customer_support') }}"
                                                   autocomplete="customer_support">

                                            @error('customer_support')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="warranty_of_panel"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Warranty of Panel') }}
                                                (Years)
                                                <span class="mandatorySign">*</span></label>
                                            <input id="warranty_of_panel"  type="text"
                                                   class="form-control numberValues @error('warranty_of_panel') is-invalid @enderror"
                                                   name="warranty_of_panel"
                                                   value="{{ old('warranty_of_panel') }}"
                                                   autocomplete="warranty_of_panel" autofocus>

                                            @error('warranty_of_panel')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="warranty_of_batteries"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Warranty of Batteries') }}
                                                (Years)
                                                <span class="mandatorySign">*</span></label>
                                            <input id="warranty_of_batteries"  type="text"
                                                   class="form-control numberValues @error('warranty_of_batteries') is-invalid @enderror"
                                                   name="warranty_of_batteries"
                                                   value="{{ old('warranty_of_batteries') }}"
                                                   autocomplete="warranty_of_batteries" autofocus>

                                            @error('warranty_of_batteries')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="warranty_of_inverter"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Warranty of Invertors') }}
                                                (Years)
                                                <span class="mandatorySign">*</span></label>
                                            <input id="warranty_of_inverter" type="text"
                                                   class="form-control numberValues @error('warranty_of_inverter') is-invalid @enderror"
                                                   name="warranty_of_inverter"
                                                   value="{{ old('warranty_of_inverter') }}"
                                                   autocomplete="warranty_of_inverter" autofocus>

                                            @error('warranty_of_inverter')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payback_period_in_years"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Payback Period') }}
                                                (Years)
                                                <span class="mandatorySign">*</span></label>
                                            <input id="payback_period_in_years"  type="text"
                                                   class="form-control numberValues @error('payback_period_in_years') is-invalid @enderror"
                                                   name="payback_period_in_years"
                                                   value="{{ old('payback_period_in_years') }}"
                                                   autocomplete="payback_period_in_years" autofocus>

                                            @error('payback_period_in_years')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="payback_period_in_months"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Payback Period') }}
                                                (Months)
                                                <span class="mandatorySign">*</span></label>
                                            <input id="payback_period_in_months" type="text"
                                                   class="form-control numberValues @error('payback_period_in_months') is-invalid @enderror"
                                                   name="payback_period_in_months"
                                                   value="{{ old('payback_period_in_months') }}"
                                                   autocomplete="payback_period_in_months" autofocus>

                                            @error('payback_period_in_months')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="savings_for_ten_years"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Savings for Ten Years') }}
                                                (PKR)
                                                <span class="mandatorySign">*</span></label>
                                            <input id="savings_for_ten_years"  type="text"
                                                   class="form-control numberValues @error('savings_for_ten_years') is-invalid @enderror"
                                                   name="savings_for_ten_years"
                                                   value="{{ old('savings_for_ten_years') }}"
                                                   autocomplete="savings_for_ten_years" autofocus>

                                            @error('savings_for_ten_years')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="financing_options"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Financing Option') }}
                                                <span class="mandatorySign">*</span></label>
                                            <select id="financing_options"
                                                    class="form-control  @error('financing_options') is-invalid @enderror"
                                                    name="financing_options" autocomplete="financing_options">
                                                <option
                                                    value="yes" {{ (old('financing_options') == 'yes') ? 'selected' : '' }}>
                                                    Yes
                                                <option
                                                    value="no" {{ (old('financing_options') == 'no') ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                            @error('financing_options')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="total_price_of_offering"
                                                   class="col-md-6 col-form-label text-md-left">{{ __('Total Price Offering') }}
                                                (PKR)
                                                <span class="mandatorySign">*</span></label>
                                            <input id="total_price_of_offering"  type="text"
                                                   class="form-control numberValues @error('total_price_of_offering') is-invalid @enderror"
                                                   name="total_price_of_offering"
                                                   value="{{ old('total_price_of_offering') }}"
                                                   autocomplete="total_price_of_offering" autofocus>

                                            @error('total_price_of_offering')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="city"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('City') }}
                                                <span class="mandatorySign">*</span></label>
                                            <select id="city"
                                                    class="form-control  @error('city') is-invalid @enderror"
                                                    name="city" autocomplete="city">
                                                <option
                                                    value="lahore" {{ (old('city') == 'lahore') ? 'selected' : '' }}>
                                                    Lahore
                                                <option
                                                    value="karachi" {{ (old('city') == 'karachi') ? 'selected' : '' }}>
                                                    Karachi
                                                </option>
                                            </select>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="region"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Region') }}
                                                <span class="mandatorySign">*</span></label>
                                            <select id="region"
                                                    class="form-control  @error('region') is-invalid @enderror"
                                                    name="region" autocomplete="region">
                                                <option
                                                    value="punjab" {{ (old('region') == 'punjab') ? 'selected' : '' }}>
                                                    Punjab
                                                <option
                                                    value="sindh" {{ (old('region') == 'sindh') ? 'selected' : '' }}>
                                                    Sindh
                                                </option>
                                            </select>
                                            @error('region')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="image"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Proposal file') }} <span
                                                    class="mandatorySign">*</span></label>
                                            <input value="{{old('proposal_file')}}" type="file"
                                                   class="form-control @error('proposal_file') is-invalid @enderror"
                                                   onchange="readURL(this)" id="image"
                                                   name="proposal_file" style="padding: 9px; cursor: pointer">
                                            <img width="300" height="200" class="img-thumbnail" style="display:none;"
                                                 id="img" src="#"
                                                 alt="your image"/>

                                            @error('proposal_file')
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
                                    <a href="{{ route('admin.offers.index') }}" class="btn btn-info">Back</a>
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
        $('.js-example-basic-multiple').select2();
        // $('.numberValues').on('keydown', function (e) {
        //     if (!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) || e.keyCode == 8)) {
        //         return false;
        //     }
        // });
        $('.numberValues').keypress(function (e) {
            if (isNaN(this.value + "" + String.fromCharCode(e.charCode))) return false;
        }).on("cut copy paste", function (e) {
            e.preventDefault();
        });
    </script>
@endpush
