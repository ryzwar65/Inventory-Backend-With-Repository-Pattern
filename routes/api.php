<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('auth')->group(function () {
    Route::post('/login','AuthController@login');
    Route::post('/register','AuthController@register');    
});
Route::middleware(['jwt.verify'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', 'UserController@getAll');
        Route::get('/{id}', 'UserController@getId');
    });
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
