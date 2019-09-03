<?php

namespace IntelGUA\PMT\Http\Controllers\API;

use IntelGUA\PMT\Models\Offender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OffendersController extends BaseController
{
    private $rules = [
        'first_name' =>  'required',
        'last_name' =>  'required',
        'driver_license' =>  'required',
        'license_class' =>  'required',
        'doc_no' =>  'required',
        'home_address' =>  'required',
        'state_id' =>  'required',
        'city_id' =>  'required',
        'ballot_id' =>  'required'
    ];

    private $messages = [
        'first_name.required' => 'El campo :attribute es obligatorio',
        'last_name.required' => 'El campo :attribute es obligatorio',
        'driver_license.required' => 'El campo :attribute es obligatorio',
        'license_class.required' => 'El campo :attribute es obligatorio',
        'doc_no.required' => 'El campo :attribute es obligatorio',
        'home_address.required' => 'El campo :attribute es obligatorio',
        'state_id.required' => 'El campo :attribute es obligatorio',
        'city_id.required' => 'El campo :attribute es obligatorio',
        'ballot_id.required' => 'El campo :attribute es obligatorio',
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
        $offenders = Offender::all();

        return $this->sendResponse($offenders->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $offender = Offender::create($input);

        return $this->sendResponse($offender->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\PMT\Models\Offender  $offender
     * @return \Illuminate\Http\Response
     */
    public function show(Offender $offender)
    {
        if (is_null($offender)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($offender->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\PMT\Models\Offender  $offender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offender $offender)
    {
        $input = $request->all();

        $validator = Validator::make($input, $this->rules, $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $offender->first_name = $input['first_name'];
        $offender->last_name = $input['last_name'];
        $offender->driver_license = $input['driver_license'];
        $offender->license_class = $input['license_class'];
        $offender->doc_no = $input['doc_no'];
        $offender->home_address = $input['home_address'];
        $offender->state_id = $input['state_id'];
        $offender->city_id = $input['city_id'];
        $offender->ballot_id = $input['ballot_id'];
        $offender->save();


        return $this->sendResponse($offender->toArray(), 'Recurso actualizado correctamente.', 204);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \IntelGUA\PMT\Models\Offender  $offender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offender $offender)
    {
        $offender->delete();

        if (is_null($offender)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($offender->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
