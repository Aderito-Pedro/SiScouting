<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Municipio;
use App\Models\Provincia;

class Localizacao extends Controller
{
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
}
