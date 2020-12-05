
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-12">
            <h1>Editar producto</h1>
            <form method="POST" action="{{route("products.update", [$product])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Código de barras</label>
                    <input required value="{{$product->nombre}}" autocomplete="off" name="nombre"
                           class="form-control"
                           type="text" placeholder="Código de barras">
                </div>
                <div class="form-group">
                    <label class="label">Descripción</label>
                    <input required value="{{$product->descripcion}}" autocomplete="off" name="descripcion"
                           class="form-control"
                           type="text" placeholder="Descripción">
                </div>
                <div class="form-group">
                    <label class="label">Precio de compra</label>
                    <input required value="{{$product->precio_compra}}" autocomplete="off" name="precio_compra"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Precio de compra">
                </div>
                <div class="form-group">
                    <label class="label">Precio de venta</label>
                    <input required value="{{$product->precio_venta}}" autocomplete="off" name="precio_venta"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Precio de venta">
                </div>
                <div class="form-group">
                    <label class="label">Existencia</label>
                    <input required value="{{$product->existencia}}" autocomplete="off" name="existencia"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Existencia">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("products.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
