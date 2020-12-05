@extends('layouts.app')

@section('content')


<div class="container">

@if(Session::has('Mensaje'))


<div class="alert alert-success" role="alert"> 
    {{ Session::get ('Mensaje') }}
</div>

@endif

@can('haveaccess','posts.create')
                    <a href="{{route('posts.create')}}" 
                      class="btn btn-primary float-right"
                      >Create
                    </a>
                    <br><br>
                @endcan

<br>
<br>

<table class="table table-light table-hover">
    
    <thead class="thead-light">
        <tr>
            <th># </th>
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


{{ $posts->links() }}

</div>
@endsection