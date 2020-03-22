<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    /* Un GRUPO tiene y pertenece a muchos USUARIOS */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps(); /* ->withTimestamps() este metodo llena los campos de fecha de creacion y actualizacion de forma automatica */
    }
}
