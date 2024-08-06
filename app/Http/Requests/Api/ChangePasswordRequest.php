<?php

namespace App\Http\Requests\Api;

use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => ['required', function (string $attribute, mixed $value, Closure $fail) {
                    if (!Hash::check($value, $this->route('user')->password)) {
                        $fail("Mật khẩu cũ không chính xác");
                    }
                },
            ],
            'new_password' => 'required|min:8|different:old_password',
            'new_password_confirmation' => 'required|same:new_password'
        ];
    }

    public function messages() {
        return [
            'old_password.required' => 'Không được bỏ trống mật khẩu',
            'new_password.required' => 'Không được bỏ trống mật khẩu mới',
            'new_password.min' => 'Mật khẩu phải có độ dài tối thiểu là 8 ký tự',
            'new_password.old_password' => 'Mật khẩu mới không được giống mật khẩu cũ',
            'new_password_confirmation.required' => 'Không được bỏ trống nhập lại mật khẩu',
            'new_password_confirmation.same' => 'Mật khẩu nhập lại không khớp',
            
        ];
    }
}
