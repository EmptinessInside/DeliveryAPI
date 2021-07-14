<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'region' => 'required|string|max:200',
            'locality' => 'required|string|max:200',
            'street' => 'required|string|max:200',
            'house' => 'required|string|max:10',
            'index' => 'required|integer|min:100000|max:999999'
        ];
    }

    //TODO Кастомные сообщения
}
