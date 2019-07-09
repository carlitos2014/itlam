<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Asignacion;

class UpdateAsignacionRequest extends FormRequest
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

            'observacion' =>['required', 'max:100'],
            'ruta'        => ['mimes:pdf,doc,docx'],           
            'teachers_id' => ['required','max:1000'],
           
        ];
    }
/*
    public function rules()
    {

        // Actuliza   $rules 
        if($this->get('ruta'))        
            $rules = array_merge($rules, ['ruta' =>'mimes: pdf, doc,docx']);

        
        return Asignacion::$rules;
    }*/
}
