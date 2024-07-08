<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChefUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:255'],
            'name' => ['required', 'max:50'],
            'title' => ['required', 'max:50'],
            'fb' => ['nullable', 'url'],
            'in' => ['nullable', 'url'],
            'x' => ['nullable', 'url'],
            'status' => ['boolean', 'required'],
            'show_at_home' => ['boolean', 'required'],
        ];
    }
}
