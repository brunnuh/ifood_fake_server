<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeUser extends Model
{
    protected $table = "code_user";

    protected $fillable = ["code"];

    public function user()
    {
        return $this->hasOne(User::class, "code_id");
    }
}
