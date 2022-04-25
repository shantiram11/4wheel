@extends('layouts.front')
@section('content')
    <?php
        $stripePubKey = env('STRIPE_KEY');
        $currencyTextRaw = 'USD';
        $booking_data = session()->get('booking');
        $total = $booking_data['total_cost'];
    ?>
    @if(session("failureMsg"))
        <div class="alert alert-danger fade show mt-1" id="paymentErrorAlert" role="alert">
            <span>{{ session("failureMsg") }}</span>
        </div>
    @endif
    <div class="text-center">
        <h3>Billing details </h3>
    </div>
    <div class="alert alert-danger fade show mt-1" id="validationErrorAlert" role="alert" style="display:none;">
        <span id="validationErrorText"></span>
    </div>
    <section>
        <div class="container">
            <table>
                <tr>
                    <th>Vechicle Price: </th>
                    <td>Rs.{{$vehicle->rate}} /Per Day</td>
                </tr>
                <tr>
                    <th>Total Days</th>
                    <td>{{$booking_data['duration']}}</td>
                </tr>
                <tr>
                    <th>Pickup Location</th>
                    <td>{{$booking_data['pickup_location']}}</td>
                </tr>
                <tr>
                    <th>Return Location</th>
                    <td>{{$booking_data['return_location']}}</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td>{{$total}}</td>
                </tr>
            </table>
        </div>
    </section>
{{--    Stripe Payment flow starts from here--}}
            <div id="stripe-card-element" class="card-input">
        <!-- A Stripe Element will be inserted here. -->
            </div>
            <div class="checkout-terms form-check">
                <input class="form-check-input" type="checkbox" value=""
                       id="terms_checkbox">
                <label class="form-check-label" for="terms_checkbox" style="margin-top: 20px;">
                    I agree to {{config('app.name')}}<a href="#" class="text-muted"> terms and conditions.</a>
                    <a class="text-muted" href="#">Privacy Policy information.</a>
                </label>
            </div>
            <form action="{{route('checkout.fulfillOrder')}}"
                  id="payment-form-stripe" name="stripePayForm" method="POST">
                @csrf
                <input type="hidden" id="transaction_stripe"
                       name="transaction_id" />
                <input type="hidden" id="total_stripe" name="total" />
                <div class="place-order-flex-box" style="position: relative;">
                    <div class="checkout-page Place-order">
                        <button class="button-sq fullwidth-sq font-weight-bold-sq"
                        id="payStartBtnStripe" form="payment-form-stripe" type="submit">Instant Booking</button>
                    </div>
                    <div class="spinner-border"  id="payStartSpinner" role="status"  style="width: 2rem; height: 2rem; display: none;  position: absolute;right: 13px;top: 8px;">
                    </div>
                </div>
            </form>
{{--     Stripe ends--}}

@endsection
@section('page_level_script')
    @include('front.detail.checkout-script')
    @include('front.detail.stripe-script')
@endsection
