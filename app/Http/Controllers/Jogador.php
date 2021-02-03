<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Jogador extends Controller
{
    public function listjogador(){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('gestor/listJogador',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

    public function perfilJogador(){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('gestor/perfilJogador',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

}
