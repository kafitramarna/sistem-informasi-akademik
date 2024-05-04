<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    public function create(){
        return view('pengumuman.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'url' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };


        Pengumuman::create([
            'nama' => $request->nama,
            'url' => $request->url,
            'is_dosen' => $request->is_dosen?'1':'0',
            'is_mahasiswa' => $request->is_mahasiswa?'1':'0',
            'is_active'=> 1
        ]);

        return redirect()->route('dashboard.index');
    }
    public function edit($id){
        $pengumuman = Pengumuman::find($id);
        return view('pengumuman.edit',[
            'pengumuman' => $pengumuman
        ]);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'url' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };
        $pengumuman = Pengumuman::find($id);
        $pengumuman->update([
            'nama' => $request->nama,
            'url' => $request->url,
            'is_dosen' => $request->is_dosen?'1':'0',
            'is_mahasiswa' => $request->is_mahasiswa?'1':'0',
            'is_active'=> $request->is_active?'1':'0'
        ]);
        return redirect()->route('dashboard.index');
    }
}
