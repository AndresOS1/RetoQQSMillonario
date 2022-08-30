<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\RespuestasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\NivelesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;






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


Route::get('/',[HomeController::class, 'verDashboardJuego']);



Route::get('/playCategoria',[CategoriasController::class,'playCategoria'])->name('playCategoria');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['role:admin']], function () {
    //Rutas Preguntas
Route::get('/admin',[HomeController::class, 'verDashboard'])->name('admin');
Route::get('/Preguntas.index',[PreguntasController::class,'index'])->name('Preguntas.index');
Route::get('/Preguntas.create',[PreguntasController::class,'create'])->name('Preguntas.create');
Route::post('/Preguntas.store',[PreguntasController::class,'store'])->name('Preguntas.store');
Route::get('/editarpregunta/{id}',[PreguntasController::class,'edit'])->name('editarpregunta');
Route::put('/actualizarpregunta/{id}',[PreguntasController::class,'update'])->name('Preguntasupdate');
Route::delete('/eliminarpregunta/{id}',[PreguntasController::class,'destroy'])->name('eliminarpregunta');





//Rutas Respuestas 

Route::get('/Respuestas.index',[RespuestasController::class,'index'])->name('Respuestas.index');
Route::get('/Respuestas.create',[RespuestasController::class,'create'])->name('Respuestas.create');
Route::post('/Respuestas.store',[RespuestasController::class,'store'])->name('Respuestas.store');
Route::get('/editarrespuesta/{id}',[RespuestasController::class,'edit'])->name('editarrespuesta');
Route::put('/actualizarrespuesta/{id}',[RespuestasController::class,'update'])->name('Respuestasupdate');
Route::delete('/eliminarrespuesta/{id}',[RespuestasController::class,'destroy'])->name('eliminarrespuesta');


//Rutas Categorias 

Route::get('/Categorias.index',[CategoriasController::class,'index'])->name('Categorias.index');
Route::get('/Categorias.create',[CategoriasController::class,'create'])->name('Categorias.create');
Route::post('/Categorias.store',[CategoriasController::class,'store'])->name('Categorias.store');
Route::get('/editarcategoria/{id}',[CategoriasController::class,'edit'])->name('editarcategoria');
Route::put('/actualizarcategoria/{id}',[CategoriasController::class,'update'])->name('Categoriasupdate');
Route::delete('/eliminarcategoria/{id}',[CategoriasController::class,'destroy'])->name('eliminarcategoria');



//Rutas Niveles

Route::get('/Niveles.index',[NivelesController::class,'index'])->name('Niveles.index');
Route::get('/Niveles.create',[NivelesController::class,'create'])->name('Niveles.create');
Route::post('/Niveles.store',[NivelesController::class,'store'])->name('Niveles.store');
Route::get('/editarnivel/{id}',[NivelesController::class,'edit'])->name('editarnivel');
Route::put('/actualizarnivel/{id}',[NivelesController::class,'update'])->name('Niveles.update');
Route::delete('/eliminarnivel/{id}',[NivelesController::class,'destroy'])->name('eliminarnivel');
});
