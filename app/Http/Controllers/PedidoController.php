<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StoreproductoRequest;
use App\Http\Requests\UpdateproductoRequest;
use App\Models\producto;

class PedidoController extends Controller
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
     * @param  \App\Http\Requests\StorePedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoRequest  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function carrito(Request $request){
        $accion = $request->accion;
        $idProducto = $request->idProducto;
        $cantidad = $request->cantidad;

        switch($accion){
            case "add":
                $producto = DB::table('productos')
                    ->where('id','=',$idProducto)
                    ->get();
                $nombreProducto = $producto[0]['nombreProducto'];
                $precio = $producto['0']['precio'] * $cantidad;
                $productoArray = array($idProducto=>array('nombreProducto' => $nombreProducto, 'cantidad' => $cantidad, 'precio' => $precio));

                if(Session::has('compra')){
                    $carrito = Session::get('compra');
                    if(in_array($idProducto, $carrito)){
                        $carrito[$idProducto]['cantidad'] = $cantidad;
                    Session::put('compra', $carrito);
                    }else{
                        Session::put('compra',array_merge($carrito,$productoArray));
                    }
                }else{
                    Session::put('compra', $productoArray);
                }
            break;

            case "eliminar":
                $carrito = Session::get('compra');
                unset($carrito,$idProducto);
                Session::put('compra', $carrito);
            break;
            case "vaciar":
                Session::forget('compra');
            break;
        }
    }
}