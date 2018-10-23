<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller {
    
    public function signUp(Request $request){
        $this->validate(
            $request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]
            );
            $user = new User();
            $user->name = $request->input('name');
            $user->password = bcrypt($request->input('password'));
            $user->email = $request->input('email');
            $user->save();
            return response()->json(['message'=>'Successfully created'],201);

    }

    public function signIn(Request $request){
        $this->validate(
            $request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $credentials = $request->only('email', 'password');
            try{
                if(!$token = JWTAuth::attempt($credentials)){
                    return response()->json(['error'=> 'Invalid credentials'], 401);
                }

            }catch(JWTException $e){
                return response()->json(['error'=>'Could not create token']
                , 500);

            }
            return response()->json(['token'=> $token], 200);

    }

}
