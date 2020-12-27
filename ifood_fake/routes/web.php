<?php

use Illuminate\Support\Facades\Route;

Route::get("test", function (){
   dd(auth()->user()->isAdmin());
});
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
     * Routes Permissios
     */

    Route::resource("permissions", "PermissionController")->middleware("can:permissions");

    /*
     * Routes Users
     */
    Route::get("users", "UserController@index")->name("users.index")->middleware("can:users");
    Route::get("users/create", "UserController@create")->name("users.create")->middleware("can:users");
    Route::post("users", "UserController@store")->name("users.store")->middleware("can:users");
    Route::delete("users/{id}", "UserController@destroy")->name("users.destroy")->middleware("can:users");
    Route::post("users/{user_id}/detach/{permission_id}", "UserController@detachPermission")->name("users.detach")->middleware("can:users");
    Route::get("users/index_permissions/{id}", "UserController@indexPermissions")->name("users.index_permissions")->middleware("can:users");
    Route::get("users/getPermissions/{id}", "UserController@getPermissions")->name("users.getPermissions")->middleware("can:users");
    Route::post("users/put_permissions/{id}", "UserController@putPermissions")->name("users.put_permissions")->middleware("can:users");
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
    Route::put("restaurants/{cnpj}/modify_operating", "RestaurantController@modifyStatus")->name("restaurants.modify_operating")->middleware("can:restaurants");
    Route::resource("restaurants", "RestaurantController")->middleware("can:restaurants");

});

Auth::routes();

