<?php

namespace App\Http\Controllers;

use App\Models\Workplan;
use Illuminate\Http\Request;
use Flash;

class WorkplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaWork = workplan::all();
		$acaWork = workplan::paginate(5);
		//$users = User::paginate(5);

		return view('academicWorkplan.index')
		->with('acaWork', $acaWork);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academicWorkplan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$file->move(storage_path().'/app/Academic/Workplan/',$name);
		}

		$acaWork=new Workplan();
		$acaWork->ruta=$name;
		$acaWork->save();

		$acaWork = workplan::all();
		$acaWork = workplan::paginate(5);
		Flash::success('Registrado con Exito.');
		return view('academicWorkplan.index', compact( 'acaWork'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workplan  $workplan
     * @return \Illuminate\Http\Response
     */
    public function show(Workplan $workplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workplan  $workplan
     * @return \Illuminate\Http\Response
     */
    public function edit(Workplan $workplan)
    {
        $acaWork= Workplan::find($id);
     	//return  $academic;
		return view('academicWorkplan.edit', ['workplan' => $acaWork]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workplan  $workplan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workplan $workplan)
    {
        $acaWork= Workplan::find($id);
		//$data = request();
		//return $data;
		$acaWork->fill($request->except('ruta'));
		if($request->hasFile('ruta')){

			$file=$request->file('ruta');
			$name=$file->getClientOriginalName();
			$acaWork->ruta=$name;
			$file->move(storage_path().'/app/Academic/Workplan/',$name);
		}

		$acaWork->save();
		//return view('acaWork.index', ['acaWork' => $workplan]);
		return (redirect()->route('academicWorkplan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workplan  $workplan
     * @return \Illuminate\Http\Response
     */
    function destroy( $id){

        $acaWork= Workplan::find($id);
        if (empty($id)) {
    
            Flash::error('Workplan not found');
    
            return redirect(route('academicWorkplan.index'));
        }
    
        $acaWork->delete($id);
        Flash::success('Plan de trabajo deleted successfully.');
    
        return redirect(route('academicWorkplan.index'));
        }
}
