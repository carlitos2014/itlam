<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Sgsst;

class CreateSgsstRequest extends FormRequest
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

        /* Crea   $rules */
        if($this->get('ruta'))        
            $rules = array_merge($rules, ['ruta' =>'mimes:pdf,doc,docx']);
      
         return Sgsst::$rules;
    }
}
}
