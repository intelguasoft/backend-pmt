<?php

namespace Edgar\PMT\Http\Requests\Placa;

use Illuminate\Foundation\Http\FormRequest;

class PlacaSearchFormRequest extends FormRequest
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
                'prefijo' => 'required',
                'placa' => 'required'
            ];
    }

    public function messages()
    {
        return [
                'prefijo.required' => 'Seleccione un tipo de placa.',
                'placa.required' => 'El numero de placa es requerido'
            ];
    }
}
