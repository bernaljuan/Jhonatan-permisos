
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../../css/estilo2.css">
    <link rel="stylesheet" href="../../css/log.css">
    <div class="container">
        <div class="titulo r mt-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-3 mx-auto">
            <center>
                <h1>Agregar Existencia</h1>
            </center>
        </div>
        <form method="POST" action="{{route("products.updateadd", [$product])}}" class="mx-auto col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 formulario">
            @method("PUT")
            @csrf
            <input type=»text» readonly=»readonly»  required value="{{$product->nombre}}" autocomplete="off" name="nombre"
            class="col-12 inp mt-3 mb-3"
            type="decimal(9,2)" placeholder="nombre">
            <input  type=»text» readonly=»readonly» required value="{{$product->existencia}}" autocomplete="off" name="existencia"
            class="col-12 inp mb-3"
            type="decimal(9,2)" placeholder="Existencia">
            <input required autocomplete="off" name="unidades_add" class="col-12 inp mb-3"
            type="decimal(9,0)" placeholder="Unidades a agregar">
            <button class="br col-12 p-2 mt-2 mb-2">Guardar</button>
                <a class="btn btn-primary col-12 mb-3" href="{{route("products.index")}}">Volver</a>
        </form>
    </div>
@endsection


