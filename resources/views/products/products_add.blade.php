
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-12">
            <h1>Agregar existencia</h1>
            <form method="POST" action="{{route("products.updateadd", [$product])}}">
                @method("PUT")
                @csrf

                <div class="form-group">
                    <label class="label">Producto:</label>
                    <input type=»text» readonly=»readonly»  required value="{{$product->nombre}}" autocomplete="off" name="nombre"
                           class="form-control"
                           type="decimal(9,2)" placeholder="nombre">
                </div>
                
                <div class="form-group">
                    <label class="label">Existencia</label>
                    <input  type=»text» readonly=»readonly» required value="{{$product->existencia}}" autocomplete="off" name="existencia"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Existencia">
                </div>

                <div class="form-group">
                    <label class="label">agregar unidades</label>
                    <input required autocomplete="off" name="unidades_add" class="form-control"
                           type="decimal(9,0)" placeholder="Unidades a agregar">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("products.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection


