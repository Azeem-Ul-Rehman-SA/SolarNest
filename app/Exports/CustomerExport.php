<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomerExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithStyles
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
        $details = Order::with(['user', 'partner', 'offer'])->get();
        foreach ($details as $order) {
            $dataArray[$indexValue] = array(
                [
                    'full_name' => $order->user->first_name . ' ' . $order->user->last_name ?? '-',
                    'email' => $order->user->email,
                    'mobile_number' => $order->user->phone_number ?? '-',
                    'cnic' => $order->user->cnic ?? '-',
                    'address' => $order->user->address ?? '-',
                    'order_status' => $order->status ?? '-',
                    'offer_name' => $order->partner->fullName() . '-' . $order->id ?? '-',
                    'proposal_number' => $order->proposal_number ?? '-',
                    'system_wattage' => $order->offer->system_wattage ?? '-',
                    'net_metering' => $order->offer->net_metering ?? '-',
                    'battery_system' => $order->offer->battery_system ?? '-',
                    'panel_model' => $order->offer->panel_model ?? '-',
                    'panel_type' => $order->offer->panel_type ?? '-',
                    'inverter_brand' => $order->offer->inverter_brand ?? '-',
                    'battery_bank_type' => str_replace('-', ' ', $order->offer->battery_bank_type) ?? '-',
                    'batter_storage_capacity' => $order->offer->batter_storage_capacity . ' KWH' ?? '-',
                    'smart_monitoring_application' => $order->offer->smart_monitoring_application ?? '-',
                    'customer_support' => $order->offer->customer_support ?? '-',
                    'warranty_of_panel' => $order->offer->warranty_of_panel . ' Years' ?? '-',
                    'warranty_of_batteries' => $order->offer->warranty_of_batteries . ' Years' ?? '-',
                    'warranty_of_inverter' => $order->offer->warranty_of_inverter . ' Years' ?? '-',
                    'payback_period_in_years' => $order->offer->payback_period_in_years . ' Years' ?? '-',
                    'payback_period_in_months' => $order->offer->payback_period_in_months . ' Months' ?? '-',
                    'savings_for_ten_years' => $order->offer->savings_for_ten_years . ' PKR' ?? '-',
                    'financing_options' => $order->offer->financing_options ?? '-',
                    'total_price_of_offering' => $order->offer->total_price_of_offering . ' PKR' ?? '-',
                    'city' => $order->offer->city ?? '-',
                    'region' => $order->offer->region ?? '-',


                ]);
            $indexValue++;


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
                'CNIC',
                'Address',
                'Order Status',
                'Offer Name',
                'Proposal Number',
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
            ]
        ];
    }

    public function title(): string
    {
        return "Customer Report";
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
        ];
    }
}
