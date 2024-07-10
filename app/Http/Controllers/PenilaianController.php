<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Sks;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $matkul = Sks::where('dosen_pengampu', auth()->user()->id)->get();
        return view('penilaian.index', [
            'matkul' => $matkul
        ]);
    }
    public function create($id)
    {
        $page = request('page', 1);
        $mahasiswa = Krs::where('sks_id', $id)->paginate(1, ['*'], 'page', $page);
        return view('penilaian.create', [
            'mahasiswa' => $mahasiswa,
            'id' => $id
        ]);
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'nilai_presensi' => 'required|numeric|min:0|max:100',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);
    
        $mahasiswa = Krs::where('sks_id', $id)->paginate(1);
        foreach ($mahasiswa as $item) {
            $item->nilai_absen = $request->nilai_presensi;
            $item->nilai_tugas = $request->nilai_tugas;
            $item->nilai_uts = $request->nilai_uts;
            $item->nilai_uas = $request->nilai_uas;
            $total_nilai = (0.1 * $request->nilai_presensi) + (0.3 * $request->nilai_tugas) + (0.3 * $request->nilai_uts) + (0.3 * $request->nilai_uas);
            $item->total_nilai = $total_nilai;
            if ($total_nilai >= 80) {
                $item->grade = 'A';
            } elseif ($total_nilai >= 75) {
                $item->grade = 'AB';
            } elseif ($total_nilai >= 70) {
                $item->grade = 'B';
            } elseif ($total_nilai >= 60) {
                $item->grade = 'BC';
            } elseif ($total_nilai >= 50) {
                $item->grade = 'C';
            } elseif ($total_nilai >= 40) {
                $item->grade = 'CD';
            }elseif ($total_nilai >= 30) {
                $item->grade = 'D';
            } else {
                $item->grade = 'E';
            }
            $item->save();
        }
    
        // Ambil nomor halaman saat ini
        $currentPage = $mahasiswa->currentPage();
        // Hitung halaman berikutnya
        $nextPage = $currentPage + 1;
        return redirect()->route('penilaian.create', ['id' => $id, 'page' => $nextPage]);
    }
    
}
