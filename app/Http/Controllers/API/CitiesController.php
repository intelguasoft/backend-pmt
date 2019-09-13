<?php

namespace Edgar\PMT\Http\Controllers\API;

use Edgar\PMT\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CitiesController extends BaseController
{
    private $rules = [
        'name'     =>  'required|unique:cities',
        'state_id'    =>  'required'
    ];

    private $messages = [
        'name.required'         => 'El campo :attribute es obligatorio',
        'name.unique'               => 'El campo :attribute ya existe en nuestros registros',
        'state_id.required'       => 'El campo :attribute es obligatorio'
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
        $cities = City::all();

        return $this->sendResponse($cities->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $cities = City::create($input);

        return $this->sendResponse($cities->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        if (is_null($city)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($city->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'     =>  ['required', Rule::unique('cities')->ignore($city->id)],
            'state_id'    =>  'required'
        ], $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $city->name = $input['name'];
        $city->state_id = $input['state_id'];
        $city->save();


        return $this->sendResponse($city->toArray(), 'Recurso actualizado correctamente.', 204);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        if (is_null($city)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($city->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
