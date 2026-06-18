@extends('layout')

@section('title', 'Nueva Categoria')

@section('contenido')
    <h1 class="text-center text-danger">BIENVENIDO</h1>

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

        <form id="form" action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre de la Categoria</label>
       <select name="nombre" id="nombre" class="form-control">

    <option value="Tecnologia"
        {{ $categoria->nombre == 'Tecnologia' ? 'selected' : '' }}>
        Tecnología
    </option>

    <option value="Maquillaje"
        {{ $categoria->nombre == 'Maquillaje' ? 'selected' : '' }}>
        Maquillaje
    </option>

    <option value="Diseno"
        {{ $categoria->nombre == 'Diseno' ? 'selected' : '' }}>
        Diseño Gráfico
    </option>

    <option value="Cocina"
        {{ $categoria->nombre == 'Cocina' ? 'selected' : '' }}>
        Cocina
    </option>

    <option value="Viajes"
        {{ $categoria->nombre == 'Viajes' ? 'selected' : '' }}>
        Viajes
    </option>

    <option value="Deportes"
        {{ $categoria->nombre == 'Deportes' ? 'selected' : '' }}>
        Deportes
    </option>

    

</select>

        @error('nombre')
            <div class="error compacto col-lg-20" style="background: #ddbfd9;">{{ $message }}</div>
        @enderror
        <br>
    

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="descripcion" value ={{ $categoria->descripcion }}>
        @error('descripcion')
            <div class="error compacto col-lg-20">{{ $message }}</div>
        @enderror
        <br>


       <input
        type="submit"
        value="Enviar"
        class="btn btn-secondary w-100 mt-2"
        style="background-color: #e4a2bf; border-color: #ddbfd9;">

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
    justify-content: flex-right; /* derecha */
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
            descripcion: {
                required: true,
                maxlength: 150
            }
        }
    });
</script>
@endsection
