@extends('layouts.app')

@section('content')


<div class="container">

@if(Session::has('Mensaje'))


<div class="alert alert-success" role="alert"> 
    {{ Session::get ('Mensaje') }}
</div>

@endif

@can('haveaccess','articulos.create')
                    <a href="{{route('articulos.create')}}" 
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
            <th>foto</th>
            <th>Nombre</th>
            <th>Talla</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articulos as $articulo)  

        <tr>

            <td>{{$articulo->id}}</td>
            <td>

            <img src="{{ asset('storage').'/'. $articulo->foto }}"  class="img-thumbnail img-fluid" alt="" width="150">
            
            
            
            </td>
            <td>{{ $articulo->Nombre }}</td>
            <td>{{ $articulo->Talla }}</td>
            <td>{{ $articulo->Precio }}</td>
           
            <td>{{ $articulo->categoria->nombre }}</td>

            <td>

            


            @can('haveaccess','articulos.edit')
            <a class="btn btn-warning" href="{{ url('/articulos/'.$articulo->id.'/edit') }}">                                
                Editar
                </a>
                @endcan 
        
                @can('haveaccess','articulos.destroy')
                <form method="post" action="{{ url('/articulos/'.$articulo->id) }}" style="display:inline ;" >
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


{{ $articulos->links() }}

</div>
@endsection