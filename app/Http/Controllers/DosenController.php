<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::paginate(5);
        return view('dosen.index',[
            'dosen' => $dosen
        ]);
    }

    public function create()
    {
        return view('dosen.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:dosen|unique:admin',
            'nidn' => 'required|unique:dosen',
            'nama' => 'required',
            'gelar_belakang' => 'required',
            'email' => 'required|unique:dosen|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Dosen::create([
            'nik' => $request->nik,
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'gelar_depan' => $request->gelar_depan,
            'gelar_belakang' => $request->gelar_belakang,
            'email' => $request->email,
            'password' => bcrypt("password"),
        ]);
        return redirect()->route('dosen.index');
    }

    public function edit($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit',[
            'dosen' => $dosen
        ]);
    }
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:admin|unique:dosen,nik,'.$id,
            'nidn' => 'required|unique:dosen,nidn,'.$id,
            'nama' => 'required',
            'gelar_belakang' => 'required',
            'email' => 'required|email|unique:dosen,email,'.$id,
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $dosen->update([
            'nik' => $request->nik,
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'gelar_depan' => $request->gelar_depan,
            'gelar_belakang' => $request->gelar_belakang,
            'email' => $request->email,
        ]);
        
        return redirect()->route('dosen.index');
    }

    public function destroy($id)
    {
        Dosen::find($id)->delete();
        return redirect()->route('dosen.index');
    }
}
