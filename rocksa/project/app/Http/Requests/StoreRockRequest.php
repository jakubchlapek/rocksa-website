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
            'main mineral' => 'required',
            'treatment' => 'required',
            'country of origin' => 'required',
            'weight' => 'required',
            'density' => 'required',
            'color' => 'required',
            'clarity' => 'required',
            'toughness' => ['required','min:1', 'max:10'],
            'rarity' => 'required',
            'price' => 'required',
        ];
    }
}
