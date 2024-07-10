<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Sks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SksController extends Controller
{
    public function index()
    {
        $sks = Sks::paginate(10);
        return view('sks.index', [
            'sks' => $sks
        ]);
    }
    public function create()
    {
        $dosen = Dosen::all();
        return view('sks.create', [
            'dosen' => $dosen,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mata_kuliah' => 'required',
            'banyak_sks' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required',
            'jam' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $sks = new Sks();
        $sks->mata_kuliah = $request->mata_kuliah;
        $sks->banyak_sks = $request->banyak_sks;
        $sks->dosen_pengampu = $request->dosen_id;
        $sks->hari_mengajar = $request->hari;
        $sks->jam_mengajar = $request->jam;
        $sks->save();
        return redirect(route('daftar-sks.index'));
    }

    public function edit($id)
    {
        $sks = Sks::find($id);
        $dosen = Dosen::all();
        return view('sks.edit', [
            'sks' => $sks,
            'dosen' => $dosen
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'mata_kuliah' => 'required',
            'banyak_sks' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required',
            'jam' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $sks = Sks::find($id);
        $sks->mata_kuliah = $request->mata_kuliah;
        $sks->banyak_sks = $request->banyak_sks;
        $sks->dosen_pengampu = $request->dosen_id;
        $sks->hari_mengajar = $request->hari;
        $sks->jam_mengajar = $request->jam;
        $sks->save();
        return redirect(route('daftar-sks.index'));
    }
    public function destroy($id)
    {
        $sks = Sks::find($id);
        $sks->delete();
        return redirect(route('daftar-sks.index'));
    }
}
