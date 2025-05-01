@extends('layouts.app')

@section('content')
    <h2>Profil Pengguna</h2>
    <p>Nama: {{ $karyawan->nama }}</p>
    <p>Email: {{ $karyawan->email }}</p>
    <p>No Telp: {{ $karyawan->no_telp }}</p>
    <p>Username: {{ $karyawan->username }}</p>
@endsection
