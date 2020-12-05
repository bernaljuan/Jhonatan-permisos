@extends('layouts.app')

@section('content')


<div class="container">


<form action=" {{ url('/posts/' . $post->id)  }} " method="post" enctype="multipart/form-data" >

{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('posts.form',['Modo'=>'editar'])


</form>

</div>
@endsection