<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Sgsst;
class UpdateSgsstRequest extends FormRequest{
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
<<<<<<< HEAD

     public function rules()
    {

        /* Actuliza   $rules */
        if($this->get('ruta'))        
            $rules = array_merge($rules, ['ruta' =>'mimes:pdf,doc,docx']);
      
         return Sgsst::$rules;
=======
    public function rules(){
        return[
            'name'          =>['required', 'max:100'],
            'description'   =>['required', 'max:100'],
            'ruta'          =>['required','mimes:pdf,doc,docx'],
        ];
>>>>>>> d9b61165827880ac7eec59d7066ee46ee94fbe21
    }
}
