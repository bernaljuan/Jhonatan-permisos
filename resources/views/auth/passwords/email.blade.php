@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../../css/log.css">
<link rel="stylesheet" href="../../css/estilo2.css">
<div class="container">
    <div class="titulo r col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-2 mx-auto">
        <center><h1>Enviar correo</h1></center>
    </div>
    <div class="formulario col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

                <label for="email" class="mt-2">{{ __('E-Mail Address') }}</label>

                <div class="col-12">
                    <input id="email" type="email" class="col-12 mt-3 mb-3 inp @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
           

       
                <div class="col-12">
                    <button type="submit" class="br p-2 col-12 mb-3">
                        {{ __('Enviar Correo') }}
                    </button>
                </div>
      
        </form>
    </div>
</div>
@endsection
