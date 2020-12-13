
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../css/estilo2.css">
    <link rel="stylesheet" href="../css/log.css">
    <div class="container">
        <div class="titulo r col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5 p-3">
            <center><h1>Productos</h1></center>
        </div>
        <div class="formulario p-3 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
            <a href="{{route("products.create")}}"><button class="br col-12 mt-2 mb-2 p-2">Agregar Producto</button></a>
            <table class="table table-light col-12">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio de compra</th>
                    <th>Precio de venta</th>
                    <th>Ganancia</th>
                    <th>Existencia</th>
                    <th>Agregar productos</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->nombre}}</td>
                        <td>{{$product->descripcion}}</td>
                        <td>{{$product->precio_compra}}</td>
                        <td>{{$product->precio_venta}}</td>
                        <td>{{$product->precio_venta - $product->precio_compra}}</td>
                        <td>{{$product->existencia}}</td>
                        
                        <td>
                            <a class="btn btn-warning" href="{{route("products.add",[$product])}}">
                                Agregar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route("products.edit",[$product])}}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <form action="{{route("products.destroy", [$product])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection