<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = kelas::orderBy('id', 'desc')->paginate(5);
        return view('kelas/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Session::flash('nama_kelas',$request->nama);
        Session::flash('walikelas',$request->wali);
        Session::flash('jumlah_siswa',$request->jumlah);

        $request->validate([
            'nama'=>'required',
            'wali'=>'required',
            'jumlah'=>'required|numeric',
        ],[
            'nama.required'=>'Kolom Nama Kelas wajib diisi!',
            'wali.required'=>'Kolom Nama Wali Kelas wajib diisi dengan angka!',
            'jumlah.required'=>'Kolom Jumlah Siswa wajib diisi!',
            'jumlah.numeric'=>'Kolom Jumlah Siswa wajib diisi dengan nomor!',
        ]);
        $data=[
            'nama_kelas'=>$request->input('nama'),
            'walikelas'=>$request->input('wali'),
            'jumlah_siswa'=>$request->input('jumlah'),
        ];
        kelas::create($data);
        return redirect('kelas')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = kelas::where('id', $id)->first();
        return view('kelas/detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = kelas::where('id', $id)->first();
        return view('kelas/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama'=>'required',
            'wali'=>'required',
            'jumlah'=>'required|numeric',
        ],[
            'nama.required'=>'Kolom Nama Kelas wajib diisi!',
            'wali.required'=>'Kolom Nama Wali Kelas wajib diisi dengan angka!',
            'jumlah.required'=>'Kolom Jumlah Siswa wajib diisi!',
            'jumlah.numeric'=>'Kolom Jumlah Siswa wajib diisi dengan nomor!',
        ]);
        $data=[
            'nama_kelas'=>$request->input('nama'),
            'walikelas'=>$request->input('wali'),
            'jumlah_siswa'=>$request->input('jumlah'),
        ];
        kelas::where('id', $id)->update($data);
        return redirect('kelas')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        kelas::where('id', $id)->delete();
        return redirect('kelas')->with('success', 'Data Berhasil Dihapus!')
    }
}
