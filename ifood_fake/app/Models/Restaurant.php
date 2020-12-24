<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ["image", "name", "phone", "status_operating", "note"];
    protected $primaryKey = "cnpj";

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
