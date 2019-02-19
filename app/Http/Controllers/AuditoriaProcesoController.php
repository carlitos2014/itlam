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
     * Display a listing of the AuditoriaProceso.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->auditoriaProcesosRepository->pushCriteria(new RequestCriteria($request));
        $auditoriaProcesos = $this->auditoriaProcesosRepository->all();

        return view('auditoria_procesos.index')
            ->with('auditoriaProcesos', $auditoriaProcesos);
    }

    /**
     * Show the form for creating a new AuditoriaProceso.
     *
     * @return Response
     */
    public function create()
    {
        return view('auditoria_procesos.create');
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

        return redirect(route('auditoriaProcesos.index'));
    }

    /**
     * Display the specified AuditoriaProceso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $auditoriaProcesos = $this->auditoriaProcesosRepository->findWithoutFail($id);

        if (empty($auditoriaProcesos)) {
            Flash::error('Auditoria Procesos not found');

            return redirect(route('auditoriaProcesos.index'));
        }

        return view('auditoria_procesos.show')->with('auditoriaProcesos', $auditoriaProcesos);
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

            return redirect(route('auditoriaProcesos.index'));
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

            return redirect(route('auditoriaProcesos.index'));
        }

        $auditoriaProcesos = $this->auditoriaProcesosRepository->update($request->all(), $id);

        Flash::success('Auditoria Procesos updated successfully.');

        return redirect(route('auditoriaProcesos.index'));
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

            return redirect(route('auditoriaProcesos.index'));
        }

        $this->auditoriaProcesosRepository->delete($id);

        Flash::success('Auditoria Procesos deleted successfully.');

        return redirect(route('auditoriaProcesos.index'));
    }
}
