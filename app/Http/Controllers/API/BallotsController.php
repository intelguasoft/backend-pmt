<?php

namespace IntelGUA\PMT\Http\Controllers\API;

use IntelGUA\PMT\Models\Ballot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BallotsController extends BaseController
{
    private $rules = [
        'user_id'     =>  'required',
        'ballot_no'     =>  'required',
        'absent'     =>  'required',
        'signed'    =>  'required'
    ];

    private $messages = [
        'user_id.required'         => 'El campo :attribute es obligatorio',
        'ballot_no.required'         => 'El campo :attribute es obligatorio',
        'absent.required'         => 'El campo :attribute es obligatorio',
        'signed.required'       => 'El campo :attribute es obligatorio'
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
        $ballots = Ballot::all();

        return $this->sendResponse($ballots->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $ballot = Ballot::create($input);

        return $this->sendResponse($ballot->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\PMT\Models\Ballot  $ballot
     * @return \Illuminate\Http\Response
     */
    public function show(Ballot $ballot)
    {
        if (is_null($ballot)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($ballot->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\PMT\Models\Ballot  $ballot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ballot $ballot)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id'     =>  'required',
            'ballot_no'     =>  'required',
            'absent'     =>  'required',
            'signed'    =>  'required'
        ], $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $ballot->user_id = $input['user_id'];
        $ballot->ballot_no = $input['ballot_no'];
        $ballot->absent = $input['absent'];
        $ballot->signed = $input['signed'];
        $ballot->save();


        return $this->sendResponse($ballot->toArray(), 'Recurso actualizado correctamente.', 204);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \IntelGUA\PMT\Models\Ballot  $ballot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ballot $ballot)
    {
        $ballot->delete();

        if (is_null($ballot)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($ballot->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
