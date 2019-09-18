<?php

namespace Edgar\PMT\Http\Requests\State;

use Illuminate\Foundation\Http\FormRequest;

class StateStoreFormRequest extends FormRequest
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
            'name'     =>  'required|unique:states',
            'postal_code'    =>  'required',
            'cedula_code'    =>  'required'
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
            'name.required'         => 'El campo :attribute es obligatorio',
            'name.unique'               => 'El campo :attribute ya existe en nuestros registros',
            'postal_code.required'       => 'El campo :attribute es obligatorio',
            'cedula_code.required'       => 'El campo :attribute es obligatorio'
        ];
    }
}
