<?php

namespace Edgar\PMT\Http\Requests\Ballot;

use Illuminate\Foundation\Http\FormRequest;

class BallotStoreFormRequest extends FormRequest
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
            'ballot_no'         => 'required',
            'car_plate'         => 'required',
            'type_vehicle_id'   => 'required',
            'mark_id'           => 'required',
            'color_design'      => 'required',
            'date'              => 'required',
            'time'              => 'required',
            'total'             => 'required',
            'place' => 'required',
            'infringement_summary' => 'required',
            'law_basics' => 'required',
            'traffic_regulations' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required'         => 'El campo :attribute es obligatorio',
            'ballot_no.required'         => 'El campo :attribute es obligatorio',
            'signed.required'       => 'El campo :attribute es obligatorio'
        ];
    }
}
