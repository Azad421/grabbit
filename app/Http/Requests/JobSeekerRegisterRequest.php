<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobSeekerRegisterRequest extends FormRequest
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
            'j_firstName' => ['required', 'string', 'max:255'],
            'j_lastName' => ['required', 'string', 'max:255'],
            'j_nid' => ['required', 'numeric'],
            'j_gender' => ['required', 'string'],
            'j_dob' => ['required', 'date'],
            'j_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'j_password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'j_firstName' => 'First Name',
            'j_lastName' => 'Last Name',
            'j_nid' => 'NID Number',
            'j_gender' => 'Gender',
            'j_dob' => 'Date Of Birth',
            'j_email' => 'Email',
            'j_password' => 'Password',
        ];
    }
}
