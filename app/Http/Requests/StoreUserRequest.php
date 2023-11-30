<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'regex:^0?[0-9]{9}$',
            'gender' => '',
            'address' => '',
            'dob' => 'date',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
