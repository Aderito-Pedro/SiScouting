<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Clube;
use App\Models\Equipa;
use App\Models\Equipa_jogador;
use App\Models\Jogador;
use App\Models\Posicao;
use App\Models\Posica_jogador;
use App\Http\Requests\JogadorRequest;


class Jogadores extends Controller{

    public function getPosicaoAll(){
        $posicoes = Posicao::all();
        echo '<option></option>';
        foreach ($posicoes as $posicao){
            echo '<option value="'.$posicao->id.'">'.$posicao->descricao.'</option>';
        }
    }

    public function listjogador(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo == "Gestor"){
                $club = Clube::where([['id_user',$user->id]])->first();
                $equipa = Equipa::where([['id_clube',$club->id]])->first();
                $jogadores = DB::table('jogadors')
                        ->join('equipa_jogadors','jogadors.id','=','equipa_jogadors.id_jogador')
                        ->where([['equipa_jogadors.id_equipa',$equipa->id]])
                        ->select('jogadors.*')
                        ->get();
                $dados = [
                    'user'=>$user,
                    'jogadores' => $jogadores,
                ];
                return view('jogador/listJogador',$dados);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function perfilJogador($id){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo == "Gestor"){
                $jogadore = Jogador::where([['id',$id]])->first();
                $posicao = DB::table('posicaos')
                        ->join('posica_jogadors','posicaos.id','=','posica_jogadors.id_posicao')
                        ->where([['posica_jogadors.id_jogador',$jogadore->id]])
                        ->get();
                $dados=[
                    'user'=>$user,
                    'jogador'=>$jogadore,
                    'posicoes'=>$posicao,
                ];
                return view('jogador/perfilJogador',$dados);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function addJogador($id = 0){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo == "Gestor"){
                $dados = [
                    'user' => $user,
                    'idJogador' => $id,
                ];
                return view('jogador/addJogador',$dados);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function Jogador(JogadorRequest $request){
        if (Auth::check() === true) {
            $user = auth()->user();
            if($user->tipo == "Gestor"){
                try {
                    DB::beginTransaction();
                    $club = Clube::where([['id_user',$user->id]])->first();
                    $equipa = Equipa::where([['id_clube',$club->id]])->first();

                    $jogador = new Jogador();
                    $jogador->nome = filter_var($request->nome,FILTER_SANITIZE_SPECIAL_CHARS);
                    $jogador->apelido = filter_var($request->apelido,FILTER_SANITIZE_SPECIAL_CHARS);
                    $jogador->data_nascimento = filter_var($request->data_nascimento,FILTER_SANITIZE_SPECIAL_CHARS);
                    $jogador->email = filter_var($request->email,FILTER_SANITIZE_EMAIL);
                    $jogador->n_identificacao = filter_var($request->n_identificacao,FILTER_SANITIZE_SPECIAL_CHARS);
                    $jogador->altura = filter_var($request->altura,FILTER_SANITIZE_NUMBER_FLOAT);
                    $jogador->peso = filter_var($request->peso,FILTER_SANITIZE_NUMBER_FLOAT);
                    $jogador->perna = filter_var($request->pe,FILTER_SANITIZE_SPECIAL_CHARS);
                    $jogador->descricao = filter_var($request->descricao,FILTER_SANITIZE_SPECIAL_CHARS);
                    $jogador->estado = filter_var($request->estado,FILTER_SANITIZE_SPECIAL_CHARS);
                    $jogador->contacto1 = filter_var($request->contacto1,FILTER_SANITIZE_STRING);
                    $jogador->contacto2 = filter_var($request->contacto2,FILTER_SANITIZE_STRING);
                    $jogador->numero = filter_var($request->numero,FILTER_SANITIZE_NUMBER_INT);
                    $jogador->id_municipio = filter_var($request->val_municipio,FILTER_SANITIZE_NUMBER_INT);

                    if ($request->hasFile('img') && $request->file('img')->isValid()) {
                        $requestImage = $request->img;
                        $extension = $requestImage->extension();
                        $imageName = md5($requestImage.strtotime("now")) . "." . $extension;
                        $requestImage->move(public_path('img/siscout/jogador'),$imageName);
                        $jogador->img = $imageName;
                    }
                    $jogador->save();

                    $equipaJogador = new Equipa_jogador();
                    $equipaJogador->id_equipa = filter_var($equipa->id,FILTER_SANITIZE_NUMBER_INT);
                    $equipaJogador->id_jogador = filter_var($jogador->id,FILTER_SANITIZE_NUMBER_INT);
                    $equipaJogador->save();

                    $posicao = new Posica_jogador();
                    $posicao->id_posicao = filter_var($request->val_posicao,FILTER_SANITIZE_NUMBER_INT);
                    $posicao->id_jogador = filter_var($jogador->id,FILTER_SANITIZE_NUMBER_INT);
                    $posicao->save();
                    DB::commit();
                    return redirect(route('jogador.addJogador',$jogador->id))->with('msg','Jogador Cadastrado com Sucesso...');
                } catch (Exception $e) {
                    DB::rollBack();
                    return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
                }
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function editJogador($id){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo == "Gestor"){
                $jogador = Jogador::where([['id',$id]])->first();
                $dados = [
                    'user' => $user,
                    'jogador' => $jogador,
                ];
                return view('jogador.editJogador',$dados);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function uptdateJogador(Request $request){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo == "Gestor"){
                Jogador::findOrFail($request->id)->update($request->all());
                return redirect(route('jogador.listJogador'))->with('msg','Dados do Jogador Actualizado com Sucesso...');
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }
}
