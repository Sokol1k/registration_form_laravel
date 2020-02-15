<?php

namespace App\Http\Requests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationFormRequest extends FormRequest
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
            'firstname' => 'required|string|min:2|max:30',
            'lastname' => 'required|string|min:2|max:30',
            'birthdate' => 'required',
            'report_subject' => 'required|string|min:2|max:30',
            'country' => 'required|string|max:30',
            'phone' => 'required|string|min:11|max:13',
            'email' => 'required|email|max:30|unique:participants',
        ];
    }
}
