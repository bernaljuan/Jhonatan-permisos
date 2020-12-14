
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
        
        <main>
            <center><h1>Pizzas</h1></center><hr>
            <center class="container mb-5">
                <div class="row">
                    <a href="{{ route('personal') }}" class="col-5"><button class="col-12 br p-3">Pizza personal</button></a>
                    <div class="col-2"></div>
                    <a href="{{ route('familiar') }}" class="col-5"><button class="col-12 br p-3">Pizza Familiar</button></a>
                </div>
            </center>
            <section class="">
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
            </section>
            <section class="container">
                <center><h1 class="titulo">¿Que te ofecemos?<h1></center><hr>
                <div class="row">
                    <img src="im/pro.jpg" class="col-6" alt="">
                    <div class="col-6">
                        <h1 class="titulo2">Productos</h1>
                        <p class="parrafo">Encuentra los mejores productos, con la mejor calidad al mejor precio y con garrantia de una alta calidad en los ingredientes.</p>
                    </div>
                    <div class="col-6 mt-2">
                        <h1 class="titulo2">Pedidos</h1>
                        <p class="parrafo">Poidras pedir todos los productos que deses con la seguridad del envio y tendras una vitacora para ver estado de tu orden.</p>
                    </div>
                    <img src="im/cajas.jpg" class="col-6 mt-3 mb-4">
                </div>
            </section>   
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