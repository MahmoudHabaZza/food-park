<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialCreateRequest extends FormRequest
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
            'name' => ['required','max:50'],
            'image' => ['required','image','max:3000'],
            'rating' => ['required','integer','max:5'],
            'review'=> ['required','max:300'],
            'show_at_home' => ['required','boolean'],
            'status' => ['required','boolean'],
        ];
    }
}
