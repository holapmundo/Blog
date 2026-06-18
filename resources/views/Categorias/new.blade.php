@extends('layout')

@section('title', 'Nueva Categoria')

@section('contenido')
    <h1 class="text-center text-danger">BIENVENIDO</h1>
<style>
  *, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  :root {
    --rosa: #D4A373;
    --vino: #5A1827;
    --crema: #FAEDCD;
    --oro: #E9D8A6;
  }

  body{
    background: linear-gradient(135deg,#FAEDCD,#E9D8A6);
  }

  .card.p-5{
    width: 45%;
    min-width: 500px;
    margin: 40px auto;
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(10px);
    border-radius: 25px;
    border: none;
    box-shadow: 0 15px 40px rgba(90,24,39,.20);
  }

  h1{
    color: var(--vino) !important;
    margin-bottom: 25px;
    font-weight: bold;
  }

  label{
    color: var(--vino);
    font-weight: 600;
    margin-bottom: 5px;
  }

  .form-control{
    border: 2px solid #ddbfd9;
    border-radius: 12px;
    padding: 10px;
  }

  .form-control:focus{
    border-color: var(--rosa);
    box-shadow: 0 0 10px rgba(212,163,115,.4);
  }

  .btn-secondary{
    background: linear-gradient(135deg,#D4A373,#E9D8A6) !important;
    border: none !important;
    color: var(--vino) !important;
    font-weight: bold;
    border-radius: 12px;
    padding: 10px;
    transition: .3s;
  }

  .btn-secondary:hover{
    transform: translateY(-2px);
    box-shadow: 0 8px 15px rgba(90,24,39,.2);
  }

  .error{
    color: #8B0000;
    font-size: 14px;
    margin-top: 5px;
  }
</style>



        <form id="form" action="{{ route('categorias.store') }}" method="POST">
        @csrf
<div    class="card p-5"
        <label for="nombre">Nombre de la Categoria</label>
        <select name="nombre" id="nombre" class="form-control">
            <option value="">Seleccione una categoría</option>
            <option value="Tecnologia">Tecnología</option>
            <option value="Maquillaje">Maquillaje</option>
            <option value="Diseno">Diseño Gráfico</option>
            <option value="Cocina">Cocina</option>
            <option value="Viajes">Viajes</option>
            <option value="Deportes">Deportes</option>
        </select>
    
        @error('nombre')
            <div class="error compacto col-lg-20" style="background: #ddbfd9;">{{ $message }}</div>
        @enderror
        <br>
    

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="descripcion">
        @error('descripcion')
            <div class="error compacto col-lg-20">{{ $message }}</div>
        @enderror
        <br>

            <input type="submit"  value="Guardar Categoría" class="btn btn-secondary w-100 mt-3">
</div>
    </form>
</div>
@endsection

@section('js')

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
            descripcion: {
                required: true,
                maxlength: 150
            }
        }
    });
</script>
@endsection
