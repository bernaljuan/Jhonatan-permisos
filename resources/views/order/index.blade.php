@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Mis ordenes</div>

				<div class="card-body">
					@if(session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
					@endif

					@if($orders->count() == 0)
					<p>Aun no hay ordenes.</p>
					<a href="{{route('home')}}" class="btn btn-success">Ordenar Pizza</a>
					@else

					<order-alert user_id="{{ auth()->user()->id }}"></order-alert>

					<div class="table table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>ID</th>
									<th>Direccion</th>
									<th>Tamaño</th>
									<th>Adiciones</th>
									<th>Instrucciones</th>
									<th>Valor a pagar</th>

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
										<td> {{$order->products->precio_venta * $order->cantidad }}</td>
										<td><a href="{{route('user.order.show', $order)}}">{{$order->status->name}}</a></td>
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