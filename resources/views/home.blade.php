@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/estilos2.css">
<center><h1 class="mt-3">Pizzas</h1></center><hr>
<div class="row">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                <img  src="{{ asset('storage').'/'. $post->foto }}" class="card-img-top h-5 img-thumbnail img-fluid"  >
                <div class="card-body producto">
                    <center><h2 class="card-title">{{ $post->nombre }}</h2>
                    <center><h2 class="card-title">{{ $post->products->precio_venta}}</h2>
                    <a href="{{route('user.order.create', ['id' => $post->id])}}" class="btn col-12 btn-danger com p-3">Ordenar</a></center>
                </div>
            </div>
        @endforeach 
    </div>
</div>    
@endsection
