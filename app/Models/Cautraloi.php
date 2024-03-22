<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cautraloi extends Model
{
    use HasFactory;
    protected $table = 'cautraloi';


    public function cauHoi()
    {
        return $this->belongsTo(Cauhoi::class);
    }
}
