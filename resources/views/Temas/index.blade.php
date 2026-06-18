@extends('layout')
@section('title','Listado de Temas')
@section('contenido')
<h1 class="text-center">Listado de Temas</h1>

@if (session('message'))

<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
<strong>Respuesta servidor</strong>
{{session('message')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
  <div class="text-end">
    <a href="{{url('temas/create')}}" 
    class="btn btn-info">Nuevo</a> 
  </div>
</div>
  <table class="table table-secondary table-bordered border border-black class="text-center h4"">
    <thead>
     <tr>
        <th class="text-center h4">Id</th>
        <th class="text-center h4">Titulo</th>
        <th class="text-center h4">Texto</th>
        <th class="text-center h4">Fecha</th>
        <th class="text-center h4">Usuario</th>
        <th class="text-center h4">Categoria</th>
        <th colspan="2" class="text-center h4">Funciones</th>
     </tr>
    </thead>
     <tbody>
      @foreach($datos as $usuario)
        <tr>
          <td class="text-center">{{$tema->id}}</td>
          <td class="text-center">{{$tema->titulo}}</td>
          <td class="text-center">{{$tema->texto}}</td>
          <td class="text-center">{{$tema->fecha}}</td>
          <td class="text-center">{{$tema->usuario->nombre}}</td>
          <td class="text-center">{{$tema->categoria->nombre}}</td>
          <td class="text-center">
            <form method="POST" action="{{ route('temas.edit',$tema->id)}}">
              @csrf
              @method('GET')
              <button class="btn btn-outline-info">
                <img src="{{ url('img/editar_nuevo.gif')}}" width="20" height="25"> 
              </button>
            </form>
          </td>

          <td class="text-center">
            <form method="POST" action="{{ route('temas.destroy',$tema->id)}}" onsubmit="return confirm('¿Realmente quiere borrar este Tema?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger">
                <img src="{{ url('img/eliminar_nuevo.gif')}}" width="20" height="25"> 
              </button>
            </form>
          </td>
        
        </tr>
      @endforeach
     </tbody>
   </table>
 @stop