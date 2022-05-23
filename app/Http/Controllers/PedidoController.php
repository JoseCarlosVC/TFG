<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
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
        //Si el usuario no ha iniciado sesión, o bien no tiene nada en el pedido, no mostraremos esta página
        if (Session::has('usuario') && Session::get('usuario')['rolUsuario'] == 0 && Session::has('compra')){
            return view('pedido');
        }else{
            return redirect('/');
        }
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
    public function store(Request $request)
    {
        $idUsuario = Session::get('usuario')['id'];
        try {
            //Como necesitamos el id del pedido para almacenar cada línea del pedido en la tabla Pedidos, usaremos la función InsertGetID, la cual insertará los datos en la tabla usuario_pedidos y devolverá el id del registro creado
            $idPedido = DB::table('usuario__pedidos')->insertGetId([
                'idUsuario' => $idUsuario,
                'created_at' => now()
            ]);
            $pedido = Session::get('compra');
            foreach($pedido as $producto){
                DB::table('pedidos')->insert([
                    'idPedido' => $idPedido,
                    'idProducto' => $producto['id'],
                    'cantidad' => $producto['cantidad'],
                    'precio' => $producto['precio']
                ]);
            }
            //Borramos la sesión por si se quiere hacer otro pedido
            Session::forget('compra');
        } catch (Exception $err) {
            dd($err);
        }
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
                $nombreProducto = $producto[0]->nombreProducto;
                $precio = $producto['0']->precio * $cantidad;
                $foto = $producto[0]->foto;
                $productoArray = array($idProducto=>array('id' => $idProducto, 'nombreProducto' => $nombreProducto, 'cantidad' => $cantidad, 'precio' => $precio, 'foto' => $foto));
                if(Session::has('compra')){
                    $carrito = Session::get('compra');
                    if(array_key_exists($idProducto, $carrito)){
                        $carrito[$idProducto]['cantidad'] += $cantidad;
                        $carrito[$idProducto]['precio'] = $carrito[$idProducto]['cantidad'] * $producto['0']->precio;
                        Session::put('compra', $carrito);
                    }else{
                        Session::put('compra',$carrito+$productoArray);
                    }
                }else{
                    Session::put('compra', $productoArray);
                    //Enviamos un mensaje la primera vez que se añade un producto para que en la respuesta de AJAX se refresque la página. Así aparecerá la pestaña 'pedido' en la que podremos ver el pedido del usuario y tramitarlo
                    return response()->json(['mensaje'=>'SessionCreated']);
                }
            break;

            case "eliminar":
                $carrito = Session::get('compra');
                unset($carrito[$idProducto]);
                if(empty($carrito)){
                    //Si después de borrar el elemento, la sesión queda vacía, la destruimos
                    Session::forget('compra');
                    return response()->json(['mensaje'=>'SessionDestroyed']);
                }else{
                    Session::put('compra', $carrito);
                    return response()->json(['mensaje'=>'SessionCreated']);
                }
            break;

            case "vaciar":
                Session::forget('compra');
                return response()->json(['mensaje'=>'SessionDestroyed']);
            break;
        }
    }
}