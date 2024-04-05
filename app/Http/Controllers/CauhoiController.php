<?php

namespace App\Http\Controllers;

use App\Models\Cauhoi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dethi;
use App\Models\Cautraloi;
use App\Models\ChiTietDeThi;
use App\Models\Ketqua;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
    public function addCauHoi(Request $request){
        $data=$request->all();
        $validator=Validator::make($data,[
            'noidung' => 'required|string',
            'dap_an_a' => 'required|string',
            'dap_an_b' => 'required|string',
            'dap_an_c' => 'required|string',
            'dap_an_d' => 'required|string',
            'dap_an_dung' => 'required|string',
            'dethi_id'=>'required|int'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        else{
            $cauhoi = new CauHoi();
            $cauhoi->noidung=$data['noidung'];
            $cauhoi->dap_an_a=$data['dap_an_a'];
            $cauhoi->dap_an_b=$data['dap_an_b'];
            $cauhoi->dap_an_c=$data['dap_an_c'];
            $cauhoi->dap_an_d=$data['dap_an_d'];
            $cauhoi->dap_an_dung=$data['dap_an_dung'];
            $cauhoi->dethi_id=$data['dethi_id'];
            $dethi=Dethi::where('id',$cauhoi['dethi_id'])->where('trangthai',0)->first();
            if(!$dethi){
                return response()->json(['message' => "Không thể thêm câu hỏi"], 404);
            }
            else{
                $cauhoi->save();
            //$cauhoi = \App\Models\Cauhoi::create($data);
                $dethi_id = $cauhoi['dethi_id'];
                $so_luong_cau_hoi = CauHoi::where('dethi_id', $dethi_id)->count();
        
                // Cập nhật số lượng câu hỏi trong bảng đề thi
                Dethi::where('id', $dethi_id)->update(['soluongcauhoi' => $so_luong_cau_hoi]);

                return response()->json(['message' => "Thêm câu hỏi thành công"], 200);
            }
        } //else {
            //return response()->json(['error' => "Thêm câu hỏi thất bại"], 500);
        //}
    }
}
