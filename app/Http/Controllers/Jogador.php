<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Jogador extends Controller
{
    public function listjogador(){
        return view('gestor/listJogador');
    }
}
