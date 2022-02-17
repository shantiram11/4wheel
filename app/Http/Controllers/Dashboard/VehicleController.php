<?php

namespace App\Http\Controllers\Dashboard;
use App\Helpers\AppHelper;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
class VehicleController extends Controller
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
                0 => 'company_name',
                1 => 'vehicle_number',
                2 => 'description',
                3 => 'location',
                4 => 'status',
                5 => 'owner',
                6 => 'action'
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('vehicles as v')
                ->join('users as u', 'u.id', 'v.owner_id')
                ->select(
                    'v.id',
                    'v.company_name',
                    'v.vehicle_number',
                    'v.description',
                    'v.location',
                    'v.status',
                    'u.name as owner'
                );
            $query->where('v.company_name', 'like', $search . '%')
                ->orWhere('v.vehicle_number', 'like', $search . '%')
                ->orWhere('v.description', 'like', $search . '%')
                ->orWhere('u.name', 'like', $search . '%');
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
                    $nestedData['company_name'] = $v->company_name;
                    $nestedData['vehicle_number'] = $v->vehicle_number;
                    $nestedData['description'] = $v->description;
                    $nestedData['location'] = $v->location;
                    $nestedData['status'] = $v->status;
                    $nestedData['owner'] = $v->owner;
                    $nestedData['action'] = \View::make('dashboard.vehicles._action')->with('r',$v)->render();
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
        return view('dashboard.vehicles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create([
            'company_name'              => $request->input('company_name'),
            'fuel_type'                 => $request->input('fuel_type'),
            'vehicle_number'            => $request->input('vehicle_number'),
            'brand'                     => $request->input('brand'),
            'seat_count'                => $request->input('seat_count'),
            'description'               => $request->input('description'),
            'location'                  => $request->input('location'),
            'status'                    => $request->input('status'),
            'owner_id'                  => auth()->user()->id,
        ]);
//        dd($request->file('vehicle_photo'));
        $product_photos = $request->file('vehicle_photo');
        if($product_photos){
            foreach($product_photos as $image) {
                $imageName = AppHelper::renameImageFileUpload($image);
                $image->storeAs(
                    'public/uploads/vehicle', $imageName
                );
                Photo::create([
                    'image'          =>          $imageName,
                    'vehicle_id'     =>          $vehicle->id,
                    'store_type'     =>          Photo::STORE_TYPE_TEMPORARY,
                    'featured'       =>          Photo::NOT_FEATURED,
                ]);
            }
        }
        $featured_image = $request->file('featured_image');
        if($featured_image){
            $imageName = AppHelper::renameImageFileUpload($featured_image);
            $featured_image->storeAs(
                'public/uploads/vehicle', $imageName
            );
            Photo::create([
                'image'          =>          $imageName,
                'vehicle_id'     =>          $vehicle->id,
                'store_type'     =>          Photo::STORE_TYPE_TEMPORARY,
                'featured'       =>          Photo::FEATURED,
            ]);
        }

        return redirect()->route('vehicles.show', compact('vehicle'))->with('alert.success', 'User Successfully Created !!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::with('photos')->where('id', $id)->first();
        return view('dashboard.vehicles.show', compact('vehicle'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $users = User::pluck('name', 'id');

        return view('dashboard.vehicles.edit', compact('vehicle', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        User::where('id', $vehicle->id)->update([
            'company_name'              => $request->input('company_name'),
            'fuel_type'                 => $request->input('fuel_type'),
            'vehicle_number'            => $request->input('vehicle_number'),
            'brand'                     => $request->input('brand'),
            'seat_count'                => $request->input('seat_count'),
            'description'               => $request->input('description'),
            'location'                  => $request->input('location'),
            'status'                    => $request->input('status'),
            'owner_id'                  => auth()->user()->id,
            'updated_at'                => now(),
        ]);
        return redirect()->route('vehicles.show', compact('vehicle'))->with('alert.success', 'vehicle Successfully Updated !!');
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
