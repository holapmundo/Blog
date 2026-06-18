 @extends('layout')
@section('title','Edicion Temas')
@section('css')
        
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
@stop()
@section('contenido')
 
         <div class="container d-flex justify-content-center">
            <div class="card shadow p-3 border border-primary-subtle bg-info text-white" style="width: 350px" >
              <h1 class="text-center">Edicion de Temas</h1><br>

    <form action="{{ url('temas',$tema->id) }}" method="POST" id="form">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-12">
        <label for="nombre" class="h5">Nombre:</label><br>
        <input type="text"  name="nombre" class="form-control" placeholder="Escriba su nombre" value="{{ $usuario->nombre }}">
          </div>
          @error('nombre')
              <div class="error compacto col-lg-10">{{ $message }}</div>
        @enderror
        </div><br>

        <div class="row">
          <div class="col-md-12">
        <label for="email" class="h5">Correo:</label><br>
        <input type="email"  name="email" class="form-control" placeholder="Escriba su correo" value="{{ $usuario->email }}">
          </div>
          @error('email')
              <div class="error compacto col-lg-10">{{ $message }}</div>
        @enderror
        </div><br>

        <div class="row">
          <div class="col-md-12">
        <label for="password" class="h5">Contraseña:</label><br>
        <input type="text"  name="password" class="form-control" placeholder="Digite su contraseña">
          </div>
          @error('password')
              <div class="error compacto col-lg-10">{{ $message }}</div>
        @enderror
        </div><br>

        <div class="row">
          <div class="col-md-12">
        <label for="nickname" class="h5">Nickname:</label><br>
        <input type="text"  name="nickname" class="form-control" placeholder="Escriba su apodo" value="{{ $usuario->nickname }}">
          </div>
          @error('nickname')
              <div class="error compacto col-lg-10">{{ $message }}</div>
        @enderror
        </div><br>

        <div class="row">
         <div class="col-md-12">
         <label for="form-label" class="h5">Estado:</label>
           <div class="form-check form-switch text-center">
             <input type="checkbox" class="form-check-input" name="estado" {{$usuario->estado ? 'checked' : ''}}>
           </div>
         </div>
        </div><br>

          <div class="text-center">
        <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ url('temas') }}" 
                class="btn btn-secondary">Cancelar</a>
          </div>

    </form>
    @stop
    @section('js')
        </div>
            </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script src="{{ url('js/jquery.validate.min.js') }}"></script>

        <script src="{{ url('js/localization/messages_es.min.js') }}"></script>


         <script>
          $("#form").validate({
              rules:{
                nombre:{
                    required: true,
                    maxlength: 150
                }, 
                email:{
                    required: true,
                    maxlength: 150
                },
                password:{
                    maxlength: 150
                },
                nickname:{
                    required: true,
                    maxlength: 50
                },   
              } 
          }); 
        </script>
      @stop