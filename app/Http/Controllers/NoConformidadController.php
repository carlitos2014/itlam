<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoConformidadesRequest;
use App\Http\Requests\UpdateNoConformidadesRequest;
use App\Repositories\NoConformidadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NoConformidadController extends AppBaseController
{


    /** @var  NoConformidadesRepository */
    private $noConformidadesRepository;

    public function __construct(NoConformidadesRepository $noConformidadesRepo)
    {
        $this->noConformidadesRepository = $noConformidadesRepo;

    }

    /**
     * Display a listing of the NoConformidades.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->noConformidadesRepository->pushCriteria(new RequestCriteria($request));
        $noConformidades = $this->noConformidadesRepository->paginate(10);

        return view('no_conformidades.index')
        ->with('noConformidades', $noConformidades);
    }

    /**
     * Show the form for creating a new NoConformidades.
     *
     * @return Response
     */
    public function create()
    {
     //$gradoNoConformidad= [1=>"Menores", 2=>"Mayores",];
       $gradoNoConformidad= ["Menores"=>"Menores", "Mayores"=>"Mayores",];
      return view('no_conformidades.create',compact('gradoNoConformidad'));
  }

    /**
     * Store a newly created NoConformidades in storage.
     *
     * @param CreateNoConformidadesRequest $request
     *
     * @return Response
     */
    public function store(CreateNoConformidadesRequest $request)
    {
        $input = $request->all();

        $noConformidades = $this->noConformidadesRepository->create($input);

        Flash::success('No Conformidades saved successfully.');

        return redirect(route('noConformidades.index'));
    }

    /**
     * Display the specified NoConformidades.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $noConformidades = $this->noConformidadesRepository->findWithoutFail($id);

        if (empty($noConformidades)) {
            Flash::error('No Conformidades not found');

            return redirect(route('noConformidades.index'));
        }

        return view('no_conformidades.show')->with('noConformidades', $noConformidades);
    }

    /**
     * Show the form for editing the specified NoConformidades.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //$gradoNoConformidad= [1=>"Menores", 2=>"Mayores",];
        $gradoNoConformidad= ["Menores"=>"Menores", "Mayores"=>"Mayores",];
        $noConformidades = $this->noConformidadesRepository->findWithoutFail($id);

        if (empty($noConformidades)) {
            Flash::error('No Conformidades not found');

            return redirect(route('noConformidades.index'));
        }

        return view('no_conformidades.edit',compact('noConformidades','gradoNoConformidad'));

       // return view('no_conformidades.edit')->with('noConformidades', $noConformidades);
    }

    /**
     * Update the specified NoConformidades in storage.
     *
     * @param  int              $id
     * @param UpdateNoConformidadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoConformidadesRequest $request)
    {
        $noConformidades = $this->noConformidadesRepository->findWithoutFail($id);

        if (empty($noConformidades)) {
            Flash::error('No Conformidades not found');

            return redirect(route('noConformidades.index'));
        }

        $noConformidades = $this->noConformidadesRepository->update($request->all(), $id);

        Flash::success('No Conformidades updated successfully.');

        return redirect(route('noConformidades.index'));
    }

    /**
     * Remove the specified NoConformidades from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $noConformidades = $this->noConformidadesRepository->findWithoutFail($id);

        if (empty($noConformidades)) {
            Flash::error('No Conformidades not found');

            return redirect(route('noConformidades.index'));
        }

        $this->noConformidadesRepository->delete($id);

        Flash::success('No Conformidades deleted successfully.');

        return redirect(route('noConformidades.index'));
    }
}
