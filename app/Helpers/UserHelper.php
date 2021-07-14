<?php


namespace App\Helpers;


use App\Http\Requests\UserRequest;
use App\Models\User;

class UserHelper
{
    public function secureAllData(UserRequest $request, User $user){

        $user->name = addslashes(htmlspecialchars($request->name));
        $user->last_name = addslashes(htmlspecialchars($request->last_name));
        $user->email = addslashes(htmlspecialchars($request->email));
        $user->accept_mailing = (boolean)$request->accept_mailing;
        $user->password = bcrypt($request->password);

        return $user;
    }

    public function secureUpdatableData(UserRequest $request, User $user){
        $user->name = addslashes(htmlspecialchars($request->name));
        $user->last_name = addslashes(htmlspecialchars($request->last_name));
        $user->accept_mailing = (boolean)$request->accept_mailing;

        return $user;
    }
}
