<?php

namespace App\Http\Repositories;

interface IAuth {
    public function login($data);
    public function register($id);
}