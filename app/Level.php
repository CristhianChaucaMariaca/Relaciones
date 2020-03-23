<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /* Un NIVEL tiene muchos USUARIOS */
    public function users(){
        return $this->hasMany(User::class);
    }

    public function posts(){
        /* Tiene mucho Posts a travez de Usuarios */
        return $this->hasManyThrough(Post::class, User::class);
    }

    public function videos(){
        return $this->hasManyThrough(Video::class, User::class);
    }
}
