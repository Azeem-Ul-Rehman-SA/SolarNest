<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PartnerExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $dataArray = [];
        $indexValue = 0;
        $details = User::where('user_type', 'partner')->with('offers')->get();
        foreach ($details as $partner) {
            foreach ($partner->offers as $offer) {
                $dataArray[$indexValue] = array(
                    [
                        'full_name' => $partner->first_name . ' ' . $partner->last_name ?? '-',
                        'email' => $partner->email,
                        'mobile_number' => $partner->phone_number ?? '-',
                        'company_name' => $partner->company_name ?? '-',
                        'address' => $partner->address ?? '-',
                        'status' => $partner->status ?? '-',
                        'offer_name' => $partner->fullName() . '-' . $offer->id ?? '-',
                        'system_wattage' => $offer->system_wattage ?? '-',
                        'net_metering' => $offer->net_metering ?? '-',
                        'battery_system' => $offer->battery_system ?? '-',
                        'panel_model' => $offer->panel_model ?? '-',
                        'panel_type' => $offer->panel_type ?? '-',
                        'inverter_brand' => $offer->inverter_brand ?? '-',
                        'battery_bank_type' => str_replace('-', ' ', $offer->battery_bank_type) ?? '-',
                        'batter_storage_capacity' => $offer->batter_storage_capacity . ' KWH' ?? '-',
                        'smart_monitoring_application' => $offer->smart_monitoring_application ?? '-',
                        'customer_support' => $offer->customer_support ?? '-',
                        'warranty_of_panel' => $offer->warranty_of_panel . ' Years' ?? '-',
                        'warranty_of_batteries' => $offer->warranty_of_batteries . ' Years' ?? '-',
                        'warranty_of_inverter' => $offer->warranty_of_inverter . ' Years' ?? '-',
                        'payback_period_in_years' => $offer->payback_period_in_years . ' Years' ?? '-',
                        'payback_period_in_months' => $offer->payback_period_in_months . ' Months' ?? '-',
                        'savings_for_ten_years' => $offer->savings_for_ten_years . ' PKR' ?? '-',
                        'financing_options' => $offer->financing_options ?? '-',
                        'total_price_of_offering' => $offer->total_price_of_offering . ' PKR' ?? '-',
                        'city' => $offer->city ?? '-',
                        'region' => $offer->region ?? '-',
                        'offer_status' => $offer->status ?? '-',

                    ]);
                $indexValue++;
            }


        }
        return collect($dataArray);
    }

    public function headings(): array
    {
        return [
            [
                'Full Name',
                'Email',
                'Mobile Number',
                'Company Name',
                'Address',
                'Status',
                'Offer Name',
                'System Wattage',
                'Net Metering',
                'Battery System',
                'Panel Model',
                'Panel Type',
                'Inverter Brand',
                'Battery Bank Type',
                'Battery Storage Capacity',
                'Smart Monitoring Application',
                'Customer Support',
                'Warranty of Panels',
                'Warranty of Batteries',
                'Warranty of Inverters',
                'Payback Period in Years',
                'Payback Period in Months',
                'Saving for Ten Years',
                'Financing Options',
                'Total Price of Offering',
                'City',
                'Region',
                'Offer Status',
            ]
        ];
    }

    public function title(): string
    {
        return "Partners Report";
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
        ];
    }

}
