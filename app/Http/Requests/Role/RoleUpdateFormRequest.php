<?php

namespace Edgar\PMT\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateFormRequest extends FormRequest
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
            'name'     =>  'required',
            'description'    =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'El campo :attribute es obligatorio',
            'description.required'       => 'El campo :attribute es obligatorio'
        ];
    }
}
