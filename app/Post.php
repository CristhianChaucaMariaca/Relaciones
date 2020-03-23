<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class); /* belongsTo "Pertenece A:" */
    }

    public function category()
    {
        return $this->belongsTo(Category::class);/* belongsTo "Pertenece A:" */
    }

    public function comments(){
        /* hasMany polimorfico */
        return $this->morphMany(Comment::class, 'commentable'); /* morphMany relacion POLIMORFICA de tiene muchos | 'commentable' es el campo que usamos en el campo de tipo MORPHS para la relacion polimorfica */
    }

    public function image(){
        /* hasOne Polimorfico */
        return $this->morphOne(Image::class,'imageable');
    }

    public function tags(){
        /* belongsToMany Polimorfico */
        return $this->morphToMany(Tag::class,'taggable');
    }
}
