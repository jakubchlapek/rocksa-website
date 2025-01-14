<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postal_code' => ['required', 'regex:/^\d{2}-\d{3}$/'],
            'phone_number' => ['required','regex:/^d{3} \d[3] \d{3}$/'],
            'email' => 'required',
        ];
    }
}
