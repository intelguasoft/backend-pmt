<?php

namespace Edgar\PMT\Http\Controllers\API;

use Edgar\PMT\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StatesController extends BaseController
{
    private $rules = [
        'name'     =>  'required|unique:states',
        'postal_code'    =>  'required',
        'cedula_code'    =>  'required'
    ];

    private $messages = [
        'name.required'         => 'El campo :attribute es obligatorio',
        'name.unique'               => 'El campo :attribute ya existe en nuestros registros',
        'postal_code.required'       => 'El campo :attribute es obligatorio',
        'cedula_code.required'       => 'El campo :attribute es obligatorio'
    ];

    public function __construct()
    {
        // $this->middleware('jwt');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();

        return $this->sendResponse($states->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, $this->rules, $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $state = State::create($input);

        return $this->sendResponse($state->toArray(), 'Recurso creado satisfactoriamente.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        if (is_null($state)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($state->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'     =>  ['required', Rule::unique('states')->ignore($state->id)],
            'postal_code'    =>  'required',
            'cedula_code'    =>  'required',
        ], $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $state->name = $input['name'];
        $state->postal_code = $input['postal_code'];
        $state->cedula_code = $input['cedula_code'];
        $state->save();


        return $this->sendResponse($state->toArray(), 'Recurso actualizado correctamente.', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();

        if (is_null($state)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($state->toArray(), 'Recurso eliminado correctamente.', 204);
    }
}
