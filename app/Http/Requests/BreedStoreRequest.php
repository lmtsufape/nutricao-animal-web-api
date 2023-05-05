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
            'name' => 'required|string|max:255|unique:breeds',
            'type' => 'required|in:grande porte,pequeno porte',
            'species' => 'required|in:Cachorro,Gato',
        ];
    }
}
