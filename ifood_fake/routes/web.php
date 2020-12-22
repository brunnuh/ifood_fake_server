<?php

use Illuminate\Support\Facades\Route;


Route::namespace("Admin\Web")->prefix("admin")->group(function (){

    /*
     * Routes Clients
     */
    Route::get("clients", "ClientController@index")->name("clients.index");
    Route::get("clients/create", "ClientController@create")->name("clients.create");
    Route::post("clients", "ClientController@store")->name("clients.store");
    Route::delete("clients/{id}", "ClientController@destroy")->name("clients.destroy");

    /*
     * Routes Address_Client
     */
    Route::post("address_client/{id}", "AddressClientController@store")->name("address_client.store");
    Route::get("address_client/{id}", "AddressClientController@create")->name("address_client.create");



    /*
     * Routes Categories
     */

    //Route::get("categories", "CategoryController@index")->name("categories.index");

});
