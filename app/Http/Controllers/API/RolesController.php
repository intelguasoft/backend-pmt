<?php

namespace Edgar\PMT\Http\Controllers\API;

use Edgar\PMT\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RolesController extends BaseController
{
    private $rules = [
        'name'     =>  'required|unique:roles',
        'description'    =>  'required'
    ];

    private $messages = [
        'name.required'         => 'El campo :attribute es obligatorio',
        'name.unique'               => 'El campo :attribute ya existe en nuestros registros',
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
        $roles = Role::all();

        return $this->sendResponse($roles->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);
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

        $role = Role::create($input);

        return $this->sendResponse($role->toArray(), 'Recurso creado satisfactoriamente.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if (is_null($role)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($role->toArray(), 'Recurso obtenido correctamente.', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'     =>  ['required', Rule::unique('roles')->ignore($role->id)],
            'description'    =>  'required'
        ], $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        $role->name = $input['name'];
        $role->description = $input['description'];
        $role->save();


        return $this->sendResponse($role->toArray(), 'Recurso actualizado correctamente.', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        if (is_null($role)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($role->toArray(), 'Recurso eliminado correctamente.', 204);

    }
}
