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
}
