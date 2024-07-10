<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sks extends Model
{
    use HasFactory;
    protected $table = 'sks';
    protected $guard = ['id'];

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'id', 'dosen_pengampu');
    }
}
