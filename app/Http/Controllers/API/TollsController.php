<?php

namespace Edgar\PMT\Http\Controllers\API;

use Edgar\PMT\Models\Toll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TollsController extends BaseController
{
    private $rules = [
        'date'                  =>  'required',
        'time'                  =>  'required',
        'user_id'               =>  'required',
        'type_toll_vehicle_id'  =>  'required',
        'car_plate'             =>  'required'
    ];

    private $messages = [
        'date.required'                 => 'El campo :attribute es obligatorio',
        'date.date_format'              => 'El campo :attribute no esta recibiendo el formato esperado. (2019-03-24)',
        'time.required'                 => 'El campo :attribute es obligatorio',
        'user_id.required'              => 'El campo :attribute es obligatorio',
        'type_toll_vehicle_id.required' => 'El campo :attribute es obligatorio',
        'car_plate.required'            => 'El campo :attribute es obligatorio',
    ];

    public function __construct()
    {
        $this->middleware('jwt');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tolls = Toll::with('type_toll_vehicle')->orderBy('id', 'desc')->paginate(15);

        return $this->sendResponse($tolls->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $toll = Toll::create($input);

        return $this->sendResponse($toll->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\Toll  $toll
     * @return \Illuminate\Http\Response
     */
    public function show(Toll $toll)
    {
        if (is_null($toll)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($toll->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\Toll  $toll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toll $toll)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'date'                  =>  'required|integer|exists:roles,id',
            'time'                  =>  'required|integer',
            'user_id'               =>  'required',
            'type_toll_vehicle_id'  =>  'required|min:3',
            'car_plate'             =>  'required|min:3',
            // 'email'                 =>  ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ], $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $toll->date = $input['date'];
        $toll->time = $input['time'];
        $toll->user_id = $input['user_id'];
        $toll->type_toll_vehicle_id = $input['type_toll_vehicle_id'];
        $toll->car_plate = $input['car_plate'];
        $toll->save();


        return $this->sendResponse($toll->toArray(), 'Recurso actualizado correctamente.', 204);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\Toll  $toll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toll $toll)
    {
        $toll->delete();

        if (is_null($toll)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($toll->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
