
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../css/estilo2.css">
    <link rel="stylesheet" href="../css/log.css">
    <div class="container">
        <div class="titulo r col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5 p-3">
            <center><h1>Ventas</h1></center>
        </div>
       
        <div class="formulario p-3 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
            @if (session('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
        @endif
           
            <table class="table table-light col-12">
                <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Orden</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->customer->name }}</td>
                        <td>{{$sale->order_id}}</td>
                        <td>{{$sale->product}}</td>
                        <td>{{$sale->cantidad}}</td>
                        <td>${{$sale->total}}</td>
                        
                        <td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection