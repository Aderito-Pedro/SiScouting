<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Responsavel;
use App\Http\Requests\ResponsavelRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Responsaveis extends Controller
{
    public function addResponsavel(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                return view('gestor/addResponsavel',['user'=>$user]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function editResponsavel($id){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                $responsavel = Responsavel::where([['id',$id]])->first();
                $dados = [
                    'user' => $user,
                    'responsavel' => $responsavel,
                ];
                return view('gestor/editResponsavel',$dados);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }


    public function listResponsavel(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                $club = Clube::where([['id_user',$user->id]])->first();
                $responsavel = DB::table('responsavels')
                        ->where([['responsavels.delect','1']])
                        ->join('clubes','responsavels.id_clube','=','clubes.id')
                        ->where([['clubes.id',$club->id]])
                        ->join('rcategorias','responsavels.id_rcategoria','=','rcategorias.id')
                        ->select('responsavels.*', DB::raw('rcategorias.descricao as categoria'))
                        ->get();
                $dados = [
                    'user'=>$user,
                    'responsavels' => $responsavel,
                ];
                return view('gestor/listResponsavel',$dados);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function stoResponsavel(ResponsavelRequest $request){
        if (Auth::check() === true) {
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                try {
                    $club = Clube::where([['id_user',$user->id]])->first();
                    $responsavel = new Responsavel();
                    $responsavel->nome = filter_var($request->nome,FILTER_SANITIZE_STRING);
                    $responsavel->email = filter_var($request->email,FILTER_SANITIZE_EMAIL);
                    $responsavel->numero1 = filter_var($request->numero1,FILTER_SANITIZE_STRING);
                    $responsavel->numero2 = filter_var($request->numero2,FILTER_SANITIZE_STRING);
                    $responsavel->id_rcategoria = filter_var($request->id_rcategoria,FILTER_SANITIZE_NUMBER_INT);
                    $responsavel->id_clube = $club->id;
                    $responsavel->save();
                    return redirect(route('gest.listResponsavel'))->with('msg','Responsavel do Clube Cadastrado com Sucesso...');
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


    public function uptdateResponsavel(Request $request){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                Responsavel::findOrFail($request->id)->update($request->all());
                return redirect(route('gest.listResponsavel'))->with('msg','Dados do Responsavel do Clube Actualizado com Sucesso...');
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function delectResponsavel(Request $request){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                Responsavel::findOrFail($request->id)->update($request->all());
                return redirect(route('gest.listResponsavel'))->with('msg','Dados do Responsavel do Clube Actualizado com Sucesso...');
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

}
