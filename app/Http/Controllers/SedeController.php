<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesedesRequest;
use App\Http\Requests\UpdatesedesRequest;
use App\Repositories\sedesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\sedes;

class SedeController extends AppBaseController
{
    /** @var  sedesRepository */
    private $sedesRepository;

    public function __construct(sedesRepository $sedesRepo)
    {
        $this->sedesRepository = $sedesRepo;
    }

    /**
     * Display a listing of the sedes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sedesRepository->pushCriteria(new RequestCriteria($request));
        $sedes = $this->sedesRepository->all();
        $sedes = sedes::orderBy('id', 'DESC')->paginate(10);

        return view('sedes.index')
            ->with('sedes', $sedes);
    }

    /**
     * Show the form for creating a new sedes.
     *
     * @return Response
     */
    public function create()
    {
        return view('sedes.create');
    }

    /**
     * Store a newly created sedes in storage.
     *
     * @param CreatesedesRequest $request
     *
     * @return Response
     */
    public function store(CreatesedesRequest $request)
    {
        $input = $request->all();

        $sedes = $this->sedesRepository->create($input);

        Flash::success('Registrado con Exito.');

        return redirect(route('sedes.index'));
    }

    /**
     * Display the specified sedes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sedes = $this->sedesRepository->findWithoutFail($id);

        if (empty($sedes)) {
            Flash::error('Sedes not found');

            return redirect(route('sedes.index'));
        }

        return view('sedes.show')->with('sedes', $sedes);
    }

    /**
     * Show the form for editing the specified sedes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sedes = $this->sedesRepository->findWithoutFail($id);

        if (empty($sedes)) {
            Flash::error('Sedes not found');

            return redirect(route('sedes.index'));
        }

        return view('sedes.edit')->with('sedes', $sedes);
    }

    /**
     * Update the specified sedes in storage.
     *
     * @param  int              $id
     * @param UpdatesedesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesedesRequest $request)
    {
        $sedes = $this->sedesRepository->findWithoutFail($id);

        if (empty($sedes)) {
            Flash::error('Sedes not found');

            return redirect(route('sedes.index'));
        }

        $sedes = $this->sedesRepository->update($request->all(), $id);

        Flash::success('Sedes Actualizado con Exito.');

        return redirect(route('sedes.index'));
    }

    /**
     * Remove the specified sedes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sedes = $this->sedesRepository->findWithoutFail($id);

        if (empty($sedes)) {
            Flash::error('Sedes not found');

            return redirect(route('sedes.index'));
        }

        $this->sedesRepository->delete($id);

        Flash::success('Sedes deleted successfully.');

        return redirect(route('sedes.index'));
    }
}
