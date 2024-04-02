<?php

namespace App\Http\Controllers;

use App\Models\Cauhoi;
use Illuminate\Http\Request;

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
        $cauhoi=Cauhoi::where('dethi_id',$id)->get();
        if($cauhoi ->isNotEmpty()){
            foreach($cauhoi as $id) {
                $id->delete();
            }
        }
        
    }


    public function SuaCauHoi(Request $request, int $id){
        $data= $request->only(['dap_an_dung']);
        $cauhoi = Cauhoi::find($id);

        if(!$cauhoi) {
            return response()->json(['message' => 'Không tìm thấy câu hỏi'], 404); }
        $cauhoi->update($data);
        return response()->json(['message' => 'Cập nhật câu hỏi thành công']);
    }


}
