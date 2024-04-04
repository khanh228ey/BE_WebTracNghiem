<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{
    //
    public function getSinhVien(){
        $users = User::where('vaitro',1)->get();
        return response()->json($users);
    }


    public function profileUser(string $id){
        $user = User::where('id',$id)->first();
        return response()->json($user);
    }


    public function getListSinhVien(){
        $getUser = User::where('vaitro',2)->get();
        return view('user.index',compact('getUser'));
    }

    public function getListGiaoVien(){
        $getUser = User::where('vaitro',1)->get();
        return view('user.index',compact('getUser'));
    }


    public function addUser(){
        return view('user.form');
    }



    public function store(Request $request){
       $data = $request->all();
       $user = new User();
       $user->name = $data['name'];
       $user->email = $data['email'];
       $user->password = Hash::make($data['password']);
       $user->created_at = Carbon::now('Asia/Ho_Chi_Minh');
       $user->vaitro = $data['vaitro'];
       $user->save();
       $getUser = User::orderBy('created_at','ASC')->get();
       Toastr::success('Thêm người dùng thành công', 'Success');
       return view('user.index',compact('getUser'));
    }
    
    

    public function edit(string $id){
        $user =User::find($id);
        return view('user.form',compact('user'));
      }




      public function update(Request $request,string $id){
          $data = $request->all();
          $user = User::find($id);
          $user->name =$data['name'];
          $user->email =$data['email'];
          $user->vaitro = $data['vaitro'];
          $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
          $user->save();
          $getUser= User::orderBy('updated_at','DESC')->get();
          Toastr::success('Cập nhật thông tin thành công', 'Success');
          return view('user.index',compact('getUser'));
      }


}
