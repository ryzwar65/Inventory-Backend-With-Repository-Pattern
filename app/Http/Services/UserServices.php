<?php

namespace App\Http\Services;

use App\Http\Repositories\IUser;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;
use App\Http\Resources\UserResource;
use Hash;

class UserServices implements IUser{
    public function getAll(){
        try {  
            return UserResource::collection(User::paginate())->additional(["message"=>"Successfully"]);   
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json($th->getMessage(), 500));
        }
    }
    public function getId($id){
        try {
            return (new UserResource(User::find($id)))->additional(["message"=>"Successfully"]);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json($th->getMessage(), 500));
        }
    }
    public function create($data){
 
    }
    public function update($data,$id){

    }
    public function delete($id){

    }
}