<?php
namespace App\Http\Controllers\Academic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Academic;
use Flash;

class AcademicController extends Controller
{
	public function __construct()
    {
        $this->middleware('permission:acad-plan-form-plan40-load',  ['only' => ['index', 'store', 'save', 'create']]);
    }

    protected $class = Academic::class;

   	public function index()
	{
		$academics = academic::paginate(5);
		//$users = User::paginate(5);

		return view('academic.index')
		->with('academics', $academics);
		//return view('academics/index', compact( 'academics'));   
		// return view('users-mgmt/index', ['users' => $users]);
	}

	public function create()
	{
		return view('academic.create');
	}


	public function store( Request $request)
	{
		if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$file->move(storage_path().'/app/Academic/Plan40/',$name);
		}

		$academic=new Academic();
		$academic->ruta=$name;
		$academic->save();

		$academics = Academic::all();
		$academics = Academic::paginate(5);
		Flash::success('Registrado con Exito.');
		return view('academic.index', compact( 'academics'));  
	}


	public function edit( $id)
	{
		$academics= Academic::find($id);
     	//return  $academic;
		return view('academic.edit', ['academic' => $academics]);
	}


	public function update( Request $request, $id)
	{
		$academic= Academic::find($id);
		//$data = request();
		//return $data;
		$academic->fill($request->except('ruta'));
		if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$academic->ruta=$name;
			$file->move(storage_path().'/app/Academic/Plan40/',$name);
		}

		$academic->save();
		//return view('academics.index', ['academics' => $academic]);
		return (redirect()->route('academic.index'));
	}

	function destroy( $id){

	$academics= Academic::find($id);
	if (empty($id)) {

		Flash::error('academic not found');

		return redirect(route('academic.index'));
	}

	$academics->delete($id);
	Flash::success('Plan 40 deleted successfully.');

	return redirect(route('academic.index'));
	}

}
