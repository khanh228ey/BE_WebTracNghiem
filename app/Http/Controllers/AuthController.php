<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $responseData = [
                'message' => 'Đăng nhập thành công',
                'user' => [
                    'id' =>$user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'vaitro' => $user->vaitro // giả sử role được lưu trong cột "role" của bảng users
                ]
            ];
            return response()->json($responseData, 200);
        } else {
            return response()->json(['error' => 'Tài khoản mật khẩu không chính xác'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'vaitro' => 2,
        ]);
        return response()->json(['message' => 'Đăng kí thành công', 'user' => $user], 201);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Đăng xuất thành công']);
    }

 
    public function updateProfile(Request $request, string $id) {
        $data = $request->all();
        $user = User::findOrFail($id);
    
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'name' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $existingUser = User::where('email', $data['email'])->where('id', '!=', $id)->first();
        if ($existingUser) {
            return response()->json(['error' => 'Email đã tồn tại'], 422);
        }
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->save();
    
        return response()->json(['message' => 'Cập nhật thông tin thành công', 'user' => $user], 201);
    }
    public function changePassword(Request $request,string $id){
        $data = $request->all();
        // $user = Auth::users();
        $user = User::where('id',$id)->first();
        if(Hash::check($data['new_password'], $user->password)) {
            
            if($data['new_password'] === $data['confirm_password']) {
                $user->password = Hash::make($request->new_password);
                $user->save();

                return response()->json(['message' => 'Thay đổi mật khẩu thành công'], 200);
            } else {
                return response()->json(['error' => 'Mật khẩu mới và xác nhận mật khẩu không khớp'], 400);
            }
        } else {
            return response()->json(['error' => 'Mật khẩu hiện tại không chính xác'], 400);
        }
    }

}

