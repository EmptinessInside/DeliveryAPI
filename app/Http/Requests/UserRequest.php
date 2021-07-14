<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'accept_mailing' => 'required|boolean',
        ];

        switch ($this->getMethod()){
            //Создание пользователя
            CASE 'POST' :
                return $rules + [
                        'email' => 'required|string|max:200',
                        'password' => 'required|string|min:6|max:200'
                    ];
            //Редактирование пользователя
            CASE 'PUT' || 'PATCH' :
                return $rules;
        }
    }

}
