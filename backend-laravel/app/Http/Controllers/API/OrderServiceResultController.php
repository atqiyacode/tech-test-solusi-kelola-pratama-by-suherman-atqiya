<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderServiceResultRequest;
use App\Http\Resources\OrderResource;
use App\Models\OrderServiceResult;
use Illuminate\Http\Request;

class OrderServiceResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderServiceResultRequest $request)
    {
        $order = new OrderServiceResult();
        $order->order_id = $request->order_id;
        $order->result = json_encode($request->result);
        $order->save();
        return response()->json([
            'status' => trans('messages.response.success'),
            'data' => new OrderResource($order),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderServiceResult  $orderServiceResult
     * @return \Illuminate\Http\Response
     */
    public function show(OrderServiceResult $orderServiceResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderServiceResult  $orderServiceResult
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderServiceResult $orderServiceResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderServiceResult  $orderServiceResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderServiceResult $orderServiceResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderServiceResult  $orderServiceResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderServiceResult $orderServiceResult)
    {
        //
    }
}
