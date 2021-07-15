<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Models\User as User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Добавление нового пользователя
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request){

        $user = new User();
        $userHelper = new UserHelper();

        $user = $userHelper->secureAllData($request, $user);

        $user->save();

        return response()->json($user);

    }

    /**
     * Показ одного пользователя
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id){

        $user = User::select('name', 'last_name', 'accept_mailing')->find($id);
        return response()->json(!empty($user) ? $user : null);

    }

    /**
     * Редактирование пользователя
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, int $id){

        $userHelper = new UserHelper();

        $user = User::find($id);

        if(empty($user))
            return response('Указанная запись не найдена.', 404);

        $user = $userHelper->secureUpdatableData($request, $user);

        $user->save();

        return response()->json($user);

    }
}
