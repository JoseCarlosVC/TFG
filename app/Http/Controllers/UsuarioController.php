<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller
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
        return view('signin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Eliminamos el token de seguridad @csrf (Dominios de origen cruzado)
        $datosUsuario = request() ->except('_token');
        //Encriptamos la contraseña
        $password = request('password');
        $hash = Hash::make($password);
        $datosUsuario['password'] = $hash;
        Usuario::insert($datosUsuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Usuario::destroy($id);
        return redirect('usuario');
    }

    public function login(Request $request){
        $correo = request('correo');

        $datos = Usuario::find(3);
        var_dump($datos);
        /*if($datos){
            return redirect('/')->with('mensaje','Has iniciado sesión!');
        }else{
            return redirect('login')->with('mensaje', 'Error al iniciar sesión');
        }
*/





/*
        request()->validate([
            'correo' => 'required',
            'password' => 'required',
        ]);

        $credenciales = $request->only('email', 'password');
        if(Auth::attempt($credenciales)){
            return redirect('index')->with('mensaje','Has iniciado sesión!');
        }else{
            return redirect('login')->with('mensaje', 'Error al iniciar sesión');
        }*/
    }
}