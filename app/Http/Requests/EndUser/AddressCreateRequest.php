<?php

namespace App\Http\Requests\EndUser;

use Illuminate\Foundation\Http\FormRequest;

class AddressCreateRequest extends FormRequest
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
            'delivery_area_id' => ['required','integer'],
            'first_name' => ['required','max:50'],
            'last_name' => ['required','max:50'],
            'email' => ['required','email','max:100'],
            'phone' => ['required','numeric'],
            'address' => ['required'],
            'type' => ['required','in:home,office']
        ];
    }
}