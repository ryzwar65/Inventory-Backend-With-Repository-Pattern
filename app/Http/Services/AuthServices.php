<?php

namespace App\Http\Services;

use App\Http\Repositories\IAuth;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;
use App\Http\Resources\AuthResources;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthServices implements IAuth{
    
    public function login($data){
        try {
            
            $user = User::where("email",$data['email'])->first();

            $token = JWTAuth::attempt($data);

            if(!$token = JWTAuth::attempt($data)){
                $error = (object) [
                    "error" => "Login Error",
                    "message" => "Credential Invalid"
                ];
                return (new AuthResources($error))->response()->setStatusCode(400);
            }

            
            $success = (object) [
                "token" => $token,
                "id" => $user->id
            ];

            return new AuthResources($success);
            
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json($th->getMessage(), 500));
        }
    }

    public function register($data){
        try {
            $user = new User();
            $user->firstname = $data->firstname;
            $user->lastname = $data->lastname;
            $user->email = $data->email;
            $user->address = $data->address;
            $user->phone = $data->phone;
            $user->password = \Hash::make($data->password);
            $user->save();
            
            $credential = (object) ["email" => $data->email, "password" => $data->password];

            $token = JWTAuth::attempt($credential);
            
            $success = (object) [
                "token" => $token,
                "id" => $user->id
            ];

            return new AuthResources($success);

        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json($th->getMessage(), 500));
        }
    }
}