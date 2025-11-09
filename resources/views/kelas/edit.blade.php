@extends('layout.index')
@section('konten')
    <form method="POST" action="{{ '/kelas/' . $data->id }}">
        @csrf
        @method('put')
        <div>
            <h1>Nomor ID Kelas: {{ $data->id }}</h1>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kelas</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ $data->nama_kelas }}">
        </div>
        <div class="mb-3">
            <label for="wali" class="form-label">Wali Kelas</label>
            <input type="text" id="wali" name="wali" class="form-control" value="{{ $data->walikelas }}">
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Siswa</label>
            <input type="text" id="jumlah" name="jumlah" class="form-control" value="{{ $data->jumlah_siswa }}">
        </div>
        <div class="mb-3">
            <img style="max-width:100px; max-height:100px" src="{{  file_exists(public_path('foto/' . $data->foto)) && $data->foto ? url('foto') . '/' . $data->foto : url('foto/no-photo.png')  }}">    
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" id="foto" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">UPDATE</button>    
        </div>
    </form>
@endsection