<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerSliderCreateRequest extends FormRequest
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
            'banner' => ['required','image','max:255'],
            'title' => ['required','max:100'],
            'sub_title' => ['required','max:255'],
            'url' => ['required'],
            'status' => ['required','boolean']
        ];
    }
}
