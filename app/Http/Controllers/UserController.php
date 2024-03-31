<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function getSinhVien(){
        $users = User::where('vaitro',2)->get();
        return response()->json($users);
    }
    public function getAllUser(){
        $getAllUser = User::whereNotIn('vaitro',3)->get();
        return response()->json($getAllUser);
    }
    public function addUser(Request $request){
        $data = $request->all();    
        $users = new User();
        $users->name = $data['name'];
        $users->name = $data['email'];
        $users->password = Hash::make($data['password']);
        $users->vaitro = $data['vaitro'];
        return response()->json(['message' => 'Tạo tài khoản thành công', 'user' => $users], 201);
    }
    public function updateUser(Request $request,string $id){
        $data = $request->all();
        $users = User::where('id',$id)->first();
        $users->name = $data['name'];
        $users->name = $data['email'];
        $users->vaitro = $data['vaitro'];
        return response()->json(['message' => 'Cập nhật thông tin thành công', 'user' => $users], 201);
    }


    public function deleteUser(string $id){
        $users = User::where('id',$id)->first();
        $users->delete();     
        return response()->json(['message' => 'Xóa tài khoản thành công.'], 200);

    }
}
