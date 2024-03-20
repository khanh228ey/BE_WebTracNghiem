<?php

namespace App\Http\Controllers;

use App\Models\Dethi;
use Illuminate\Http\Request;

class DeThiController extends Controller
{
    //

    public function getAllDeThi(){
        $getDeThi = Dethi::getall();
        return response()->json($getDeThi);
    }
}
