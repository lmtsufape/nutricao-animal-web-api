<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>  ['required','min:8'],
            'cpf' => ['required','regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', 'unique:users'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is required.',
            'string' => 'The :attribute must be a string.',
            'max' => 'The :attribute name must be less than :max characters.',
            'min' => 'The :attribute name must have at least :min characters.',
            'regex' => 'The :attribute must be in the format 999.999.999-99.',
        ];
    }
}
