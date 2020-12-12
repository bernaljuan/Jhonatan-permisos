<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="css/estilo2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Registrarse</title>
</head>
<body>
    <div class="r text-white titulo col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mx-auto mt-5 p-3">
        <center><h1>Registrarse</h1></center>
    </div>
    <form class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mx-auto bg-white formulario" method="POST" action="{{ route('register') }}">
        <center><a href="{{ url('/') }}"><h3 class="sub p-2">Pizza Shop</h3></a></center>
        <center><a href="{{ route('login') }}" class="l"><h5>Ingresar</h5></a></center>
        @csrf
        <input type="text" class="mt-3 mb-3 inp col-12 @error('name') is-invalid @enderror" placeholder="Nombre:" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="text" id="email" class="mt-3 mb-3 inp col-12 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email:">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input id="password" type="text" class="mt-3 mb-3 inp col-12  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña:">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input id="password-confirm" name="password_confirmation" required autocomplete="new-password" type="text" class="mt-3 mb-3 inp col-12" placeholder="Confirmar Contraseña:">
        <button type="submit" class="br col-12 p-2 mb-4">Registrarse</button>
    </form>
</body>
</html>