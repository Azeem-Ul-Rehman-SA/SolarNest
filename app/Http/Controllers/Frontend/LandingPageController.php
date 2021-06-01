<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $about = Aboutus::first();
        $featuredBlogs = Blog::where('is_featured', 'yes')->where('is_order', '!=', 0)->orderBy('id', 'asc')->limit(3)->get();
        $partners = User::where('user_type', 'partner')->where('status', 'verified')->get();
        return view('welcome', compact('featuredBlogs', 'about', 'partners'));
    }
}
