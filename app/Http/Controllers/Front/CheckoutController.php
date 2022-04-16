<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function fulfillOrder(Request $request){
        /*TODO: Logic here */
//        $transactionId = $request->transaction_id;
//        $total = $request->total;
//        Payment::create([
//            'report_id'         => $report->id,
//            'total'             => $total,
//            'transaction_id'    => $transactionId,
//        ]);
    }

    public function prePaymentValidation(Request $request){
        /*TODO: Chane this 100 with total value from database*/
        $database_total = 100;
        $total = $request->input('total');
        if (floatval($total) != floatval($database_total)) {
            return response()->json(['Price Discrepancy']);
        }
        return response()->json([
            'successful_validation' => 'success',
        ],200);
    }
}
