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
		$data = []; //declaramos un array principal que va contener los datos
		$datesFilter = $request->only(['start','end']);
        $fieldsProc = 'proceso:id,nombre,responsable,email';
        //$fieldsAudi = 'auditoria:id,fecha,lugar,auditor_lider_id,fecha_apertura,lugar_apertura,fecha_cierre,lugar_cierre';
        $fieldsAudiLider = 'auditoria.auditorLider:id,nombre,email';
        $fieldsAuditor = 'auditor:id,nombre,email';

		$audProcesos = AuditoriaProceso::with([$fieldsProc,$fieldsAudiLider,$fieldsAuditor])
						->whereBetween('fecha',[$datesFilter])
						->get();
		//Con los datos obtenidos, se construye el JSON que será recibido por la vista en el Calendar.
		foreach ($audProcesos as $audpro) {
			$data[] = [
				'title'		=> '('.$audpro->proceso_id.'-'.$audpro->auditoria_id .') '.$audpro->proceso->nombre, 
				'start'		=> $audpro->fecha->setTimeFromTimeString($audpro->hora_inicio)->toDateTimeString(),
				'end'		=> $audpro->fecha->setTimeFromTimeString($audpro->hora_fin)->toDateTimeString(),
				'proceso'	=> $audpro->proceso, 
				'auditorLider'	=> $audpro->auditoria->auditorLider, 
				'auditor'	=> $audpro->auditor, 
				'estado'	=> $audpro->estado, 
			];
		}

		return json_encode($data);
	}

}
