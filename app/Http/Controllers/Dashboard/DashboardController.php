<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $vehicles = \DB::table('vehicles as s')
            ->join('categories as c','c.id','s.category_id')
            ->select('s.id as vehicle_id','c.name')
            ->get()
            ->groupBy('name');

        $categories = $vehicles->keys()->toArray();
        $vehicles_count_arr = $vehicles->map(function($item){
            return $item->count();
        })->toArray();
        $total_users = count(User::all());
        $total_vehicles = count(Vehicle::all());
        $total_bookings = count(Booking::all());
        return view('dashboard.index',compact('total_users','total_bookings','total_vehicles','categories','vehicles_count_arr'));
    }
}
