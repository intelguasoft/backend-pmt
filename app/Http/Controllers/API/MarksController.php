<?php

namespace IntelGUA\PMT\Http\Controllers\API;

use IntelGUA\PMT\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MarksController extends BaseController
{
    private $rules = [
        'name'     =>  'required|unique:marks',
        'initials'     =>  'required',
        'description'    =>  'required'
    ];

    private $messages = [
        'name.required'         => 'El campo :attribute es obligatorio',
        'name.unique'               => 'El campo :attribute ya existe en nuestros registros',
        'initials.required'               => 'El campo :attribute es obligatorio',
        'description.required'       => 'El campo :attribute es obligatorio'
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
        $marks = Mark::all();

        return $this->sendResponse($marks->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $mark = Mark::create($input);

        return $this->sendResponse($mark->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\PMT\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        if (is_null($mark)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($mark->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\PMT\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'     =>  ['required', Rule::unique('marks')->ignore($mark->id)],
            'initials'     =>  'required',
            'description'    =>  'required'
        ], $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $mark->name = $input['name'];
        $mark->initials = $input['initials'];
        $mark->description = $input['description'];
        $mark->save();


        return $this->sendResponse($mark->toArray(), 'Recurso actualizado correctamente.', 204);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \IntelGUA\PMT\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();

        if (is_null($mark)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($mark->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
