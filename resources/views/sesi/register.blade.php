@extends('layout/index')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Registrasi User</h1>
        <form action="/sesi/create" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="name" name="name" value="{{ Session::get('name')}}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" value="{{ Session::get('email')}}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="mb-3 d-grid">
                <button class="btn btn-primary" name="submit" type="submit">LOGIN</button>
            </div>
        </form>
    </div>
@endsection