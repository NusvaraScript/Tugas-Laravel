@extends('layout.index')
@section('konten')
    <form method="POST" action="{{ '/siswa/' . $data->nis }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <h1>Nomor Induk Siswa: {{ $data->nis }}</h1>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ $data->nama }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea type="text" id="alamat" name="alamat" class="form-control">{{ $data->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <img style="max-width:50px; max-height:50px" src="{{  file_exists(public_path('foto/' . $data->foto)) && $data->foto ? url('foto') . '/' . $data->foto : url('foto/no-photo.png')  }}">    
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" id="foto" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">UPDATE</button>    
            <a href="/siswa" class="btn btn-secondary">KEMBALI</a>  
        </div>
    </form>
@endsection