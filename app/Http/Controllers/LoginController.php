<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Penulis;

class LoginController extends Controller
{
    public function register()
{
    return view('login.register');
}

// SESUDAH (ganti dengan ini)
public function prosesRegister(Request $request)
{
    $request->validate([
        'nama_depan'    => 'required|string|max:255',
        'nama_belakang' => 'nullable|string|max:255',
        'user_name'     => 'required|string|max:255|unique:penulis,user_name',
        'password'      => 'required|string|min:8',
    ]);

    Penulis::create([
        'nama_depan'    => $request->nama_depan,
        'nama_belakang' => $request->nama_belakang,
        'user_name'     => $request->user_name,
        'password'      => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
}

    public function index()
    {
        return view('login.index');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password'  => 'required|string',
        ]);

        $penulis = Penulis::where('user_name', $request->user_name)->first();

        if (!$penulis || !password_verify($request->password, $penulis->password)) {
            return back()->withErrors(['user_name' => 'Username atau password salah.'])->withInput();
        }

        Auth::login($penulis);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


}
