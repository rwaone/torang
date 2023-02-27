<?php

namespace App\Http\Controllers;

use App\Models\ckp;
use App\Models\Satker;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function rekapKegiatan(Request $request)
    {
        $tahun = session()->get('tahun');
        $data_kegiatan = null;
        $satker_id = auth()->user()->pegawai->satker_id;

        if ($satker_id == 7100) {
            $daftar_pegawai = Pegawai::all();
        } else {
            $daftar_pegawai = Pegawai::where('satker_id', $satker_id)->get();
        }

        $filter = [
            'pegawai' => '',
            'tanggalawal' => '',
            'tanggalakhir' => ''
        ];
        if ($request->pegawai) {
            $filter = $request->validate([
                'pegawai' => 'required',
                'tanggalawal' => 'required|date_format:d-m-Y',
                'tanggalakhir' => 'required|date_format:d-m-Y|after:tanggalawal'
            ]);
            $data_kegiatan = Kegiatan::where('pegawai_id', $filter['pegawai'])
                ->whereBetween('tanggal', [date('Y-m-d', strtotime($filter['tanggalawal'])), date('Y-m-d', strtotime($filter['tanggalakhir']))])
                ->orderBy('tanggal', 'desc')
                ->get();
        }
        return view('pages.rekap.rekapKegiatan', [
            'menu' => 'Rekapitulasi',
            'title' => 'Kegiatan Pegawai',
            "pegawais" => $daftar_pegawai,
            'kegiatans' => $data_kegiatan,
            'filter' => $filter
        ]);
    }

    public function rekapKegiatanHarian()
    {
        $kegiatan = Kegiatan::whereDate('tanggal', '=', date('Y-m-d'))->get();
        return view('pages.rekap.rekapHarian', [
            'menu' => 'Rekapitulasi',
            'title' => 'Kegiatan Harian',
            'kegiatans' => $kegiatan
        ]);
    }

    public function rekapCKP($bulan = NULL)
    {
        $tahun = session()->get('tahun');
        if ($bulan == NULL) {
            $date = date('d-m-y');
            $bulan = date('m', strtotime($date));
        }

        $satker = auth()->user()->pegawai->satker_id;

        $daftarckp = Ckp::getdaftarckp($satker, $bulan, $tahun);

        return view('pages.rekap.rekapCKP', [
            "title" => "Rekap CKP",
            "menu" => "Rekapitulasi",
            "bulan" => $bulan,
            "daftarckp" => $daftarckp,
        ]);
    }
}
