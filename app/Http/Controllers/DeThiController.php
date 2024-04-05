<?php

namespace App\Http\Controllers;

use App\Models\Cauhoi;
use App\Models\Cautraloi;
use App\Models\ChiTietDeThi;
use App\Models\Dethi;
use App\Models\Ketqua;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeThiController extends Controller
{
    //

    public function getAllDeThi(){
        $getDeThi = Dethi::with('Monhoc')->get();
        return response()->json($getDeThi,200);
    }

    public function getAllDeThiPublic(){
        $getDeThi = Dethi::with('Monhoc')->where('trangthai',1)->get();
        return response()->json($getDeThi,200);
    }

    public function getDeThiTheoGiaoVien(int $id){
        $getDeThi = Dethi::where('user_id',$id)->get();
        return response()->json($getDeThi,200);
    }



    public function thongTinDeThi($id){
        $getThongTinDeThi = Dethi::with('Monhoc')->where('id',$id)->get();
        return response()->json($getThongTinDeThi,200);
    }

    public function lamBaiThi(int $id){
        $chiTietDeThi = Dethi::with('Monhoc','Cauhoi')->where('id',$id)->first();
        return response()->json($chiTietDeThi,200);
    }



    public function themDeThi(Request $request){
            $data = $request->all();
        
            // Validate dữ liệu
            $validator = Validator::make($data, [
                'tendethi' => 'required|string|max:255',
                'thoigianthi' => 'required|int',
                'soluongcauhoi' => 'required|int',
                'user_id' => 'required|int',
                'monhoc_id' => 'required|int',
                'cauhoi' => 'required|array',
                'cauhoi.*.noidung' => 'required|string|max:255',
                'cauhoi.*.dap_an_a' => 'required|string|max:255',
                'cauhoi.*.dap_an_b' => 'required|string|max:255',
                'cauhoi.*.dap_an_c' => 'required|string|max:255',
                'cauhoi.*.dap_an_d' => 'required|string|max:255',
                'cauhoi.*.dap_an_dung' => 'required|string|max:1',
            ]);
        
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
        
            // Tạo đề thi mới
            $deThi = new Dethi();
            $deThi->tendethi = $data['tendethi'];
            $deThi->thoigianthi = $data['thoigianthi'];
            $deThi->thoigianbatdau = now();
            $deThi->thoigianketthuc = now()->addMinutes($data['thoigianthi']);
            $deThi->soluongcauhoi = $data['soluongcauhoi'];
            $deThi->monhoc_id = $data['monhoc_id'];
            $deThi->user_id = $data['user_id'];
            $deThi->trangthai = 1;
            $deThi->save();
        
            // Thêm các câu hỏi cho đề thi
            foreach ($data['cauhoi'] as $cauhoiData) {
                $cauHoi = new Cauhoi();
                $cauHoi->noidung = $cauhoiData['noidung'];
                $cauHoi->dap_an_a = $cauhoiData['dap_an_a'];
                $cauHoi->dap_an_b = $cauhoiData['dap_an_b'];
                $cauHoi->dap_an_c = $cauhoiData['dap_an_c'];
                $cauHoi->dap_an_d = $cauhoiData['dap_an_d'];
                $cauHoi->dap_an_dung = $cauhoiData['dap_an_dung'];
                $cauHoi->dethi_id = $deThi->id;
                $cauHoi->save();
            }
        
            return response()->json(['message' => 'Tạo đề thi thành công.'], 200);
        
    }

        public function themDeThiNhap(Request $request){
            $data = $request->all();
            $validator = Validator::make($data, [
                'tendethi' => 'required|string|max:255',
                'thoigianthi' => 'required|int',
                'noidung' => 'required|max:255',
                'dap_an_a' => 'required|max:255',
                'dap_an_b' => 'required|max:255',
                'dap_an_c' => 'required|max:255',
                'dap_an_d' => 'required|max:255',
                'dap_an_dung' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
                $deThi = new Dethi();
                $deThi->tendethi = $data['tendethi'];
                $deThi->thoigianthi = $data['thoigianthi'];
                $deThi->thoigianbatdau = Carbon::now();
                $thoigianketthuc = $deThi->thoigianbatdau->addMinutes($deThi->thoigianthi);
                $deThi->thoigianketthuc = $thoigianketthuc;
                $soCauHoi = $data['soluongcauhoi'];
                $deThi->monhoc_id = $data['monhoc_id'];
                $deThi->soluongcauhoi = $soCauHoi;
                $deThi->user_id = $data['user_id'];
                $deThi->save();
                for($i=0;$i<$soCauHoi;$i++){
                    $cauHoi = new Cauhoi();
                    $cauHoi->noidung = $data['noidung'][$i];
                    $cauHoi->dap_an_a = $data['dap_an_a'][$i];
                    $cauHoi->dap_an_b = $data['dap_an_b'][$i];
                    $cauHoi->dap_an_c = $data['dap_an_c'][$i];
                    $cauHoi->dap_an_d = $data['dap_an_d'][$i];
                    $cauHoi->dap_an_dung = $data['dap_an_dung'][$i];
                    $cauHoi->dethi_id = $deThi->id;
                    $cauHoi->save();
                }
    
                return response()->json(['message' => 'Tạo đề thi thành công.'], 200);
            }

    
    public function deleteDethi($id) {
        $tim = DeThi::find($id);
        if (!$tim) {
            return response()->json(['message' => 'Không tìm thấy đề thi'], 404);
        }
       
        $de = Dethi::where('id', $id)->first();
        $user= User::with('Dethi')->where('id', $de['user_id'])->first();

        $dethi = DeThi::where('id', $id)->where('trangthai', 0)->where('user_id', $user['id'])->first();
        $kt = DeThi::where('id', $id)->where('trangthai', 1)->where('user_id', $user['id'])->first();
    
        if ($dethi) {   
         // Xóa từng câu hỏi
            $cauHois = CauHoi::where('dethi_id', $id)->get();
            foreach ($cauHois as $cauHoi) {
                $cauHoi->delete();
            }
        // Xóa đề thi
             $dethi->delete();
        // Trả về dữ liệu JSON thông báo xóa thành công
            return response()->json(['message' => 'Xóa đề thi thành công'], 200);
        } else if($kt) {
            return response()->json(['message' => 'Không thể xóa đề thi'], 400);
        }
    }
    public function update(Request $request,$id){
        $data = $request->all();
        $tim = DeThi::find($id);
    
        if (!$tim) {
            return response()->json(['message' => 'Không tìm thấy đề thi'], 404);
        }
        $de = Dethi::where('id', $id)->first();
        $user= User::with('Dethi')->where('id', $de['user_id'])->first();
        $kiemtra = DeThi::where('id',$id)->where('trangthai',0)->where('user_id',$user['id'])->first();
        $validator = Validator::make($data, [
            'tendethi' => 'required|string', 
            'thoigianthi' => 'required|int'
        ]);
        if($validator->fails()){
            $arr=[
                'success' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($arr, 404);
        }
        else if($validator && $kiemtra){
            $kiemtra->tendethi=$data['tendethi'];
            $kiemtra->thoigianthi=$data['thoigianthi'];
            /*$kiemtra->update([
                'tendethi' => $data['tendethi'],
                'thoigianthi' => $data['thoigianthi']
            ]);*/
            $kiemtra->save();
            $arr=[
                'status' => true,
                'message' => 'Cập nhật thành công',
                'data' => new \App\Http\Resources\Dethi($kiemtra),
            ];
            return response()->json($arr,200);
        }
        else{
            return response()->json(['message','Không cập nhật được'],404);
        }
    }  
    
}

    








