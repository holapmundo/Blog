@extends('layout')
@section('title', 'Listado de Usuarios')
@section('contenido')
<h1 style="color: darkgoldenrod;" class="text-center">LISTADO DE USUARIOS</h1>


<div class="row">
    <div class="text-end">
        <a href="{{ url('usuarios/create')}}" class="btn btn-outline-primary">NUEVO USUARIO</a>
</div>

<div class="row">
    <div class="text-end">
    <a href="{{ route('categorias.create') }}" class="btn btn-outline-primary">CATEGORIAS</a></div>
</div>

    @if (session('message'))

   <div class="alert alert-{{ session('type') }} alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-label="Alerta:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <div>{{ session('message') }}</div>
    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Cerrar"></button>
</div>

@endif


<center>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Nickname</th>   
            <th>Estado</th>
            <th colsapn="2">Funciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($datos as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->nickname }}</td>
                <td>
                 <div>
                @if($usuario->Estado == true)
                <span class="rounded-pill text-white px-3 py-1 fw-bold d-inline-block" style="background-color: #87d295;">
                 Activo
                </span>
                @else
                <span class="rounded-pill text-white px-3 py-1 fw-bold d-inline-block" style="background-color: #ff5151;">
                Inactivo
                </span>
                 @endif
                 </div>
            </td>

            <td>
                <form method="GET" action="{{ route ('usuarios.edit',$usuario-> id ) }}">
                    @csrf
                    @method('GET')

                    <button class="btn btn-outline-warning">
                        <img src="{{ url ('img/editarPerfil.gif') }}" width="20">
                    </button>
                </form>
                </td>
                    <td>
                    <form method="POST" action="{{ route ('usuarios.destroy',$usuario-> id ) }} onsubmit ="return confirm("¿Realmente deseas borrar a este usuario?")">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-outline-warning">
                            <img src="{{ url ('img/editarEliminar.gif') }}" width="20">
                        </button>
                    </form>
            </td>
            </td>
        </tr>
        </center>
        @endforeach
    </tbody>
</table>
@endsection


