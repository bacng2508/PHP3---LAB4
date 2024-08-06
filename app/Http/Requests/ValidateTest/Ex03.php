<?php

namespace App\Http\Requests\ValidateTest;

use Illuminate\Foundation\Http\FormRequest;

class Ex03 extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users,email,'.$this->route('user')->id,
            'phone_number' => 'required|regex:/(84|0[3|5|7|8|9])+([0-9]{8})/',
            'avatar' => 'nullable|mimes:jpg,png|max:2048'
        ];
    }
}
