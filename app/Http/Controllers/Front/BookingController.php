<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Role;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index (){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Booking $booking)
    {
        $booking = new Booking();

        return view('front.detail.property', compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /** TODO: Booking request */
        if(session('booking')){
            $request->session()->forget('booking');
        }
        $vehicle = Vehicle::where('slug', $request->input('vehicle'))->first();
        $booked_date    = Carbon::parse($request->input('booked_date'));
        $return_date    = Carbon::parse($request->input('return_date'));
        $total_days     = $return_date->diffInDays($booked_date);
        $total_cost    = $total_days * $vehicle->rate;
        $return_location = $request->input('return_same') ? $request->input('pickup_location') : $request->input('return_location');
        $booking = [
            'pickup_location'               => $request->input('pickup_location'),
            'return_location'               => $return_location,
            'return_same'                   => $request->input('return_same'),
            'book_date'                     => $request->input('booked_date'),
            'return_date'                   => $request->input('return_date'),
            'booked_by'                     => Auth::user()->id,
            'duration'                      => $total_days,
            'total_cost'                    => $total_cost,
        ];
        session(['booking' => $booking]);
        return view('front.payment.payment', compact('vehicle', 'booking'))->with('alert.success', 'Waiting for payment!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show(Booking $booking)
    {
        return view('dashboard.users.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(User $user)
    {
        $booked_by = User::pluck('name', 'id');
        $vehicle = Vehicle::pluck('brand', 'id');

        return view('front.detail.property', compact('booked_by', 'vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Booking $booking)
    {
        Booking::where('id', $booking->id)->update([
            'pickup_location'               => $request->input('pickup_location'),
            'return_location'               => $request->input('return_location'),
            'booked_date'                   => $request->input('booked_date'),
            'return_date'                   => $request->input('return_date'),
            'duration'                      => $request->input('duration'),
            'booked_by'                      => Auth::user()->id,
        ]);
        return redirect()->route('front.detail.property', compact('booking'))->with('alert.success', 'Booking Successfully Updated !!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Booking::where('id', $id)->delete();
        return response()->json([
            'message' => 'Booking Successfully Terminated',
        ], 200);
    }
}
