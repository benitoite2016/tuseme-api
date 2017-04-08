<?php

namespace App\Http\Controllers;

use App\Models\Kaya;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        $users = User::all();

        return $users;
    }

    public function login(Request $request){
            $matchThese = ['phone_number'=>$request->phone_number,'password'=>$request->password];
            $user = User::where($matchThese)->get();

            return response($user,200);
    }

    public function store(Request $request){
        $user = new User();
        $user->first_name = $request->first_name;
        $user->surname = $request->surname;
        $user->birth_day = $request->birth_day;
        $user->password = $request->password;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->role = 1;
        $user->kaya()->associate($request->kaya_id);
        $user->save();

        return response($user,200);

    }
}
