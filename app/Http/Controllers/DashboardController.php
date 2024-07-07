<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(session('role') == 'mahasiswa'){
            $listPengumuman = Pengumuman::where('is_mahasiswa',1)->where('is_active',1)->get();
        }else if(session('role') == 'dosen'){
            $listPengumuman = Pengumuman::where('is_dosen',1)->where('is_active',1)->get();
        }else{
            $listPengumuman = Pengumuman::all();
        }
        return view('dashboard',[
            'listPengumuman' => $listPengumuman
        ]);
    }
}
