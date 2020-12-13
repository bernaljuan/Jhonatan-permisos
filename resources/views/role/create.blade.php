@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
<div class="container">
    <div class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 mt-5 mx-auto titulo r p-2">
      <center><h1>Crear Rol</h1></center>
    </div>
    @include('custom.message')
    <form action="{{ route('role.store')}}" method="POST" class="col-xl-6 col-lg-6  col-md-12 col-sm-12 col-xs-12 mx-auto formulario">
      @csrf
      <input type="text" class="inp col-12 mt-3 mb-3" id="name" placeholder="Nombre:"name="name" value="{{ old('name')}}">
      <input type="text" class="inp col-12 mb-3" id="Slug:" placeholder="Slug" name="slug" value="{{ old('slug')}}">
      <textarea class="col-12 mb-3" placeholder="Description" name="description" id="description" rows="3"> 
        {{ old('description')}}
      </textarea>   
      <h3>Acceso total</h3>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
        @if (old('full-access')=="yes") 
          checked 
        @endif
        >
        <label class="custom-control-label" for="fullaccessyes">Yes</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" 
          @if (old('full-access')=="no") 
            checked 
          @endif
          @if (old('full-access')===null) 
            checked 
          @endif                      
        >
        <label class="custom-control-label" for="fullaccessno">No</label>
      </div>
      <hr>
      <h3>Lista de permisos</h3>
      @foreach($permissions as $permission)
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="permission_{{$permission->id}}" value="{{$permission->id}}"name="permission[]"
          @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
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
        <input class="br col-12 p-2 mb-3" type="submit" value="Ingresr Rol">
    </form>
</div>
@endsection
