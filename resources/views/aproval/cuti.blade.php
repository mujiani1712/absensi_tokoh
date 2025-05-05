@extends('layouts.app')

@section('title', 'Approval - cuti')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Form Cuti</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('aproval.cuti') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                            <input type="date" class="form-control" name="tanggal_pengajuan" value="{{ old('tanggal_pengajuan') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_cuti">Tanggal cuti</label>
                            <input type="date" class="form-control" name="tanggal_cuti" value="{{ old('tanggal_cuti') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_berakhir_cuti">Tanggal Berakhir cuti</label>
                            <input type="date" class="form-control" name="tanggal_berakhir_cuti" value="{{ old('tanggal_berakhir_cuti') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name="status" value="{{ old('status') }}" placeholder="Contoh: Menunggu Persetujuan">
                        </div>

                        <div class="form-group mb-4">
                            <label for="lampiran">Lampirkan File</label>
                            <input type="file" class="form-control" name="lampiran">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Kirim Permohonan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
