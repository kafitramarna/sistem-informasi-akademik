<?php

namespace App\Http\Controllers;

use App\Models\Sks;
use Illuminate\Http\Request;

class JadwalMengajarController extends Controller
{
    public function index()
    {
        $jadwalMengajar = Sks::where('dosen_pengampu', auth()->user()->id)->get();
        return view('jadwal-mengajar.index',[
            'jadwalMengajar' => $jadwalMengajar
        ]);
    }
}
