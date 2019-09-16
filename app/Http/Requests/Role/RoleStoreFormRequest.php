<?php

namespace Edgar\PMT\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreFormRequest extends FormRequest
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
            'name'     =>  'required|unique:roles',
            'description'    =>  'required'
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
            'name.required'         => 'El campo \'nombre\' es obligatorio',
            'name.unique'               => 'El campo \'nombre\' ya existe en nuestros registros',
            'description.required'       => 'El campo \'descripción\' es obligatorio'
        ];
    }
}
