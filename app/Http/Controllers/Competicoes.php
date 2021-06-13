<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Competicao;
use App\Models\Clube;
use App\Models\Equipa;
use App\Models\Objectivo;
use Exception;

class Competicoes extends Controller
{

    public function getCompeticaoAll(){
        /*$id_equipa = 10;
        $competicoes = DB :: table('competicaos')
        ->select('competicaos.id','competicaos.descricao')
        ->join('objectivos','objectivos.id_competicao','=','competicaos.id')
        ->where('objectivos.id_equipa','=',$id_equipa)
        ->get();*/
        $competicoes = Competicao::all();
        echo '<option></option>';
        foreach ($competicoes as $competicao){
            echo '<option value="'.$competicao->id.'">'.$competicao->descricao.'</option>';
        }
    }

    public function addCompeticao(){
        if (Auth::check() === true) {
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                return view('gestor.addCompeticao',['user'=>$user]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function registCompeticao(Request $request){
        if (Auth::check() === true) {
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                try {
                    $club = Clube::where([['id_user',$user->id]])->first();
                    $equipa = Equipa::where([['id_clube',$club->id]])->first();
                    $objectivo = new Objectivo();
                    $objectivo->objectivo = filter_var($request->objectivo,FILTER_SANITIZE_SPECIAL_CHARS);
                    $objectivo->id_competicao = filter_var($request->val_competicao,FILTER_SANITIZE_NUMBER_INT);
                    $objectivo->id_equipa = filter_var($equipa->id,FILTER_SANITIZE_NUMBER_INT);
                    $objectivo->save();
                    return redirect(route('gest.competicao'))->with('msg','Inscrição a Competicão Realizada com Sucesso...');
                } catch (Exception $e) {
                    return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
                }
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }



}
