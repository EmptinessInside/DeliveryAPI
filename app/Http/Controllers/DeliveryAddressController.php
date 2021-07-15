<?php

namespace App\Http\Controllers;

use App\Helpers\DeliveryAddressHelper;
use App\Http\Requests\DeliveryAddressRequest;
use App\Models\DeliveryAddress;

class DeliveryAddressController extends Controller
{

    /**
     * Добавление нового адреса доставки для пользователя
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
     * Обновление адреса доставки
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeliveryAddressRequest $request, int $id)
    {
        $deliveryAddress = DeliveryAddress::find($id);

        if(empty($deliveryAddress))
            return response('Указанная запись не найдена.', 404);

        $deliveryAddressHelper = new DeliveryAddressHelper();

        $deliveryAddress = $deliveryAddressHelper->secureData($request, $deliveryAddress);

        $deliveryAddress->save();

        return response()->json($deliveryAddress);
    }

    /**
     * Удаление адреса доставки
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response_status = 200;
        $message = 'Запись была удалена.';

        $status = DeliveryAddress::where('id', $id)->delete();

        if(!$status){
            $message = 'Указанная запись не существует.';
            $response_status = 422;
        }

        return response($message,$response_status);
    }
}
