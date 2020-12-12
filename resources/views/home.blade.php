@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/estilo2.css">
<center><h1 class="mt-3">Pizzas</h1></center><hr>
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="card cad col-4">
                    <img src="{{ asset('storage').'/'. $post->foto }}" class="card-img-top im mt-3" alt="...">
                    <center><h3 class="card-title">{{ $post->nombre }}</h3></center>
                    <center><h3>$ {{ $post->products->precio_venta}}</h3></center>
                    <a href="{{route('user.order.create', ['id' => $post->id])}}" ><button class="mb-3 br col-12 p-3">Pedir</button></a></center>
                </div>
            @endforeach 
        </div>
    </div>   
@endsection
