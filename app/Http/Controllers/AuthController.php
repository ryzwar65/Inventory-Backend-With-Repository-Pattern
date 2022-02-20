<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Http\Repositories\IAuth;

class AuthController extends Controller
{
    //
    private $authService;

    public function __construct(IAuth $authService){
        $this->authService = $authService;
    }

    public function login(AuthRequest $request){
        return $this->authService->login($request->validated());
    }

    public function register(UserRequest $request){
        return $this->authService->register($request->validated());
    }
}
