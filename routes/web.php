<?php

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
    return view('login');
});

Route::get('home', function(){
    return view('home',[]);
});

Route::get('/listJogador', function(){
    return view('listJogador');
});

Route::get('/perfilJogador', function(){
    return view('perfilJogador');
});
