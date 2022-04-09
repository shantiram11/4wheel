<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function getStripePaymentIntent(Request $request){
        $total = $request->input('total');
        /** TODO: chanee env with config*/
        $stripe_secret = env('STRIPE_SECRET');
        Stripe::setApiKey($stripe_secret);
        $intent = null;
        $currencyType = 'USD';
        $adjustedAmount = $total * 100;
        $paymentIntentId = $request->input('paymentIntentId');

        if (($paymentIntentId == "0") || ($paymentIntentId == "") || ($paymentIntentId == null)) {
            $intent = PaymentIntent::create([
                'amount'                => $adjustedAmount,
                'currency'              => $currencyType,
                'payment_method_types'  => ['card'],
            ]);
        } else {
            $intent = PaymentIntent::retrieve($paymentIntentId);
            PaymentIntent::update(
                $paymentIntentId,
                [
                    'amount' => $adjustedAmount,
                ]
            );
        }
        return $intent;
    }
}
