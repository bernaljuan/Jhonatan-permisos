
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../../css/estilo2.css">
    <link rel="stylesheet" href="../../css/log.css">
    <div class="container">
        <div class="titulo mt-5 p-3 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto r">
            <center><H1>Editar PEDIDO</H1></center>
        </div>
        <form method="POST" action="{{route("user.order.update", [$order])}}" class="p-3 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto formulario">
            @method("PUT")
            @csrf
            
            <label for="">Direccion</label>
            <input required value="{{$order->address}}" autocomplete="off" name="address"
            class="col-12 inp mt-3 mb-3"
            type="text" placeholder="Direccion">

            <label for="">Cantidad</label>
            <input required value="{{$order->cantidad}}" autocomplete="off" name="cantidad"
            class="col-12 inp mt-3 mb-3"
            type="text" placeholder="Unidades">
			
            <label for="">Instrucciones</label>
            <input required value="{{$order->instructions}}" autocomplete="off" name="instructions"
            class="col-12 inp mt-3 mb-3"
            type="text" placeholder="Instrucciones">
            <button class="br col-12 p-2 mb-2">Guardar</button>
            <a class="btn btn-primary col-12 p-2 mb-3" href="{{route("user.order")}}">Volver</a>
        </form>
    </div>
@endsection
