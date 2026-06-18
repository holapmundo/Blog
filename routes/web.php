<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TemaController;


Route::get('/', function () {
    return view('login');
});

Route::resource('usuarios', UsuarioController ::class);

//RUTAS DE CATEGORIAS

Route::get('categorias/home', [CategoriaController::class, 'index'])
    ->name('categorias.home');

Route::get('categorias/listado', [CategoriaController::class, 'listado'])
   ->name('categorias.listado');
    
Route::resource('categorias',CategoriaController::class);


//RUTAS DE TEMAS

Route::resource('temas', TemaController::class);

//RUTA LOGIN DE IA

Route::get('login', function () {
    return view('login');
});

Route::get('chek',[UsuarioController::class,'ValidarLogin']//->name('chek')
);
Route::resource('usuarios',UsuarioController::class);
Route::resource('categorias',CategoriaController::class);
Route::resource('temas',TemaController::class);