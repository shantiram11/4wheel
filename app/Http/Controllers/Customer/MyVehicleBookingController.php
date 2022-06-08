<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MyVehicleBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $columns = array(
                0 => 'book_date',
                1 => 'return_date',
                2 => 'vehicle_owner',
                3 => 'total cost',
                4 => 'pickup_location',
                5 => 'return_location',
                6 => 'booked_by',
                7 => 'action'
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit = $request->input('length') ?? '-1';
            $start = $request->input('start') ?? 0;
            $order = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('bookings as b')
                ->join('users as u', 'u.id', 'b.booked_by')
                ->join('vehicles as v', 'v.id', 'b.vehicle_id')
                ->join('users as o', 'o.id', 'v.owner_id')
                ->select(
                    'b.id',
                    'b.book_date',
                    'b.return_date',
                    'o.name as vehicle_owner',
                    'b.total_cost',
                    'b.pickup_location',
                    'b.return_location',
                    'u.name as booked_by'
                );


            $query->where(function ($q) use ($search) {
                $q->where('b.booked_by', 'like', $search . '%')
                    ->orWhere('b.return_date', 'like', $search . '%')
                    ->orWhere('b.total_cost', 'like', $search . '%')
                    ->orWhere('u.name', 'like', $search . '%');
            });

            $totalData = $query->count();
            $query->orderBy($order, $dir);
            if ($limit != '-1') {
                $query->offset($start)->limit($limit);
            }
            $records = $query->get();
            $totalFiltered = $totalData;
            $data = array();
            if (isset($records)) {
                foreach ($records as $k => $v) {
                    $nestedData['id'] = $v->id;
                    $nestedData['book_date'] =  Carbon::parse($v->book_date)->format('Y-m-d');
                    $nestedData['return_date'] = Carbon::parse($v->return_date)->format('Y-m-d');
                    $nestedData['total_cost'] = $v->total_cost;
                    $nestedData['vehicle_owner'] = $v->vehicle_owner;
                    $nestedData['pickup_location'] = $v->pickup_location;
                    $nestedData['return_location'] = $v->return_location;
                    $nestedData['booked_by'] = $v->booked_by;
                    $nestedData['action'] = \View::make('dashboard.my_vehicle_bookings._action')->with('r', $v)->render();
                    $data[] = $nestedData;
                }
            }

            return response()->json([
                "draw" => intval($request->input('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            ], 200);
        }

        return view('customer_dashboard.my_vehicle_bookings.index');
    }
    public function create (){}

    public function store (){}

    public function show ($id){
        $booking = Booking::findOrFail($id);
        return view ('customer_dashboard.my_vehicle_bookings.show',compact('booking'));
    }

    public function edit (){}

    public function update (){}

    public function destroy (){

    }
    public function userVerify(Request $request, Booking $booking)
    {
        $request->validate([
            'booking_verify' => 'in:yes,no',
        ]);
        Booking::where('id', $booking->id)->update([
            'verify'             => $request->input('booking_verify'),
        ]);

//        Mail::to($user->email)->send(new \App\Mail\UserVerifyMail($user));
        return redirect()->route('my-vehicle-bookings.show', compact('booking'))->with('alert.success', 'Booking Successfully Verified !!');

    }
}
