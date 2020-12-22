<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ["full_name", "cpf", "email", "phone", "password"];

    protected $hidden = ["password"];

    public function address()
    {
        return $this->hasOne(Address_Client::class);
    }
}
