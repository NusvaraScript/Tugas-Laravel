@extends('layout.aplikasi')
@section('konten')
    <section class="container">
        <div class="card">
            <h1>{{$halaman_tentang}}</h1>
            <p>{{$deskripsi_tentang}}</p>
        </div>
    </section>
@endsection