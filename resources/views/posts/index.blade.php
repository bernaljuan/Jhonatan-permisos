@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
<div class="container">
@if(Session::has('Mensaje'))


<div class="alert alert-success" role="alert"> 
    {{ Session::get ('Mensaje') }}
</div>

@endif

<div class="titulo r col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-2 mx-auto">
    <center><h1>Productos Publicados</h1></center>
</div>
<div class="formulario col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-2 mx-auto">
    @can('haveaccess','posts.create')
        <a href="{{route('posts.create')}}"><button class="br col-12 p-2 mt-2 mb-2">Publicar Producto</button></a>
    @endcan
    <table class="table table-light col-12">
    
        <thead>
            <tr>
                <th>Id</th>
                <th>Foto </th>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)  
    
            <tr>
    
                <td>{{$post->id}}</td>
                <td>
    
                <img src="{{ asset('storage').'/'. $post->foto }}"  class="img-thumbnail img-fluid" alt="" width="150">
                
                
                </td>
                <td>{{ $post->nombre }}</td>
                <td>{{ $post->product->nombre }}</td>
                <td>{{ $post->descripcion }}</td>
                <td>{{ $post->categoria->nombre }}</td>
    
                <td>

                @can('haveaccess','posts.edit')
                <a class="btn btn-warning" href="{{ url('/posts/'.$post->id.'/edit') }}">                                
                    Editar
                    </a>
                    @endcan 
            
                    @can('haveaccess','posts.destroy')
                    <form method="post" action="{{ url('/posts/'.$post->id) }}" style="display:inline ;" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" > Borrar </button>
                    
                    </form>
                    @endcan
    
    
                </td>
            </tr>
        @endforeach    
        </tbody>
    </table>
    
</div>





{{ $posts->links() }}

</div>
@endsection