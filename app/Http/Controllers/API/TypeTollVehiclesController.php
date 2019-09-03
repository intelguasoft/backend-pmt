<?php

namespace IntelGUA\PMT\Http\Controllers\API;

use IntelGUA\PMT\Models\TypeTollVehicle;
use Illuminate\Http\Request;
use IntelGUA\PMT\Http\Controllers\Controller;

class TypeTollVehiclesController extends Controller
{
    private $rules = [
        'type'              =>  'required|unique:type_toll_vehicles',
        'cost'              =>  'required|numeric',
        'description'       =>  'required',
        'prefix_car_plate'  =>  'required|min:3|max:5'
    ];

    private $messages = [
        'type.required'             => 'El campo :attribute es obligatorio',
        'type.unique'               => 'El campo :attribute ya existe en nuestros registros',
        'cost.required'             => 'El campo :attribute es obligatorio',
        'cost.numeric'              => 'El campo :attribute no es un valor numérico',
        'description.required'      => 'El campo :attribute es obligatorio',
        'prefix_car_plate.required' => 'El campo :attribute es obligatorio',
        'prefix_car_plate.min'      => 'El campo :attribute debe tener al menos :min caracteres de longitud',
        'prefix_car_plate.max'      => 'El campo :attribute debe tener no mas de :max caracteres de longitud'
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
        $typeTollVehicles = TypeTollVehicle::all();

        if (is_null($typeTollVehicles)) {
            return $this->sendError('Recursos no encontrados.', 404);
        }

        return $this->sendResponse($typeTollVehicles->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);
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

        $typeTollVehicle = TypeTollVehicle::create($input);

        return $this->sendResponse($typeTollVehicle->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\PMT\Models\TypeTollVehicle  $typeTollVehicle
     * @return \Illuminate\Http\Response
     */
    public function show(TypeTollVehicle $typeTollVehicle)
    {

        if (is_null($typeTollVehicle)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($typeTollVehicle->toArray(), 'Recurso obtenido correctamente.', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\PMT\Models\TypeTollVehicle  $typeTollVehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeTollVehicle $typeTollVehicle)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'type'              =>  ['required', Rule::unique('type_toll_vehicles')->ignore($typeTollVehicle->id)],
            'cost'              =>  'required|numeric',
            'description'       =>  'required',
            'prefix_car_plate'  =>  'required|min:3|max:5'
        ], $messages = [
            'type.required'             => 'El campo :attribute es obligatorio',
            'type.unique'               => 'El campo :attribute ya existe en nuestros registros',
            'cost.required'             => 'El campo :attribute es obligatorio',
            'cost.numeric'              => 'El campo :attribute no es un valor numérico',
            'description.required'      => 'El campo :attribute es obligatorio',
            'prefix_car_plate.required' => 'El campo :attribute es obligatorio',
            'prefix_car_plate.min'      => 'El campo :attribute debe tener al menos :min caracteres de longitud',
            'prefix_car_plate.max'      => 'El campo :attribute debe tener no mas de :max caracteres de longitud'
        ]);

        if (is_null($typeTollVehicle)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $typeTollVehicle->type = $input['type'];
        $typeTollVehicle->cost = $input['cost'];
        $typeTollVehicle->description = $input['description'];
        $typeTollVehicle->prefix_car_plate = $input['prefix_car_plate'];
        $typeTollVehicle->save();


        return $this->sendResponse($typeTollVehicle->toArray(), 'Recurso actualizado correctamente.', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \IntelGUA\PMT\Models\TypeTollVehicle  $typeTollVehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeTollVehicle $typeTollVehicle)
    {
        $typeTollVehicle->delete();

        if (is_null($typeTollVehicle)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($typeTollVehicle->toArray(), 'Recurso eliminado correctamente.', 204);
    }
}
