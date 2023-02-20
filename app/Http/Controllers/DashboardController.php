<?php

namespace App\Http\Controllers;

use App\Models\PerjanjianKinerja;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $satker = auth()->user()->pegawai->satker_id;
        $tahun = session()->get('tahun');
        $daftar_tahun = [date('Y'), date('Y') - 1, date('Y') - 2];

        $perjanjian_kinerja = PerjanjianKinerja::where('satker_id', $satker)->where('tahun','=', $tahun)->get();

        return view('pages.dashboard', [
            "title" => "Dashboard",
            "menu" => "Dashboard",
            "daftar_tahun" => $daftar_tahun,
            "perjanjian_kinerja" => $perjanjian_kinerja,
        ]);
    }
}
