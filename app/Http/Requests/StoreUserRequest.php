<?php

namespace IntelGUA\PMT\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'date_birthday' =>  'required|date_format:dd-mm-YY',
            'first_name'    =>  'required|min:3',
            'last_name'     =>  'required|min:3',
            'gender'        =>  'required|in:Male,Female',
            'nit'           =>  'required|max:15',
            'dpi'           =>  'required|size:13',
            'email'         =>  'required|email',
            'password'      =>  'required'
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
            'role_id.required'          => 'The :attribute field can not be blank value',
            'role_id.integer'           => 'The :attribute field is not an integer value',
            'role_id.exists'            => 'The :attribute field does not appear in our stored records',
            'oficial_id.required'       => 'The :attribute field is required',
            'oficial_id.integer'        => 'The :attribute field is not an integer value',
            'date_birthday.required'    => 'The :attribute field is required',
            'date_birthday.date_format' => 'The :attribute field is not receiving the expected date format. (2019-03-24)',
            'first_name.required'       => 'The :attribute field is required',
            'first_name.min'            => 'The :attribute field must be no less than 3 characters long',
            'last_name.required'        => 'The :attribute field is required',
            'last_name.min'             => 'The :attribute field must be no less than 3 characters long',
            'gender.required'           => 'The :attribute field is required',
            'gender.in'                 => 'The :attribute field is waiting for any of the following values \'Male\', \'Female\'',
            'nit.required'              => 'The :attribute field is required',
            'nit.max'                   => 'The :attribute field must be no longer than 15 characters',
            'dpi.required'              => 'The :attribute field is required',
            'dpi.size'                  => 'The :attribute field must be 13 characters long',
            'email.required'            => 'The :attribute field is required',
            'email.email'               => 'The :attribute field must be a valid email',
            'password.required'         => 'The :attribute field is required',
        ];
    }
}
