<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Models\User as User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function store(UserRequest $request){

        $user = new User();
        $userHelper = new UserHelper();

        $user = $userHelper->secureAllData($request, $user);

        $user->save();

        return response()->json($user);

    }

    public function show(int $id){

        $user = User::select('name', 'last_name', 'accept_mailing')->find($id);
        return !empty($user) ? $user : null;

    }

    public function update(UserRequest $request, int $id){

        $userHelper = new UserHelper();

        $user = User::findOrFail($id);
        $user = $userHelper->secureUpdatableData($request, $user);

        $user->save();

        return response()->json($user);

    }
}
