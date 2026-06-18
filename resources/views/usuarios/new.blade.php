@extends('layout')
@section('title', 'Formulario')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('css/estilos.css') }}">
@endsection

@section('contenido')
    <div class="card p-5"
     style="
        width: 45%;
        min-width: 500px;
        margin-top: 40px;
        margin-right: 40px;
        background-color: rgba(255,255,255,0.55);
        backdrop-filter: blur(8px);
        border-radius: 25px;
        border: none;
        box-shadow: 0 15px 40px rgba(0,0,0,.25); ">

    <form id="form" action="{{ url('usuarios') }}" method="POST">
        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="nombre">
        @error('nombre')
            <div class="error compacto col-lg-20" style="background: #ddbfd9;">{{ $message }}</div>
        @enderror
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="email">
        @error('email')
            <div class="error compacto col-lg-20">{{ $message }}</div>
        @enderror
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Contrasena">
        @error('password')
            <div class="error compacto col-lg-20">{{ $message }}</div>
        @enderror
        <br>

        <label for="nickname">Pon un Apodo</label>
        <input type="text" id="nickname" name="nickname" class="form-control"  placeholder="Apodo">{{ old('nickname') }}
        @error('nickname') 
            <div class="error compacto col-lg-20">{{ $message }}</div>
        @enderror
        <br>

        <label for="Estado">Estado</label>
        <div class="form-check text-center mb-3">
            <input type="hidden" name="Estado" value="0">
            <input class="form-check-input" type="checkbox" id="Estado" name="Estado" value="1">
        </div>

        <input
            type="submit"
            value="Enviar"
            class="btn btn-primary w-100"
            style="background-color: #e4a2bf; border-color: #ddbfd9;">
        <a href="{{ url('usuarios') }}"
            class="btn btn-secondary w-100 mt-2"
            style="background-color: #e4a2bf; border-color: #ddbfd9; display: inline-block; text-align: center; text-decoration: none; color: inherit;">
            Eliminar
        </a>
    </form>
</div>
@endsection

@section('js')

    <style>
    body {
    background-image: url('http://localhost/Blog/public/img/Neva.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

    margin: 0;
    min-height: 100vh;

    display: flex;
    justify-content: flex-end; /* derecha */
    align-items: flex-start;   /* arriba */

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
