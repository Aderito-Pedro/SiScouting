<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Clubes;
use App\Http\Controllers\Siscouting;
use App\Http\Controllers\GestorClube;
use App\Http\Controllers\Jogadores;
use App\Http\Controllers\ComissarioJogo;
use App\Http\Controllers\Competicoes;
use App\Http\Controllers\Jogo;
use App\Http\Controllers\Localizacao;
use App\Http\Controllers\Responsaveis;
use App\Http\Controllers\Tecnico;
use App\Models\Clube;
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

Route::get('/buscaPais', [Localizacao::class, 'getPaisAll'])->name('sis.getPais');
Route::get('/buscaProvincia/{id}', [Localizacao::class, 'getProvinciaAll'])->name('sis.getProvincia');
Route::get('/buscamunicipio/{id}', [Localizacao::class, 'getMunicipioAll'])->name('sis.getMunicipio');

Route::get('/buscarCategoria', [Categorias::class, 'getCategoriaAll'])->name('sis.getCategoria');
Route::get('/buscarRcategoria', [Categorias::class, 'getRcategoriaAll'])->name('sis.getRcategoria');

Route::get('/addClube',[Clubes::class,'addClube'])->name('gest.addClube');
Route::post('/insertClube',[Clubes::class, 'store'])->name('gest.insertClube');
Route::get('/verClube',[Clubes::class, 'listClube'])->name('gest.verClube');
Route::get('/listClubes',[Clubes::class,'clubeAll'])->name('admin.verClubes');
Route::get('/clubeOne{id}',[Clubes::class,'clubeOne'])->name('admin.clube');

Route::get('/addResponsavel',[Responsaveis::class, 'addResponsavel'])->name('gest.addResponsavel');
Route::get('/editResponsavel{id}',[Responsaveis::class, 'editResponsavel'])->name('gest.editResponsavel');
Route::post('/registerResponsavel',[Responsaveis::class, 'stoResponsavel'])->name('gest.responsavel');
Route::get('/listResponsavel', [Responsaveis::class, 'listResponsavel'])->name('gest.listResponsavel');
Route::put('/upResponsavel/{id}',[Responsaveis::class,'uptdateResponsavel'])->name('gest.uptdateResp');

Route::get('/addTecnico',[Tecnico::class, 'addTecnico'])->name('gest.addTecnico');
Route::get('/editTecnico{id}',[Tecnico::class, 'editTecnico'])->name('gest.editTecnico');
Route::post('/registerTecnico', [Tecnico::class,'storTecnico'])->name('gest.tecnico');
Route::get('/listTecnico', [Tecnico::class, 'listTecnico'])->name('gest.listTecnico');
Route::put('/upTecnico/{id}',[Tecnico::class,'uptdateTecnico'])->name('gest.uptdateTec');

Route::get('/competicao',[Competicoes::class, 'addCompeticao'])->name('gest.competicao');
Route::get('/getCompeticao', [Competicoes::class, 'getCompeticaoAll'])->name('sis.getCompeticao');
Route::post('/insertCompeticao',[Competicoes::class,'registCompeticao'])->name('gest.addcompeticao');

Route::get('/buscarPosicao',[Jogadores::class, 'getPosicaoAll'])->name('jogador.posicoes');
Route::get('/listJogador', [Jogadores::class,'listjogador'])->name('jogador.listJogador');
Route::get('/perfilJogador{id}', [Jogadores::class, 'perfilJogador'])->name('jogador.perfil');
Route::get('/addJogador{id?}', [Jogadores::class,'addJogador'])->name('jogador.addJogador');
Route::post('/registerJogador',[Jogadores::class, 'Jogador'])->name('jogador.jogador');
Route::get('/editJogador{id}',[Jogadores::class, 'editJogador'])->name('jogador.editJogador');
Route::put('/upJogador/{id}',[Jogadores::class,'uptdateJogador'])->name('jogador.uptdateJogad');

Route::get('/newPlay',[Jogo::class,'newJogo'])->name('admin.novoJogo');
Route::post('storeCompeticao',[Jogo::class,'gerarCalendario'])->name('admin.gerarCalendario');

Route::get('/perfilAdmin',[Admin::class,'perfil'])->name('admin.perfil');

