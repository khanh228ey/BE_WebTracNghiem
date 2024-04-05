<?php

namespace App\Http\Controllers;

use App\Models\Cauhoi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dethi;

class CauhoiController extends Controller
{
    //

    public function getDapAnDung(int $id){
        $cauhoi = Cauhoi::where('dethi_id',$id)->get();
        foreach ($cauhoi as $item) {
            $dapAnDung[] = [
                'id' => $item->id,
                'dap_an_dung' => $item->dap_an_dung,
            ];
        }
        
        return response()->json($dapAnDung);
    }

    public function updateCauHoi(Request $request, int $id){
        $data = $request->all(); 
        $idUser = $data['user_id'];
        $cauhoi = Cauhoi::find($id);
        $idDeThi = $cauhoi->dethi_id;
        $checkDeThi = Dethi::where('id',$idDeThi)->where('user_id',$idUser)->first();
        if($checkDeThi){
            $cauhoi->noidung = $data['noidung'];
            $cauhoi->dap_an_a = $data['dap_an_a'];
            $cauhoi->dap_an_b = $data['dap_an_b'];
            $cauhoi->dap_an_c = $data['dap_an_c'];
            $cauhoi->dap_an_d = $data['dap_an_d'];
            $cauhoi->dap_an_dung = $data['dap_an_dung'];
            $cauhoi->save();
            return response()->json(['message' => 'Cập nhật thành công'],200);
        }else{
            return response()->json(['message' => 'Bạn không có quyền'],408);
        }
           
    }

    public function deleteCauHoi(Request $request){
        $data = $request->all(); 
        $idUser = $data['user_id'];
        $id = $data['id'];
        $cauhoi = Cauhoi::find($id);
        $idDeThi = $cauhoi->dethi_id;
        $checkDeThi = Dethi::where('id',$idDeThi)->where('user_id',$idUser)->first();
        if($checkDeThi){
            $soLuong = $checkDeThi->soluongcauhoi;
            $checkDeThi->soluongcauhoi= $soLuong -1;
            $checkDeThi->save();
            $cauhoi->delete();
            return response()->json(['message' => 'Xóa câu hỏi thành công'],200);
        }else{
            return response()->json(['message' => 'Bạn không có quyền'],408);
        }
    }

}
