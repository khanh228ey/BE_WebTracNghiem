<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cauhoi extends Model
{
    use HasFactory;
    protected $table = 'cauhoi';
    protected $fillable = ['noidung', 'dap_an_a', 'dap_an_b', 'dap_an_c', 'dap_an_d', 'dap_an_dung', 'dethi_id'];

    public function Dethi()
    {
        return $this->belongsTo(Dethi::class);
    }
  
}
