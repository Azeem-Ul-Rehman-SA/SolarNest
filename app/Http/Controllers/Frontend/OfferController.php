<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {



        $size = 0;
        if ($request->building == 'Commercial') {
            if (($request->electricity_bill > 0) && ($request->electricity_bill <= 10000)) {
                $size = $this->fiveMarlaCommerical($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 10001) && ($request->electricity_bill <= 20000)) {
                $size = $this->tenMarlaCommerical($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 20001) && ($request->electricity_bill <= 30000)) {
                $size = $this->tenMarlaCommerical($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 30001) && ($request->electricity_bill <= 40000)) {
                $size = $this->tenMarlaCommerical($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 40001) && ($request->electricity_bill <= 50000)) {
                $size = $this->fifteenMarlaCommerical($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 50001) && ($request->electricity_bill <= 60000)) {
                $size = $this->twentyMarlaCommerical($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 60001) && ($request->electricity_bill <= 70000)) {
                $size = $this->twentyMarlaCommerical($request->size_of_dwelling);
            }

        }
        if ($request->building == 'Residential') {
            if (($request->electricity_bill > 0) && ($request->electricity_bill <= 10000)) {
                $size = $this->fiveMarlaResidential($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 10001) && ($request->electricity_bill <= 20000)) {
                $size = $this->tenMarlaPlanOneResidential($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 20001) && ($request->electricity_bill <= 30000)) {
                $size = $this->tenMarlaPlantwoResidential($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 30001) && ($request->electricity_bill <= 40000)) {
                $size = $this->tenMarlaPlanthreeResidential($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 40001) && ($request->electricity_bill <= 50000)) {
                $size = $this->fifteenMarlaResidential($request->size_of_dwelling);
            }
            if (($request->electricity_bill > 50001) && ($request->electricity_bill <= 60000)) {
                $size = $this->twentyMarlaResidential($request->size_of_dwelling);
            }

        }


        $offers = Offer::where(function ($query) use ($request, $size) {
            $query->where([
                'system_wattage' => $size,
                'net_metering' => strtolower($request->net_metering),
                'battery_system' => strtolower($request->backup_system),
                'city' => strtolower($request->city),
                'region' => strtolower($request->region),
                'status' => 'active',
            ]);

            if (!is_null($request->panel_type)) {
                $query->where('panel_type', $request->panel_type);
            }
            if (!is_null($request->battery_type)) {
                $query->where('battery_bank_type', $request->battery_type);
            }
            if (!is_null($request->warranty_of_batteries)) {
                $BatteryYear = explode('-', $request->warranty_of_batteries);
                $startBatteryYear = $BatteryYear[0];
                $endBatteryYear = $BatteryYear[1];
                $query->whereBetween('warranty_of_batteries', [$startBatteryYear, $endBatteryYear]);
            }
            if (!is_null($request->warranty_of_inverter)) {
                $InvertorYear = explode('-', $request->warranty_of_inverter);
                $startInvertorYear = $InvertorYear[0];
                $endInvertorYear = $InvertorYear[1];
                $query->whereBetween('warranty_of_inverter', [$startInvertorYear, $endInvertorYear]);
            }
            if (!is_null($request->smart_monitoring_application)) {
                $query->where('smart_monitoring_application', $request->smart_monitoring_application);
            }
            if (!is_null($request->min_value) || !is_null($request->max_value)) {
                $query->whereBetween('total_price_of_offering', [(int)$request->min_value, (int)$request->max_value]);
            }
        })->orderBy('id', 'asc')->get();


        $data = $request->all();

        $batterySystem = Offer::where('battery_system','yes')->groupBy('battery_bank_type')->pluck('battery_bank_type')->toArray();
        $panelType = Offer::where(function ($query) use ($request, $size) {
            $query->where([
                'system_wattage' => $size,
                'net_metering' => strtolower($request->net_metering),
                'battery_system' => strtolower($request->backup_system),
                'city' => strtolower($request->city),
                'region' => strtolower($request->region),
                'status' => 'active',
            ]);

            if (!is_null($request->panel_type)) {
                $query->where('panel_type', $request->panel_type);
            }
            if (!is_null($request->battery_type)) {
                $query->where('battery_bank_type', $request->battery_type);
            }
            if (!is_null($request->warranty_of_batteries)) {
                $BatteryYear = explode('-', $request->warranty_of_batteries);
                $startBatteryYear = $BatteryYear[0];
                $endBatteryYear = $BatteryYear[1];
                $query->whereBetween('warranty_of_batteries', [$startBatteryYear, $endBatteryYear]);
            }
            if (!is_null($request->warranty_of_inverter)) {
                $InvertorYear = explode('-', $request->warranty_of_inverter);
                $startInvertorYear = $InvertorYear[0];
                $endInvertorYear = $InvertorYear[1];
                $query->whereBetween('warranty_of_inverter', [$startInvertorYear, $endInvertorYear]);
            }
            if (!is_null($request->smart_monitoring_application)) {
                $query->where('smart_monitoring_application', $request->smart_monitoring_application);
            }
            if (!is_null($request->min_value) || !is_null($request->max_value)) {
                $query->whereBetween('total_price_of_offering', [$request->min_value, $request->max_value]);
            }
        })->groupBy('panel_type')->pluck('panel_type')->toArray();;

        return view('frontend.pages.comparison.index', compact('offers', 'data', 'size','batterySystem','panelType'));
    }

    //  Commercial Plan
    public function fiveMarlaCommerical($size_of_dwelling)
    {
        if ($size_of_dwelling == '2marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '3marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '4marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '5marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '6marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '7marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '8marla') {
            $size = 5;
        }

        return $size;
    }

    public function tenMarlaCommerical($size_of_dwelling)
    {
        if ($size_of_dwelling == '2marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '3marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '4marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '5marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '6marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '7marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '8marla') {
            $size = 10;
        }
        return $size;
    }

    public function fifteenMarlaCommerical($size_of_dwelling)
    {
        if ($size_of_dwelling == '2marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '3marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '4marla') {
            $size = 15;
        } elseif ($size_of_dwelling == '5marla') {
            $size = 15;
        } elseif ($size_of_dwelling == '6marla') {
            $size = 15;
        } elseif ($size_of_dwelling == '7marla') {
            $size = 15;
        } elseif ($size_of_dwelling == '8marla') {
            $size = 15;
        }
        return $size;
    }

    public function twentyMarlaCommerical($size_of_dwelling)
    {
        if ($size_of_dwelling == '2marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '3marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '4marla') {
            $size = 20;
        } elseif ($size_of_dwelling == '5marla') {
            $size = 20;
        } elseif ($size_of_dwelling == '6marla') {
            $size = 20;
        } elseif ($size_of_dwelling == '7marla') {
            $size = 20;
        } elseif ($size_of_dwelling == '8marla') {
            $size = 20;
        }
        return $size;

    }


    //  Residential Plan
    public function fiveMarlaResidential($size_of_dwelling)
    {
        if ($size_of_dwelling == '5marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '10marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '15marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '1kanal') {
            $size = 5;
        } elseif ($size_of_dwelling == '2kanal') {
            $size = 5;
        } elseif ($size_of_dwelling == '3kanal') {
            $size = 5;
        } elseif ($size_of_dwelling == '4kanal') {
            $size = 5;
        }

        return $size;
    }

    public function tenMarlaPlanOneResidential($size_of_dwelling)
    {
        if ($size_of_dwelling == '5marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '10marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '15marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '1kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '2kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '3kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '4kanal') {
            $size = 10;
        }
        return $size;
    }

    public function tenMarlaPlantwoResidential($size_of_dwelling)
    {
        if ($size_of_dwelling == '5marla') {
            $size = 5;
        } elseif ($size_of_dwelling == '10marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '15marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '1kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '2kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '3kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '4kanal') {
            $size = 10;
        }
        return $size;
    }

    public function tenMarlaPlanthreeResidential($size_of_dwelling)
    {
        if ($size_of_dwelling == '5marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '10marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '15marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '1kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '2kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '3kanal') {
            $size = 10;
        } elseif ($size_of_dwelling == '4kanal') {
            $size = 10;
        }
        return $size;
    }

    public function fifteenMarlaResidential($size_of_dwelling)
    {
        if ($size_of_dwelling == '5marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '10marla') {
            $size = 15;
        } elseif ($size_of_dwelling == '15marla') {
            $size = 15;
        } elseif ($size_of_dwelling == '1kanal') {
            $size = 15;
        } elseif ($size_of_dwelling == '2kanal') {
            $size = 15;
        } elseif ($size_of_dwelling == '3kanal') {
            $size = 15;
        } elseif ($size_of_dwelling == '4kanal') {
            $size = 15;
        }
        return $size;
    }

    public function twentyMarlaResidential($size_of_dwelling)
    {
        if ($size_of_dwelling == '5marla') {
            $size = 10;
        } elseif ($size_of_dwelling == '10marla') {
            $size = 20;
        } elseif ($size_of_dwelling == '15marla') {
            $size = 20;
        } elseif ($size_of_dwelling == '1kanal') {
            $size = 20;
        } elseif ($size_of_dwelling == '2kanal') {
            $size = 20;
        } elseif ($size_of_dwelling == '3kanal') {
            $size = 20;
        } elseif ($size_of_dwelling == '4kanal') {
            $size = 20;
        }
        return $size;

    }
}
