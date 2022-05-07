<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function storeReview(Request $request,$slug){
        $request->validate([
            'body'=>'required|min:10|max:199',
            'rating'=>'nullable|numeric|gt:0|lte:5',
        ]);

        $vehicle = Vehicle::where('slug',$slug)->first();
        if(!$vehicle){
            abort(404);
        }

        Rating::updateOrCreate(
            [
                'vehicle_id' => $vehicle->id,
                'user_id'    => auth()->user()->id
            ],
            [
                'body' => $request->body,
                'rating'         => 4
            ]
        );
        return redirect()->back()->with('toast.success','Review Added Successfully!!');
    }
}
