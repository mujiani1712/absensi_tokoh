<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view ('dashboard.index');
      // $karyawan = Karyawan::find(session('karyawan_id'));
       //return view('dashboard.index', compact('karyawan'));
        
    }
}
