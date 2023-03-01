<?php

namespace App\Http\Controllers;

use App\Models\Butir;
use App\Models\Satuan;
use App\Models\Pegawai;
use App\Models\Satker;
use App\Models\Kegiatan;
use App\Models\Timkerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai_id = auth()->user()->pegawai_id;
        $tahun = session()->get('tahun');
        return view('pages.kegiatan.daftar', [
            "title" => "Data Kegiatan",
            "menu" => "Kegiatan",
            "kegiatans" => Kegiatan::where('pegawai_id', $pegawai_id)->whereYear('tanggal', '=', $tahun)->orderBy('tanggal', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $butir = Butir::all();
        return view('pages.kegiatan.create', [
            "title" => "Tambah Kegiatan",
            "menu" => "Kegiatan",
            "satuans" => Satuan::all(),
            "butirs" => $butir,
            "timkerjas" => Timkerja::where('satker_id', auth()->user()->pegawai->satker_id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['request'] == 'alokasi') {
            $validatedData = $request->validate([
                'tanggal' => 'required',
                'nama' => 'min:6|required',
                'kriteria' => 'required',
                'butir_id' => 'required',
                'timkerja_id' => 'required',
                'target' => 'required|min:1',
                'satuan_id' => 'required',
            ]);
            $validatedData['tanggal'] = date('Y-m-d', strtotime($request['tanggal']));
            $validatedData['pegawai_id'] = auth()->user()->pegawai->id;
            $validatedData['flag'] = 0;
            $url = 'kegiatan/penilaian';
        } else {
            $validatedData = $request->validate([
                'tanggal' => 'required',
                'nama' => 'min:6|required',
                'kriteria' => 'required',
                'butir_id' => 'required',
                'timkerja_id' => 'required',
                'lokasi' => 'required|min:3',
                'target' => 'required|min:1',
                'satuan_id' => 'required',
                'realisasi' => 'required|min:1',
                'keterangan' => 'required',
            ]);
            $validatedData['tanggal'] = date('Y-m-d', strtotime($request['tanggal']));
            $validatedData['pegawai_id'] = auth()->user()->pegawai->id;
            $validatedData['flag'] = NULL;
            $url = 'kegiatan';
        }

        Kegiatan::create($validatedData);
        return redirect($url)->with('notif',  'Data telah berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
            $butir = Butir::all();
        return view('pages.kegiatan.edit', [
            "title" => "Edit Kegiatan",
            "menu" => "Kegiatan",
            "kegiatan" => $kegiatan,
            "satuans" => Satuan::all(),
            "butirs" => $butir,
            "timkerjas" => Timkerja::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        if ($request['request'] == 'edit') {
            $validatedData = $request->validate([
                'tanggal' => 'required',
                'nama' => 'min:6|required',
                'kriteria' => 'required',
                'butir_id' => 'required',
                'timkerja_id' => 'required',
                'lokasi' => 'required|min:3',
                'target' => 'required|min:1',
                'satuan_id' => 'required',
                'realisasi' => 'required|min:1',
                'keterangan' => 'required',
            ]);

            $validatedData['tanggal'] = date('Y-m-d', strtotime($request['tanggal']));
            $url = 'kegiatan';
        } elseif ($request['request'] == 'konfirmasi') {
            $validatedData = $request->validate([
                'konfirmasi' => 'max:50',
            ]);
            $validatedData['flag'] = 2;
            $url = 'kegiatan';
        } elseif ($request['request'] == 'penilaian') {
            $validatedData = $request->validate([
                'nilai' => 'required',
            ]);
            $validatedData['flag'] = 3;
            $url = 'kegiatan/penilaian';

        } elseif ($request['request'] == 'alokasi') {
            $validatedData = $request->validate([
                'nilai' => 'required',
            ]);
            $url = 'kegiatan/penilaian';

        } elseif ($request['request'] == 'penilaianpegawai') {
            $validatedData = $request->validate([
                'nilai' => 'required',
            ]);
            $validatedData['flag'] = 3;
            $url = 'kegiatan/penilaian';

            Kegiatan::where('id', $kegiatan->id)->update($validatedData);
            return redirect()->back()->with('notif', 'Data berhasil disimpan!');
        }

        Kegiatan::where('id', $kegiatan->id)->update($validatedData);
        return redirect($url)->with('notif', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan->id);
        return redirect('kegiatan')->with('notif', 'Data berhasil dihapus!');
    }

    /**
     * Menampilkan daftar penilaian.
     *
     * @return \Illuminate\Http\Response
     */
    public function penilaian()
    {
        if(auth()->user()->pegawai->jabatan_id < 5){
            return view('pages.kegiatan.penilaian',[
                'title' => 'Penilaian Kegiatan Pegawai',
                'kegiatans' => Kegiatan::where('atasan_id',auth()->user()->pegawai->id),
            ]);
        }else{
            return view('pages.kegiatan.penilaian', [
                "title" => "Penilaian Kegiatan",
                "kegiatans" => Kegiatan::getDaftarPenilaian(),
            ]);

        }
    }

    /**
     * Menampilkan form alokasi kegiatan.
     *
     * @return \Illuminate\Http\Response
     */
    public function alokasi()
    {
        return view('pages.kegiatan.alokasi', [
            "title" => "Alokasi Kegiatan",
            "menu" => "Kegiatan",
            "satuans" => Satuan::all(),
            "butirs" => Butir::all(),
            "timkerjas" => Timkerja::where('satker_id', auth()->user()->pegawai->satker_id)->get(),
            "pegawais" => Pegawai::where('satker_id', auth()->user()->pegawai->satker_id)->get(),
        ]);
    }

    /**
     * Menampilkan daftar anggota tim kerja.
     *
     * @return \Illuminate\Http\Response
     */
    public function kegiatanTimkerja()
    {
        // $anggota_id = Timkerja::getMyAnggotaId();
        return view('pages.kegiatan.timkerja', [
            "title" => "Kegiatan Tim Kerja",
            "menu" => "Kegiatan",
            "timkerjas" => Timkerja::getMyTimkerja(),
        ]);
    }

    /**
     * Menampilkan daftar anggota tim kerja.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarPegawai()
    {
        if (auth()->user()->role == 'Admin Provinsi') {
            $satker = Satker::all();
            $pegawais = Pegawai::all();
        }else {
            $satker = Satker::where('id',auth()->user()->pegawai->satker_id)->get();
            $pegawais = Pegawai::where('penilai_id', auth()->user()->pegawai->id)->get();
        }
        // $anggota_id = Timkerja::getMyAnggotaId();
        return view('pages.kegiatan.daftarpegawai', [
            "title" => "Kegiatan Tim Kerja",
            "menu" => "Kegiatan",
            "satkers" => $satker,
            "pegawais" => $pegawais,
        ]);
    }

    /**
     * Menampilkan daftar anggota tim kerja.
     *
     * @return \Illuminate\Http\Response
     */
    public function kegiatanPegawai($pegawai_id)
    {
        $tahun = session()->get('tahun');
        return view('pages.kegiatan.penilaian_pegawai',[
            'title' => 'Penilaian Kegiatan Pegawai',
            'kegiatans' => Kegiatan::where('pegawai_id', $pegawai_id)->whereYear('tanggal', '=', $tahun)->orderBy('tanggal', 'desc')->get(),
        ]);
    }
}
