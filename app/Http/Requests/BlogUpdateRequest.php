<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
            'title' => ['required','string','max:255','unique:blogs,title,'.$this->blog],
            'content' => ['required',],
            'image' => ['nullable','image','max:3000'],
            'status' => ['required','boolean'],
            'blog_category_id' => ['required','integer'],
            'seo_title' => ['nullable','max:255'],
            'seo_description' => ['nullable','max:255'],
        ];
    }
}
