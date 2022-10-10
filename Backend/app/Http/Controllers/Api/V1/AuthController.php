<?php

namespace App\Http\Controllers\Api\V1;

use Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\FindUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    public function store(StoreUserRequest $request)
    {   
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $newUser = $user->save();

        if($newUser){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    function check(FindUserRequest $request){
        $userInfo = User::where('email','=', $request->email)->first();
        
        if(!$userInfo){
            return back()->with('fail','Email not recognized');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $token = JWTAuth::fromUser($userInfo);

                return Response::json(compact('token'));
            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    public function delete(Request $request)
    {   
        User::destroy($request->id);
    }
}
