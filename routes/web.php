<?php

use App\Http\Controllers\Siscouting;
use App\Http\Controllers\GestorClube;
use App\Http\Controllers\Jogadores;
use App\Http\Controllers\Tecnico;
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

Route::get('/', [Siscouting::class,'login'])->name('login');
Route::post('/addUser',[Siscouting::class,'store'])->name('sis.adduser');
Route::get('/dashboard', [Siscouting::class,'home'])->name('sis.home');
Route::get('/logout',[Siscouting::class,'logout'])->name('sis.logout');
Route::post('/aceder',[Siscouting::class,'stogin'])->name('sis.aceder');

Route::get('/buscaPais', [GestorClube::class, 'getPaisAll'])->name('sis.getPais');
Route::get('/buscaProvincia/{id}', [GestorClube::class, 'getProvinciaAll'])->name('sis.getProvincia');
Route::get('/buscamunicipio/{id}', [GestorClube::class, 'getMunicipioAll'])->name('sis.getMunicipio');
Route::get('/buscarCategoria', [GestorClube::class, 'getCategoriaAll'])->name('sis.getCategoria');
Route::get('/buscarRcategoria', [GestorClube::class, 'getRcategoriaAll'])->name('sis.getRcategoria');

Route::get('/addClube',[GestorClube::class,'addClube'])->name('gest.addClube');
Route::get('/addTecnico',[GestorClube::class, 'addTecnico'])->name('gest.addTecnico');
Route::get('/editTecnico{id}',[GestorClube::class, 'editTecnico'])->name('gest.editTecnico');
Route::get('/addResponsavel',[GestorClube::class, 'addResponsavel'])->name('gest.addResponsavel');
Route::get('/editResponsavel{id}',[GestorClube::class, 'editResponsavel'])->name('gest.editResponsavel');
Route::post('/insertClube',[GestorClube::class, 'store'])->name('gest.insertClube');
Route::get('/verClube',[GestorClube::class, 'listClube'])->name('gest.verClube');
Route::post('/registerResponsavel',[GestorClube::class, 'stoResponsavel'])->name('gest.responsavel');
Route::post('/registerTecnico', [GestorClube::class,'storTecnico'])->name('gest.tecnico');
Route::get('/listTecnico', [GestorClube::class, 'listTecnico'])->name('gest.listTecnico');
Route::get('/listResponsavel', [GestorClube::class, 'listResponsavel'])->name('gest.listResponsavel');
Route::get('/competicao',[GestorClube::class, 'addCompeticao'])->name('gest.competicao');
Route::get('/getCompeticao', [GestorClube::class, 'getCompeticaoAll'])->name('sis.getCompeticao');
Route::put('/upTecnico/{id}',[GestorClube::class,'uptdateTecnico'])->name('gest.uptdateTec');
Route::put('/upResponsavel/{id}',[GestorClube::class,'uptdateResponsavel'])->name('gest.uptdateResp');
Route::post('/insertCompeticao',[GestorClube::class,'registCompeticao'])->name('gest.addcompeticao');

Route::get('/buscarPosicao',[Jogadores::class, 'getPosicaoAll'])->name('jogador.posicoes');
Route::get('/listJogador', [Jogadores::class,'listjogador'])->name('jogador.listJogador');
Route::get('/perfilJogador{id}', [Jogadores::class, 'perfilJogador'])->name('jogador.perfil');
Route::get('/addJogador{id?}', [Jogadores::class,'addJogador'])->name('jogador.addJogador');
Route::post('/registerJogador',[Jogadores::class, 'Jogador'])->name('jogador.jogador');
Route::get('/editJogador{id}',[Jogadores::class, 'editJogador'])->name('jogador.editJogador');
Route::put('/upJogador/{id}',[Jogadores::class,'uptdateJogador'])->name('jogador.uptdateJogad');


