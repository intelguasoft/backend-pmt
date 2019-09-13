<?php

namespace Edgar\PMT\Http\Controllers\API;

use Edgar\PMT\Models\TypeVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TypeVehiclesController extends BaseController
{
    private $rules = [
        'type'     =>  'required|unique:type_vehicles',
        'description'    =>  'required'
    ];

    private $messages = [
        'type.required'         => 'El campo :attribute es obligatorio',
        'type.unique'               => 'El campo :attribute ya existe en nuestros registros',
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
        $typeVehicles = TypeVehicle::all();

        return $this->sendResponse($typeVehicles->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $typeVehicle = TypeVehicle::create($input);

        return $this->sendResponse($typeVehicle->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\TypeVehicle  $typeVehicle
     * @return \Illuminate\Http\Response
     */
    public function show(TypeVehicle $typeVehicle)
    {
        if (is_null($typeVehicle)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($typeVehicle->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\TypeVehicle  $typeVehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeVehicle $typeVehicle)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'type'     =>  ['required', Rule::unique('type_vehicles')->ignore($typeVehicle->id)],
            'description'    =>  'required'
        ], $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $typeVehicle->type = $input['type'];
        $typeVehicle->description = $input['description'];
        $typeVehicle->save();


        return $this->sendResponse($typeVehicle->toArray(), 'Recurso actualizado correctamente.', 204);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\TypeVehicle  $typeVehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeVehicle $typeVehicle)
    {
        $typeVehicle->delete();

        if (is_null($typeVehicle)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($typeVehicle->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
