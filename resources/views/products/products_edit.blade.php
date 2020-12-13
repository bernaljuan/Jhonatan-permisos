
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../../css/estilo2.css">
    <link rel="stylesheet" href="../../css/log.css">
    <div class="container">
        <div class="titulo mt-5 p-3 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto r">
            <center><H1>Editar Producto</H1></center>
        </div>
        <form method="POST" action="{{route("products.update", [$product])}}" class="p-3 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto formulario">
            @method("PUT")
            @csrf
            <input required value="{{$product->nombre}}" autocomplete="off" name="nombre"
            class="col-12 inp mt-3 mb-3"
            type="text" placeholder="Id">
            <input required value="{{$product->descripcion}}" autocomplete="off" name="descripcion"
            class="col-12 inp mb-3"
            type="text" placeholder="Nombre">
            <input required value="{{$product->precio_compra}}" autocomplete="off" name="precio_compra"
            class="col-12 inp mb-3"
            type="decimal(9,2)" placeholder="Precio de compra">
            <input required value="{{$product->precio_venta}}" autocomplete="off" name="precio_venta"
            class="col-12 inp mb-3"
            type="decimal(9,2)" placeholder="Precio de venta">
            <input required value="{{$product->existencia}}" autocomplete="off" name="existencia"
            class="col-12 inp mb-3"
            type="decimal(9,2)" placeholder="Existencia">
            <button class="br col-12 p-2 mb-2">Guardar</button>
            <a class="btn btn-primary col-12 p-2 mb-3" href="{{route("products.index")}}">Volver</a>
        </form>
    </div>
@endsection
