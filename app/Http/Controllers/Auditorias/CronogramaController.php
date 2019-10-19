<?php

namespace App\Http\Controllers\Auditorias;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Carbon\Carbon;
use App\Models\AuditoriaProceso;

class CronogramaController extends AppBaseController
{

    public function __construct()
    {
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
	public function show(Request $request)
	{
		$data = $request->only(['start','end']);
		$audProcesos = AuditoriaProceso::with(['proceso','auditoria'])
						->whereBetween('fecha',[$data])
						->get();

		$data = []; //declaramos un array principal que va contener los datos
        $hidden = ['created_at', 'updated_at', 'deleted_at'];
		//Con los datos obtenidos, se construye el JSON que será recibido por la vista en el Calendar.
		foreach ($audProcesos as $audpro) {
			$data[] = [
				'title'		=> '('.$audpro->proceso_id.'-'.$audpro->auditoria_id .') '.$audpro->proceso->nombre, 
				'start'		=> $audpro->fecha->setTimeFromTimeString($audpro->hora_inicio)->toDateTimeString(),
				'end'		=> $audpro->fecha->setTimeFromTimeString($audpro->hora_fin)->toDateTimeString(),
				'proceso'	=> $audpro->proceso->makeHidden($hidden)->toJson(), 
				'auditoria'	=> $audpro->auditoria->makeHidden($hidden)->toJson(), 
				'estado'	=> $audpro->estado, 
			];
		}

		return json_encode($data);
	}


	
}
