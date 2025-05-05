<?php

namespace App\Http\Controllers;
use App\Models\Absensi; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class AbsensiController extends Controller
{
    // Menampilkan halaman index absensi
    public function index()
    {
        // Mengambil data absen masuk dan pulang dari session
        $absenMasuk = session('absenMasuk');
        $absenPulang = session('absenPulang');


        $userId = session('karyawan_id');
        $absensi_terakhir = Absensi::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Mengirim data ke view absensi.index
        return view('absensi.index', compact('absenMasuk', 'absenPulang', 'absensi_terakhir' ));
    }

    // Menyimpan data absensi dari form
    public function store(Request $request)
    {
        // ✅ Validasi input dari form
        $request->validate([
            'tipe' => 'required|in:masuk,pulang',        
            'foto' => 'required',                         // base64 image
            'lokasi' => 'required',                    
            'jam' => 'required',                        
            
        ]);
    
        //  folder penyimpanan gambar
        $folderPath = public_path('uploads/foto_absen');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0775, true); 
        }
    
        // ✅ Proses simpan foto dari base64
        $image_parts = explode(";base64,", $request->foto);
        $image_base64 = base64_decode($image_parts[1]); // Ubah dari base64 ke binary
        $filename = uniqid() . '.png';                  // Nama file unik
        $filePath = $folderPath . '/' . $filename;  // // Path full untuk menyimpan file
    
        // ✅ Simpan file ke folder public/uploads/foto_absen
        file_put_contents($filePath, $image_base64);

        // Path publik untuk akses dari browser
        $publicPath = 'uploads/foto_absen/' . $filename;


        // baru di tambah
        
        $karyawanId = session('karyawan_id');
        if ($karyawanId) {
            Absensi::create([
                'user_id' => $karyawanId,
                'tipe' => $request->tipe,
                'foto' => $publicPath,
                'lokasi' => $request->lokasi,
                'jam' => $request->jam,
            ]);
        }

        // Simpan ke session agar bisa ditampilkan
        $absenData = [
            'tipe' => $request->tipe,
            'foto' => asset('uploads/foto_absen/' . $filename), //  BENAR, ini URL relatif dari folder public
            'lokasi' => $request->lokasi,
            'jam' => $request->jam,
           
        ];
    
        // ✅ Simpan ke session tergantung tipe absen
        if ($request->tipe === 'masuk') {
            session(['absenMasuk' => $absenData]);
        } else {
            session(['absenPulang' => $absenData]);
        }
    
        
        // ✅ Kembalikan ke halaman absensi dengan flash session
        return redirect()->route('absensi')->with('data', $absenData);
    }
    
}
