<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Equipa;
use App\Models\Equipa_tecnica;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TecnicosRequest;

class Tecnico extends Controller
{
    public function addTecnico(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                return view('gestor/addTecnico',['user'=>$user]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function editTecnico($id){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                $tecnico = Equipa_tecnica::where([['id',$id]])->first();
                $dados = [
                    'user' => $user,
                    'tecnico' => $tecnico,
                ];
                return view('gestor/editTecnico',$dados);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function listTecnico(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                $club = Clube::where([['id_user',$user->id]])->first();
                $equipa = Equipa::where([['id_clube',$club->id]])->first();
                $tecnicos = DB::table('equipa_tecnicas')
                        ->where([['equipa_tecnicas.id_equipa',$equipa->id]])
                        ->where([['equipa_tecnicas.delect','1']])
                        ->join('categorias','equipa_tecnicas.id_categoria','=','categorias.id')
                        ->select('equipa_tecnicas.*', DB::raw('categorias.descricao as categoria'))
                        ->get();
                $dados = [
                    'user'=>$user,
                    'tecnicos' => $tecnicos,
                ];
                return view('gestor/listTecnicos',$dados);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function storTecnico(TecnicosRequest $request){
        if (Auth::check() === true) {
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                try {
                    $club = Clube::where([['id_user',$user->id]])->first();
                    $equipa = Equipa::where([['id_clube',$club->id]])->first();
                    $tecnico = new Equipa_tecnica();
                    $tecnico->nome = filter_var($request->nome,FILTER_SANITIZE_SPECIAL_CHARS);
                    $tecnico->email = filter_var($request->email,FILTER_SANITIZE_EMAIL);
                    $tecnico->contacto1 = filter_var($request->contacto1,FILTER_SANITIZE_STRING);
                    $tecnico->contacto2 = filter_var($request->contacto2,FILTER_SANITIZE_STRING);
                    $tecnico->altura = filter_var($request->altura,FILTER_SANITIZE_NUMBER_FLOAT);
                    $tecnico->data_nascimento = filter_var($request->data_nascimento,FILTER_SANITIZE_SPECIAL_CHARS);
                    $tecnico->descricao = filter_var($request->descricao,FILTER_SANITIZE_SPECIAL_CHARS);
                    $tecnico->id_categoria = filter_var($request->id_categoria,FILTER_SANITIZE_NUMBER_INT);
                    $tecnico->id_equipa = $equipa->id;
                    $tecnico->save();
                    return redirect(route('gest.listTecnico'))->with('msg','Tecnico Cadastrado com Sucesso...');
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

    public function uptdateTecnico(Request $request){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                Equipa_tecnica::findOrFail($request->id)->update($request->all());
                return redirect(route('gest.listTecnico'))->with('msg','Dados do Tecnico Actualizado com Sucesso...');
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

}
