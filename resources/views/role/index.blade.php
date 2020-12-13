@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
<div class="container">
  <div class="col-8 mx-auto titulo r p-2">
      <center><h1>Roles</h1></center>
  </div>
  <div class="formulario col-8 mx-auto p-3">
      @can('haveaccess','role.create')
        <a href="{{route('role.create')}}"><button class="br col-12 p-2 mt-3">Crear Rol</button></a><hr>
      @endcan
      @include('custom.message')            
        <table class="table table-light col-12">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Slug</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Acceso total</th>
              <th colspan="3">Acciones</th>
            </tr>
          </thead>
          <tbody>           
            @foreach ($roles as $role)
              <tr>
                <th scope="row">{{ $role->id}}</th>
                <td>{{ $role->name}}</td>
                <td>{{ $role->slug}}</td>
                <td>{{ $role->description}}</td>
                <td>{{ $role['full-access']}}</td>                            
                <td> 
                  @can('haveaccess','role.show')
                    <a class="btn btn-info" href="{{ route('role.show',$role->id)}}">Ver</a> 
                  @endcan 
                </td>  
                <td> 
                  @can('haveaccess','role.edit')
                    <a class="btn btn-success" href="{{ route('role.edit',$role->id)}}">Editar</a> 
                  @endcan
                </td>  
                <td> 
                  @can('haveaccess','role.destroy')
                  <form action="{{ route('role.destroy',$role->id)}}" method="POST">
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
      {{ $roles->links() }}
  </div>
@endsection
