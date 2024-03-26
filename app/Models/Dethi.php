<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dethi extends Model
{
    use HasFactory;
    protected $table = 'dethi';

    public function Monhoc()
    {
        return $this->belongsTo(Monhoc::class);
    }
    public function Cauhoi()
    {
        return $this->hasMany(Cauhoi::class,'dethi_id');
    }
   
    
}
