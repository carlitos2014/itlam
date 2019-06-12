<?php

namespace App\Http\Controllers\Academic;

use App\Http\Requests\CreateAsignacionRequest;
use App\Models\Asignacion;
use App\Http\Requests\UpdateAsignacionRequest;
use App\Repositories\AsignacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Entrust;

class AsignacionController extends AppBaseController
{
    /** @var  AsignacionRepository */
    private $asignacionRepository;

    public function __construct(AsignacionRepository $asignacionRepo)
    {
        $this->asignacionRepository = $asignacionRepo;
        parent::__construct($permision='acad-asignacion');
        $this->middleware('permission:acad-asignacion-download', ['only' => ['downloadFile']]);
    }

    /**
     * Display a listing of the Asignacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$this->asignacionRepository->pushCriteria(new RequestCriteria($request));
        //$asignacion = $this->asignacionRepository;
        $asignacion = null;
        if(Entrust::hasRole('academico-user')){
            $teacher = Entrust::user()->teacher;
            $teacher_id = isset($teacher) ? $teacher->id : null;
            $asignacion = Asignacion::with('teacher')
                                ->where('teacher_id', $teacher_id)
                                ->paginate(10);
            //$asignacion = $asignacion->leftJoin('teachers')
            //                ->where('teachers.user_id', Entrust::user()->id);

        } else {
            $asignacion = Asignacion::with('teacher')->paginate(10);
        }

        return view('academicAsignacion.index')
            ->with('asignacion', $asignacion);
    }

    /**
     * Show the form for creating a new Asignacion.
     *
     * @return Response
     */
    public function create()
    {

        $arrTeacher = model_to_array(Teacher::class, expression_concat(['nombres', 'apellidos'], 'nombre_completo' ));
        return view('academicAsignacion.create',compact('arrTeacher'));
    }

    /**
     * Store a newly created Asignacion in storage.
     *
     * @param CreateAsignacionRequest $request
     *
     * @return Response
     */
    public function store( Request $request)
	{
		if($request->hasFile('ruta')){

	        $asignacion = $this->asignacionRepository->create($request->all());
			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			
			//Grantizo que los archivos no se sobrescriban
			$file->move(storage_path('app/Academic/Horarios/').$asignacion->id,$name);
			$asignacion->update(['ruta'=>$name]);
			
	        Flash::success('Registrado con Exito.');
			return redirect(route('asignacion.index'));
		}else{
			Flash::error('Por favor completar todos los datos solicitados');
			return redirect()->back();
		}

		
	}

    /**
     * Display the specified Asignacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asignacion = $this->asignacionRepository->findWithoutFail($id);

        if (empty($asignacion)) {
            Flash::error('Asignacion not found');

            return redirect(route('asignacion.index'));
        }
        return view('academicAsignacion.show')->with('asignacion', $asignacion);
    }

    /**
     * Show the form for editing the specified Asignacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asignacion = $this->asignacionRepository->findWithoutFail($id);

        if (empty($asignacion)) {
            Flash::error('Asignacion not found');
            return redirect(route('asignacion.index'));
        }
        $arrTeacher = model_to_array(Teacher::class, 'nombres');
        return view('academicAsignacion.edit',compact('arrTeacher', 'asignacion'));
        
    }  

    /**
     * Update the specified Asignacion in storage.
     *
     * @param  int              $id
     * @param UpdateAsignacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignacionRequest $request)
    {
        $asignacion = $this->asignacionRepository->findWithoutFail($id);

        if (empty($asignacion)) {
            Flash::error('Asignacion not found');

            return redirect(route('asignacion.index'));
        }

        $file=$request->file('ruta');
        $name=$file->getClientOriginalName();
        $file->move(storage_path('app/Academic/Horarios/').$asignacion->id,$name);
        $asignacion = $this->asignacionRepository->update($request->except(['ruta'])+['ruta'=>$name], $id);

        Flash::success('Asignacion actualizada Correctamente');

        return redirect(route('asignacion.index'));
    }

    /**
     * Remove the specified Asignacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asignacion = $this->asignacionRepository->findWithoutFail($id);

        if (empty($asignacion)) {
            Flash::error('Asignacion not found');

            return redirect(route('asignacion.index'));
        }

        $this->asignacionRepository->delete($id);

        Flash::success('Asignacion Borrada con Exito.');

        return redirect(route('asignacion.index'));
    }

    public function downloadFile($id)
	{		
		$asignacion= Asignacion::find($id);
		if (empty($asignacion)) {
			Flash::error('asignacion not found');
			return redirect(route('asignacion.index'));
		}

		$file = storage_path('app/Academic/Horarios/'.$id.'/').$asignacion->ruta;
		if(file_exists($file)){
			return \Response::download($file);
		} else {
			Flash::error('File not found');
			return redirect(route('asignacion.index'));
		}
	}
}
