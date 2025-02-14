<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'member_type_id' => 'required|numeric',
            'membership_id' => 'required|numeric',
            'coupon_id' => 'nullable|numeric',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
            'email' => 'required|email',
            'phone_1' => 'nullable|string',
            'phone_2' => 'nullable|string',
            'address1' => 'nullable|string',
            'address2' => 'nullable|string',
            'city' => 'nullable|string',
            'state_code' => 'nullable|string',
            'state' => 'nullable|string',
            'zip' => 'nullable',
            'country' => 'nullable|string'
        ];
    }
}
