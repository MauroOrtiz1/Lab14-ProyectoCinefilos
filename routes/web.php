<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Pelicula;
use App\Models\Sala;
use App\Models\Cliente;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homeadmin', [App\Http\Controllers\HomeController::class, 'indexadmin'])->name('homeadmin');
Route::get('/peliculas', [App\Http\Controllers\PeliculaController::class, 'index'])->name('peliculas');
Route::post('/subirPelicula', [App\Http\Controllers\PeliculaController::class,'subirPelicula'])->name('subirPelicula');
Route::get('/pelicula/{ruta}',[App\Http\Controllers\PeliculaController::class,'mostrarPelicula']);
Route::post('/eliminarPelicula', [App\Http\Controllers\PeliculaController::class, 'eliminarPelicula'])->name('eliminarPelicula');
Route::get('/peliculas/{id}', [App\Http\Controllers\PeliculaController::class,'pagina']);

Route::get('/salas', [App\Http\Controllers\PeliculaController::class, 'index2'])->name('salas');
Route::post('/subirSala', [App\Http\Controllers\PeliculaController::class,'subirSala'])->name('subirSala');

Route::get('/horarios', [App\Http\Controllers\PeliculaController::class, 'index3'])->name('horarios');
Route::post('/subirHorario', [App\Http\Controllers\PeliculaController::class,'subirHorario'])->name('subirHorario');

Route::post('/subirEntrada', [App\Http\Controllers\PaymentController::class,'subirEntrada'])->name('subirEntrada');

Route::get('/payments/{id}', [App\Http\Controllers\PaymentController::class,'irPagar']);
Route::post('/subirCliente/{id}', [App\Http\Controllers\PaymentController::class,'subirCliente'])->name('subirCliente');
