<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ["user_id", "category_restaurant_id", "image", "name", "phone", "status_operating", "note"];
    protected $primaryKey = "cnpj";


    protected $hidden = ["user_id", "cnpj", "created_at", "updated_at", "category_restaurant_id"];



    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category_restaurant()
    {
        return $this->belongsTo(CategoryRestaurant::class);
    }
}
