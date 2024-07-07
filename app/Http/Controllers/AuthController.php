<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function login_process(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // dd($request->username);
        $mahasiswa = Mahasiswa::where('nim', $request->username)->first();
        if ($mahasiswa) {
            $credential = [
                'nim' => $request->username,
                'password' => $request->password
            ];
            if(Auth::guard('mahasiswa')->attempt($credential)){
                $request->session()->regenerate();
                session(['role' => 'mahasiswa']);
                return redirect()->route('dashboard.index');
            }
        }

        // Verifikasi Dosen
        $dosen = Dosen::where('nik', $request->username)->first();
        if ($dosen) {
            $credential = [
                'nik' => $request->username,
                'password' => $request->password
            ];
            if(Auth::guard('dosen')->attempt($credential)){
                $request->session()->regenerate();
                session(['role' => 'dosen']);
                return redirect()->route('dashboard.index');
            }
        }

        // Verifikasi Admin
        $admin = Admin::where('nik', $request->username)->first();
        if ($admin) {
            $credential = [
                'nik' => $request->username,
                'password' => $request->password
            ];
            if(Auth::guard('admin')->attempt($credential)){
                $request->session()->regenerate();
                session(['role' => 'admin']);
                return redirect()->route('dashboard.index');
            };
        }

        // Jika tidak ada pengguna yang ditemukan atau password salah
        return redirect()->back()->withErrors(['username' => 'Username atau password salah']);
        // $credential=[
        //     'email' => $request->email,
        //     'password' => $request->password
        // ];
        // if(Auth::attempt($credential)){
        //     return redirect()->route('dashboard.index');
        // }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
