<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/estilo.css">
        <title>Pizza Shop</title>
    </head>
    <body>  
        <header>
            <div class="textos">
                <a href="{{ url('/') }}" class="btn"><h3>Inicio</h3></a>
                <a href="{{route ('familiar') }}" class="btn"><h3>familiar</h3></a>
                <h1 class="titulo">Pizza Shop</h1>
                <h3 class="subtitulo">El mejor sitio web de pizzas</h3>
                <a href="{{ route('login') }}" class="boton">Ingresar</a>
            </div>
            <div class="sesgoabajo"></div>
        </header> 
        <main>
            <section class="acercade">
                <div class="contenedor">
                    <h2 class="sobre-nosotros">Sobre Nosotros</h2>
                    <h3 class="eslogan">Compra la mejor pizza.</h3>
                    <p class="parrafo">Compra la pizza que quieras al tamaño que quieras y el sabor que quieras aqui. Contarás con los mejores servicios de calida, no solo en las pizzas sino tambien en tu entrega, sabiendo a tiempo real en que proceso se encuentra tu entrega.</p>
                    <center>
                    <a href="{{ route('register') }}" class="boton">Registrate</a></center>
                </div>
            </section>
       
            <div class="container mt-5">
                <center><h1 class=" titulo2 mx-auto">Personal</h1></center>
            </div>
                <div class="container mt-5 mb-5">
            <div class="row">
                @foreach($articulos as $articulo)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                        <img  src="{{ asset('storage').'/'. $articulo->foto }}" class="card-img-top h-5 img-thumbnail img-fluid"  >
                        <div class="card-body producto">
                            <center><h2 class="card-title">{{ $articulo->Nombre }}</h2>
                            <h4 class="card-text pre">$ {{ $articulo->Precio }}</h4>
                            <a href="{{route('user.order.create', ['id' => $articulo->id])}}" class="btn col-12 btn-danger com p-3">Ordenar</a></center>
                        </div>
                    </div>
                @endforeach 
            </div> 
        </main>
        <footer>
            <div class="contenedor">
                <h2 class="titulo-footer">Contactanos</h2>
                <h3 class="subtitulo-footer">&copy;Pizza Shop</h3>
                <h3 class="subtitulo-footer">pizzasho12@gmail.com</h3>
                <h3 class="subtitulo-footer">3022839680</h3>
            </div>
       
        </footer>
    </body>
</html>