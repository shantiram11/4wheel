<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $total_bookings = Auth()->user()->booking()->count();
        $total_vehicles = Auth()->user()->vehicles()->count();
        return view('customer_dashboard.index',compact('total_bookings','total_vehicles'));
    }
}
