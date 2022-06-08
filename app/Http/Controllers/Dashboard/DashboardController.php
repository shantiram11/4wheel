<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
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
        $vehicles = \DB::table('vehicles as v')
            ->join('categories as c','c.id','v.category_id')
            ->select('v.id as vehicle_id','c.name','c.id as category_id')
            ->get()
            ->groupBy('name');

        $categories = Category::withCount('vehicles')->get()->groupBy('name');

        $vehicleCountByCategories = $categories->map(function($item){
            return $item->sum('vehicles_count');
        })->toArray();

        $total_users = count(User::all());
        $total_vehicles = count(Vehicle::all());
        $total_bookings = count(Booking::all());
        return view('dashboard.index',compact('total_users','total_bookings','total_vehicles','vehicleCountByCategories'));
    }
}
