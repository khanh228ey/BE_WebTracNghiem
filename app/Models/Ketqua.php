<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketqua extends Model
{
    use HasFactory;
    protected $table = 'ketqua';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dethi()
    {
        return $this->belongsTo(dethi::class);
    }

    
}
