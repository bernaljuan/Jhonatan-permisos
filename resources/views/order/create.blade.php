@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../css/estilo2.css">
<link rel="stylesheet" href="../css/log.css">
<div class="container">
	<div class="r p-3 col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 titulo mx-auto mt-5">
		<h1>Ordenar Pizza</h1>
	</div>
	<form method="POST" action="{{route('user.order.store')}}" class="formulario-crear col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 formulario mx-auto">
		{{csrf_field()}}
		@if(session('status'))
			<div class="alert alert-danger col-12">
				{{session('status')}}
			</div>
		@endif
		<img src="{{ asset('storage').'/'. $dato->foto }}"  class="img-thumbnail img col-12 img-fluid" alt="" width="150">
		<input type="hidden" name="product_id" value="{{ $dato->id }}">
		<input type="text"  name="product_id" class="col-12 inp mt-3 mb-3" value={{ $dato->nombre }} disabled>
		<input type="text" name="address" placeholder="Direccion:" class="col-12 inp mb-3" autofocus>
		<label>Tamaño:</label><hr>
		<label><input type="radio" checked="" name="size" value="medium" id="medium"> Medio </label>
		<label><input type="radio" name="size" value="large" id="large"> Grande </label>
		<label><input type="radio" name="size" value="extra-large" id="extra-large"> Extra grande </label><hr>
		<label>Adicionales:</label><hr>
		
		<label class="checkbox-inline">
			<input type="checkbox" name="toppings[]" value="pepperoni" id="pepperoni"> Pepperoni
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" name="toppings[]" value="extra-cheese" id="extra-cheese"> Extra queso
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" name="toppings[]" value="mushrooms" id="mushrooms"> Champiñones
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" name="toppings[]" value="ground-beef" id="ground-beef"> Carne molida
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" name="toppings[]" value="pineapple" id="pineapple"> Piña
		</label>
		<hr>
		<input type="text" name="instructions" placeholder="Instrucciones especiales" class="col-12 inp mb-3">
		<input type="text" name="cantidad" placeholder="Cantidad" class="col-12 inp mb-3" autofocus>
		<button class="br col-12 p-3 mt-3 mb-3" type="submit" onclick="return confirm('¿Esta seguro de confirmar su orden?');" > Hacer orden </button>

	</form>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

	$('formulario-crear').submit(function(e){
		e.preventDefault();
		

		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire(
			'Deleted!',
			'Your file has been deleted.',
			'success'
			)
		}
		})





	});

</script>

@endsection
