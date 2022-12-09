<?php

use App\Http\Controllers\ciudadesController;
use App\Http\Controllers\ComentarioeventoController;
use App\Http\Controllers\ComentariolugarController;
use App\Http\Controllers\departamentoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\LugarturisticoController;
use App\Http\Controllers\RelacionController;
use App\Http\Controllers\subEventoController;
use App\Models\ciudades;
use App\Models\departamento;
use App\Models\lugarturistico;
use Illuminate\Support\Facades\Http;
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
    return view('home');
})->name('home');

Route::get('prueba', function () {
    return view('eventos.plantilla');
});


Route::get('/Eventos', [RelacionController::class,'index'])->name('verEventos');



Route::controller(EventoController::class)->group(function () {
    // Route::get('/eventos', 'index')->name('verEventos');
    Route::post('/eventos', 'store')->name('crearEvento');
    Route::get('/buscarEventos','buscar')->name('buscarEventos');
    Route::get('/gestionarEventos', 'gestionar')->name('gestionarEventos')->middleware(['admin']);
    Route::get('/gestionarEventos/{id}', 'obtener')->name('gestionarEventos2');
    Route::post('/eliminarEvento','eliminar')->name('eliminarEvento');
    Route::post('/actualizarEvento','actualizarEvento')->name('actualizarEvento');
});

Route::controller(subEventoController::class)->group(function () {
Route::get('/gestionarSubEventos','gestionar')->name('gestionarSubEventos')->middleware('admin');
Route::post('/subEventos','crear')->name('crearSubEventos');
Route::get('/mostrarSubEvento/{id}','mostrar')->name('mostrarSubEvento');
Route::post('/ActualizarSubEventos','Actualizar')->name('ActualizarSubEventos');
Route::post('eliminarSubEvento','eliminar')->name('eliminarSubEvento');
});

Route::controller(LugarturisticoController::class)->group(function () {
    Route::get('/lugares', 'index')->name('lugares');
    Route::get('/buscarLugar','buscar')->name('buscarLugar');
    Route::get('/gestionarLugares', 'create')->name('gestionarLugares')->middleware('admin');
    Route::post('/gestionarLugares','store')->name('crearLugar');
    Route::get('/mostrarLugar/{id}', 'mostrar')->name('visualizarLugar');
    Route::post('/eliminarLugar','eliminar')->name('eliminarLugar');
    route::post('/actualizarLugar','update')->name('actualizarLugar');
});


Route::controller(ComentarioeventoController::class)->group(function () {
    Route::post('/crearComentario', 'store')->name('crearcomentario');
});

Route::controller(ComentariolugarController::class)->group(function () {
    Route::post('/crearComentarioLugar', 'store')->name('crearComentarioLugar');
});
Route::controller(ciudadesController::class)->group(function () {
    Route::get('/ciudades/{id}', 'index')->name('verCiudades2');
    Route::get('/ciudades2/{id}', 'ciudad')->name('verCiudades22');
});
Route::controller(departamentoController::class)->group(function () {
    Route::get('/departamento/{id}', 'mostrar')->name('departamento');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
