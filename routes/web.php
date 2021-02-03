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
Route::get('/dashboard', [Siscouting::class,'home'])->name('sis.home');
Route::get('/logout',[Siscouting::class,'logout'])->name('sis.logout');
Route::post('/aceder',[Siscouting::class,'stogin'])->name('sis.login');

Route::get('/buscaProvincia', [GestorClube::class, 'getProvinciaAll'])->name('sis.getProvincia');
Route::get('/buscamunicipio/{id}', [GestorClube::class, 'getMunicipioAll'])->name('sis.getMunicipio');
Route::get('/buscarCategoria', [GestorClube::class, 'getCategoriaAll'])->name('sis.getCategoria');
Route::get('/buscarRcategoria', [GestorClube::class, 'getRcategoriaAll'])->name('sis.getRcategoria');
Route::get('/addClube',[GestorClube::class,'addClube']);
Route::get('/addTecnico',[GestorClube::class, 'addTecnico']);
Route::get('/addResponsavel',[GestorClube::class, 'addResponsavel']);
Route::post('/insertClube',[GestorClube::class, 'store']);
Route::get('/verClube',[GestorClube::class, 'listClube']);
Route::post('/registerResponsavel',[GestorClube::class, 'stoResponsavel'])->name('gest.responsavel');

Route::get('/listJogador', [Jogador::class,'listjogador']);
Route::get('/perfilJogador', [Jogador::class, 'perfilJogador']);
