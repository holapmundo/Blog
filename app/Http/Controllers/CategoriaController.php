<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Categorias.home');
    }

    public function listado()
    {
        $datos = Categoria::all();
        return view('Categorias.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Categorias.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validador = $request->validate([
        //     'nombre' => 'required|max:150',
        //     'descripcion' => 'required|max:150',
        // ]);

        $registro = Categoria::create($request->only('nombre', 'descripcion'));

        if ($registro) {
            return redirect()->route('categorias.listado')
                             ->with('type', 'success')
                             ->with('message', 'Registro creado correctamente');
        } else {
            return redirect()->route('categorias.listado')
                             ->with('type', 'warning')
                             ->with('message', 'Error al crear el registro');
        }
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd($id);
        $categoria = Categoria::find($id);
        return view('Categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
  //  dd($request->all(), $id);
    $validador = $request->validate([
        'nombre'      => 'required|max:150',
        'descripcion' => 'required|max:150',
    ]);

    $categoria = Categoria::find($id);
        if ($categoria) {
        $categoria->update($validador);
        return redirect()->route('categorias.listado')
                         ->with('type', 'success')
                         ->with('message', 'Registro modificado correctamente');
          } else {
            return redirect()->route('categorias.listado')
                         ->with('type', 'warning')
                         ->with('message', 'Error al modificar el registro');
  }
}
    /**
     * Remove the specified resource from storage.
     */
     
    public function destroy(string $id)
    {
        $fila = Categoria::find($id);
        $registro = $fila->delete();

        if($registro){
            return redirect()->route('categorias.listado')->with('type','danger')
                             ->with('message','Registro eliminado correctamente');

        }else{
            return redirect()->route('categorias.listado')->with('type','warning')
                             ->with('message','Error al eliminar el registro');
        }    
    }
}
