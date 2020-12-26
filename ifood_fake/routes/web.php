<?php

use Illuminate\Support\Facades\Route;


Route::namespace("Admin\Web")
    ->prefix("admin")
    ->middleware("auth")
    ->group(function (){

    /*
     * Routes Home
     */
    Route::get("/home", function (){
        return view("admin.pages.home");
    })->name("admin.home");

    /*
     * Routes Users
     */
    Route::get("users", "UserController@index")->name("users.index");
    Route::get("users/create", "UserController@create")->name("users.create");
    Route::post("users", "UserController@store")->name("users.store");
    Route::delete("users/{id}", "UserController@destroy")->name("users.destroy");

    /*
     * Routes Address
     */
    Route::put("address/{id}", "AddressController@update")->name("address.update");
    Route::post("address/{id}", "AddressController@store")->name("address.store");
    Route::get("address/{id}", "AddressController@create")->name("address.create");



    /*
     * Routes Categories
     */
    Route::put("categories/{id}","CategoryController@update")->name("categories.update");
    Route::get("categories", "CategoryController@index")->name("categories.index");
    Route::get("categories/create", "CategoryController@create")->name("categories.create");
    Route::get("categories/{id}","CategoryController@edit")->name("categories.edit");
    Route::post("categories", "CategoryController@store")->name("categories.store");


    /*
     * Routes Products
     */
    Route::resource("products", "ProductController");

    /*
     * Routes Restaurants
     */
    Route::put("restaurants/{cnpj}/modify_operating", "RestaurantController@modifyStatus")->name("restaurants.modify_operating");
    Route::resource("restaurants", "RestaurantController");

});

Auth::routes();

