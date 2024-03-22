<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketqua extends Model
{
    use HasFactory;
    protected $table = 'ketqua';

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function deThi()
    {
        return $this->belongsTo(dethi::class);
    }

    
    public function chiTietKetQua()
    {
        return $this->hasOne(Chitietketqua::class);
    }
}
