<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FoodStoreRequest extends FormRequest
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
            'name' => 'required|min:3|alpha',
            'moisture' =>  'required|',
            'energetic_value' => 'required' ,
            'protein_value' => 'required' ,
            'lipids' => 'required',
            'carbohydrates' => 'required',
            'calcium' => 'required',
            'fiber' => 'required',
            'category' => ['required',Rule::in(['Ração','Carne','Vegetal','Frutas','Verdura'])],
        ];
    }
    public function messages()
    {
        return [
            'required' => 'A :attribute is required',
            'min' => 'The :attribute need to have a least 3 letters',
            'alpha' => 'The :attribute must be alphabetic',
            'in' => 'The :attribute must be one of the following types: :values',
        ];
    }
}
