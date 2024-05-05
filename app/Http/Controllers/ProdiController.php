<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        return view('prodi.index',[
            'prodi' => $prodi
        ]);
    }
    public function create(){
        return view('prodi.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };
        Prodi::create([
            'nama' => $request->nama
        ]);
        return redirect()->route('prodi.index');
    }
    public function edit($id){
        $prodi = Prodi::find($id);
        return view('prodi.edit',[
            'prodi' => $prodi
        ]);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $prodi = Prodi::find($id);
        $prodi->update([
            'nama' => $request->nama
        ]);
        return redirect()->route('prodi.index');
    }
    public function destroy($id){
        $prodi = Prodi::find($id);
        $prodi->delete();
        return redirect()->route('prodi.index');
    }
}
