 @extends('layout')
@section('title','Registro Temas')
@section('css')
        
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
@stop()
@section('contenido')
 
         <div class="container d-flex justify-content-center">
            <div class="card shadow p-3 border border-primary-subtle bg-info text-white" style="width: 350px" >
              <h1 class="text-center">Nuevo Tema</h1><br>

    <form action="{{ url('temas') }}" method="post" id="form">
        @csrf
        <input type="hidden" name="usuario_id" value="3">

        <div class="row">
          <div class="col-md-12">
            <label class="form-control-label h5">Fecha</label>
              <input type="date" name="fecha" value="{{date('Y-m-d')}}" readOnly class="form-control">
          </div>
         </div><br>
        
        <div class="row">
          <div class="col-md-12">
            <label class="form-label h5">Categoria</label>
            <select name="categoria_id" id="" class="form-control">
                <option value="">Seleccione su categoria...</option>
                 @foreach($categorias as $categoria)
                  <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
                </select>
                @error('categoria_id')
              <div class="error compacto col-lg-10">{{ $message }}</div>
                @enderror 
                
         </div>
      </div><br>

        <div class="row">
          <div class="col-md-12">
        <label for="Titulo" class="h5">Titulo:</label><br>
        <input type="text"  name="titulo" class="form-control" placeholder="Escriba el Titulo" value="{{old('Titulo')}}">
          </div>
          @error('Titulo')
              <div class="error compacto col-lg-10">{{ $message }}</div>
        @enderror
        </div><br>


        <div class="row">
          <div class="col-md-12">
        <label for="Texto" class="h5">Texto:</label><br>
        <textarea name="texto" class="form-control" placeholder="Ingrese el texto">{{old('Texto')}}</textarea>
          </div>
          @error('Texto')
              <div class="error compacto col-lg-10">{{ $message }}</div>
        @enderror
        </div><br>

        
        

          <div class="text-center">
        <button type="submit" class="btn btn-success">Registrar</button>
         <!-- </div>
            <div class="col-md-4"> -->
                <a href="{{ url('index') }}" 
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
                Titulo:{
                    required: true,
                    maxlength: 255
                }, 
                Texto:{
                    required: true,
                    maxlength: 1000
                },   
              } 
          }); 
        </script>
      @stop