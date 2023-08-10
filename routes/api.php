<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(AuthenticationController::class)->group(function() {
  Route::post('/register', 'register');
  Route::post('/login', 'login');
});


Route::middleware('auth:api')->group(function(){
  Route::post('/logout',[AuthenticationController::class,'logout']);
  Route::resource('products',ProductController::class);
});