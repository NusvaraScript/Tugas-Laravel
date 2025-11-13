<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    //
    function index() {
        return view('sesi/index');
    }

    function login(Request $request) {
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email Wajib Diisi!',
            'password.required'=>'Password Wajib Diisi!',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('/siswa')->with('success', 'Berhasil Login!');
        } else {
            return redirect('/sesi')->withErrors('Username atau Password salah!');
        }
    }

    function logout() {
        Auth::logout();
        return redirect('/')->with('success', 'Berhasil Logout!');
    }

    function register() {
        return view('sesi/register');
    }

    function create(Request $request) {
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ],[
            'name.required'=>'Nama Wajib Diisi!',
            'email.required'=>'Email Wajib Diisi!',
            'email.email'=>'Masukkan email yang valid!',
            'email.unique'=>'Email sudah terdaftar, gunakan email yang lain!',
            'password.required'=>'Password Wajib Diisi!',
            'password.min'=>'Password minimal adalah 6 karakter!',
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];

        User::create($data);
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('/siswa')->with('success',Auth::user()->name . ' Berhasil Login!');
        } else {
            return redirect('/sesi')->withErrors('Username atau Password salah!');
        }
    }
}