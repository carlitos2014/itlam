<?php

namespace App\Http\Controllers\Auditorias;

use App\Http\Requests\CreateAuditoriaProcesoRequest;
use App\Http\Requests\UpdateAuditoriaProcesoRequest;
use App\Repositories\AuditoriaProcesoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Auditoria;

class AuditoriaProcesoController extends AppBaseController
{
    /** @var  AuditoriaProcesoRepository */
    private $auditoriaProcesosRepository;

    public function __construct(AuditoriaProcesoRepository $auditoriaProcesosRepo)
    {
        $this->auditoriaProcesosRepository = $auditoriaProcesosRepo;
    }


    /**
     * Show the form for creating a new AuditoriaProceso.
     *
     * @return Response
     */
    public function create()
    {
        $parameters = $this->getParametersView();
        return view('auditorias.auditoria_procesos.create', $parameters);
    }

    /**
     * Store a newly created AuditoriaProceso in storage.
     *
     * @param CreateAuditoriaProcesoRequest $request
     *
     * @return Response
     */
    public function store(CreateAuditoriaProcesoRequest $request)
    {
        $input = $request->all();

        $auditoriaProcesos = $this->auditoriaProcesosRepository->create($input);

        Flash::success('Auditoria Procesos saved successfully.');
        return redirect(route('auditorias.edit', [$input['auditoria_id']]));
    }


    /**
     * Show the form for editing the specified AuditoriaProceso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parameters = $this->getParametersView();
        $auditoriaProcesos = $this->auditoriaProcesosRepository->findWithoutFail($id);

        if (empty($auditoriaProcesos)) {
            Flash::error('Auditoria Procesos not found');
            return redirect()->back()->send();
        }

        return view('auditorias.auditoria_procesos.edit', compact('auditoriaProcesos')+$parameters);
    }

    /**
     * Update the specified AuditoriaProceso in storage.
     *
     * @param  int              $id
     * @param UpdateAuditoriaProcesoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuditoriaProcesoRequest $request)
    {
        $input = $request->all();
        $auditoriaProcesos = $this->auditoriaProcesosRepository->findWithoutFail($id);

        if (empty($auditoriaProcesos)) {
            Flash::error('Auditoria Procesos not found');
            return redirect()->back()->send();
        }
        
        $auditoriaProcesos = $this->auditoriaProcesosRepository->update($input, $id);
        Flash::success('Auditoria Procesos updated successfully.');
        return redirect(route('auditorias.edit', [$input['auditoria_id']]));
    }

    private function getParametersView(){
        $auditoria = request()->get('auditoria');
        $arrAuditores = model_to_array(Auditoria::findOrFail($auditoria)->auditoresInternos, 'nombre');
        $arrProcesos = model_to_array(Proceso::class, 'nombre');
        return compact('auditoria','arrAuditores','arrProcesos');
    }

    /**
     * Remove the specified AuditoriaProceso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $auditoriaProcesos = $this->auditoriaProcesosRepository->findWithoutFail($id);

        if (empty($auditoriaProcesos)) {
            Flash::error('Auditoria Procesos not found');
        } else {
            $this->auditoriaProcesosRepository->delete($id);
            Flash::success('Auditoria Procesos deleted successfully.');
        }

        return redirect()->back()->send();
    }
}
