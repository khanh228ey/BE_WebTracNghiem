<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cauhoi extends Model
{
    use HasFactory;
    protected $table = 'cauhoi';

    public function cauTraLoi()
    {
        return $this->hasMany(Cautraloi::class);
    }
}
