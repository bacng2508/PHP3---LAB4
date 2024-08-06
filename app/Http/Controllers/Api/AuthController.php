<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\LoginUserRequest;

class AuthController extends Controller
{
    public function postLogin(LoginUserRequest $request) {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Tài khoản hoặc mật khẩu không chính xác'
            ], 200);
        }

        $user = User::where('email', $credentials['email'])->first();
        return response()->json([
            'message' => 'Đăng nhập thành công',
            'access_token' => $user->createToken('api_token')->plainTextToken,
            'status_code' => '200',
        ], 200);
    }
}
