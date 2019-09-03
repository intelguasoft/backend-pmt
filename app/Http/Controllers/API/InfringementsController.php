<?php

namespace IntelGUA\PMT\Http\Controllers\API;

use IntelGUA\PMT\Models\Infringement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfringementsController extends BaseController
{
    private $rules = [
        'date'     =>  'required',
        'time'     =>  'required',
        'place'     =>  'required',
        'infringement_summary'     =>  'required',
        'law_basics'     =>  'required',
        'traffic_regulations'     =>  'required',
        'total'     =>  'required',
        'ballot_id'    =>  'required'
    ];

    private $messages = [
        'date.required'     => 'El campo :attribute es obligatorio',
        'time.required'     => 'El campo :attribute es obligatorio',
        'place.required'     => 'El campo :attribute es obligatorio',
        'infringement_summary.required'     => 'El campo :attribute es obligatorio',
        'law_basics.required'     => 'El campo :attribute es obligatorio',
        'traffic_regulations.required'     => 'El campo :attribute es obligatorio',
        'total.required'     => 'El campo :attribute es obligatorio',
        'ballot_id.required'    => 'El campo :attribute es obligatorio'
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
        $infringements = Role::all();

        return $this->sendResponse($infringements->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $infringement = Infringement::create($input);

        return $this->sendResponse($infringement->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\PMT\Models\Infringement  $infringement
     * @return \Illuminate\Http\Response
     */
    public function show(Infringement $infringement)
    {
        if (is_null($infringement)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($infringement->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\PMT\Models\Infringement  $infringement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infringement $infringement)
    {
        $input = $request->all();

        $validator = Validator::make($input, $this->rules, $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $infringement->date = $input['date'];
        $infringement->time = $input['time'];
        $infringement->place = $input['place'];
        $infringement->infringement_summary = $input['infringement_summary'];
        $infringement->law_basics = $input['law_basics'];
        $infringement->traffic_regulations = $input['traffic_regulations'];
        $infringement->total = $input['total'];
        $infringement->ballot_id = $input['ballot_id'];
        $infringement->save();


        return $this->sendResponse($infringement->toArray(), 'Recurso actualizado correctamente.', 204);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \IntelGUA\PMT\Models\Infringement  $infringement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infringement $infringement)
    {
        $infringement->delete();

        if (is_null($infringement)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($infringement->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
