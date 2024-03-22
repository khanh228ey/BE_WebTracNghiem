<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDeThi;
use App\Models\Dethi;
use Illuminate\Http\Request;

class DeThiController extends Controller
{
    //

    public function getAllDeThi(){
        $getDeThi = Dethi::with('Monhoc')->get();
        return response()->json($getDeThi);
    }

    public function thongTinDeThi($slug){
        $getThongTinDeThi = Dethi::with('Monhoc')->where('slug',$slug)->get();
        return response()->json($getThongTinDeThi);
    }

    public function chiTietDeThi($slug){
        $chiTietDeThi = Dethi::with('Monhoc','chiTietDeThi.Cautraloi')->where('slug',$slug)->first();
        return response()->json($chiTietDeThi);
    }



    



}
