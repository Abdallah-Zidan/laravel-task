<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerificationRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|regex:/(01)[0-9]{9}/'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email is required',
            'phone.required' => 'phone is required',
            'email.email'    => 'invalid email',
            'phone.regex'    => 'invalid phone'
        ];
    }
}
