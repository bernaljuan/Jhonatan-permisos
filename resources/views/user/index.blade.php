@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
<div class="container">
    <div class="titulo r col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 mt-5 mx-auto p-3">
      <center><h1>Lista de Usuarios</h1></center>
    </div>
    <div class="formulario col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 p-2 mx-auto">
      @include('custom.message')
      
      <table class="table table-light col-12">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th colspan="3">Acciones</th>
          </tr>
        </thead>
        <tbody>
          
            
            @foreach ($users as $user)
            
            <tr>
                <th scope="row">{{ $user->id}}</th>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>
                @isset( $user->roles[0]->name )
                  {{ $user->roles[0]->name}}
                @endisset
                
                </td> 
                <td> 
                @can('view', [$user, ['user.edit','userown.edit'] ])
                  <a class="btn btn-success" href="{{ route('user.edit',$user->id)}}">Editar</a> 
                @endcan
                </td>  
                <td> 
                @can('haveaccess','user.destroy')
                  <form action="{{ route('user.destroy',$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Eliminar</button>
                  </form>
                @endcan
                  

                </td>  
            </tr>      
            @endforeach
            

            
          
         
        </tbody>
      </table>

      {{ $users->links() }}
    </div>
</div>
@endsection
