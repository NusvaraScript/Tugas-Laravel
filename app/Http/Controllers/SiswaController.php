<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = siswa::orderBy('nis', 'desc')->paginate(5);
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Session::flash('nis',$request->nis);
        Session::flash('nama',$request->nama);
        Session::flash('alamat',$request->alamat);

        $request->validate([
            'nis'=>'required|numeric',
            'nama'=>'required',
            'alamat'=>'required',
        ],[
            'nis.required'=>'Kolom NIS wajib diisi!',
            'nis.numeric'=>'Kolom NIS wajib diisi dengan angka!',
            'nama.required'=>'Kolom Nama wajib diisi!',
            'alamat.required'=>'Kolom Alamat wajib diisi!',
        ]);
        $data=[
            'nis'=>$request->input('nis'),
            'nama'=>$request->input('nama'),
            'alamat'=>$request->input('alamat'),
        ];
        siswa::create($data);
        return redirect('siswa')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = siswa::where('nis', $id)->first();
        return view('siswa/detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = siswa::where('nis', $id)->first();
        return view('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
        ],[
            'nama.required'=>'Kolom Nama wajib diisi!',
            'alamat.required'=>'Kolom Alamat wajib diisi!',
        ]);
        $data=[
            'nama'=>$request->input('nama'),
            'alamat'=>$request->input('alamat'),
        ];
        siswa::where('nis', $id)->update($data);
        return redirect('siswa')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
        siswa::where('nis', $id)->delete();
        return redirect('siswa')->with('success', 'Data Berhasil Dihapus!');
    }
}