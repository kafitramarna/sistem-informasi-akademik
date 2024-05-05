<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(5);
        return view('mahasiswa.index',[
            'mahasiswa' => $mahasiswa
        ]);
    }
    public function create(){
        $prodi = Prodi::all();
        return view('mahasiswa.create',[
            'prodi' => $prodi
        ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi_id' => $request->prodi,
            'email' => $request->email?$request->email:'',
            'password' => bcrypt("password"),
        ]);
        return redirect()->route('mahasiswa.index');
    }
    public function edit($id){
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::all();
        return view('mahasiswa.edit',[
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi
        ]);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi_id' => $request->prodi,
            'email' => $request->email?$request->email:'',
        ]);
        return redirect()->route('mahasiswa.index');
    }
    public function destroy($id){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
