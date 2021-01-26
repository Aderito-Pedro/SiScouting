<?php

use App\Http\Controllers\Siscouting;
use App\Http\Controllers\GestorClube;
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

Route::get('/', [Siscouting::class,'login']);

Route::get('home',[GestorClube::class,'home']);

Route::get('/listJogador', function(){
    return view('gestor/listJogador');
});

Route::post('/addUser',[Siscouting::class,'store']);

Route::get('/perfilJogador', function(){
    return view('gestor/perfilJogador');
});

Route::get('/addClube',function(){
    return view('gestor/addClube');
});

Route::get('/addTecnico',function(){
    return view('gestor/addTecnico');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
