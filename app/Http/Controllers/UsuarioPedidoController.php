<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuario_PedidoRequest;
use App\Http\Requests\UpdateUsuario_PedidoRequest;
use App\Models\Usuario_Pedido;

class UsuarioPedidoController extends Controller
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
     * @param  \App\Http\Requests\StoreUsuario_PedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuario_PedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario_Pedido  $usuario_Pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario_Pedido $usuario_Pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario_Pedido  $usuario_Pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario_Pedido $usuario_Pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuario_PedidoRequest  $request
     * @param  \App\Models\Usuario_Pedido  $usuario_Pedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuario_PedidoRequest $request, Usuario_Pedido $usuario_Pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario_Pedido  $usuario_Pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario_Pedido $usuario_Pedido)
    {
        //
    }
}
