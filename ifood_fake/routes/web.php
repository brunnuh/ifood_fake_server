<?php

use Illuminate\Support\Facades\Route;


Route::namespace("Admin\Web")->prefix("admin")->group(function (){
    Route::get("clients", "ClientController@index")->name("clients.index");
    Route::get("clients/create", "ClientController@create")->name("clients.create");
    Route::post("clients", "ClientController@store")->name("clients.store");
    Route::delete("clients/{id}", "ClientController@destroy")->name("clients.destroy");
});
