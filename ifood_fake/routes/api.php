<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::namespace("Api")->group(function (){

    /*
     *  Login
     */
    Route::post("verifycode", "LoginController@verifycode");
    Route::post("loginwithcode", "LoginController@loginwithcode");

    /*
     * Products
     */

    Route::resource("products", "ProductController");


    /*
     * Restaurants
     */

    Route::resource("restaurants", "RestaurantController");


    /*
     * CategoriesRestaurants
     */

    Route::post("categories_restaurant/{id}", "CategoryRestaurantController@show");
});
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
