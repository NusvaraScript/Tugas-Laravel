<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;

class KelasController_ extends Controller
{
    //
    function index() {
        // $data = kelas::all();
        // return $data;

        $data = kelas::orderBy('id', 'desc')->paginate(3);
        return view('kelas/index')->with('data',$data);
    }
    function detail($id) {
        $data = kelas::where('id', $id)->first();
        return view('kelas/detail')->with('data', $data);
    }
}
