@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
			<div class="card-header">Estado de pedido</div>

			<div class="card-body">
				@if(session('message'))
				<div class="alert alert-success">
					{{session('message')}}
				</div>
				@endif

				<order-progress status="{{ $order->status->name}}" initial="{{ $order->status->percent }}" order_id="{{ $order->id }}" ></order-progress>

				<order-alert user_id="{{ auth()->user()->id }}"></order-alert>
			<hr>

			<div class="order-details">
				<strong>Orden ID: </strong> {{$order->id}} <br>
				<strong>Tamaño: </strong>{{$order->size}} <br>
				<strong>Adiciones: </strong>{{$order->toppings}} <br>
				@if($order->instructions != '')
				<strong>Instrucciones: </strong>{{$order->instructions}}
				@endif
			</div>

			<br>
			<a class="btn btn-primary" href="{{route('user.order')}}">Regresar a ordenes</a>

		</div>
		</div>
		</div>
	</div>
</div>
@endsection