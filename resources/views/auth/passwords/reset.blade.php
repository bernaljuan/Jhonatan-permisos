@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../../css/log.css">
<link rel="stylesheet" href="../../css/estilo2.css">
<div class="container">
    <div class="titulo r col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-2 mx-auto">
        <center><h1>Cambiar Contraseña</h1></center>
    </div>
    <div class="formulario col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-12">
                    <input id="email" type="email" class="col-12 mt-3 mb-3 inp @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            

           
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-12">
                    <input id="password" type="password" class="col-12 inp mb-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            

            
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="col-12 inp mb-3" name="password_confirmation" required autocomplete="new-password">
                </div>
            

            
                <div class="col-12">
                    <button type="submit" class="br col-12 mb-3">
                        {{ __('Cambiar Contraseña') }}
                    </button>
                </div>
            
        </form>
    </div>
</div>
@endsection
