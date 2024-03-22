<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDeThi extends Model
{
    use HasFactory;
    protected $table = 'chitietdethi';


    
    // public function Dethi()
    // {
    //     return $this->belongsTo(Dethi::class, 'dethi_id');
    // }

    // public function Cauhoi()
    // {
    //     return $this->belongsTo(Cauhoi::class, 'cauhoi_id');
    // }

    // public function Cautraloi()
    // {
    //     return $this->belongsTo(Cautraloi::class, 'cauhoi_id');
    // }

    public function Cautraloi() {
        return $this->hasMany(CauTraLoi::class, 'cauhoi_id', 'cauhoi_id');
    }
    // public function Cauhoi() {
    //     return $this->hasMany(Cauhoi::class, 'cauhoi_id');
    // }
}
