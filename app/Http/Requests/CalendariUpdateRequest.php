<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendariUpdateRequest extends FormRequest
{
    /*
        *Classe FormRequest encarregada de validar les dades introduides de 
        *la vista create d'usuaris interns.
    */
    public function authorize()
    {
        return true;
    }
    /*
        *Funcio que aplica les regles de validació als atributs
    */
    public function rules()
    {
        return [
            'id_actor_estadillo' => 'required',
            'num_takes'          => 'required',
            'data_inici'         => 'required',
            'data_fi'            => 'required',
            'num_sala'           => 'required'
        ];
    }
}
