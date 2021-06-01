<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'partner_id'                            => 'required',
            'system_wattage'                        => 'required',
            'net_metering'                          => 'required',
            'battery_system'                        => 'required',
            'panel_model'                           => 'required',
            'panel_type'                            => 'required',
            'inverter_brand'                        => 'required',
            'battery_bank_type'                     => 'required',
            'batter_storage_capacity'               => 'required',
            'customer_support'                      => 'required',
            'warranty_of_panel'                     => 'required',
            'warranty_of_batteries'                 => 'required',
            'warranty_of_inverter'                  => 'required',
            'payback_period_in_years'               => 'required',
            'payback_period_in_months'              => 'required',
            'savings_for_ten_years'                 => 'required',
            'financing_options'                     => 'required',
            'total_price_of_offering'               => 'required',
            'status'                                => 'required',
            'city'                                  => 'required',
            'region'                                => 'required',
            'proposal_file'                         => 'mimes:pdf|max:20000',
        ];
    }

}
