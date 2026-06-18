<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    
    public $fillable =[
        'nombre',
        'email',
        'password',
        'nickname',
        'Modelo',
        'Estado'
    ];

     public function temas(){
        return $this->hasMany('App\Models\Publicaciones');
    }

    public function publicaciones(){
        return $this->hasMany('App\Models\Publicaciones');
     }
}
