<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login(Request $request){

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Đăng nhập thành công'], 200);
        } else {
            return response()->json(['error' => 'Tài khoản mật khẩu không chính xác'], 401);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'vaitro' => 0,
        ]);
        return response()->json(['message' => 'Đăng kí thành công', 'user' => $user], 201);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Đăng xuất thành công']);
    }


}

