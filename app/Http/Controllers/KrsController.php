<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Sks;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $sks = Krs::where('nim', auth()->user()->nim)->get();
        return view('krs.index',[
            'sks' => $sks
        ]);
    }
    public function create(){
        $sks = Sks::all();
        return view('krs.create',[
            'sks' => $sks
        ]);
    }
    public function store(Request $request){
        // dd($request->all());
        foreach($request->mata_kuliah as $id){
            $sks = Sks::find($id);
            $krs = new Krs();
            $krs->nim = auth()->user()->nim;
            $krs->sks_id = $id;
            $krs->dosen_pengampu = $sks->dosen_pengampu;
            $krs->save();
        }
        return redirect()->route('krs.index');
    }
}
