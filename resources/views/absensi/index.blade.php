@extends('layouts.app')

@section('title', 'Absensi')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Absensi</h3>
    </div>
    <div class="card-body">
        <div class="todaypresence">
            <div class="row">
                <!-- KARTU MASUK -->
                <div class="col-6">
                    <div class="card gradasigreen">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    <ion-icon name="camera"></ion-icon>
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Masuk</h4>
                                    <span id="jamMasuk">--:--</span>
                                </div>
                            </div>
                            <button type="button" onclick="capturePhoto('masuk')">Absen Masuk</button>
                        </div>
                    </div>
                </div>

                <!-- KARTU PULANG -->
                <div class="col-6">
                    <div class="card gradasired">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    <ion-icon name="camera"></ion-icon>
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Pulang</h4>
                                    <span id="jamPulang">--:--</span>
                                </div>
                            </div>
                            <button type="button" onclick="capturePhoto('pulang')">Absen Pulang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Kamera dan Canvas -->
        <div class="mt-4 text-center">
            <video id="video" width="320" height="240" autoplay></video>
            <canvas id="canvas" width="320" height="240" style="display: none;"></canvas>
            <img id="previewFoto" src="" width="320" height="240" style="display: none; margin-top: 10px; border: 2px solid #ccc;" /> <!-- untuk pengambil cekrek foto -->

             <!-- Tombol Ambil Foto (muncul setelah kamera aktif) -->
            <button type="button" id="btnAmbilFoto" onclick="ambilFoto()" style="display: none;" class="btn btn-primary mt-2">
                Ambil Foto
            </button>
        </div>

        <!-- Form Absen -->
        <form id="absenForm" method="POST" action="{{ route('absensi.store') }}">
         @csrf
             <!-- Input tersembunyi untuk dikirim ke server -->
            <input type="hidden" name="tipe" id="tipe">
            <input type="hidden" name="foto" id="foto">
            <input type="hidden" name="lokasi" id="lokasi">
            <input type="hidden" name="jam" id="jam">

            <button type="submit" id="btnSubmit" style="margin-top: 10px;">Kirim Absen</button>

        </form>

        <!-- Menampilkan hasil session jika ada -->
        {{-- 
        @if (session('data'))
        <div class="mt-4">

           <h4>Data Absen</h4>
            <p>Tipe: {{ session('data')['tipe'] }}</p>
            <p>Foto URL: {{ session('data')['foto'] }}</p> <!-- yg ini baru di tambah -->
            
            <img src="{{ session('data')['foto'] }}" width="200" onerror="this.style.border='3px solid red'; alert('Gagal load gambar!')">  <!--ini baru di tambah setelah 200 -->
            <p>Lokasi: {{ session('data')['lokasi'] }}</p>
            <p>Jam: {{ session('data')['jam'] }}</p> 
        
            --}}

            <!-- Tampilkan riwayat absen dari database -->
        @if (isset($absensi_terakhir) && count($absensi_terakhir) > 0)
            <h4 class="mt-5">Riwayat Absen Terakhir</h4>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Tipe</th>
                        <th>Foto</th>
                        <th>Lokasi</th>
                        <th>Jam</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensi_terakhir as $absen)
                        <tr>
                            <td>{{ $absen->tipe }}</td>
                            <td>
                                <img src="{{ asset($absen->foto) }}" width="100" onerror="this.style.border='3px solid red';">
                            </td>
                            <td>{{ $absen->lokasi }}</td>
                            <td>{{ $absen->jam }}</td>
                            <td>{{ $absen->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

       {{--    
        </div>
        @endif
        --}} 
    </div>
</div>
@endsection


@section('scripts')
<script>
    let stream = null;
    let currentTipe = ''; // untuk menyimpan tipe absen (masuk/pulang)

    async function startCamera() {
         if (!stream) {
            try {
               stream = await navigator.mediaDevices.getUserMedia({ video: true });
                document.getElementById('video').srcObject = stream;
           } catch (err) {
              alert("Gagal mengakses kamera: " + err.message);
          }
        }
    }

 
    function capturePhoto(tipe) {
        currentTipe = tipe;
       startCamera();

        // Tampilkan tombol untuk ambil foto
        document.getElementById('btnAmbilFoto').style.display = 'inline-block';
        document.getElementById('btnSubmit').style.display = 'none';
    }

    function ambilFoto() {
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');

        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        const dataURL = canvas.toDataURL('image/png');

        document.getElementById('foto').value = dataURL;
        // Tampilkan preview foto yang sudah diambil
        document.getElementById('previewFoto').src = dataURL;
        document.getElementById('previewFoto').style.display = 'block';
        video.style.display = 'none'; // Sembunyikan kamera setelah foto diambil

        document.getElementById('tipe').value = currentTipe;

        navigator.geolocation.getCurrentPosition(function (position) {
            const lokasi = position.coords.latitude + ',' + position.coords.longitude;
            const jam = new Date().toLocaleTimeString();

            document.getElementById('lokasi').value = lokasi;
            document.getElementById('jam').value = jam;

            // Tampilkan jam pada UI
            if (currentTipe === 'masuk') {
                document.getElementById('jamMasuk').innerText = jam;
            } else {
                document.getElementById('jamPulang').innerText = jam;
            }

            // Setelah ambil foto, tampilkan tombol submit
            document.getElementById('btnSubmit').style.display = 'inline-block';
            }, function (error) {
                alert("Gagal mendapatkan lokasi: " + error.message);
            });
    }
    </script>
@endsection
