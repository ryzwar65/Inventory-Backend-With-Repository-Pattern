<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Repositories\IUser;
use App\Http\Services\UserServices;
use App\Http\Repositories\IAuth;
use App\Http\Services\AuthServices;

class RepositoryProviders extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->when(UserController::class)
          ->needs(IUser::class)
          ->give(function () {
              return new UserServices();
          });
        $this->app->when(AuthController::class)
          ->needs(IAuth::class)
          ->give(function () {
              return new AUthServices();
          });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
