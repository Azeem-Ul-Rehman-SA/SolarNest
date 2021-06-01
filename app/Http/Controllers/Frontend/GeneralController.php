<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function solarCalculator()
    {
        return view('frontend.pages.solar-calculator.index');
    }

    public function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('frontend.pages.privacy-policy', compact('privacyPolicy'));
    }

    public function aboutUs()
    {
        $aboutus = Aboutus::first();
        return view('frontend.pages.aboutus-detail', compact('aboutus'));
    }

    public function getQuoteNow()
    {
        return view('frontend.pages.get-quote-now.index');
    }
}
