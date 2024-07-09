<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CounterUpdateRequest extends FormRequest
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
            'background' => ['nullable','image','max:3000'],
            'counter_icon_one' => ['required','max:50'],
            'counter_icon_two' => ['required','max:50'],
            'counter_icon_three' => ['required','max:50'],
            'counter_icon_four' => ['required','max:50'],
            'counter_name_one' => ['required','max:50'],
            'counter_name_two' => ['required','max:50'],
            'counter_name_three' => ['required','max:50'],
            'counter_name_four' => ['required','max:50'],
            'counter_count_one' => ['required','integer'],
            'counter_count_two' => ['required','integer'],
            'counter_count_three' => ['required','integer'],
            'counter_count_four' => ['required','integer'],
        ];
    }
}
