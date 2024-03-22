<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dethi extends Model
{
    use HasFactory;
    protected $table = 'dethi';

    public function chiTietDeThi(){
        return $this->belongsToMany(Cauhoi::class,'chitietdethi','dethi_id','cauhoi_id');
    }

    public function Monhoc()
    {
        return $this->belongsTo(Monhoc::class);
    }
    
}
