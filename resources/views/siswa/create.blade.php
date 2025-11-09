@extends('layout.index')
@section('konten')
    <form method="POST" action="/siswa" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" id="nis" name="nis" class="form-control" value="{{ Session::get('nis') }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ Session::get('nama') }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea type="text" id="alamat" name="alamat" class="form-control">{{ Session::get('alamat') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" id="foto" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>    
        </div>
    </form>
@endsection