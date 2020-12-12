<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="bg-danger text-white titulo col-4 mx-auto mt-5 p-3">
        <center><h1>Iniciar Sesión</h1></center>
    </div>
    <form action="" class="col-4 mx-auto bg-white formulario" method="POST" action="{{ route('login') }}">
        <center><h3 class="sub p-2">Pizza Shop</h3></center>
        <center><a href="{{ route('register') }}" class="l"><h5>Registrarse</h5></a></center>
        @csrf
        <input id="email" type="text" class="col-12 inp @error('email') is-invalid @enderror" required autocomplete="email" autofocus name="email" value="{{ old('email') }}" col-12 inp mt-3 mb-3" placeholder="Email:">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ 'Los datos no coinciden' }}</strong>
            </span>
        @enderror
        <input id="password" type="password" class="col-12 inp mt-3 mb-3  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña:">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ "El correo debe tener algun @"}}</strong>
            </span>
        @enderror
        <div class="form-check">                   
            <center>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                        {{ __('Recordarme') }}
                </label>
            </center>
        </div>
        @if (Route::has('password.request'))
        <button type="submit" class="btn btn-danger col-12 p-2 mb-3">Iniciar Sesión</button>
        <center><a href="{{ route('password.request') }}"><p class="l p-3">Olvido su contraseña?</p></a></center>
        @endif
    </form>
</body>
</html>