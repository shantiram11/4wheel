<?php

namespace App\Http\Controllers\Customer;
use App\Helpers\AppHelper;
use App\Http\Requests\VehicleRequest;
use App\Models\Category;
use App\Models\Photo;
use Codebyray\ReviewRateable\Models\Rating;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            $query->where('v.owner_id',Auth::user()->id);
            $query->where(function ($q) use ($search) {
                $q->where('v.company_name', 'like', $search . '%')
                    ->orWhere('v.vehicle_number', 'like', $search . '%')
                    ->orWhere('v.description', 'like', $search . '%')
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
                    $nestedData['company_name'] = $v->company_name;
                    $nestedData['vehicle_number'] = $v->vehicle_number;
                    $nestedData['description'] = $v->description;
                    $nestedData['location'] = $v->location;
                    $nestedData['status'] = $v->status;
                    $nestedData['owner'] = $v->owner;
                    $nestedData['action'] = \View::make('customer_dashboard.vehicles._action')->with('r',$v)->render();
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
        return view('customer_dashboard.vehicles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Vehicle $vehicle)
    {
        $vehicle = new Vehicle();
        $vehicle_options = Category::pluck('name', 'id');
        $fuel_options = Vehicle::FUEL_OPTIONS;
        return view('customer_dashboard.vehicles.create', compact('vehicle','vehicle_options','fuel_options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VehicleRequest $request)
    {
//        dd($request->all());
        $company_name = $request->input('company_name');
        $vehicle = Vehicle::create([
            'company_name'              => $request->input('company_name'),
            'slug'                      => Str::slug($company_name),
            'fuel_type'                 => $request->input('fuel_type'),
            'vehicle_number'            => $request->input('vehicle_number'),
            'brand'                     => $request->input('brand'),
            'category_id'              => $request->input('vehicle_type'),
            'model'                     => $request->input('model'),
            'rate'                      => $request->input('rate'),
            'seat_count'                => $request->input('seat_count'),
            'description'               => $request->input('description'),
            'location'                  => $request->input('location'),
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
        return redirect()->route('customerVehicles.show', compact('vehicle'))->with('alert.success', 'User Successfully Created !!');

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
//        $vehicle_images = $vehicle->photos->where('featured','no');
//        $featured_image = $vehicle->photos->where('featured','yes')->first();
        return view('customer_dashboard.vehicles.show', compact('vehicle'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $users = User::pluck('name', 'id');
        $vehicle_options = Category::pluck('name', 'id');
        $fuel_options = Vehicle::FUEL_OPTIONS;
        return view('customer_dashboard.vehicles.edit', compact('vehicle', 'users','vehicle_options','fuel_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VehicleRequest $request, $id)
    {
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->update([
            'company_name'              => $request->input('company_name'),
            'fuel_type'                 => $request->input('fuel_type'),
            'vehicle_number'            => $request->input('vehicle_number'),
            'brand'                     => $request->input('brand'),
            'rate'                     => $request->input('rate'),
            'seat_count'                => $request->input('seat_count'),
            'description'               => $request->input('description'),
            'location'                  => $request->input('location'),
            'status'                    => $request->input('status') ?? 'available',
            'owner_id'                  => auth()->user()->id,
            'updated_at'                => now(),
        ]);
        return redirect()->route('customerVehicles.show',$vehicle->id)->with('alert.success', 'vehicle Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Vehicle::where('id', $id)->delete();
        return response()->json([
            'message' => 'User Successfully Deleted',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeImage($id)
    {
        $photo = Photo::where('id', $id)->first();
        DB::beginTransaction();
        try{
            Storage::delete('public/uploads/vehicle/'.$photo->image);
            Photo::where('id', $id)->delete();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => 'Could not remove image',
            ], 500);
        }
        DB::commit();
        return response()->json([
            'message' => 'Image Successfully Removed',
        ], 200);
    }


}
