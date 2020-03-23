<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable(){
        /* Metodo de polimorfismo uno a uno & uno a mucho usa la misma configuracion */
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
