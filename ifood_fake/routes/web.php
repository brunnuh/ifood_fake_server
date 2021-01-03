<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get("test", function (){
   Mail::send('test', ['senha_temporaria' => '1234'], function ($m){
       $m->from(env('MAIL_USERNAME'), env('bruno'));
       $m->to('buhsantos16@gmail.com');
   });

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
    Route::get("users", "UserController@index")->name("users.index")->middleware("can:Usuarios");
    Route::get("users/create", "UserController@create")->name("users.create")->middleware("can:Usuarios");
    Route::post("users", "UserController@store")->name("users.store")->middleware("can:Usuarios");
    Route::delete("users/{id}", "UserController@destroy")->name("users.destroy")->middleware("can:Usuarios");
    Route::post("users/{user_id}/detach/{permission_id}", "UserController@detachPermission")->name("users.detach")->middleware("can:Usuarios");
    Route::get("users/index_permissions/{id}", "UserController@indexPermissions")->name("users.index_permissions")->middleware("can:Usuarios");
    Route::get("users/getPermissions/{id}", "UserController@getPermissions")->name("users.getPermissions")->middleware("can:Usuarios");
    Route::post("users/put_permissions/{id}", "UserController@putPermissions")->name("users.put_permissions")->middleware("can:Usuarios");
    /*
     * Routes Address
     */
    Route::put("address/{id}", "AddressController@update")->name("address.update");
    Route::post("address/{id}", "AddressController@store")->name("address.store");
    Route::get("address/{id}", "AddressController@create")->name("address.create");



    /*
     * Routes Categories
     */
    Route::put("categories/{id}","CategoryController@update")->name("categories.update")->middleware("can:Categorias");
    Route::get("categories", "CategoryController@index")->name("categories.index")->middleware("can:Categorias");
    Route::get("categories/create", "CategoryController@create")->name("categories.create")->middleware("can:Categorias");
    Route::get("categories/{id}","CategoryController@edit")->name("categories.edit")->middleware("can:Categorias");
    Route::post("categories", "CategoryController@store")->name("categories.store")->middleware("can:Categorias");


    /*
     * Routes Products
     */
    Route::resource("products", "ProductController")->middleware("can:Produtos");

    /*
     * Routes Restaurants
     */
    Route::get("restaurants/new", "RestaurantController@indexRestaurant")->name("restaurants.new")->middleware("can:Criar Restaurante");;
    Route::post("restaurants/new", "RestaurantController@newRestaurant")->name("restaurants.new")->middleware("can:Criar Restaurante");;
    Route::put("restaurants/{cnpj}/modify_operating", "RestaurantController@modifyStatus")->name("restaurants.modify_operating")->middleware("can:Restaurantes");
    Route::resource("restaurants", "RestaurantController")->middleware("can:restaurants")->middleware("can:Criar Restaurante");

});

Route::get("/", function (){
    return view("home");
});

Auth::routes();

