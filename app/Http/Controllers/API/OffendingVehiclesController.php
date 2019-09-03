<?php

namespace IntelGUA\PMT\Http\Controllers\API;

use IntelGUA\PMT\Models\OffendingVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OffendingVehiclesController extends BaseController
{
    private $rules = [
        'car_plate'     =>  'required',
        'nit'     =>  'required',
        'type_vehicle_id'     =>  'required',
        'mark_id'     =>  'required',
        'ballot_id'     =>  'required',
        'color_design'    =>  'required'
    ];

    private $messages = [
        'car_plate.required'         => 'El campo :attribute es obligatorio',
        'nit.required'         => 'El campo :attribute es obligatorio',
        'type_vehicle_id.required'         => 'El campo :attribute es obligatorio',
        'mark_id.required'         => 'El campo :attribute es obligatorio',
        'ballot_id.required'         => 'El campo :attribute es obligatorio',
        'color_design.required'       => 'El campo :attribute es obligatorio'
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
        $offendingVehicles = OffendingVehicle::all();

        return $this->sendResponse($offendingVehicles->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $offendingVehicle = OffendingVehicle::create($input);

        return $this->sendResponse($offendingVehicle->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\PMT\Models\OffendingVehicle  $offendingVehicle
     * @return \Illuminate\Http\Response
     */
    public function show(OffendingVehicle $offendingVehicle)
    {
        if (is_null($offendingVehicle)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($offendingVehicle->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\PMT\Models\OffendingVehicle  $offendingVehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OffendingVehicle $offendingVehicle)
    {
        $input = $request->all();

        $validator = Validator::make($input, $this->rules, $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $offendingVehicle->car_plate = $input['car_plate'];
        $offendingVehicle->nit = $input['nit'];
        $offendingVehicle->type_vehicle_id = $input['type_vehicle_id'];
        $offendingVehicle->mark_id = $input['mark_id'];
        $offendingVehicle->ballot_id = $input['ballot_id'];
        $offendingVehicle->color_design = $input['color_design'];
        $offendingVehicle->save();


        return $this->sendResponse($offendingVehicle->toArray(), 'Recurso actualizado correctamente.', 204);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \IntelGUA\PMT\Models\OffendingVehicle  $offendingVehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(OffendingVehicle $offendingVehicle)
    {
        $offendingVehicle->delete();

        if (is_null($offendingVehicle)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($offendingVehicle->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
