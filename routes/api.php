<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//AUTH                                      
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/me', 'AuthController@me');
Route::post('/logout', 'AuthController@logout');
//auth middleware in Constructor of AuthController is added. If not, I need to put me and logoute routes inside the Route::middleware('auth:api') group

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    //CRUD
    Route::apiResource('/posts', 'PostController');

});