<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::namespace("Api")->group(function (){
    Route::post("verifycode", "LoginController@verifycode");
    Route::post("loginwithcode", "LoginController@loginwithcode");
});
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
