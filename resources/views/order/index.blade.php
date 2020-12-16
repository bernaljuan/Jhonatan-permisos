@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
<div class="container">
	<center><h1>Mis Ordenes</h1></center><hr>
	@if(session('message'))
		<div class="alert alert-danger col-12">
			{{ session('message') }}
		</div>
	@endif
	@if($orders->count() == 0)
		<div class="alert alert-danger" role="alert">
			Aun no tiene ordenes.
	  	</div>
		<a href="{{route('home')}}" class="br col-12 p-3">Ordenar Pizza</a>
	@else
	<order-alert user_id="{{ auth()->user()->id }}"></order-alert>
	<div class="table table-responsive">
		<table class="table table-light col-12">
			<thead>
				<tr>
					<th>ID</th>
					<th>Direccion</th>
					<th>Tamaño</th>
					<th>Adiciones</th>
					<th>Instrucciones</th>
					<th>Cantidad</th>
					<th>Valor a pagar</th>
					<th>Editar</th>
					<th>Eliminar</th>

					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
					<tr>
						<td> {{$order->id}} </td>
						<td> {{$order->address}} </td>
						<td> {{$order->size}} </td>
						<td> {{$order->toppings}} </td>
						<td> {{$order->instructions}} </td>
						<td> {{$order->cantidad}} </td>
						<td> $ {{$order->products->precio_venta * $order->cantidad }}</td>
						<td><a class="btn btn-danger" href="{{route("user.order.edit",[$order])}}">
							Editar
						</a></td>
						 
						<td><a href="{{route('user.order.show', $order)}}">{{$order->status->name}}</a></td>

					

						<td>

						<form action="{{route("user.order.destroy", [$order])}}" method="post">
							@method("delete")
							@csrf
						   

							<button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" > Borrar </button>
						</form>
					</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
</div>
@endsection