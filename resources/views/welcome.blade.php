<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/estilo.css">
        <title>Pizza Shop</title>
    </head>
    <body>  
        <header>
            <div class="textos">
                <a href="{{route ('personal') }}" class="btn"><h3>Personal</h3></a>
                <a href="{{route ('familiar') }}" class="btn"><h3>Personal</h3></a>
                <h1 class="titulo">Pizza Shop</h1>
                <h3 class="subtitulo">El mejor sitio web de pizzas</h3>
                <a  href="{{ route('login') }}" class="boton">Ingresar</a>
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
            <section class="galeria">
                <div class="imagenes">
                    <img src="im/4.jpg" alt="">
                </div>
                <div class="imagenes">
                    <img src="im/4.jpg" alt="">
                </div>
                <div class="imagenes">
                    <img src="im/4.jpg" alt="">
                    <div class="encima">
                        <h2>Pizza Shop</h2>
                        <div></div>
                    </div>
                </div>
                <div class="imagenes">
                    <img src="im/4.jpg" alt="">
                </div>
                <div class="imagenes">
                    <img src="im/4.jpg" alt="">
                </div>
                <div class="sesgoabajo"></div>
            </section>
            <section class="mienbros">
                <div class="contenedor">
                    <h2 class="sobre-nosotros">Nuestro Servicio</h2>
                    <h3 class="eslogan">Conoce nuestros servicios</h3>
                    <div class="cards">
                        <div class="card">
                            <img src="im/p.jpg" alt="">
                            <h4>Proteccion de informacion</h4>
                            <p>Siempre al servicio de nuestros clientes.</p>
                        </div>
                        <div class="card">
                            <img src="im/p.jpg" alt="">
                            <h4>Gestion de roles</h4>
                            <p>Siempre al servicio de nuestros clientes.</p>
                        </div>
                        <div class="card">
                            <img src="im/p.jpg" alt="">
                            <h4>Almacenamiento segun tu servicio</h4>
                            <p>Siempre al servicio de nuestros clientes.</p>
                        </div>
                    </div>
                </div>
                <div class="sesgoabajo-unico"></div>
            </section>
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