<?php

namespace Edgar\PMT\Http\Requests\PaymentBallot;

use Illuminate\Foundation\Http\FormRequest;

class PaymentBallotStoreFormRequest extends FormRequest
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
        return
            [
                'total' => 'required|confirmed'
            ];
    }
    public function messages()
    {
        return
            [
                'total.required' => 'Este campo es requerido',
                'total.confirmed' => 'El valor ingresado no coincide con el valor de la boleta'
            ];
    }
}
