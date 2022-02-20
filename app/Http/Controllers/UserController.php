<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Repositories\IUser;

class UserController extends Controller
{
    //

    private $userService;

    public function __construct(IUser $userService){
        $this->userService = $userService;
    }

    public function getAll(){
        return $this->userService->getAll();
    }

    public function getId($id){
        return $this->userService->getId($id);        
    }

    public function save(UserRequest $request){
        // return $request->validated();
    }
}
