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
            'user_name' => 'required|string|min:4|max:150|unique:users,user_name',
            'display_name' => 'nullable|string|max:150',
            'user_email' => 'required|email|max:255|unique:users,user_email',
            'password' => 'required|string|min:8|confirmed'
        ];
    }
}
