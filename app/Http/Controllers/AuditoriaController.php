<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuditoriaRequest;
use App\Http\Requests\UpdateAuditoriaRequest;
use App\Repositories\AuditoriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Auditor;

use PDF;
use Carbon\Carbon;

class AuditoriaController extends AppBaseController
{
    /** @var  AuditoriaRepository */
    private $auditoriaRepository;

    public function __construct(AuditoriaRepository $auditoriaRepo)
    {
        $this->auditoriaRepository = $auditoriaRepo;
    }

    /**
     * Display a listing of the Auditoria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->auditoriaRepository->pushCriteria(new RequestCriteria($request));
        $auditorias = $this->auditoriaRepository->all();

        return view('auditorias.index')
            ->with('auditorias', $auditorias);
    }

    /**
     * Show the form for creating a new Auditoria.
     *
     * @return Response
     */
    public function create()
    {
        $arrAuditores = model_to_array(Auditor::class, 'nombre');
        return view('auditorias.create',compact('arrAuditores'));
    }

    /**
     * Store a newly created Auditoria in storage.
     *
     * @param CreateAuditoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateAuditoriaRequest $request)
    {
        $input = $request->all();

        $auditoria = $this->auditoriaRepository->create($input);
        Flash::success('Auditoria saved successfully.');

        return redirect(route('auditorias.index'));
    }

    /**
     * Display the specified Auditoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $auditoria = $this->auditoriaRepository->findWithoutFail($id);

        if (empty($auditoria)) {
            Flash::error('Auditoria not found');
            return redirect(route('auditorias.index'));
        }

        return view('auditorias.show')->with('auditoria', $auditoria);
    }


    /**
     * Genera PDF
     *
     * @param  int $id
     *
     * @return Response
     */
    public function programacionBuildPdf($id)
    {
        $auditoria = $this->auditoriaRepository->findWithoutFail($id);
        if (empty($auditoria)) {
            Flash::error('Auditoria not found');
            return redirect(route('auditorias.index'));
        }

        $view = 'auditorias.pdf';
        $today = Carbon::today()->format('Y-m-d');

        //return view($view, compact('today' ));

        $pdf = PDF::loadView($view, compact('today','auditoria'))
                    ->setPaper('letter', 'portrait');

        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();


        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(485, 87, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, [0, 0, 0]);
        //$canvas->page_text(50, 770, null, null, 10, [0, 0, 0]);
        
        //return $pdf->download('GQ-FR-08 Plan de Auditorias '.$today.'.pdf');
        return $pdf->stream('GQ-FR-08 Plan de Auditorias '.$auditoria->lugar.' - '.$auditoria->fecha->format('Y-m-d').'.pdf');
    }


    /**
     * Show the form for editing the specified Auditoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $auditoria = $this->auditoriaRepository->findWithoutFail($id);

        if (empty($auditoria)) {
            Flash::error('Auditoria not found');

            return redirect(route('auditorias.index'));
        }

        $arrAuditores = model_to_array(Auditor::class, 'nombre');
        return view('auditorias.edit',compact('auditoria', 'arrAuditores'));
    }

    /**
     * Update the specified Auditoria in storage.
     *
     * @param  int              $id
     * @param UpdateAuditoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuditoriaRequest $request)
    {
        //dd($request->all());
        $auditoria = $this->auditoriaRepository->findWithoutFail($id);

        if (empty($auditoria)) {
            Flash::error('Auditoria not found');
        } else {
            $auditoria = $this->auditoriaRepository->update($request->all(), $id);
            Flash::success('Auditoria updated successfully.');
        }

        return redirect(route('auditorias.index'));
    }

    /**
     * Remove the specified Auditoria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $auditoria = $this->auditoriaRepository->findWithoutFail($id);

        if (empty($auditoria)) {
            Flash::error('Auditoria not found');
        } else {
            $this->auditoriaRepository->delete($id);
            Flash::success('Auditoria deleted successfully.');
        }

        return redirect(route('auditorias.index'));
    }
}
