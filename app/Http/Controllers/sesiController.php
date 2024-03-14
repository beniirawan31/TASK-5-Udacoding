<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SesiController extends Controller
{
    public function index()
    {
        return view('sesi.login');
    }

    public function register2()
    {
        return view('sesi.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Di isi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            Session::flash('name', $request->name);
            Session::flash('email', $request->email);
            return redirect('mahasiswa')->with('success', 'berhasil login');
        } else {
            return redirect('sesi')->withErrors('username dan password tidak valid');
        }
    }


    //method
    public function register(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Buat dan simpan user baru ke database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect ke halaman lain setelah pendaftaran sukses
        return redirect('mahasiswa')->with('success', 'berhasil Register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('sesi.login');
    }
}
