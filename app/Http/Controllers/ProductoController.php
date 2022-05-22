<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StoreproductoRequest;
use App\Http\Requests\UpdateproductoRequest;
use App\Models\producto;
use Illuminate\Support\Facades\Session;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosProducto = request() ->except('_token');
        if($request ->hasFile(('foto'))){
            $datosProducto['foto'] = $request->file('foto')->store('uploads','public');
        }

        try{
            Producto::insert($datosProducto);
            $local = Session::get('usuario')['id'];
            return redirect('local/'.$local)->with('mensaje','Producto registrado correctamente');
        }catch(Exception $err){
            return "Error ".$err;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductoRequest  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductoRequest $request, producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }

    public function registrarProducto(){
        if(Session::get('usuario')['rolUsuario'] == 1){
            return view('registrarProducto');
        }else{
            //Si no se accede a la página con un rol de local, no se permitirá acceder al formulario ni crear productos
            return redirect('/');
        }

    }

    public function guardar(){

    }

    public function generarQR(Request $request){
        //Recogemos los datos del producto...
        $nombre = $request->nombre;
        $precio = $request->precio;
        $detalles = $request->detalles;
        //Incluimos el formato de salida que tendrá el texto generado por el qr y lo adaptamos a formato de url
        $textoQR = "Nombre del producto: ".$nombre." || Precio: ".$precio." || Detalles: ".$detalles;
        $textoLink = urlencode($textoQR);
        //Devolvemos la llamada a la api con los datos y las opciones de personalizacion
        return response()->json(['url'=>'http://api.qrserver.com/v1/create-qr-code/?data='.$textoLink.'&size=200x200&bgcolor=E7E393']);
    }
}