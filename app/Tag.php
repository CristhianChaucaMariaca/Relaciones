<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        /* Relacion polimorfica para muchos a muchos desde la entidad madre */
        return $this->morphedByMany(Post::class,'taggable');
    }

    public function videos(){
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
