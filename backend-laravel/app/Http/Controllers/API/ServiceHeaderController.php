<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ServiceHeader;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceHeaderRequest;
use App\Http\Requests\UpdateServiceHeaderRequest;
use App\Http\Resources\ServiceHeaderResource;

class ServiceHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ServiceHeader::active()->with(['details'])
            ->withCount(['details'])
            ->paginate($request->per_page ?? 10)
            ->appends(request()->query());
        return response()->json([
            'status' => trans('messages.response.success'),
            'data' => ServiceHeaderResource::collection($data),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceHeaderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceHeader  $serviceHeader
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ServiceHeader::active()->with(['details'])
            ->withCount(['details'])
            ->where('id', $id)
            ->firstOrFail();
        return response()->json([
            'status' => trans('messages.response.success'),
            'data' => new ServiceHeaderResource($data),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceHeader  $serviceHeader
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceHeaderRequest $request, ServiceHeader $serviceHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceHeader  $serviceHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceHeader $serviceHeader)
    {
        //
    }
}
