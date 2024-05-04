<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $listPengumuman = Pengumuman::all();
        return view('dashboard',[
            'listPengumuman' => $listPengumuman
        ]);
    }
}
