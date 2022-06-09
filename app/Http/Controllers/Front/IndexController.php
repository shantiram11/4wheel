<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
       $vehicles = Vehicle::where('status','available')->whereHas('user',function($q){
            $q->where('verify','yes');
       })->with('photos')->get();
        $user_wishlists = User::with('wishlists')->where('id', auth()->user()->id)->first();
        return view('front.index.index',compact('vehicles', 'user_wishlists'));
    }
    public function show($slug)
    {
        $vehicle = Vehicle::where('slug',$slug)->first();
        $reviews = Rating::where('vehicle_id',$vehicle->id)->get();

        return view('front.detail.property',compact('vehicle','reviews'))->with('toast.success', 'User Successfully Updated !!');
    }
}
