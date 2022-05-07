<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('photos')->get();

        return view('front.index.index',compact('vehicles'));
    }
    public function show($slug)
    {
        $vehicle = Vehicle::where('slug',$slug)->first();
        $reviews = Rating::where('vehicle_id',$vehicle->id)->get();

        return view('front.detail.property',compact('vehicle','reviews'))->with('toast.success', 'User Successfully Updated !!');
    }
}
