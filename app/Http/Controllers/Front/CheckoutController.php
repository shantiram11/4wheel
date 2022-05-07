<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function fulfillOrder(Request $request){
        /*TODO: Logic here */
        $transactionId = $request->transaction_id;
        $booking = session()->get('booking');
        $booking['transaction_id'] = $transactionId;
        Booking::create($booking);
        $request->session()->forget('booking');
        return redirect()->route('front.index')->with('toast.success', 'Booking recorded');
    }

    public function prePaymentValidation(Request $request){
        $booking = session()->get('booking');
        $database_total = $booking['total_cost'];
        $total = $request->input('total');
        if (floatval($total) != floatval($database_total)) {
            return response()->json(['Price Discrepancy']);
        }
        return response()->json([
            'successful_validation' => 'success',
        ],200);
    }
}
