<?php

namespace App\Http\Controllers\Auditorias;

use App\Http\Requests\CreateProcesosRequest;
use App\Http\Requests\UpdateProcesosRequest;
use App\Repositories\ProcesosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProcesosController extends AppBaseController
{
    /** @var  ProcesosRepository */
    private $procesosRepository;

    public function __construct(ProcesosRepository $procesosRepo)
    {
        $this->procesosRepository = $procesosRepo;
    }

    /**
     * Display a listing of the Procesos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->procesosRepository->pushCriteria(new RequestCriteria($request));
        $procesos = $this->procesosRepository->all();

        return view('auditorias.procesos.index')
                ->with('procesos', $procesos);
    }

    /**
     * Show the form for creating a new Procesos.
     *
     * @return Response
     */
    public function create()
    {
        return view('auditorias.procesos.create');
    }

    /**
     * Store a newly created Procesos in storage.
     *
     * @param CreateProcesosRequest $request
     *
     * @return Response
     */
    public function store(CreateProcesosRequest $request)
    {
        $input = $request->all();
        $procesos = $this->procesosRepository->create($input);
        Flash::success('Procesos saved successfully.');
        return redirect(route('auditorias.procesos.index'));
    }

    /**
     * Display the specified Procesos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $procesos = $this->procesosRepository->findWithoutFail($id);

        if (empty($procesos)) {
            Flash::error('Procesos not found');
            return redirect(route('auditorias.rocesos.index'));
        }

        return view('auditorias.procesos.show')->with('procesos', $procesos);
    }

    /**
     * Show the form for editing the specified Procesos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $procesos = $this->procesosRepository->findWithoutFail($id);

        if (empty($procesos)) {
            Flash::error('Procesos not found');
            return redirect(route('auditorias.procesos.index'));
        }

        return view('auditorias.procesos.edit')->with('procesos', $procesos);
    }

    /**
     * Update the specified Procesos in storage.
     *
     * @param  int              $id
     * @param UpdateProcesosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProcesosRequest $request)
    {
        $procesos = $this->procesosRepository->findWithoutFail($id);

        if (empty($procesos)) {
            Flash::error('Procesos not found');
        } else {
            $procesos = $this->procesosRepository->update($request->all(), $id);
            Flash::success('Procesos updated successfully.');
        }

        return redirect(route('auditorias.procesos.index'));
    }

    /**
     * Remove the specified Procesos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $procesos = $this->procesosRepository->findWithoutFail($id);

        if (empty($procesos)) {
            Flash::error('Procesos not found');
            return redirect(route('procesos.index'));
        } else {
            $this->procesosRepository->delete($id);
            Flash::success('Procesos deleted successfully.');
        }
        return redirect(route('auditorias.procesos.index'));
    }
}
