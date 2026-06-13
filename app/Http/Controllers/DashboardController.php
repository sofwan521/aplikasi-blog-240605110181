<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $nama_lengkap = $user->nama_depan . ' ' . $user->nama_belakang;

        // Format waktu login dalam bahasa Indonesia
        $hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        $bulan = [
            1=>'Januari', 2=>'Februari', 3=>'Maret',
            4=>'April', 5=>'Mei', 6=>'Juni',
            7=>'Juli', 8=>'Agustus', 9=>'September',
            10=>'Oktober', 11=>'November', 12=>'Desember',
        ];
        $now = now()->timezone('Asia/Jakarta');
        $waktu_login = $hari[$now->format('w')] . ', '
            . $now->format('j') . ' '
            . $bulan[(int)$now->format('n')] . ' '
            . $now->format('Y') . ' | '
            . $now->format('H:i');

        return view('dashboard.index', compact('nama_lengkap', 'waktu_login'));
    }
}
