<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterInfoUpdateRequest extends FormRequest
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
            'short_description' => ['nullable', 'max:500'],
            'address' => ['nullable', 'max:255'],
            'email' => ['nullable', 'email', 'max:100'],
            'phone' => ['nullable','max:20'],
            'copyright' => ['nullable', 'max:100']
        ];
    }
}
