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
        $total_users = count(User::all());
        $total_vehicles = count(Vehicle::all());
        $total_bookings = count(Booking::all());
        return view('dashboard.index',compact('total_users','total_bookings','total_vehicles'));
    }
}
