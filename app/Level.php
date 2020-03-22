<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /* Un NIVEL tiene muchos USUARIOS */
    public function users(){
        return $this->hasMany(User::class);
    }
}
