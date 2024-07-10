<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function index()
    {
        $nilai = Krs::where('nim', auth()->user()->nim)->get();
        $ipk = 0;
        $total_sks = 0;
        foreach ($nilai as $item) {
            if ($item->grade == 'A') {
                $ipk += 4 * $item->sks->banyak_sks;
            } elseif ($item->grade == 'AB') {
                $ipk += 3.5 * $item->sks->banyak_sks;
            } elseif ($item->grade == 'B') {
                $ipk += 3 * $item->sks->banyak_sks;
            } elseif ($item->grade == 'BC') {
                $ipk += 2.5 * $item->sks->banyak_sks;
            } elseif ($item->grade == 'C') {
                $ipk += 2 * $item->sks->banyak_sks;
            } elseif ($item->grade == 'CD') {
                $ipk += 1.5 * $item->sks->banyak_sks;
            } elseif ($item->grade == 'D') {
                $ipk += 1 * $item->sks->banyak_sks;
            }else{
                $ipk += 0.5 * $item->sks->banyak_sks;
            }
            $total_sks += $item->sks->banyak_sks;
        }
        // dd($ipk);

        $ipk = $ipk / ($total_sks);
        // dd($ipk);
        return view('khs.index', [
            'nilai' => $nilai,
            'ipk' => $ipk
        ]);
    }
}
