<?php

namespace App\Http\Controllers\App;

use App\Http\Requests\CreateFirmaRequest;
use App\Http\Requests\UpdateFirmaRequest;
use App\Repositories\FirmaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Firma;

class FirmaController extends AppBaseController
{
    /** @var  FirmaRepository */
    private $firmaRepository;

    public function __construct(FirmaRepository $firmaRepo)
    {
        $this->firmaRepository = $firmaRepo;
    }

    /**
     * Display a listing of the Firma.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->firmaRepository->pushCriteria(new RequestCriteria($request));
        $firmas = $this->firmaRepository->all();

        return view('app.firmas.index')
            ->with('firmas', $firmas);
    }

    /**
     * Show the form for creating a new Firma.
     *
     * @return Response
     */
    public function create()
    {
        return view('app.firmas.create');
    }

    /**
     * Store a newly created Firma in storage.
     *
     * @param CreateFirmaRequest $request
     *
     * @return Response
     */
    public function store(CreateFirmaRequest $request)
    {
        if($request->hasFile('filename')){

            $firma = $this->firmaRepository->create($request->all());
            $firma = $this->updateFile($firma);
            Flash::success('Firma registrada con Exito.');
            return redirect(route('app.firmas.index'));
        } else {
            Flash::error('No hay archivo para cargar.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified Firma.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $firma = $this->firmaRepository->findWithoutFail($id);

        if (empty($firma)) {
            Flash::error('Firma not found');

            return redirect(route('app.firmas.index'));
        }

        return view('app.firmas.show')->with('firma', $firma);
    }

    /**
     * Show the form for editing the specified Firma.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $firma = $this->firmaRepository->findWithoutFail($id);

        if (empty($firma)) {
            Flash::error('Firma not found');

            return redirect(route('app.firmas.index'));
        }

        return view('app.firmas.edit')->with('firma', $firma);
    }

    /**
     * Update the specified Firma in storage.
     *
     * @param  int              $id
     * @param UpdateFirmaRequest $request
     *
     * @return Response
     */
    public function update($id)
    {
        $firma = Firma::find($id);

        if (empty($firma)) {
            Flash::error('Firma not found');
        } else {
            $firma->fill(request()->except('filename'));
            $this->updateFile($firma);
            Flash::success('Firma registrada con éxito.');
        }
        return redirect(route('app.firmas.index'));

    }

    protected function updateFile(Firma $firma)
    {
        if($file = request()->file('filename')){
            $filename = 'firma_'.$firma->id.'.'.$file->getClientOriginalExtension();
            $file->move(storage_path('app/public/firmas'), $filename);
            $firma->update(['filename'=>$filename]);
        }
        return $firma;
    }

    /**
     * Remove the specified Firma from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $firma = $this->firmaRepository->findWithoutFail($id);

        if (empty($firma)) {
            Flash::error('Firma not found');

            return redirect(route('app.firmas.index'));
        }

        $this->firmaRepository->delete($id);

        Flash::success('Firma deleted successfully.');

        return redirect(route('app.firmas.index'));
    }
}
