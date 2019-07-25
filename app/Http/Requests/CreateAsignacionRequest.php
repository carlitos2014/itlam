<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Asignacion;
class CreateAsignacionRequest extends FormRequest
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
<<<<<<< HEAD

        /* Actuliza   $rules */ 
        if($this->get('ruta'))        
            $rules = array_merge($rules, ['ruta' =>'required','mimes:.pdf,.doc,.docx']);

        

        return Asignacion::$rules;
=======
        return [
            'observacion' =>['required', 'max:100'],
            'ruta'        => ['required','mimes:png,jpg,pdf,doc,docx'],           
            'teachers_id' => ['required','max:1000'],           
        ];
>>>>>>> d9b61165827880ac7eec59d7066ee46ee94fbe21
    }
}
