<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $total_bookings = $user->booking()->count();
        $total_vehicles = $user->vehicles()->count();
        $total_earning = \DB::table('bookings as b')
            ->join('vehicles as v', 'v.id', 'b.vehicle_id')
//            ->join('users as u', 'u.id', 'v.owner_id')
            ->select(
                'b.total_cost',
            'v.*',
            )
        ->where('v.owner_id',$user->id)
            ->get();
        return view('customer_dashboard.index',compact('total_bookings','total_vehicles','total_earning'));
    }
}
