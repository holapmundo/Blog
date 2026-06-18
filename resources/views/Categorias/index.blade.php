@extends('layout')

@section('title', 'Listado de Categorias')

@section('contenido')
<h1 class="text-center">LISTADO DE CATEGORIAS</h1>

<div class="row">
    <div class="text-end">
        <a href="{{ route('categorias.create') }}" class="btn btn-outline-primary">
            NUEVA CATEGORIA
        </a>

        <a href="{{ route('categorias.home') }}" class="btn btn-outline-secondary">
            HOME
        </a>
    </div>
</div>

@if (session('message'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('message') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Funciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($datos as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-outline-warning">
                        Editar
                    </a>

                    <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}" style="display: inline-block;" onsubmit="return confirm('Realmente deseas borrar esta categoria?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
