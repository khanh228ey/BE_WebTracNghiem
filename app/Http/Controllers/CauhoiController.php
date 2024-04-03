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

    public function deleteCauHoi(int $id){
        $user = User::where('id',$id);
        $cauhoi = Cauhoi::find($id);
         if(!$cauhoi) {
            return response()->json(['message' => 'Không tìm thấy câu hỏi'], 400);
        }

        $dethi=Dethi::find($cauhoi->dethi_id);
        if($user->id!== $dethi->user_id) {
            return response()->json(['message' => 'Bạn không có quyền'],408);
        };

        $cauhoi->delete();
          return response()->json(['message' => 'Xóa câu hỏi thành công'],200);
    }


    public function updateCauHoi(Request $request, int $id){
        $user = User::where('id',$id);
        $data = $request->only(['dap_an_dung']);
        $cauhoi = Cauhoi::find($id);
        if(!$cauhoi) {
            return response()->json(['message' => 'Không tìm thấy câu hỏi'], 400);
        }

        $dethi=Dethi::find($cauhoi->dethi_id);
        if($user->id!== $dethi->user_id) {
            return response()->json(['message' => 'Bạn không có quyền'],408);
        };

        $cauhoi->update($data);
         return response()->json(['message' => 'Cập nhật câu hỏi thành công'],200);
    }


}
