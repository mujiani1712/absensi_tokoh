@extends('layouts.app')

@section('content')
    <h2>Laporan Kehadiran</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Lokasi (Lat, Long)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensis as $absen)
                <tr>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->jam_masuk }}</td>
                    <td>{{ $absen->jam_keluar }}</td>
                    <td>{{ $absen->latitude }}, {{ $absen->longitude }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
