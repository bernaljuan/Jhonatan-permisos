


@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/estilo2.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

          <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <!-- Styles -->
        <link href="{{ asset('css/submit.css') }}" rel="stylesheet">    
        <title>Pizza Shop</title>
    </head>
    <body>  
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="im/p.jpg" class="d-block w-100" alt="...">
                </div>

              <div class="carousel-item">
                <img src="im/4.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="im/p.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        <center><h1 class="mt-4">Pizzas Familiares</h1></center><hr>
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
        <footer class="mt-5 r p-2">
            <div class="col-12 r text-white">
                <h2 class="mb-2 pb-2">Pizza Shop</h2>
                <h4 class="ml-2">pizzasho12@gmail.com</h4>
                <h4 class="ml-2">3022839680</h4>
                <p class="ml-2">&copy; Pizza Shop todos los derecchos reserbados</p>
            </div>
        </footer>
    </body>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/submit.js') }}" defer></script>
</html>
@endsection