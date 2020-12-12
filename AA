<link rel="stylesheet" href="css/login.css">
<body class="body-login">
    <div class="container-bar">
        <input type="checkbox" id="btn-social">
            <div class="icon-social">
                <a href="{{ url('/') }}" class="icon-pinterest fab fa-pinterest">
                    <h3>volver</h3>
                    <span class="title">Pagina principal</span>
                </a>
            </div>
        </div>
    <form method="POST" action="{{ route('login') }}">
        <div class="form-login form-login2">
            <center><a href="{{ route('register') }}" class="l"><h3>Registrarse</h3></a></center><br><br>
            <h1 class="titulo-login">Iniciar Sesión</h1>
                @csrf
               <div class="grupo-login">
                    <input id="email" type="text" class="input-login form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="" class="label-login">Correo</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ 'Los datos no coinciden' }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="grupo-login">
                    <input id="password" type="password" class=" input-login form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="" class="label-login">Contraseña</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ "El correo debe tener algun @"}}</strong>
                        </span>
                   @enderror
                </div>
                <div class="form-check">                   
                    <center>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                                {{ __('Recordarme') }}
                        </label>
                    </center>
                </div>
                <button type="submit" class="boton-login">
                    {{ __('Iniciar Sesión') }}
                </button>

                @if (Route::has('password.request'))
                <center>    
                    <a class="btn l btn-link" href="{{ route('password.request') }}">
                        {{ __('Olvido su contraseña ?') }}
                    </a>
                </center>
                @endif
                           
            </form>
</body>