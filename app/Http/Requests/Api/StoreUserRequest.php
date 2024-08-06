<?php

namespace App\Http\Requests\Api;

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
            'name' => 'required|max:30',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Không được bỏ trống tên',
            'name.max' => 'Độ dài tên không được vượt quá 30 ký tự',
            'email.required' => 'Không được bỏ trống email',
            'email.unique' => 'Email đã được đăng ký',
            'password.required' => 'Không được bỏ trống mật khẩu',
            'password.min' => 'Độ dài mật khẩu tối thiểu là 8 ký tự',
            'password_confirmation.required' => 'Không được bỏ trống nhập lại mật khẩu',
            'password_confirmation.same' => 'Mật khẩu nhập lại không khớp'
        ];
    }
}
