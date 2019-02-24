<?php

namespace App\Http\Controllers\Academic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaneacionPlan40 extends Controller
{
    public function loadFile()
    {
        return view('academic.loadfile');
    }

    public function save(Request $request)
    {

		$field = 'file';
		if($file = request()->file($field)){
			$path = storage_path('app/Academic/Plan40');
			$filename = 'Plan_'.$plan->id.'.'. $file->getClientOriginalExtension();
			$file->move($path, $filename);
			$plan->$field = $filename;
        }
        
    }

    /*public function descargar($id){

        $plan=AcademicPlaneacionPlan40::find($id);

              //return $rutaarchivo;
             return \Response::download(storage_path('app/Academic/Plan40/').$plan->nameFile);//->deleteFileAfterSend(true);
    
    }*/
}
