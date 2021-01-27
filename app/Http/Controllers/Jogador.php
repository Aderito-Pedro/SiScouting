<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Jogador extends Controller
{
    public function listjogador(){
        $user = auth()->user();
        return view('gestor/listJogador',['user'=>$user]);
    }

    public function perfilJogador(){
        $user = auth()->user();
        return view('gestor/perfilJogador',['user'=>$user]);
    }
}
