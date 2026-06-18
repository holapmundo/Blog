<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';

    public $fillable = [
        'comenrtario',
        'fecha',
        'usuario_id',
        'tema_id'
    ];

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
    public function tema(){
        return $this->belongsTo('App\Models\Tema');
     }
}
