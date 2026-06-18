<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tema;
use App\Models\Categoria;
use App\Models\Usuario;
use Auth;
use Illuminate\Http\Client\Request as ClientRequest;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $datos = Tema::all();
      return view('temas/index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categoria::all();
        return view('temas/new', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //dd($request-> all());
        $validador = $request->validate([ 
            'titulo' => 'required|max:255',
            'fecha' =>  'required',
            'texto' => 'required|max:1000',
            'usuario_id' => 'required|max:20',
            'categoria_id' => 'required|max:20',
            ]);

            $resultado = Tema::create($request->all());

            if($resultado){
            return redirect('temas')->with('type','success')
                                       ->with('message','Registro
                                       creado correctamente');
            }
            else {
            return redirect('temas')->with('type','warning')
                                       ->with('message','El registro
                                       no se creo');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $categoria = Tema::find($id);
        return view('temas.edit',compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}