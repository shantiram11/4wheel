<?php

namespace App\Http\Controllers\Api;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use Symfony\Component\HttpFoundation\Response;

use App\Interfaces\LocationRepositoryInterface;
use App\Models\Location;
use Illuminate\Support\Str;

class LocationController extends Controller
{

    private $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        //  $this->authorize('view',Location::class);
        $meta = AppHelper::defaultTableInput($request->only(['page', 'perPage', 'order', 'dir', 'searchCol','search']));
        $resp = $this->locationRepository->paginatedWithQuery($meta);
        return response()->json([
            'data'      => LocationResource::collection($resp['results']),
            'meta'      => $resp['meta']
        ],200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create',Location::class);
        return response([
            'additionalFormData' => $this->getAdditionalDataForForm()
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
//        $input = $request->only('longitude','latitude');

        $location = Location::create([
            'latitude'  => $request->input('latitude'),
            'longitude'  => $request->input('longitude'),
        ]);

//        $location = $/this->locationRepository->store($input);
        return response([
            'data'     => new LocationResource($location),
            'message'  => __('crud.created'),
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view',Location::class);
        $location = $this->locationRepository->find($id);
        return response(new LocationResource($location),Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update',Location::class);
        $location = $this->locationRepository->find($id);
        return response([
            'location'  => $location,
            'additionalFormData' => $this->getAdditionalDataForForm()
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, Location $location)
    {
        $this->authorize('update',Location::class);
        $input = $request->only('longitude','latitude');
        $updatedLocation = $this->locationRepository->update($input, $location);
        return response([
            'data'     => new LocationResource($updatedLocation),
            'message'  => __('crud.updated'),
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        // $this->authorize('destroy',Location::class);
        $this->locationRepository->delete($location);
        return response([],204);
    }
}
