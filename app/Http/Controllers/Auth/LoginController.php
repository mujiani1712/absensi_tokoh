<?php

namespace App\Http\Controllers\Auth;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

       $karyawan = Karyawan::where('username', $credentials['username'])->first();

        if ($karyawan && Hash::check($credentials['password'], $karyawan->password)) {
            // Simpan data login manual di session (kalau belum pakai Auth bawaan Laravel)
            
            session(['karyawan_id' => $karyawan->id]);
           return redirect()->route('dashboard'); // arahkan ke halaman utama
        }

        return back()->withErrors(['username' => 'Username atau password salah'])->withInput();


        //$credentials = $request->only('email', 'password');
        //if (Auth::attempt($credentials)) {
            // Login sukses
         //   return redirect()->route('absensi.index');
        //}

        //return back()->with('error', 'Login gagal');
    }
}
