@extends('layout/index')
@section('konten')
    <div>
        <h1>Selamat Datang</h1>
        <p>Silahkan LOGIN atau REGISTER untuk mengakses Data Siswa dan Kelas</p>
        <a href="/sesi" class="btn btn-primary btn-lg">LOGIN</a>
        <a href="/sesi/register" class="btn btn-success btn-lg">REGISTER</a>
    </div>
@endsection