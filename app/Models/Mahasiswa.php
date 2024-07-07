<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $guarded = ['id'];

    public function prodi(): HasOne{
        return $this->hasOne(Prodi::class, 'id', 'prodi_id');
    }
}
