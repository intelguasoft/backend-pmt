<?php

namespace Edgar\PMT\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Edgar\PMT\Models\User;
use Edgar\PMT\Http\Controllers\API\BaseController;

class UsersController extends BaseController
{
    private $rules = ['role_id'     =>  'required|integer|exists:roles,id',
                    'oficial_id'    =>  'required|integer',
                    'date_birthday' =>  'required|date_format:dd-mm-YY',
                    'first_name'    =>  'required|min:3',
                    'last_name'     =>  'required|min:3',
                    'gender'        =>  'required|in:Male,Female',
                    'nit'           =>  'required|max:15',
                    'dpi'           =>  'required|size:13',
                    'email'         =>  'required|email|unique:users',
                    'password'      =>  'required'];

    private $messages = ['role_id.required'         => 'El campo :attribute es obligatorio',
                        'role_id.integer'           => 'El campo :attribute no es un valor entero',
                        'role_id.exists'            => 'El campo :attribute no aparece en nuestros registros de Roles',
                        'oficial_id.required'       => 'El campo :attribute es obligatorio',
                        'oficial_id.integer'        => 'El campo :attribute no es un valor entero',
                        'date_birthday.required'    => 'El campo :attribute es obligatorio',
                        'date_birthday.date_format' => 'El campo :attribute no esta recibiendo el formato esperado. (2019-03-24)',
                        'first_name.required'       => 'El campo :attribute es obligatorio',
                        'first_name.min'            => 'El campo :attribute debe tener al menos :min caracteres de longitud',
                        'last_name.required'        => 'El campo :attribute es obligatorio',
                        'last_name.min'             => 'El campo :attribute debe tener al menos :min caracteres de longitud',
                        'gender.required'           => 'El campo :attribute es obligatorio',
                        'gender.in'                 => 'El campo :attribute esta esperando los siguientes valores: \'Male\', \'Female\'',
                        'nit.required'              => 'El campo :attribute es obligatorio',
                        'nit.max'                   => 'El campo :attribute no debe tener más de :max caracteres',
                        'dpi.required'              => 'El campo :attribute es obligatorio',
                        'dpi.size'                  => 'El campo :attribute debe contener una longitud exacta de :size caracteres',
                        'email.required'            => 'El campo :attribute es obligatorio',
                        'email.email'               => 'El campo :attribute debe ser una correo electrónico valido',
                        'password.required'         => 'El campo :attribute es obligatorio'];

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
        $users = User::all();

        return $this->sendResponse($users->toArray(), 'Recursos obtenidos satisfactoriamente.', 200);

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

        $user = User::create($input);

        return $this->sendResponse($user->toArray(), 'Recurso creado satisfactoriamente.', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($user->toArray(), 'Recurso obtenido correctamente.', 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'role_id'     =>  'required|integer|exists:roles,id',
            'oficial_id'    =>  'required|integer',
            'date_birthday' =>  'required|date_format:dd-mm-YY',
            'first_name'    =>  'required|min:3',
            'last_name'     =>  'required|min:3',
            'gender'        =>  'required|in:Male,Female',
            'nit'           =>  'required|max:15',
            'dpi'           =>  'required|size:13',
            'email'         =>  ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password'      =>  'required'
        ], $this->messages);

        if ($validator->fails()) {
            return $this->sendError('Errores de validación.', $validator->errors(), 406);
        }

        // TODO: agregar los campos que faltan...
        $user->role_id = $input['role_id'];
        $user->oficial_id = $input['oficial_id'];
        $user->date_birthday = $input['date_birthday'];
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->gender = $input['gender'];
        $user->nit = $input['nit'];
        $user->dpi = $input['dpi'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();


        return $this->sendResponse($user->toArray(), 'Recurso actualizado correctamente.', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        if (is_null($user)) {
            return $this->sendError('Recurso no encontrado.', 404);
        }

        return $this->sendResponse($user->toArray(), 'Recurso eliminado correctamente.', 204);
    }
}
