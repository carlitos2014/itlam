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
		
		return view('Sgsst.index')
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

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$file->move(storage_path().'/app/Sgsst/Sgsst_inecesarios/',$name);
		}

		$input = $request->all()+['ruta'=>$name];
		
        $Sgsst = $this->SgsstRepository->create($input);
        Flash::success('Registrado con Exito.');
        return redirect(route('sgsst_s.index'));
	}

	public function show($id)
    {
        $sgsst_s = $this->SgsstRepository->findWithoutFail($id);

        if (empty($sgsst_s)) {
            Flash::error('not found');

            return redirect(route('sgsst_s.index'));
        }

        return view('sgsst_s.show')->with('sgsst_s', $sgsst_s);
    }

	public function edit( $id)
	{
		$sgsst_s = $this->SgsstRepository->findWithoutFail($id);
		if (empty($sgsst_s)) {
			Flash::error('not found');
			return redirect(route('sgsst_s.index'));
	}
		$sgsst_s= Sgsst::find($id);
     	//return  $Sgsst;
		return view('sgsst_s.edit', ['Sgsst' => $sgsst_s]);
	}


	public function update($id, UpdateSgsstRequest $request)
	{
		$Sgsst= Sgsst::find($id);
		$Sgsst->fill($request->except('ruta'));
		if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$Sgsst->ruta=$name;
			$file->move(storage_path().'/app/Sgsst/',$name);
		}

		$Sgsst->save();
		//return view('sgsst_s.index', ['sgsst_s' => $Sgsst]);
		return (redirect()->route('sgsst_s.index'));
	}

	function destroy( $id){

	$sgsst_s= Sgsst::find($id);
	if (empty($id)) {

		Flash::error('sgsst not found');

		return redirect(route('sgsst_s.index'));
	}

	$sgsst_s->delete($id);
	Flash::success('Archivo borrado con Éxito.');

	return redirect(route('sgsst_s.index'));
	}

}
