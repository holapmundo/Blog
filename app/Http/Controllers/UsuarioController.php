<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function ValidarLogin(Request $request){
            dd($request->all());        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Usuario::all();
        return view('usuarios/index', compact('datos'));
    
            //return view('usuarios/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios/new');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validador  = $request->validate([
            'nombre' => 'required|max:150',
            'email' => 'required|max:150|',
            'password' => 'required|max:150',
            'nickname' => 'required|max:150',   
        ]);

        $request['password'] = Hash::make($request['password']);

        $registro = Usuario::create($request->all());

        if($registro){
            return redirect('usuarios')->with('type','success')
                             ->with('message','Registro creado correctamente');

        }else{
            return redirect('usuarios')->with('type','warning')
                             ->with('message','Error al crear el registro');
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
        //dd($id);
        $usuario = Usuario::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
           $validador  = $request->validate([
            'nombre' => 'required|max:150',
            'email' => 'required|max:150|',
            
            'nickname' => 'required|max:150',   
        ]);

        $request['Estado'] == 'on' ? $request['Estado']= true : $request['Estado']= false;

        
    
        $fila = Usuario::find($id);
        $registro = $fila->update($request->all());

        if($registro){
           // dd($registro);
            return redirect('usuarios')->with('type','success')
                             ->with('message','Registro creado modificado correctamente');
         

        }else{
            return redirect('usuarios')->with('type','warning')
                             ->with('message','Error al crear el modificar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fila = Usuario::find($id);
        $registro = $fila->delete();

        if($registro){
            return redirect('usuarios')->with('type','danger')
                             ->with('message','Registro eliminado correctamente');

        }else{
            return redirect('usuarios')->with('type','warning')
                             ->with('message','Error al eliminar el registro');
        }    


    }
}
