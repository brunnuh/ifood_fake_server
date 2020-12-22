<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address_Client extends Model
{

    protected $table = "address_client";
    protected $fillable = ["client_id", "street", "neighborhood", "number_house", "complements", "city", "state", "reference_point", "favorite_like"];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
