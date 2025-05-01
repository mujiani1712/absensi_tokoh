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
       // $absensi = Absensi::where('user_id', Auth::id())->latest()->get();
        
        // Mengambil data absen masuk dan pulang dari session
        $absenMasuk = session('absenMasuk');
        $absenPulang = session('absenPulang');



      //  $userId = session('karyawan_id');
    //$karyawan = \App\Models\Karyawan::find($userId); // ambil nama





          // Ambil semua riwayat absensi milik user yang sedang login
       // $riwayat = Absensi::where('user_id', Auth::id())
       // ->orderBy('created_at', 'desc')
       // ->get();

      //  $absensiTerakhir = Absensi::where('user_id', Auth::id())->latest()->first();

        // Mengirim data ke view absensi.index
        return view('absensi.index', compact('absenMasuk', 'absenPulang', ));
    }

    // Menyimpan data absensi dari form
    public function store(Request $request)
    {
        // ✅ Validasi input dari form
        $request->validate([
            'tipe' => 'required|in:masuk,pulang',        // jenis absen
            'foto' => 'required',                         // base64 image
            'lokasi' => 'required',                      // lokasi GPS
            'jam' => 'required',                         // waktu absen
            
        ]);
    
        // ✅ Pastikan folder penyimpanan gambar
        $folderPath = public_path('uploads/foto_absen');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0775, true); // Buat folder jika belum ada
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



        //baru di tambah 
        
       // Absensi ::create([
         //   'user_id' => $userId,
           // 'tipe' => $request->tipe,
           // 'foto' => $publicPath,
            //'lokasi' => $request->lokasi,
            //'jam' => $request->jam,
        //]);





        // ✅ Siapkan data absen untuk disimpan sementara di session
        $absenData = [
            'tipe' => $request->tipe,
          //  'foto' => $filePath,     // URL foto untuk ditampilkan di halaman
           // 'foto' => url($filePath), // baru di ganti
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

        // Simpan ke database
       // $user = session('karyawan');
       // if (!$user || !isset($user['id'])) {
        //    return redirect()->route('login')->with('error', 'Session tidak valid. Silakan login ulang.');
       // }

       // Absensi::create([
         //   'user_id' => $user['id'], // Ambil dari session
           // 'tipe' => $request->tipe,
           // 'foto' => 'uploads/foto_absen/' . $filename, // simpan path relatif, bukan path penuh
           // 'lokasi' => $request->lokasi,
           // 'jam' => $request->jam,
        //]);
      //  Absensi::create([
        //    'user_id' => Auth::id(),       // ← user login
       //     'tipe' => $request->tipe,
        //    'foto' => $filePath,
        //    'lokasi' => $request->lokasi,
         //   'jam' => $request->jam,
        //]);

       
    
        
        // ✅ Kembalikan ke halaman absensi dengan flash session
        return redirect()->route('absensi')->with('data', $absenData);
    }
    
}
