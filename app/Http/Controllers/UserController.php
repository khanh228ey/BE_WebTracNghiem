<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    

}
