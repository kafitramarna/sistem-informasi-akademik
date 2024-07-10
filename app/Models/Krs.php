<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;
    protected $table = 'krs';
    protected $guarded = ['id'];

    public function sks(){
        return $this->hasOne(Sks::class, 'id', 'sks_id');
    }
    public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class, 'nim', 'nim');
    }
}
