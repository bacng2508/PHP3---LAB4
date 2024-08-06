<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Http\Requests\Api\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('id', 'desc')->get();
        return response()->json([
            'data' => $users,
            'message' => 'success',
            'status_code' => '200'
        ], 200);
    }

    public function show(User $user) {
        return response()->json([
            'data' => $user,
            'message' => 'success',
            'status_code' => '200'
        ], 200);
    }

    public function store(StoreUserRequest $request) {
        $newUser = User::create($request->validated());
        return response()->json([
            'data' => $newUser,
            'message' => 'success',
            'status_code' => '200'
        ], 200);
    }

    public function destroy(User $user) {
        $user->delete();
        return response()->json([
            'message' => 'success',
            'status_code' => '200'
        ], 200);
    }

    public function changePassword(User $user, ChangePasswordRequest $request) {
        $user->update([
            'password' => $request->new_password
        ]);
        return response()->json([
            'message' => 'success',
            'status_code' => '200'
        ], 200);
    }
}
