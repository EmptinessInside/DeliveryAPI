<?php


namespace App\Helpers;


use App\Http\Requests\DeliveryAddressRequest;
use App\Models\DeliveryAddress;

class DeliveryAddressHelper
{
    public function secureData(DeliveryAddressRequest $request, DeliveryAddress $deliveryAddress){
        $deliveryAddress->region = addslashes(htmlspecialchars($request->region));
        $deliveryAddress->locality = addslashes(htmlspecialchars($request->locality));
        $deliveryAddress->street = addslashes(htmlspecialchars($request->street));
        $deliveryAddress->house = addslashes(htmlspecialchars($request->house));
        $deliveryAddress->index = (int)$request->index;
        $deliveryAddress->user_id = (int)$request->user_id;

        return $deliveryAddress;
    }
}
