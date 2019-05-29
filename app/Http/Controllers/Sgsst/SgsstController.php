<?php
namespace App\Http\Controllers\Sgsst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sgsst;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Requests\UpdateSgsstRequest;
use App\Repositories\SgsstRepository;

class SgsstController extends Controller
{
	 /** @var  SgsstRepository */
	private $SgsstRepository;

		public function __construct(SgsstRepository $sgsstRepo)
    {
        $this->SgsstRepository = $sgsstRepo;
    }

    protected $class = Sgsst::class;

   	public function index(Request $request)	{

			$this->SgsstRepository->pushCriteria(new RequestCriteria($request));
			$sgsst_s = $this->SgsstRepository->all();
			$sgsst_s = Sgsst::paginate(5);
		
		return view('sgsst_s.index')
		->with('sgsst_s', $sgsst_s);
		}
				/* Crear */
	public function create()
	{
		return view('sgsst.create');
	}

	public function store( Request $request)
	{
		if($request->hasFile('ruta')){

	        $Sgsst = $this->SgsstRepository->create($request->all());
			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			
			//Grantizo que los archivos no se sobrescriban
			$file->move(storage_path('app/Sgsst/').$Sgsst->id,$name);
			$Sgsst->update(['ruta'=>$name]);
			
	        Flash::success('Registrado con Exito.');
			return redirect(route('sgsst_s.index'));
		}else{
			Flash::error('Por favor completar todos los datos solicitados');
			return redirect()->back();
		}

		$Sgsst=SGSST::paginate(5);
	}
/* Ver  */
	public function show($id)
    {
        $sgsst_s = $this->SgsstRepository->findWithoutFail($id);

        if (empty($sgsst_s)) {
            Flash::error('not found');

            return redirect(route('sgsst_s.index'));
        }
        return view('sgsst.show')->with('sgsst_s', $sgsst_s);
    }
/* Editar */
	public function edit( $id)
	{
		$sgsst_s = $this->SgsstRepository->findWithoutFail($id);
		if (empty($sgsst_s)) {
			Flash::error('not found');
			return redirect(route('sgsst_s.index'));
	}
		$sgsst_s= Sgsst::find($id);
     	//return  $Sgsst;
		return view('sgsst.edit', ['Sgsst' => $sgsst_s]);
	}


	public function update($id, UpdateSgsstRequest $request)
	{
		$sgsst = $this->sgsstRepository->findWithoutFail($id);
		$sgsst= Sgsst::find($id);
		$sgsst->fill($request->except('ruta'));
		if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$file->move(storage_path('app/Sgsst/').$sgsst->id,$name);
			$sgsst->ruta=$name;
		}elseif (empty($sgsst)) {
			flash::error('Sgsst not found');
			return (redirect()->route('sgsst_s.index'));
		}
		$sgsst->save();
		$sgsst= $this->sgsstRepository->update($request->all(), $id);
		Flash::success('Actualizado con Exito');
		return (redirect()->route('sgsst_s.index'));
	}

	function destroy( $id){

		$sgsst_s= Sgsst::find($id);
		if (empty($sgsst_s)) {
			Flash::error('sgsst not found');
			return redirect(route('sgsst_s.index'));
		}

		$sgsst_s->delete($id);
		Flash::success('Archivo borrado con Éxito.');

		return redirect(route('sgsst_s.index'));
	}


	/**
	 * Descarga documento.
	 *
	 * @param  Ticket $ticket
	 * @return Response
	 */
	public function downloadFile($id)
	{
		
		$sgsst_s= Sgsst::find($id);
		if (empty($sgsst_s)) {
			Flash::error('sgsst not found');
			return redirect(route('sgsst_s.index'));
		}

		$file = storage_path('app/Sgsst/'.$id).$sgsst_s->ruta;
		if(file_exists($file)){
			return \Response::download($file);
		} else {
			Flash::error('File not found');
			return redirect(route('sgsst_s.index'));
		}
	}
}
