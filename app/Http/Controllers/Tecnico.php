<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Equipa;
use App\Models\Equipa_tecnica;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tecnico extends Controller
{
/*
    public function storTecnico(Request $request){
        if (Auth::check() === true) {
            try {
                $user = auth()->user();
                $user = auth()->user();
                $club = Clube::where([['id_user',$user->id]])->first();
                $equipa = Equipa::where([['id_clube',$club->id]])->first();
                $tecnico = new Equipa_tecnica();
                $tecnico->nome = $request->nome;
                $tecnico->email = $request->email;
                $tecnico->contacto = $request->numero;
                $tecnico->altura = $request->altura;
                $tecnico->data_nascimento = $request->data_nascimento;
                $tecnico->descricao = $request->descricao;
                $tecnico->id_categoria = $request->val_categoria;
                $tecnico->id_equipa = $equipa->id;
                $tecnico->save();
                return view('gestor/home',['user'=>$user]);
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        }else{
            return redirect(route('login'));
        }
    }
    */
}
