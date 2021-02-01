<?php

use App\Http\Controllers\Siscouting;
use App\Http\Controllers\GestorClube;
use App\Http\Controllers\Jogador;
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
Route::get('/login', [Siscouting::class,'login'])->name('login');
Route::post('/addUser',[Siscouting::class,'store'])->name('sis.adduser');
Route::get('/dashboard', [Siscouting::class,'home'])->name('sis.home')->middleware('auth');
Route::get('/logout',[Siscouting::class,'logout'])->name('sis.logout')->middleware('auth');
Route::post('/aceder',[Siscouting::class,'stogin'])->name('system.login');

Route::get('/addClube',[GestorClube::class,'addClube'])->middleware('auth');
Route::get('/addTecnico',[GestorClube::class, 'addTecnico'])->middleware('auth');
Route::post('/insertClube',[GestorClube::class, 'store']);
Route::get('/verClube',[GestorClube::class, 'listClube'])->middleware('auth');

Route::get('/listJogador', [Jogador::class,'listjogador'])->middleware('auth');
Route::get('/perfilJogador', [Jogador::class, 'perfilJogador'])->middleware('auth');
