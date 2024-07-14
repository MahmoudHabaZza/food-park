<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
            'phone_one' => ['nullable','numeric','max_digits:20'],
            'phone_two' => ['nullable','numeric','max_digits:20'],
            'mail_one' => ['nullable','email','max:255'],
            'mail_two' => ['nullable','email','max:255'],
            'address' => ['nullable','max:1000'],
            'map_link' => ['nullable','url']
        ];
    }
}
