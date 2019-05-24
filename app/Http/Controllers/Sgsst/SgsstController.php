<?php
namespace App\Http\Controllers\Sgsst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sgsst;
use Flash;

class SgsstController extends Controller
{
	public function __construct()
    {
		//Pendiente Permiso
		//$this->middleware('permission:acad-plan-form-plan40-load',  ['only' => ['index', 'store', 'save', 'create']]);
    }

    protected $class = Sgsst::class;

   	public function index()
	{
		$sgsst_s = Sgsst::paginate(5);
		//$users = User::paginate(5);

		return view('Sgsst.index')
		->with('sgsst_s', $sgsst_s);
		//return view('sgsst_s/index', compact( 'sgsst_s'));   
		// return view('users-mgmt/index', ['users' => $users]);
	}

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

		$Sgsst=new Sgsst();
		$Sgsst->ruta=$name;
		$Sgsst->save();

		$sgsst_s = Sgsst::all();
		$sgsst_s = Sgsst::paginate(5);
		Flash::success('Registrado con Exito.');
		return view('sgsst.index', compact( 'sgsst_s'));  
	}


	public function edit( $id)
	{
		$sgsst_s= Sgsst::find($id);
     	//return  $Sgsst;
		return view('sgsst.edit', ['Sgsst' => $sgsst_s]);
	}


	public function update( Request $request, $id)
	{
		$Sgsst= Sgsst::find($id);
		//$data = request();
		//return $data;
		$Sgsst->fill($request->except('ruta'));
		if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$Sgsst->ruta=$name;
			$file->move(storage_path().'/app/Sgsst/Sgsst_inecesarios/',$name);
		}

		$Sgsst->save();
		//return view('sgsst_s.index', ['sgsst_s' => $Sgsst]);
		return (redirect()->route('sgsst.index'));
	}

	function destroy( $id){

	$sgsst_s= Sgsst::find($id);
	if (empty($id)) {

		Flash::error('sgsst not found');

		return redirect(route('Sgsst.index'));
	}

	$sgsst_s->delete($id);
	Flash::success('Archivo borrado con Éxito.');

	return redirect(route('sgsst.index'));
	}

}
