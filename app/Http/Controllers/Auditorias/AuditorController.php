<?php

namespace App\Http\Controllers\Auditorias;

use App\Http\Requests\CreateAuditorRequest;
use App\Http\Requests\UpdateAuditorRequest;
use App\Repositories\AuditorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AuditorController extends AppBaseController
{
    /** @var  AuditorRepository */
    private $auditorRepository;

    public function __construct(AuditorRepository $auditorRepo)
    {
        $this->auditorRepository = $auditorRepo;
    }

    /**
     * Display a listing of the Auditor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->auditorRepository->pushCriteria(new RequestCriteria($request));
        $auditors = $this->auditorRepository->all();

        return view('auditorias.auditors.index')
            ->with('auditors', $auditors);
    }

    /**
     * Show the form for creating a new Auditor.
     *
     * @return Response
     */
    public function create()
    {
        return view('auditorias.auditors.create');
    }

    /**
     * Store a newly created Auditor in storage.
     *
     * @param CreateAuditorRequest $request
     *
     * @return Response
     */
    public function store(CreateAuditorRequest $request)
    {
        $input = $request->all();

        $auditor = $this->auditorRepository->create($input);

        Flash::success('Auditor saved successfully.');

        return redirect(route('auditorias.auditors.index'));
    }

    /**
     * Display the specified Auditor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $auditor = $this->auditorRepository->findWithoutFail($id);

        if (empty($auditor)) {
            Flash::error('Auditor not found');

            return redirect(route('auditorias.auditors.index'));
        }

        return view('auditorias.auditors.show')->with('auditor', $auditor);
    }

    /**
     * Show the form for editing the specified Auditor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $auditor = $this->auditorRepository->findWithoutFail($id);

        if (empty($auditor)) {
            Flash::error('Auditor not found');

            return redirect(route('auditorias.auditors.index'));
        }

        return view('auditorias.auditors.edit')->with('auditor', $auditor);
    }

    /**
     * Update the specified Auditor in storage.
     *
     * @param  int              $id
     * @param UpdateAuditorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuditorRequest $request)
    {
        $auditor = $this->auditorRepository->findWithoutFail($id);

        if (empty($auditor)) {
            Flash::error('Auditor not found');

            return redirect(route('auditorias.auditors.index'));
        }

        $auditor = $this->auditorRepository->update($request->all(), $id);

        Flash::success('Auditor updated successfully.');

        return redirect(route('auditorias.auditors.index'));
    }

    /**
     * Remove the specified Auditor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $auditor = $this->auditorRepository->findWithoutFail($id);

        if (empty($auditor)) {
            Flash::error('Auditor not found');
            return redirect(route('auditorias.auditors.index'));
        }

        $this->auditorRepository->delete($id);

        Flash::success('Auditor deleted successfully.');

        return redirect(route('auditorias.auditors.index'));
    }
}
