@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
    <div class="container">
      <div class="titulo r col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-2 mx-auto">
        <center><h1>Ordenes</h1></center>
      </div>
      <div class="formulario col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-2 mx-auto">
        @if (session('message'))
                  <div class="alert alert-success">
                    {{ session('message') }}
                  </div>
              @endif

              @if ($orders->count() == 0)
                  <p>No hay ordenes aun.</p>
                  <a href="{{ route('user.order.create') }}" class="btn btn-success">Ordenar pizza</a>

                  @else
                  <div class="table-responsive">
                    <table class="table table-light col-12">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>A nombre de</th>
                          <th>Direccion</th>
                          <th>Tamaño</th>
                          <th>Adiciones</th>
                          <th>Instrucciones</th>
                          <th>Producto</th>
                          <th>cantidad</th>
                          <th>Existencia</th>
                          <th>Editar estados</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                            <tr>
                              <td>{{ $order->id }}</td>
                              <td>{{ $order->customer->name }}</td>
                              <td>{{ $order->address }}</td>
                              <td>{{ $order->size }}</td>
                              <td>{{ $order->toppings }}</td>
                              <td>{{ $order->instructions }}</td>
                              <td>{{ $order->products->nombre }}</td>
                              <td>{{ $order->cantidad }}</td>
                              <td>{{ $order->products->existencia }}</td>
                              @can('haveaccess','admin.order.edit')
                              <td><a href="{{ route('admin.order.edit', $order) }}">{{ $order->status->name }}</a></td>
                              @endcan
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              @endif
      </div>
    </div>
@endsection