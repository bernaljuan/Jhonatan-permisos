@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Admin Dashboard</div>

            <div class="card-body">
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
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>A nombre de</th>
                          <th>Direccion</th>
                          <th>Tamaño</th>
                          <th>Adiciones</th>
                          <th>Instrucciones</th>
                          <th>Producto</th>
                          <th>Editar estado</th>
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
                              <td>{{ $order->articulos->Nombre }}</td>
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
        </div>
      </div>
    </div>
@endsection