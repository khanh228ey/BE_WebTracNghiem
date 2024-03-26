<?php

namespace App\Http\Controllers;

use App\Models\Cauhoi;
use App\Models\Cautraloi;
use App\Models\ChiTietDeThi;
use App\Models\Dethi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeThiController extends Controller
{
    //

    public function getAllDeThi(){
        $getDeThi = Dethi::with('Monhoc')->get();
        return response()->json($getDeThi);
    }

    public function thongTinDeThi($id){
        $getThongTinDeThi = Dethi::with('Monhoc')->where('id',$id)->get();
        return response()->json($getThongTinDeThi);
    }

    public function chiTietDeThi($id){
        $chiTietDeThi = Dethi::with('Monhoc','Cauhoi')->where('id',$id)->first();
        return response()->json($chiTietDeThi);
    }
    


}




