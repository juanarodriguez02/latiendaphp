@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="blue-text  text-darken-1">Nuevo Producto:</h1>
</div>
<div class="row">
    <form action="" 
    class="col s8" 
    method="POST">
   <div class="row">
     <div class="col s8 input-field">
        <input type="text" id="nombre" name="nombre" placeholder="nombre de producto" />
            <label for="nombre">nombre de producto</label>
          </div>
        </div>
        <div class="col s8 input-field">
            <textarea name="descripcion" id="desc" class="materialize-textarea"></textarea>
            <label for="desc">descripcion</label>
           </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="precio" name="precio"/>
                <label for="id">precio</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 file field input-field"></div>
              <div class="btn">
                  <span>Imagen Del Producto...</span>
                  <input type="file" name="imagen" />
              </div>
              <div class="file-path-wrapper">
                  <input type="type" class="file-path">
              </div>
        </div>
    </form>
</div>

@endsection