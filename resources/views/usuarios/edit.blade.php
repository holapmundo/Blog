@extends('layout')
@section('title', 'Formulario')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('css/estilos.css') }}">
@endsection

@section('contenido')
<div class="card mx-auto p-4 mt-5" style="width: 400px; background-color: rgba(255, 255, 255, 0.45);">
    <form id="form" action="{{ url('usuarios',$usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" 
        placeholder="nombre" value="{{$usuario->nombre }}">
        @error('nombre')
            <div class="error compacto col-lg-20" style="background: #ddbfd9;">{{ $message }}</div>
        @enderror
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control"
         placeholder="email" value="{{$usuario->email }}">
        @error('email')
            <div class="error compacto col-lg-20">{{ $message }}</div>
        @enderror
        <br>

        <!-- <label for="password">Password:</label>
        <input type="text" id="password" name="password" class="form-control" 
        placeholder="Contrasena" >
        @error('password')
            <div class="error compacto col-lg-20">{{ $message }}</div>
        @enderror
        <br> -->

        <label for="nickname">Pon un Apodo</label>
        <input type="text" id="nickname" name="nickname" class="form-control" 
        placeholder="Apodo"  value="{{$usuario->nickname }}">
        @error('nickname')
            <div class="error compacto col-lg-20">{{ $message }}</div>
        @enderror
        <br>
        <label for="Estado">Estado</label>
           <div class="form-check form-swicth text-center">
                        <input class="form-check-input" type="checkbox" name="Estado" 
                        {{$usuario->Estado ? 'checked' : '' }}>
                </div>

                
        <input
            type="submit"
            value="Enviar"
            class="btn btn-primary w-100"
            style="background-color: #e4a2bf; border-color: #edc5e8;" 
        </input>
        


        <input <a href="{{ url('usuarios') }}"
            type="reset"
            value="Eliminar"
            class="btn btn-secondary w-100 mt-2"
            style="background-color: #e4a2bf; border-color: #ddbfd9;">
</input>
        
    </form>
    
    
@endsection

@section('js')
<style>
    body {
        background-image: url('http://localhost/Blog/public/img/Neva2.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ url('js/localization/messages_es.min.js') }}"></script>
<script>
    $("#form").validate({
        rules: {
            nombre: {
                required: true,
                maxlength: 150
            },
            email: {
                required: true,
                maxlength: 150
            },
            password: {
              
                maxlength: 150
            },
            nickname: {
                required: true,
                maxlength: 50
            }
        }
    });
</script>
@endsection
