<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('photos')->get();

        return view('front.index.index',compact('vehicles'));
    }
}
