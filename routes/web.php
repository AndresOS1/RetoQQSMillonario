<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PreguntasController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/Preguntas.index',[PreguntasController::class,'index'])->name('Preguntas.index');
Route::get('/Preguntas.create',[PreguntasController::class,'create'])->name('Preguntas.create');
Route::post('/Preguntas.store',[PreguntasController::class,'store'])->name('Preguntas.store');
Route::get('/editarpregunta/{id}',[PreguntasController::class,'edit'])->name('editarpregunta');
Route::put('/actualizarpregunta/{id}',[PreguntasController::class,'update'])->name('Preguntas.uptate');
Route::delete('/eliminarpregunta/{id}',[PreguntasController::class,'destroy'])->name('eliminarpregunta');
