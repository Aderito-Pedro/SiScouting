<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JogadorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'apelido' => 'required',
            'data_nascimento' => 'required',
            'email' => 'required|unique:jogadors',
            'n_identificacao' => 'required|unique:jogadors',
            'altura' => 'required',
            'peso' => 'required',
            'pe' => 'required',
            'estado' => 'required',
            'contacto1' => 'required|unique:jogadors',
            'numero' => 'required',
            'val_municipio' => 'required',
            'img' => 'image',
            'val_posicao' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome não pode estar Vazio...',
            'apelido.required' => 'O campo Apelido não pode estar Vazio...',
            'data_nascimento.required' => 'O campo Data de Nascimento não pode estar Vazio...',
            'email.required' => 'O campo Email não pode estar Vazio...',
            'email.unique' => 'O Email informado já foi utilizado por outra Jogador...',
            'n_identificacao.required' => 'O campo Nº Identificação não pode estar Vazio...',
            'n_identificacao.unique' => 'O Nº Identificação informado já foi utilizado por outra Jogador...',
            'altura.required' => 'O campo Altura não pode estar Vazio...',
            'peso.required' => 'O campo Peso não pode estar Vazio...',
            'pe.required' => 'O campo Pé Dominante não pode estar Vazio...',
            'estado.required' => 'O campo Estado na Equipa não pode estar Vazio...',
            'contacto1.required' => 'O campo Contacto não pode estar Vazio...',
            'contacto1.unique' => 'O Contacto informado já foi utilizado por outro Jogador...',
            'numero.required' => 'O campo Numero não pode estar Vazio...',
            'val_municipio.required' => 'O campo Municipio não pode estar Vazio...',
            'img.image' => 'O ficheiro ou arquivo deve ser do tipo Imagem...',
            'val_posicao.required' => 'O campo Posição não pode estar Vazio...',
        ];
    }
}
