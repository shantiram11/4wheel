<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Photo;
class PhotosController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $columns = array(
                0 => 'image',
                0 => 'vehicle_number',
                6 => 'action'
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('photos as p')
                ->join('vehicles as v', 'v.id', 'p.vehicle_id')
                ->select(
                    'v.image',
                    'p.vehicle_number as vehicle_number'
                );
            $query->where('p
            p.vehicle_number', 'like', $search . '%');
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
                    $nestedData['vehicle_number'] = $v->vehicle_number;
                    $nestedData['image'] = "<img class='img-fluid ks-mw-150' src='".asset('storage/uploads/photos/'.$v->image)."'/>";
                    $nestedData['action'] = \View::make('dashboard.photos._action')->with('r',$v)->render();
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
        return view('dashboard.photos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle = new Vehicle();
        return view('dashboard.vehicles.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create([
            'company_name'              => $request->input('company_name'),
            'fuel_type'                 => $request->input('fuel_type'),
            'vehicle_number'            => $request->input('vehicle_number'),
            'description'               => $request->input('description'),
            'location'                  => $request->input('location'),
            'status'                    => $request->input('status'),
            'brand'                     => $request->input('brand'),
            'seat_count'                => $request->input('seat_count'),
            'owner_id'                  => auth()->user()->id,
        ]);

        return redirect()->route('vehicles.show', compact('vehicle'))->with('alert.success', 'User Successfully Created !!');

    }

    /**
     * Display the specified resource.
     *
     * @param Vehicle $vehicle
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Vehicle $vehicle)
    {
        return view('dashboard.vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
