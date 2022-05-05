<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;

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
    return view('index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/local', function () {
    return view('local');
});

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