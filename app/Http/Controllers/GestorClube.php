<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Categoria;
use App\Models\Rcategoria;
use App\Models\Responsavel;
use App\Models\Equipa;
use App\Models\Equipa_tecnica;
use App\Models\Competicao;
use App\Models\Pais;
use App\Models\Objectivo;
use App\Http\Requests\TecnicosRequest;
use App\Http\Requests\ResponsavelRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestorClube extends Controller{

    public function getPaisAll(){
        $paises = Pais::all();
        echo '<option></option>';
        foreach ($paises as $pais){
            echo '<option value="'.$pais->id.'">'.$pais->descricao.'</option>';
        }
    }

    public function getProvinciaAll($id){
        $provincias = Provincia::where([['id_pais','=',$id]])->get();
        echo '<option></option>';
        foreach ($provincias as $provincia){
            echo '<option value="'.$provincia->id.'">'.$provincia->nome.'</option>';
        }
    }

    public function getMunicipioAll($id){
        $municipios = Municipio::where([['provincia_id','=',$id]])->get();
        echo '<option></option>';
        foreach ($municipios as $municipio){
            echo '<option value="'.$municipio->id.'">'.$municipio->nome.'</option>';
        }
    }

    public function getCategoriaAll(){
        $categorias = Categoria::all();
        echo '<option></option>';
        foreach ($categorias as $categoria){
            echo '<option value="'.$categoria->id.'">'.$categoria->descricao.'</option>';
        }
    }

    public function getRcategoriaAll(){
       // $use = auth()->user();
        $rcategorias = Rcategoria::all();
        echo '<option></option>';
        foreach ($rcategorias as $rcategoria){
            echo '<option value="'.$rcategoria->id.'">'.$rcategoria->descricao.'</option>';
        }
    }

    public function getCompeticaoAll(){
        $competicoes = Competicao::all();
        echo '<option></option>';
        foreach ($competicoes as $competicao){
            echo '<option value="'.$competicao->id.'">'.$competicao->descricao.'</option>';
        }
    }

    public function addClube(){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('gestor/addClube',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

    public function addCompeticao(){
        if (Auth::check() === true) {
            $user = auth()->user();
            return view('gestor.addCompeticao',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

    public function addTecnico(){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('gestor/addTecnico',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

    public function editTecnico($id){
        if(Auth::check() === true){
            $user = auth()->user();
            $tecnico = Equipa_tecnica::where([['id',$id]])->first();
            $dados = [
                'user' => $user,
                'tecnico' => $tecnico,
            ];
            return view('gestor/editTecnico',$dados);
        }else{
            return redirect(route('login'));
        }
    }

    public function addResponsavel(){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('gestor/addResponsavel',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

    public function editResponsavel($id){
        if(Auth::check() === true){
            $user = auth()->user();
            $responsavel = Responsavel::where([['id',$id]])->first();
            $dados = [
                'user' => $user,
                'responsavel' => $responsavel,
            ];
            return view('gestor/editResponsavel',$dados);
        }else{
            return redirect(route('login'));
        }
    }

    public function store(Request $request){
        if (Auth::check() === true) {
            try {
                DB::beginTransaction();
                $user = auth()->user();
                $clube = new Clube;
                $clube->clube = $request->clube;
                $clube->email = $request->email;
                $clube->escalao = $request->escalao;
                $clube->fundador = $request->fundador;
                $clube->data_fundacao = $request->data_fundacao;
                $clube->estadio = $request->estadio;
                $clube->id_municipio = $request->val_municipio;
                $clube->telefone1 = $request->telefone1;
                $clube->telefone2 = $request->telefone2;
                $clube->id_user = $user->id;
                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    $requestImage = $request->image;
                    $extension = $requestImage->extension();
                    $imageName = md5($requestImage.strtotime("now")) . "." . $extension;
                    $requestImage->move(public_path('img/siscout/clube'),$imageName);
                    $clube->emblema = $imageName;
                }

                $clube->save();

                $equipa = new Equipa();
                $equipa->id_clube = $clube->id;
                $equipa->save();
                DB::commit();

                return redirect(route('sis.home'));
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function listClube(){
        if(Auth::check() === true){
            $user = auth()->user();
            $cont = Clube::where([['id_user',$user->id]])->count();
            if($cont > 0){
                $club = Clube::where([['id_user',$user->id]])->first();
                $municipio = Municipio::where([['id',$club->id_municipio]])->first();
                $provincia = Provincia::where([['id',$municipio->provincia_id]])->first();
                $endereco = $provincia->nome.', '.$municipio->nome;
                $responsavel = DB::table('responsavels')
                    ->join('clubes','responsavels.id_clube','=','clubes.id')
                    ->where([['clubes.id',$club->id]])
                    ->join('rcategorias','responsavels.id_rcategoria','=','rcategorias.id')
                    ->select('responsavels.*', DB::raw('rcategorias.descricao as categoria'))
                    ->get();
                $equipa = Equipa::where([['id_clube',$club->id]])->first();
                $tecnicos = DB::table('equipa_tecnicas')
                    ->where([['equipa_tecnicas.id_equipa',$equipa->id]])
                    ->join('categorias','equipa_tecnicas.id_categoria','=','categorias.id')
                    ->select('equipa_tecnicas.*', DB::raw('categorias.descricao as categoria'))
                    ->get();
                $dadosClube = [
                    'user'=>$user,
                    'clube' => $club,
                    'endereco'=>$endereco,
                    'responsavels' => $responsavel,
                    'tecnicos' => $tecnicos,
                ];
                return view('gestor/listClube',$dadosClube);
            }else{
                return redirect(route('sis.home'));
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function listResponsavel(){
        if(Auth::check() === true){
            $user = auth()->user();
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
            return redirect(route('login'));
        }
    }

    public function stoResponsavel(ResponsavelRequest $request){
        if (Auth::check() === true) {
            try {
                $user = auth()->user();
                $club = Clube::where([['id_user',$user->id]])->first();
                $responsavel = new Responsavel();
                $responsavel->nome = $request->nome;
                $responsavel->email = $request->email;
                $responsavel->numero1 = $request->numero1;
                $responsavel->numero2 = $request->numero2;
                $responsavel->id_rcategoria = $request->id_rcategoria;
                $responsavel->id_clube = $club->id;
                $responsavel->save();
                return redirect(route('gest.listResponsavel'))->with('msg','Responsavel do Clube Cadastrado com Sucesso...');
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function listTecnico(){
        if(Auth::check() === true){
            $user = auth()->user();
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
            return redirect(route('login'));
        }
    }

    public function storTecnico(TecnicosRequest $request){
        if (Auth::check() === true) {
            try {
                $user = auth()->user();
                $club = Clube::where([['id_user',$user->id]])->first();
                $equipa = Equipa::where([['id_clube',$club->id]])->first();
                $tecnico = new Equipa_tecnica();
                $tecnico->nome = $request->nome;
                $tecnico->email = $request->email;
                $tecnico->contacto1 = $request->contacto1;
                $tecnico->contacto2 = $request->contacto2;
                $tecnico->altura = $request->altura;
                $tecnico->data_nascimento = $request->data_nascimento;
                $tecnico->descricao = $request->descricao;
                $tecnico->id_categoria = $request->id_categoria;
                $tecnico->id_equipa = $equipa->id;
                $tecnico->save();
                return redirect(route('gest.listTecnico'))->with('msg','Tecnico Cadastrado com Sucesso...');
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function uptdateTecnico(Request $request){
        if(Auth::check() === true){
            Equipa_tecnica::findOrFail($request->id)->update($request->all());
            return redirect(route('gest.listTecnico'))->with('msg','Dados do Tecnico Actualizado com Sucesso...');
        }else{
            return redirect(route('login'));
        }
    }

    public function uptdateResponsavel(Request $request){
        if(Auth::check() === true){
            Responsavel::findOrFail($request->id)->update($request->all());
            return redirect(route('gest.listResponsavel'))->with('msg','Dados do Responsavel do Clube Actualizado com Sucesso...');
        }else{
            return redirect(route('login'));
        }
    }

    public function delectResponsavel(Request $request){
        if(Auth::check() === true){
            Responsavel::findOrFail($request->id)->update($request->all());
            return redirect(route('gest.listResponsavel'))->with('msg','Dados do Responsavel do Clube Actualizado com Sucesso...');
        }else{
            return redirect(route('login'));
        }
    }

    public function registCompeticao(Request $request){
        if (Auth::check() === true) {
            try {
                $user = auth()->user();
                $club = Clube::where([['id_user',$user->id]])->first();
                $equipa = Equipa::where([['id_clube',$club->id]])->first();
                $objectivo = new Objectivo();
                $objectivo->objectivo = $request->objectivo;
                $objectivo->id_competicao = $request->val_competicao;
                $objectivo->id_equipa = $equipa->id;
                $objectivo->save();
                return redirect(route('gest.competicao'))->with('msg','Inscrição a Competicão Realizada com Sucesso...');
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        }else{
            return redirect(route('login'));
        }
    }
}
