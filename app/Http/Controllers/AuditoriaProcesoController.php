<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuditoriaProcesoRequest;
use App\Http\Requests\UpdateAuditoriaProcesoRequest;
use App\Repositories\AuditoriaProcesoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

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
        $auditoria = request()->get('auditoria');
        $arrAuditores = model_to_array(Auditor::class, 'nombre');
        $arrProceso = model_to_array(Procesos::class, 'nombre');
        return view('auditoria_procesos.create', compact('auditoria','arrAuditores','arrProceso'));
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

        return redirect(route('auditorias.edit',[$request->get('auditoria_id')]));
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
        $auditoriaProcesos = $this->auditoriaProcesosRepository->findWithoutFail($id);

        if (empty($auditoriaProcesos)) {
            Flash::error('Auditoria Procesos not found');
            return redirect()->back()->send();
        }

        return view('auditoria_procesos.edit')->with('auditoriaProcesos', $auditoriaProcesos);
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
        $auditoriaProcesos = $this->auditoriaProcesosRepository->findWithoutFail($id);

        if (empty($auditoriaProcesos)) {
            Flash::error('Auditoria Procesos not found');
        } else {
            $auditoriaProcesos = $this->auditoriaProcesosRepository->update($request->all(), $id);
            Flash::success('Auditoria Procesos updated successfully.');
        }

        return redirect()->back()->send();
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
