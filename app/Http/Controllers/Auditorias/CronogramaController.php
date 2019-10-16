<?php

namespace App\Http\Controllers\Auditorias;

use App\Http\Requests\CreateAuditoriaRequest;
use App\Http\Requests\UpdateAuditoriaRequest;
// use App\Repositories\AuditoriaRepository;
use App\Repositories\AuditoriaProcesoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Carbon\Carbon;


class CronogramaController extends AppBaseController
{

    public function __construct(AuditoriaProcesoRepository $auditoriaProcesosRepo)
    {
        $this->auditoriaProcesosRepository = $auditoriaProcesosRepo;
	}
	
	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('auditorias.seguimiento.index');
	}


	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function show()
	{
		$data = []; //declaramos un array principal que va contener los datos
        $audProcesos = $this->auditoriaProcesosRepository->all();

		//Con los datos obtenidos, se construye el JSON que será recibido por la vista en el Calendar.
		foreach ($audProcesos as $aud) {
			$data[] = [
				'id'			=> $aud->id,
				'title'			=> $aud->auditoria_id.' - '.$aud->proceso->nombre, 
				'start'			=> $aud->fecha->setTimeFromTimeString($aud->hora_inicio)->toDateTimeString(),
				'end'			=> $aud->fecha->setTimeFromTimeString($aud->hora_fin)->toDateTimeString(),
				'backgroundColor'=>'rgb(255, 255, 0)',
				'respProceso'	=> $aud->proceso->responsable, 
			];
		}

		return json_encode($data);
	}


	
}
