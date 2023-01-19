<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalStoreRequest extends FormRequest
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
            'animal.name' => 'required|string|max:255|min:3',
            'animal.sex' => 'required|in:male,female',
            'animal.is_castrated' => 'required|boolean',
            'animal.is_alive' => 'boolean',
            'animaldeathDate' => 'nullable|date',
            'animal.birthDate' => 'nullable|date',
            'animal.activity_level' => 'required|integer',
        ];
    }
    public function messages()
{
    return [
        'required' => 'The :attribute is required.',
        'string' => 'The :attribute must be a string.',
        'max' => 'The :attribute name must be less than :max characters.',
        'min' => 'The :attribute name must have at least :min characters.',
        'sex.in' => 'The :attribute must be either male or female.',
    ];
}






}
