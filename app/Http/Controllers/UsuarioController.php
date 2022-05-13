<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        $datosUsuario = request() ->except('_token', 'password_confirmation');
        //Y la repetición de la contraseña

        //Encriptamos la contraseña
        $password = request('password');
        $hash = Hash::make($password);
        $datosUsuario['password'] = $hash;
        Usuario::insert($datosUsuario);
        return redirect('/')->with('mensaje','Te has registrado correctamente');
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
        /* Prueba de sesiones
        $credenciales = $request->only('correo','password');

        Auth::attempt($credenciales);
        $user = Auth::User();
        Session::put('usuario',$user);
        $user = Session::get('usuario');
        //var_dump($user);
        return redirect('/')->with('mensaje','Has iniciado sesión!');*/



        $credenciales = $request->only('correo','password');
        if(Auth::attempt($credenciales)){
            $user = Auth::User();
            Session::put('usuario',$user);
            return redirect('/')->with('mensaje','Has iniciado sesión!');
        }else{
            return redirect('login')->with('mensaje', 'Error al iniciar sesión');

        }

/**
 * Función de referencia
 * if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
    RateLimiter::hit($this->throttleKey());

    throw ValidationException::withMessages([
        'email' => trans('auth.failed'),
    ]);
}
 */
    }
}