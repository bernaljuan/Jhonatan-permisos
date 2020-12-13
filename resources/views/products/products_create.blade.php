
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../css/estilo2.css">
    <link rel="stylesheet" href="../css/log.css">
    <div class="container">
        <div class="titulo r col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-3 mx-auto">
            <center><h1>Agregar Producto</h1></center>
        </div>
        <form method="POST" class="formulario col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto" action="{{route("products.store")}}">
            @csrf
            <input required autocomplete="off" name="nombre" class="col-12 inp mt-3 mb-3" type="text" placeholder="Id">
            <input required autocomplete="off" name="descripcion" class="col-12 inp mb-3" type="text" placeholder="Nombre">
            <input required autocomplete="off" name="precio_compra" class="col-12 inp mb-3" type="decimal(9,2)" placeholder="Precio de compra">
            <input required autocomplete="off" name="precio_venta" class="col-12 inp mb-3" type="decimal(9,2)" placeholder="Precio de venta">
            <input required autocomplete="off" name="existencia" class="col-12 inp mb-3" type="decimal(9,2)" placeholder="Existencia">
            @include("notificacion")
            <button class="br col-12 p-2">Guardar</button><br><br>
            <a class="btn btn-primary col-12 p-2 mb-3" href="{{route("products.index")}}">Volver al listado</a>

        </form>
    </div>
    @endsection

