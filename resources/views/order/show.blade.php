@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
<div class="col-6 mx-auto mt-5 r titulo p-3">
	<center><h1>Estado de orden</h1></center>
</div>
<div class="formulario col-6 mx-auto">
	@if(session('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
	@endif
	<order-progress class="p-2" status="{{ $order->status->name}}" initial="{{ $order->status->percent }}" order_id="{{ $order->id }}" ></order-progress>
	<order-alert user_id="{{ auth()->user()->id }}"></order-alert><hr>
	<div class="ml-3">
		<strong>Orden ID: </strong> {{$order->id}} <br>
		<strong>Tamaño: </strong>{{$order->size}} <br>
		<strong>Adiciones: </strong>{{$order->toppings}} <br>
		@if($order->instructions != '')
		<strong>Instrucciones: </strong>{{$order->instructions}}
		@endif
	</div>
	<hr>
	<a href="{{route('user.order')}}"><button class="br p-2 col-12 mb-3">Regresar a Ordenes</button></a>
</div>
@endsection