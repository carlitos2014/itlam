<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use PDF;
use Carbon\Carbon;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class AuditoriaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Muestra formulario para generar plan de auditorias formato GQ-FR-08.
     *
     * @return Response
     */
    public function programacion()
    {
        return view('auditorias.programacion.index');
    }
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function programacionBuildPdf()
    {
        $view = 'auditorias.programacion.pdf';
        $today = Carbon::today()->format('Y-m-d');
        $auditor_lider = 'Yulieth Andrea Ramírez';
        $auditores_internos = '';

        //return view($view, compact('today' ));

        $pdf = PDF::loadView($view, compact('today','auditor_lider','auditores_internos'))
                    ->setPaper('letter', 'portrait');

        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();

        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(512, 87, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, [0, 0, 0]);
        //$canvas->page_text(50, 770, null, null, 10, [0, 0, 0]);
        
        //return $pdf->download('GQ-FR-08 Plan de Auditorias '.$today.'.pdf');
        return $pdf->stream('invoice.pdf');
    }
}