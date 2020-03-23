<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Un USUARIO tiene un PERFIL */
    public function profile(){
        /* Realizamos la relacion con un perfil de un usuario */
        return $this->hasOne(Profile::class);
    }

    /* Un USUARIO pertenece a un NIVEL */
    public function level(){
        return $this->belongsTo(Level::class);
    }

    /* Un USUARIO pertenece y tiene muchos GRUPOS */
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps(); /* ->withTimestamps() este metodo llena los campos de fecha de creacion y actualizacion de forma automatica */
    }

    /* En esta relacion accederemos a la tabla LOCALIZACION desde USUARIOS de forma directa a travez de la tabla perfil sin tener que nombrar a perfil */
    public function location(){
        return $this->hasOneThrough(Location::class, Profile::class); /* Tengo una LOCALIZACION a travez de PERFIL */
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
