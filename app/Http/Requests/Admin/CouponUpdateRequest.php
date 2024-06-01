<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponUpdateRequest extends FormRequest
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
            //
            'name' => ['required','max:255','unique:coupons,name,'. $this->coupon],
            'code' => ['required','max:50','unique:coupons,code,'. $this->coupon],
            'quantity' => ['required','integer'],
            'min_purchase_amount' => ['required','integer'],
            'expire_date' => ['required','date'],
            'discount_type' => ['required'],
            'discount' => ['required','numeric'],
            'status' => ['required','boolean']
        ];
    }
}
