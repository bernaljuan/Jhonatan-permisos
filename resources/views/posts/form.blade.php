<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/log.css">
<div class="form-group">
        <select name="product_id" id="inputproducto_id" class="inp col-12 mt-3 mb-3"  >
            <option value=""> Escoja el producto </option>
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
    <input type="text" class="col-12 inp mb-3  {{$errors->has('nombre')?'is-invalid':''  }}  " placeholder="Nombre:" name="nombre" id="nombre" 
    value="{{ isset($post->nombre)?$post->nombre:old('nombre') }}">
{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <input type="text" class="col-12 mb-3 inp {{$errors->has('descripcion')?'is-invalid':''  }}  " placeholder="Descripcion:" name="descripcion" id="descripcion" 
    value="{{ isset($post->descripcion)?$post->descripcion:old('descripcion') }}">
    {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">

    <select name="categoria_id" id="inputcategoria_id" class="col-12 mb-3 inp"  >
        <option value=""> Escoja la categoria </option>
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
<input type="submit" class="br col-12 p-2 mb-2" value="{{ $Modo=='crear' ? 'Agregar ' : 'Modificar ' }}">
<a class="btn btn-primary col-12 mb-3" href="{{ url('posts') }}">Regresar</a>
