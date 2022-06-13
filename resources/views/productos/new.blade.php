@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="blue-text  text-darken-1">Nuevo Producto:</h1>
</div>
<div class="row">
    <form action="{{ route('productos.store') }}" class="col s8" method="POST" enctype="multipart/form-data">
    
    @csrf 
   <div class="row">
        <div class="col s8 input-field">
            <input type="text" id="nombre" name="nombre" placeholder="nombre de producto" />
            <label for="nombre">Nombre de producto</label>
        </div>
    </div>
        
    <div class="row">
        <div class="col s8 input-field">
             <textarea name="desc" id="desc" class="materialize-textarea"></textarea>
             <label for="desc">Descripción</label>
        </div>
    </div>
    
    <div class="row">
        <div class="col s8 input-field">
            <input type="text" id="precio" name="precio"/>
            <label for="precio">Precio</label>
        </div>
    </div>
    
    <div class="row">
        <div class="col s8 file field input-field"></div>
            <div class="btn">
                <span>Imagen del Producto...</span>
                <input type="file" name="imagen" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s8 input-field">
            <select name="marcas" id="marca">
                @foreach($marcas as $marca)
                <option  value="{{ $marca->id }}">
                    {{ $marca->nombre }}
                </option>
                @endforeach

            </select>
            <label>Seleciona La Marca</label>
        </div>
    </div>
    <div class="row">
    <div class="col s8 input-field">
            <select name="categorias" id="categoria">
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">
                    {{ $categoria->nombre }}
                </option>
                @endforeach

            </select>
            <label>Seleciona La Categoria</label>
        </div>
    </div>
    <div class="row">
        <button class="btn waves-effect waves-light" type="submit">Enviar
            <i class="material-icons right"></i>
        </button>
    </div>
</form>
</div> 

@endsection