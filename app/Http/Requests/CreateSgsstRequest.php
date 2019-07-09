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
    public function authorize(){
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return[
            'name'          =>['required', 'max:100'],
            'description'   =>['required', 'max:100'],
            'ruta'          => ['required','mimes:pdf,doc,docx'],
        ];
    }
}
