<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BreedStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3|unique:breeds',
            'type' => 'required|in:grande porte,pequeno porte',
            'species' => 'required|in:Cachorro,Gato',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
            'string' => 'The :attribute need to have a least 3 letters',
            'max' => 'The :attribute must be less than :max characters.',
            'min' => 'The :attribute must have at least :min characters.',
            'unique' => 'The :attribute already exists.',
            'in' => 'The :attribute must be one of the following types: :values',
        ];
    }
}
