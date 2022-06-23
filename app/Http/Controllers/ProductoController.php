<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Marca;
//Dependencia validador
use Illuminate\Support\Facades\Validator;
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

        //VALIDACION DE LO DATOAS DEL FORM
        //1. Estabelcer reglas de validacion para la "input data"
        $reglas = [
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:15|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
           
        ];

        $mensajes=[
            "required" => "Campo Obligatorio",
            "alpha" => "Solo Letras",
            "numeric" => "Solo Numeros",
            "imagen" => "Debe ser una archivo imagen",
            "min" => "Valor minimo 15 valores",
            "max" => "Valor maximo 20 valores"
        ];

        //2. Crear el objeto validador
        $v = Validator::make($request->all(), $reglas, $mensajes);

        //3. Realizar validacion, fails() retorna, true: si la validacion falla
        //false  si los datos son validos
        if( $v->fails()){
            //Validacion incorrecta
            //mostrar la vista new llevand errores
            return redirect('productos/create')
                ->withErrors($v);
            //var_dump($v->errors());
        }else{
            //Validacion correcta
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
        //$producto->marca_id = $request->marca;
        //$producto->categoria_id = $request->categoria;
        $producto->save();
        echo "Producto Registrado Correctamente";

        //Redireccionar al Form, con mensaje de exito
        return redirect('productos/create')
            ->with("mensajito" , "Producto Registrado Correctamente");

        }
        die(var_dump($v->fails()));

        //Acceder a los datos del formulario
        //utilizando el objecto $request
        //echo "<pre>";
        //var_dump($request->all());
        //echo "</pre>";
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
