<div class="form-group">
    <label for=""> Producto </label>
        <select name="product_id" id="inputproducto_id" class="form-control"  >
            <option value="">-- Escoja el producto --</option>
            @foreach ($products as $product)
                @if ($post == null)
                    <option value="{!! $product->id !!}" >{{  $product['nombre'] }}   </option>                
                @else
                    <option value="{{ $product['id'] }}" {{  $product['id']   ==   $post['product_id']  ? 'selected' : '' }}>{{  $product['nombre'] }}   </option>             
                @endif
            @endforeach
        </select>
    </div>



<div class="form-group">
    <label for="nombre" class="control-label" >{{ 'nombre' }}</label>
    <input type="text" class="form-control  {{$errors->has('nombre')?'is-invalid':''  }}  " name="nombre" id="nombre" 
    value="{{ isset($post->nombre)?$post->nombre:old('nombre') }}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <label for="descripcion" class="control-label" >{{ 'descripcion' }}</label>
    <input type="text" class="form-control  {{$errors->has('descripcion')?'is-invalid':''  }}  " name="descripcion" id="descripcion" 
    value="{{ isset($post->descripcion)?$post->descripcion:old('descripcion') }}">
    {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
<label for=""> Categoria </label>
    <select name="categoria_id" id="inputcategoria_id" class="form-control"  >
        <option value="">-- Escoja la categoria --</option>
        @foreach ($categorias as $categoria)
            @if ($post == null)
                <option value="{!! $categoria->id !!}" >{{  $categoria['nombre'] }}   </option>                
            @else
                <option value="{{ $categoria['id'] }}" {{  $categoria['id']   ==   $post['categoria_id']  ? 'selected' : '' }}>{{  $categoria['nombre'] }}   </option>             
            @endif
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="foto" class="control-label" >{{ 'foto' }}</label>
    @if(isset($post->foto))
        <img  class="img-thumbnail img-fluid" alt="" width="150" src="{{ asset('storage').'/'. $post->foto }}" alt="" >
    @endif
    <input type="file" class="form-control {{$errors->has('foto')?'is-invalid':''  }} " name="foto" id="foto" accept="image/*">
    {!! $errors->first('foto','<div class="invalid-feedback">:message</div>') !!}
</div>
<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar ' : 'Modificar ' }}">
<a class="btn btn-primary" href="{{ url('posts') }}">Regresar</a>
