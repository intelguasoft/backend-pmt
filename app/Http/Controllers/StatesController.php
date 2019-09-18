<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Http\Requests\State\StateStoreFormRequest;
use Edgar\PMT\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->q)) {
            $states = State::where('name', 'like', "%$request->q%")->paginate(10);
        } else {
            $states = State::paginate(10);
        }
        return view('admin.states.index')->with('states', $states);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreFormRequest $request)
    {
        $data = $request->all();

        $role = State::create($data);

        // alert()->success('Creación de perfil','Perfil creado satisfactoriamente!')->persistent(true,false);
        toast('Departamento creado satisfactoriamente!', 'success');

        return redirect()->route('departamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\State  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(State $departamento)
    {
        return view('admin.states.show')->with('state', $departamento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Edgar\PMT\Models\State  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(State $departamento)
    {
        // return $perfile;
        return view('admin.states.edit')->with('departamento', $departamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\State  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $departamento)
    {
        if (is_null($departamento)) {
            return redirect()->route('departamentos.index')->with('status', 'No se ha encontrado ese departamento, asegurese de haber proporcionado un codigo valido.');
        }
        $departamento->name = $request->input('name');
        $departamento->postal_code = $request->input('postal_code');
        $departamento->cedula_code = $request->input('cedula_code');
        $departamento->save();

        toast('Departamento actualizado satisfactoriamente!', 'success');
        return redirect()->route('departamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //TODO: Pendiente agregar para eliminar...
    }
}
