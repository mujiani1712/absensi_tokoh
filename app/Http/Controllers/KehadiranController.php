<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
       // $karyawan = session('karyawan');
       // $absensis = Absensi::where('karyawan_id', $karyawan->id)->orderBy('tanggal', 'desc')->get();
        //return view('kehadiran.index', compact('absensis'));
    }
}
