@extends('layout.aplikasi')
@section('konten')
    <section class="container">
        <div class="card">
            <h1>{{$judul}}</h1>
            <p>Ini adalah halaman blade html laravel</p>
            <p>
                <ul>
                    <li>Email : {{$kontak['email']}}</li>
                    <li>Instagram : {{$kontak['ig']}}</li>
                </ul>
            </p>
        </div>
    </section>
@endsection