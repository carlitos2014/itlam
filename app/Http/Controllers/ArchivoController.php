<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use Flash;

class ArchivoController extends Controller
{
	public function __construct()
	{
        //$this->middleware('auth');
	}
	public function index()
	{
		$archivos = Archivo::all();
		$archivos = Archivo::paginate(5);
		//$users = User::paginate(5);

		return view('archivos.index')
		->with('archivos', $archivos);
		//return view('archivos/index', compact( 'archivos'));   
		// return view('users-mgmt/index', ['users' => $users]);


	}


	public function create()
	{
		return view('archivos.create');
	}


	public function store( Request $request)
	{

		if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$file->move(public_path().'/imagenes/',$name);
		}

		$archivo=new Archivo();
		$archivo->nombre=$request->input('nombre');
		$archivo->ruta=$name;
		$archivo->save();

		$archivos = Archivo::all();
		$archivos = Archivo::paginate(5);
		Flash::success('Registrado con Exito.');
		return view('archivos/index', compact( 'archivos'));  
	}


	public function edit( $id)
	{
		$archivos=Archivo::find($id);
     	//return  $archivo;
		return view('archivos.edit', ['archivo' => $archivos]);
	}


	public function update( Request $request, $id)
	{
		$archivo=Archivo::find($id);
		//$data = request();
		//return $data;
		$archivo->fill($request->except('ruta'));
		if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$archivo->ruta=$name;
			$file->move(public_path().'/imagenes/',$name);
		}

		$archivo->save();
		//return view('archivos.index', ['archivos' => $archivo]);
		return (redirect()->route('cargarArchivos.index'));
	}

	function destroy( $id){

	$archivos=Archivo::find($id);
	if (empty($id)) {

		Flash::error('Archivo not found');

		return redirect(route('cargarArchivos.index'));
	}

	$archivos->delete($id);
	Flash::success('Sedes deleted successfully.');

	return redirect(route('cargarArchivos.index'));
}




public function descargar($id){

	$archivo=Archivo::find($id);

	$rutaarchivo= "../public/imagenes/".$archivo->ruta;
          //return $rutaarchivo;
	return response()->download($rutaarchivo);
	return \Response::download(storage_path('app/Tickets/').$ticket->TICK_ARCHIVO);//->deleteFileAfterSend(true);

}
}
