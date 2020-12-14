@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
<div class="container">
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)            
                <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="titulo r p-2 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto">
        <center><h1>Publicar Producto</h1></center>
    </div>    
    <form action="{{ url('/posts') }}" class="formulario col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('posts.form',['Modo'=>'crear'])
    </form>
</div>
@endsection