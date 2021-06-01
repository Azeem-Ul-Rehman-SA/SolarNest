<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $users_count = User::where('user_type','partner')->get()->count();
        $customers_count = User::where('user_type','customer')->get()->count();
        $orders_count = Order::whereIn('status',['confirmed','completed'])->get()->count();
        return view('backend.dashboard.index', compact('users_count','customers_count','orders_count'));
    }
}
