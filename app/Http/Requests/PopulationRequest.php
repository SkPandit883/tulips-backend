<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PopulationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'city_id' => ['required', 'exists:cities,id'],
            'old_male' => ['required', 'numeric'],
            'old_female' => ['required', 'numeric'],
            'young_male' => ['required', 'numeric'],
            'young_female' => ['required', 'numeric'],
            'child_male' => ['required', 'numeric'],
            'child_female' => ['required', 'numeric'],
        ];
    }
}
