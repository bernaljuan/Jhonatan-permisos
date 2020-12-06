@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Ordenar Pizza</div>

				<div class="card-body">
					@if(session('status'))
					<div class="alert alert-success">
						{{session('status')}}
					</div>
					@endif

					<div class="row">
						<div class="col-lg-12">
							<form method="POST" action=" {{route('user.order.store')}} " class="form-horizontal">
								{{csrf_field()}}
							<div class="col-sm-10">
								<label class="col-sm-8 control-label"><strong>Pizza:</strong></label>
								
								<img src="{{ asset('storage').'/'. $dato->foto }}"  class="img-thumbnail img-fluid" alt="" width="150">
							</div>
								<br>
								<div class="form-group">
									<input type="hidden" name="product_id" value="{{ $dato->id }}">
									<div class="col-sm-10">
										<input type="text"  name="product_id" class="form-control"
										value={{ $dato->nombre }} disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-8 control-label"><strong>Direccion</strong></label>
									<div class="col-sm-10">
										<input type="text" name="address" placeholder="Tu direccion" class="form-control" autofocus>
									</div>
								</div>		
								<div class="form-group">
									<label class="col-sm-8 control-label"><strong>Tamaño</strong></label>
									<div class="col-sm-10">
										<div>
											<label><input type="radio" checked="" name="size" value="medium" id="medium"> Medio </label>
										</div>
										<div>
											<label><input type="radio" name="size" value="large" id="large"> Grande </label>
										</div>
										<div>
											<label><input type="radio" name="size" value="extra-large" id="extra-large"> Extra grande </label>
										</div>
									</div>
								</div>

								<div class="hr-line-dashed"></div>

								<div class="form-group">
									<label class="col-sm-8 control-label"><strong>Adiciones</strong></label>
									<div class="col-sm-10">
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
									</div>
								</div>

								<div class="hr-line-dashed"></div>
								<div class="hr-line-dashed"></div>

								<div class="form-group">
									<label class="col-sm-8 control-label"><strong>Instrucciones</strong></label>
									<div class="col-sm-10">
										<input type="text" name="instructions" placeholder="Instrucciones especiales" class="form-control">
									</div>
								</div>

								<div class="hr-line-dashed"></div>

								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<button class="btn btn-success" type="submit">Ordenar ahora</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection