<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = Aboutus::first();
        return view('frontend.pages.aboutus-detail', compact('aboutus'));
    }
}
