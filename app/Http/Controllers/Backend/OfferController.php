<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferStoreRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Models\Offer;
use App\Models\User;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('backend.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = User::where('user_type', 'partner')->get();
        return view('backend.offers.create', compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferStoreRequest $request)
    {

        $validated = $request->validated();
        $offer = new Offer();
        $offer->partner_id = $request->partner_id;
        $offer->system_wattage = $request->system_wattage;
        $offer->net_metering = $request->net_metering;
        $offer->battery_system = $request->battery_system;
        $offer->panel_model = $request->panel_model;
        $offer->panel_type = $request->panel_type;
        $offer->inverter_brand = $request->inverter_brand;
        $offer->battery_bank_type = $request->battery_bank_type;
        $offer->batter_storage_capacity = $request->batter_storage_capacity;
        $offer->customer_support = $request->customer_support;
        $offer->warranty_of_panel = $request->warranty_of_panel;
        $offer->warranty_of_batteries = $request->warranty_of_batteries;
        $offer->warranty_of_inverter = $request->warranty_of_inverter;
        $offer->payback_period_in_years = $request->payback_period_in_years;
        $offer->payback_period_in_months = $request->payback_period_in_months;
        $offer->savings_for_ten_years = $request->savings_for_ten_years;
        $offer->financing_options = $request->financing_options;
        $offer->total_price_of_offering = $request->total_price_of_offering;
        $offer->status = $request->status;
        $offer->city = $request->city;
        $offer->region = $request->region;
        $offer->save();
        if ($request->has('proposal_file')) {
            $file = $request->file('proposal_file');
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/pdfFiles/' . $offer->id . '/');
            $file->move($destinationPath, str_replace(' ', '', $name));
            $offer->proposal_file = str_replace(' ', '', $name);

        }
        $offer->save();
        return redirect()->route('admin.offers.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Offer created successfully.'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::where('id', $id)->first();
        $partners = User::where('user_type', 'partner')->get();
        return view('backend.offers.edit', compact('offer', 'partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $offer = Offer::find($id);
        $offer->partner_id = $request->partner_id;
        $offer->system_wattage = $request->system_wattage;
        $offer->net_metering = $request->net_metering;
        $offer->battery_system = $request->battery_system;
        $offer->panel_model = $request->panel_model;
        $offer->panel_type = $request->panel_type;
        $offer->inverter_brand = $request->inverter_brand;
        $offer->battery_bank_type = $request->battery_bank_type;
        $offer->batter_storage_capacity = $request->batter_storage_capacity;
        $offer->customer_support = $request->customer_support;
        $offer->warranty_of_panel = $request->warranty_of_panel;
        $offer->warranty_of_batteries = $request->warranty_of_batteries;
        $offer->warranty_of_inverter = $request->warranty_of_inverter;
        $offer->payback_period_in_years = $request->payback_period_in_years;
        $offer->payback_period_in_months = $request->payback_period_in_months;
        $offer->savings_for_ten_years = $request->savings_for_ten_years;
        $offer->financing_options = $request->financing_options;
        $offer->total_price_of_offering = $request->total_price_of_offering;
        $offer->status = $request->status;
        $offer->city = $request->city;
        $offer->region = $request->region;

        if ($request->has('proposal_file')) {
            $file = $request->file('proposal_file');
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/pdfFiles/' . $offer->id . '/');
            $file->move($destinationPath, str_replace(' ', '', $name));
            $offer->proposal_file = str_replace(' ', '', $name);
        }
        $offer->save();

        return redirect()->route('admin.offers.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Offer Updated Successfully.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::where('id', $id)->delete();
        return redirect()->route('admin.offers.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Offer Deleted successfully.'
            ]);
    }
}
