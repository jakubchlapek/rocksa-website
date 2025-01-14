<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'main_mineral' => 'required',
            'treatment' => 'required',
            'country_of_origin' => 'required',
            'weight' => 'required|numeric',
            'density' => 'required|numeric',
            'color' => 'required',
            'clarity' => 'required',
            'toughness' => 'required|numeric|min:1|max:10',
            'rarity' => 'required',
            'price' => 'required|numeric',
            // 'image' => 'required',
        ];
    }

}
