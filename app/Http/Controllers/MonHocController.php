<?php

namespace App\Http\Controllers;

use App\Models\Cauhoi;
use App\Models\Dethi;
use App\Models\Monhoc;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    //
    public function listMonHoc(){
        $listMonHoc = Monhoc::get();
        return response()->json($listMonHoc);
    }

    public function addMonHoc(Request $request){
        $data = $request->all();
        $ten = $data['ten'];
        $existingMonHoc = Monhoc::where('ten', $ten)->count();
        if ($existingMonHoc == 1) {
            return response()->json(['message' => 'Tên môn học đã tồn tại trong hệ thống.'], 422);
        } else {
            $monHoc = new Monhoc();
            $monHoc->ten = $ten;
            $monHoc->save();
            return response()->json(['message' => 'Thêm môn học thành công.'], 200);
        }
    }

    public function editMonHoc(string $id){
        $monHoc = Monhoc::where('id',$id)->get();
        return response()->json($monHoc);
    }

    public function updateMonHoc(Request $request,string $id){
        $data = $request->all();
        $monHoc = Monhoc::find($id);
        $monHoc->ten = $data['ten'];
        $ten = $data['ten'];
        $existingMonHoc = Monhoc::where('ten', $ten)->whereNotIn('id',$id)->count();
        if ($existingMonHoc == 1) {
            return response()->json(['message' => 'Tên môn học đã tồn tại trong hệ thống.'], 422);
        } else {
            $monHoc->ten = $ten;
            $monHoc->save();
            return response()->json(['message' => 'Update môn học thành công.'], 200);
        }
    }


    public function xoaMonHoc(string $id)
    {
        $ktraMonHoc = Dethi::where('monhoc_id', $id)->count();
        $ktraMonHoc2 = Cauhoi::where('monhoc_id', $id)->count();
        if ($ktraMonHoc == 0 &&  $ktraMonHoc2 == 0 ) {
            Monhoc::find($id)->delete();
            return response()->json(['message' => 'Xóa môn học thành công.'], 200);
        } else {
            return response()->json(['message' => 'không thể xóa môn học vì rang buộc dữ liệu.'], 200);
    }   
}
}

