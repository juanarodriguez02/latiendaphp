<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=Marca::all();
        $categorias=Categoria::all();
        //redirecioanmos a la vista
        return view('productos.new')
             ->with("marcas", $marcas)
             ->with("categorias", $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Acceder a los datos del formulario
        //utilizando el objecto $request
        //echo "<pre>";
        //var_dump($request->all());
        //echo "</pre>";

        //crear objeto 
        $archivo = $request->imagen;
        //captura nombre "original" del archvio desde cliente
        $nombre_archivo = $archivo->getClientOriginalName();
        var_dump($nombre_archivo);
        //mover el archivo a la carpeta "public/img"
        $ruta = public_path();
        //var_dump($ruta);
        $archivo->move("$ruta/img" , $nombre_archivo);

        var_dump($request->marcas);
        //registrar producto en la BD
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->desc = $request->desc;
        $producto->precio = $request->precio;
        $producto->imagen = $nombre_archivo;
        $producto->marca_id = 1;
        $producto->categoria_id = 1;
        $producto->save();
        echo "Producto Registrado Correctamente";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
