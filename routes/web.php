<?php

use App\Http\Controllers\ComentarioeventoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\LugarturisticoController;
use App\Models\lugarturistico;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});



Route::controller(EventoController::class)->group(function () {
    Route::get('/eventos', 'index')->name('verEventos');
    Route::post('/eventos', 'store')->name('crearEvento');
    Route::get('/gestionarEventos', 'gestionar')->name('gestionarEventos')->middleware(['admin']);
    Route::get('/gestionarEventos/{id}', 'obtener')->name('gestionarEventos2');
    Route::post('/eliminarEvento','eliminar')->name('eliminarEvento');
});

Route::controller(ComentarioeventoController::class)->group(function () {
    Route::post('/crearComentario', 'store')->name('crearcomentario');
});

Route::controller(LugarturisticoController::class)->group(function () {
    Route::get('/lugares', 'index')->name('verLugares');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
