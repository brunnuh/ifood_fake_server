<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = "address";
    protected $fillable = ["user_id", "street", "neighborhood", "number_house", "complements", "city", "state", "reference_point", "favorite_like"];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
