<?php

namespace Edgar\PMT\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role_id'       =>  'required|integer|exists:roles,id',
            'oficial_id'    =>  'required|integer',
            'date_birthday' =>  'required',
            'first_name'    =>  'required|min:3',
            'last_name'     =>  'required|min:3',
            'gender'        =>  'required|in:Male,Female',
            'nit'           =>  'required|max:15',
            'dpi'           =>  'required|size:13',
            'email'         =>  'required|email|unique:users',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'role_id.required'          => 'El campo \'Perfil\' es obligatorio',
            'role_id.integer'           => 'El campo \'Perfil\' no es un valor entero',
            'role_id.exists'            => 'El campo \'Perfil\' no aparece en nuestros registros de Roles',
            'oficial_id.required'       => 'El campo \'ID Oficial\' es obligatorio',
            'oficial_id.integer'        => 'El campo \'ID Oficial\' no es un valor entero',
            'date_birthday.required'    => 'El campo \'Fecha de nacimiento\' es obligatorio',
            'date_birthday.date_format' => 'El campo \'Fecha de nacimiento\' no esta recibiendo el formato esperado. (2019-03-24)',
            'first_name.required'       => 'El campo \'Nombre\' es obligatorio',
            'first_name.min'            => 'El campo \'Nombre\' debe tener al menos :min caracteres de longitud',
            'last_name.required'        => 'El campo \'Apellidos\' es obligatorio',
            'last_name.min'             => 'El campo \'Apellidos\' debe tener al menos :min caracteres de longitud',
            'gender.required'           => 'El campo \'Género\' es obligatorio',
            'gender.in'                 => 'El campo \'Género\' esta esperando los siguientes valores: \'Masculino\', \'Femenino\', \'Indefinido\'',
            'nit.required'              => 'El campo \'NIT\' es obligatorio',
            'nit.max'                   => 'El campo \'NIT\' no debe tener más de :max caracteres',
            'dpi.required'              => 'El campo \'DPI\' es obligatorio',
            'dpi.size'                  => 'El campo \'DPI\' debe contener una longitud exacta de :size caracteres',
            'email.required'            => 'El campo \'Correo electrónico\' es obligatorio',
            'email.email'               => 'El campo \'Correo electrónico\' debe ser una correo electrónico valido',
        ];
    }
}
