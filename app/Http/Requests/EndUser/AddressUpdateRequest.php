<?php

namespace App\Http\Requests\EndUser;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Protection that the user can't update another users addresses
        $addressId = $this->route('id');
        $address = Address::find($addressId);
        return $address && $address->user_id === auth()->user()->id; // it will return true if the condition gives true
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
