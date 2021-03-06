<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
use App\Models\producto;


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

//Llamamos a la funcion index del usuario (esta recoge los locales que se muestran en el index), y esta a su vez devuelve al index
Route::resource('/', UsuarioController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::get('/pedido', function () {
    return view('pedido');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/authlogin', function () {
    return view('auth.login');
});

Route::get('/auth/register', function () {
    return view('auth.register');
});

Route::get('/auth/verify', function () {
    return view('auth.verify');
});

Route::resource('usuario', UsuarioController::class);

Route::post('/usuario/login',  [UsuarioController::class,'login']);

Route::get('/local/{id}', [UsuarioController::class,'mostrarLocal']);

Route::get('/local', function(){
    return redirect('/');
});

Route::resource('producto', ProductoController::class);
Route::resource('pedido', PedidoController::class);

Route::get('/registrarProducto', [ProductoController::class,'registrarProducto']);

Route::post('/carrito', [PedidoController::class,'carrito']);

Route::post('/generarQR', [ProductoController::class, 'generarQR']);

Route::get('/logout', [UsuarioController::class, 'logout']);

Route::post('/hacerPedido', [PedidoController::class, 'store']);

Route::get('/vistaPedidos', [PedidoController::class, 'show']);

Route::get('/vistaLocales', [UsuarioController::class, 'show']);

Route::get('/registrarLocal', [UsuarioController::class, 'registrarLocal']);

Route::get('/perfil', [UsuarioController::class, 'perfil']);

Route::get('/eliminar', [UsuarioController::class, 'destroy']);
