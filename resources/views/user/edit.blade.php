@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../../css/estilo2.css">
<link rel="stylesheet" href="../../css/log.css">
<div class="container">
    <div class="titulo r col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 p-3 mx-auto">
      <center><h1>Editar Usuario</h1></center>
    </div>
    @include('custom.message')
    <form action="{{ route('user.update', $user->id)}}" class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 formulario mx-auto" method="POST">
      @csrf
      @method('PUT')
      <input type="text" class="mt-3 mb-3 col-12 inp" id="name" placeholder="Name"name="name" value="{{ old('name', $user->name)}}">
      <input type="text" class="mb-3 col-12 inp"  id="email" placeholder="email"name="email" value="{{ old('email' , $user->email)}}">
      <select  class="col-12 mb-3 inp"  name="roles" id="roles">
        @foreach($roles as $role)
          <option value="{{ $role->id }}"
            @isset($user->roles[0]->name)
              @if($role->name ==  $user->roles[0]->name)
                selected
              @endif
            @endisset
          
          
          >{{ $role->name }}</option>
        @endforeach
      </select>
      <input class="br p-2 mb-3 col-12" type="submit" value="Editar Usuario">
    </form>
</div>
@endsection
