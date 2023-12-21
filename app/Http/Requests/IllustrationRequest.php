<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;


class IllustrationRequest extends FormRequest
{

    private $rules = [
        'titre' => 'required',
        'langue' => 'required',
        'illustration' => 'required|mimes:png,jpeg,jpg'
    ];

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
        // Merge the additional 'langue' rule with the existing rules
        return $this->rules;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
    throw new ValidationException($validator, response()->json($validator->errors(), 422));
    }
}

