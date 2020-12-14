@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../../css/log.css">
<link rel="stylesheet" href="../../css/estilo2.css">
<div class="container">
    <div class="titulo r col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-2 mx-auto">
        <center><h1>Confirmar Contraseña</h1></center>
    </div>
    <div class="formulario col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto">
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

           
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-12">
                    <input id="password" type="password" class="col-12 inp mt-3 mb-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            

            
                
                    <button type="submit" class="br col-12 p-2 mb-3">
                        {{ __('Confirmar Contraseña') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Olvido su Contraseña??') }}
                        </a>
                    @endif
               
        
        </form>
    </div>
</div>
@endsection
