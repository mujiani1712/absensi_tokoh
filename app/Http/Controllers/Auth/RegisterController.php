<?php

namespace App\Http\Controllers\Auth;

use App\Models\karyawan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //

    public function showform()
    {
        return view ('auth.register');
    }

    public function register(Request $request)
    {
       // dd('Form dikirim'); // ini untuk memastikan function-nya kepanggil


        $validator = Validator::make ($request->all(),[
            'nama'=>'required|string|max:255',
            'email'=>'required|email|unique:karyawans',
            'no_telp' => 'required|string|max:15',
            'username' => 'required|string|unique:karyawans',
            'password' => 'required|string|min:6|confirmed',
        
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();

        }

        karyawan::create([
            'nama'=> $request->nama,
            'email'=> $request->email,
            'no_telp'=> $request->no_telp,
            'username' => $request->username,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
