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
            return redirect(route('login'));
        }
    }

    public function perfilJogador($id){
        if(Auth::check() === true){
            $user = auth()->user();
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
            return redirect(route('login'));
        }
    }

    public function addJogador($id = 0){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('jogador/addJogador',['user'=>$user,'idJogador' =>$id]);
        }else{
            return redirect(route('login'));
        }
    }

    public function Jogador(JogadorRequest $request){
        if (Auth::check() === true) {
            try {
                DB::beginTransaction();
                $user = auth()->user();
                $club = Clube::where([['id_user',$user->id]])->first();
                $equipa = Equipa::where([['id_clube',$club->id]])->first();

                $jogador = new Jogador();
                $jogador->nome = $request->nome;
                $jogador->apelido = $request->apelido;
                $jogador->data_nascimento = $request->data_nascimento;
                $jogador->email = $request->email;
                $jogador->n_identificacao = $request->n_identificacao;
                $jogador->altura = $request->altura;
                $jogador->peso = $request->peso;
                $jogador->perna = $request->pe;
                $jogador->descricao = $request->descricao;
                $jogador->estado = $request->estado;
                $jogador->contacto1 = $request->contacto1;
                $jogador->contacto2 = $request->contacto2;
                $jogador->numero = $request->numero;
                $jogador->id_municipio = $request->val_municipio;

                if ($request->hasFile('img') && $request->file('img')->isValid()) {
                    $requestImage = $request->img;
                    $extension = $requestImage->extension();
                    $imageName = md5($requestImage.strtotime("now")) . "." . $extension;
                    $requestImage->move(public_path('img/siscout/jogador'),$imageName);
                    $jogador->img = $imageName;
                }
                $jogador->save();

                $equipaJogador = new Equipa_jogador();
                $equipaJogador->id_equipa = $equipa->id;
                $equipaJogador->id_jogador = $jogador->id;
                $equipaJogador->save();

                $posicao = new Posica_jogador();
                $posicao->id_posicao = $request->val_posicao;
                $posicao->id_jogador = $jogador->id;
                $posicao->save();
                DB::commit();
                return redirect(route('jogador.addJogador',$jogador->id))->with('msg','Jogador Cadastrado com Sucesso...');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function editJogador($id){
        if(Auth::check() === true){
            $user = auth()->user();
            $jogador = Jogador::where([['id',$id]])->first();
            $dados = [
                'user' => $user,
                'jogador' => $jogador,
            ];
            return view('jogador.editJogador',$dados);
        }else{
            return redirect(route('login'));
        }
    }

    public function uptdateJogador(Request $request){
        if(Auth::check() === true){
            Jogador::findOrFail($request->id)->update($request->all());
            return redirect(route('jogador.listJogador'))->with('msg','Dados do Jogador Actualizado com Sucesso...');
        }else{
            return redirect(route('login'));
        }
    }
}
