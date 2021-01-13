<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryRestaurant extends Model
{

    protected $table = "category_restaurant";

    protected $fillable = ["name"];

    protected $hidden = ["id"];


    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
