<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function store(UserRequest $request){

        $user = new User();

        $user->name = addslashes(htmlspecialchars($request->name));
        $user->last_name = addslashes(htmlspecialchars($request->last_name));
        $user->email = addslashes(htmlspecialchars($request->email));
        $user->accept_mailing = (boolean)$request->accept_mailing;
        $user->password = bcrypt($request->password);

        $user->save();

        return response()->json($user);

    }

    public function show(int $id){

        $user = User::select('name', 'last_name', 'accept_mailing')->find($id);
        return !empty($user) ? $user : null;

    }

    public function update(UserRequest $request, int $id){

        $user = User::findOrFail($id);
        $user->fill($request->except($id));

        $user->name = addslashes(htmlspecialchars($request->name));
        $user->last_name = addslashes(htmlspecialchars($request->last_name));
        $user->accept_mailing = (boolean)$request->accept_mailing;

        $user->save();

        return response()->json($user);

    }
}
