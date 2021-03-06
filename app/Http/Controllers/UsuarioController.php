<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //En el index queremos mostrar los locales, vamos a seleccionar todos los usuarios con rol 1
        $locales = DB::table('usuarios')
            ->where('rolUsuario', '=', 1)
            ->inRandomOrder()
            ->limit(1)
            ->get();
        //Seleccionamos también 5 productos aleatoriamente
        $productos = DB::table('productos')
            ->inRandomOrder()
            ->limit(6)
            ->get();
        return view('index',['locales'=>$locales, 'productos'=>$productos]);
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
        //Eliminamos el token de seguridad @csrf (Dominios de origen cruzado) y la repetición de la contraseña
        $datosUsuario = request() ->except('_token', 'password_confirmation');

        //Encriptamos la contraseña
        $password = request('password');
        $hash = Hash::make($password);
        $datosUsuario['password'] = $hash;

        if($request ->hasFile(('foto'))){
            $datosUsuario['foto'] = $request->file('foto')->store('uploads','public');
        }


        //TODO Comprobar que el correo exista antes de insertar el usuario
        try{
            Usuario::insert($datosUsuario);
            return redirect('/')->with('mensaje','Te has registrado correctamente');
        }catch(Exception $err){
            return "Error ".$err;
        }
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
        $locales = DB::table('usuarios')
        ->where('rolUsuario', '=', 1)
        ->paginate(3);
        return view('vistaLocales',['locales'=>$locales]);
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
    public function destroy()
    {
        //
        if(Session::has('usuario')){
            $id = Session::get('usuario')['id'];
            Usuario::destroy($id);
            Session::flush();
            return redirect('/')->with('mensaje','Cuenta eliminada correctamente');
        }else{
            return redirect('/');
        }

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

    public function mostrarLocal($id){
        try{
            $local = Usuario::where('rolUsuario',1)->findOrFail($id);
            $productos = DB::table('productos')
                        ->where('idLocal','=',$id)
                        ->get();
            return view('local',['local'=>$local,'productos'=>$productos]);
        }catch(Exception $err){
            //Si se accede a un id que no sea de local (rol 1) o un id que no exista, redireccionamos al index
            return redirect('/');
        }
    }

    public function logout(){
        //Borramos todos los datos de la sesión
        Session::flush();
        return redirect('/');
    }

    public function registrarLocal(){
        if(Session::get('usuario')['rolUsuario'] == 2){
            return view('registrarLocal');
        }else{
            //Si no se accede a la página con un rol de trabajador, no se permitirá acceder al formulario ni crear locales
            return redirect('/');
        }
    }

    public function perfil(){
        if(Session::has('usuario')){
            return view('perfil');
        }else{
            //Si no hay un usuario registrado, devolvemos al index
            return redirect('/');
        }
    }
}