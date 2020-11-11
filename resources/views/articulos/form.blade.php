

<div class="form-group">
    <label for="Nombre" class="control-label" >{{ 'Nombre' }}</label>
    <input type="text" class="form-control  {{$errors->has('Nombre')?'is-invalid':''  }}  " name="Nombre" id="Nombre" 
    value="{{ isset($articulo->Nombre)?$articulo->Nombre:old('Nombre') }}">
{!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <label for="cant" class="control-label" >{{ 'cant' }}</label>
    <input type="text" class="form-control  {{$errors->has('cant')?'is-invalid':''  }}  " name="cant" id="cant" 
    value="{{ isset($articulo->cant)?$articulo->cant:old('cant') }}">
    {!! $errors->first('cant','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <label for="Precio" class="control-label">{{ 'Precio' }}</label>
    <input type="text" class="form-control  {{$errors->has('Precio')?'is-invalid':''  }}  " name="Precio" id="Precio" 
    value="{{ isset($articulo->Precio)?$articulo->Precio:old('Precio') }}">
    {!! $errors->first('Precio','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for=""> Categoria </label>
    <select name="categoria_id" id="inputcategoria_id" class="form-control"  >
        <option value="">-- Esoja la categoria --</option>
        @foreach ($categorias as $categoria)
            @if ($articulo == null)
                <option value="{!! $categoria->id !!}" >{{  $categoria['nombre'] }}   </option>                
            @else
                <option value="{{ $categoria['id'] }}" {{  $categoria['id']   ==   $articulo['categoria_id']  ? 'selected' : '' }}>{{  $categoria['nombre'] }}   </option>             
            @endif
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="foto" class="control-label" >{{ 'foto' }}</label>
    @if(isset($articulo->foto))
        <img  class="img-thumbnail img-fluid" alt="" width="150" src="{{ asset('storage').'/'. $articulo->foto }}" alt="" >
    @endif
    <input type="file" class="form-control {{$errors->has('foto')?'is-invalid':''  }} " name="foto" id="foto" accept="image/*">
    {!! $errors->first('foto','<div class="invalid-feedback">:message</div>') !!}
</div>
<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar ' : 'Modificar ' }}">
<a class="btn btn-primary" href="{{ url('articulos') }}">Regresar</a>
