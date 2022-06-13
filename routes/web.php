<?php

use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;
                                                                                                                                 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta en laravel
Route::get('hola' , function(){
    echo "hola";
});

Route::get('arreglos', function(){
    $estudiantes =["AN" => "Ana",
                   "JU" => "Juana",
                   "PA" => "Paola"];
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    echo "<hr />";

    //agregar posicion

    $estudiantes[] ="Cristian";
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";

    //retirar elementos de arreglos

    echo "<hr />";
    unset($estudiantes["JU"]);
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
} );

//segunda ruta en laravel

Route::get('paises', function(){
    $paises = ["Colombia"  => [
        "Capital" => "Bogota", 
        "Moneda" => "Peso", 
        "Poblacion" => 51.6,
        "Cuidades" => [
            "Bogota",
            "Medellin",
            "Cali"
        ]

    ],

    "Peru"  => [
        "Capital" => "Lima", 
        "Moneda" => "Sol", 
        "Poblacion" => 32.97,
        "Cuidades" => [
            "Arequipa",
            "Cusco",
            "Piura"
        ]
    ],

    "Paraguay"  => [
        "Capital" => "Asuncion", 
        "Moneda" => "Guarani", 
        "Poblacion" => 7.13,
        "Cuidades" => [
            "Alberdi",
            "Cerrito",
            "Humaita"
        ]
    ]

    ];

    /*foreach($paises as $pais  => $infopais ){
        echo "<h1> $pais </h1>";
        echo "Capital:".$infopais["Capital"];
        echo "Moneda:".$infopais["Moneda"];
        echo "Poblacion:".$infopais["Poblacion"];
        echo "<hr />";*/

    /*foreach($paises as $pais  => $infopais ){
            echo "<h1> $pais </h1>";
    foreach($infopais as $clave => $valor){
        echo "$clave : $valor</br>";

    }
    echo "<hr />";

    }
    */

    //mostrar las vistas de paises
    return view("paises")
           ->with("paises" , $paises );

 
});

Route::get('prueba', function(){
    return view('productos.new');
});

Route::resource('productos', ProductoController::class);
