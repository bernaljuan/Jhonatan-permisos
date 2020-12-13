@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../../css/estilo2.css">
<link rel="stylesheet" href="../../css/log.css">
<div class="container">
    <div class="titulo r mx-auto col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 p-3">
      <center><h1>Editar Rol</h1></center>
    </div>
    @include('custom.message')
    <form action="{{ route('role.update', $role->id)}}" method="POST" class="mx-auto col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario">
      @csrf
      @method('PUT')
      <br>
      <input type="text" class="col-12 inp mt-3 mb-3 " id="name" placeholder="Nombre:" name="name" value="{{ old('name', $role->name)}}">
      <input type="text" class="col-12 inp mb-3" id="slug" placeholder="Slug:"name="slug"value="{{ old('slug' , $role->slug)}}">
      <textarea class="col-12 mb-3" placeholder="Description" name="description" id="description" rows="3">{{old('description', $role->description)}}</textarea>
      <h3>Acceso total</h3>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                            @if ( $role['full-access']=="yes") 
                              checked 
                            @elseif (old('full-access')=="yes") 
                              checked 
                            @endif
                            
                            
                            >
                            <label class="custom-control-label" for="fullaccessyes">Yes</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" 
                            
                            @if ( $role['full-access']=="no") 
                              checked 
                            @elseif (old('full-access')=="no") 
                              checked 
                            @endif
                            
                            
                            >
                            <label class="custom-control-label" for="fullaccessno">No</label>
                          </div>

                          <hr>
                          <h3>Lista de permisos</h3>


                          @foreach($permissions as $permission)

                          
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" 
                            class="custom-control-input" 
                            id="permission_{{$permission->id}}"
                            value="{{$permission->id}}"
                            name="permission[]"

                            @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                            checked

                            @elseif( is_array($permission_role) && in_array("$permission->id", $permission_role)    )
                            checked

                            @endif
                            >
                            <label class="custom-control-label" 
                                for="permission_{{$permission->id}}">
                                {{ $permission->id }}
                                - 
                                {{ $permission->name }} 
                                <em>( {{ $permission->description }} )</em>
                            
                            </label>
                          </div>


                          @endforeach
                          <hr>
                          <input class="br col-12 p-2 mb-3" type="submit" value="Editar Rol">
    </form>
</div>
@endsection
