<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    public $fillable= [
        'titulo',
        'fecha',
        'texto',
        'usuario_id',
        'categoria_id',
    ];

    //relacion con usuario muchos a uno
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
    //relacion con categoria uno a muchos
    public function publicaciones(){
        return $this->hasMany('App\Models\Publicacion');
    }
}
