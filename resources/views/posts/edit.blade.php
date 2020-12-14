@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../../css/estilo2.css">
<link rel="stylesheet" href="../../css/log.css">
<div class="container">
<div class="titulo  col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto r p-2">
    <center><h1>Editar Publicación</h1></center>
</div>

<form action=" {{ url('/posts/' . $post->id)  }} " method="post" enctype="multipart/form-data" class=" col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mx-auto formulario" >

{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('posts.form',['Modo'=>'editar'])


</form>

</div>
@endsection