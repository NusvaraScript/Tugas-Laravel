<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    function index() {
        return "<h1>Saya Guru dari controller</h1>";
    }
    function detail($id, $nama) {
        return "<h1>Guru dari controller ID $id dengan nama $nama</h1>";
    }
}
