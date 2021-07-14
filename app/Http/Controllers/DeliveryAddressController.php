<?php

namespace App\Http\Controllers;

use App\Helpers\DeliveryAddressHelper;
use App\Http\Requests\DeliveryAddressRequest;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;

class DeliveryAddressController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliveryAddressRequest $request)
    {
        $deliveryAddress = new DeliveryAddress();
        $deliveryAddressHelper = new DeliveryAddressHelper();

        $deliveryAddress = $deliveryAddressHelper->secureData($request, $deliveryAddress);

        $deliveryAddress->save();

        return response()->json($deliveryAddress);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeliveryAddressRequest $request, int $id)
    {
        $deliveryAddress = DeliveryAddress::findOrFail($id);
        $deliveryAddressHelper = new DeliveryAddressHelper();

        $deliveryAddress = $deliveryAddressHelper->secureData($request, $deliveryAddress);

        $deliveryAddress->save();

        return response()->json($deliveryAddress);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return response()->json(DeliveryAddress::where('id', $id)->delete());
    }
}
