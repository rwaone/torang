<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use App\Models\Pegawai;
use App\Models\Timkerja;
use App\Http\Requests\StoreTimkerjaRequest;
use App\Http\Requests\UpdateTimkerjaRequest;
use App\Models\Anggota;

class TimkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if (auth()->user()->role == 'Admin Provinsi') {
            $satker = Satker::all();
        }else {
            $satker = Satker::where('id',auth()->user()->pegawai->satker_id)->get();
        }
        $satker_id = auth()->user()->pegawai->satker_id;
        return view('pages.timkerja.daftar', [
            "title" => "Tim Kerja",
            "menu" => "SDM",
            "satkers" => $satker,
            "timkerjas" => Timkerja::where('satker_id',$satker_id)->where('tahun', session()->get('tahun'))->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        if (auth()->user()->role == 'Admin Provinsi') {
            $satker = Satker::all();
        }else {
            $satker = Satker::where('id',auth()->user()->pegawai->satker_id)->get();
        }
        return view('pages.timkerja.create', [
            "title" => "Tambah Tim Kerja",
            "menu" => "SDM",
            "satkers" => $satker,
            "pegawais" => collect(Pegawai::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTimkerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimkerjaRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'max:255|required',
            'satker_id' => 'required',
            'ketua_id' => 'required'
        ]);

        $validatedData['tahun'] = $request->tahun;

        $anggotas = $request->anggota;
        $data_anggota = [];
        $timkerja_id = Timkerja::getLastID();
        foreach($anggotas as $anggota)
        {
            array_push($data_anggota,['timkerja_id' => $timkerja_id, 'pegawai_id' => $anggota]);
            // $data_anggota['timkerja_id'] = $timkerja_id;
            // $data_anggota['pegawai_id'] = $anggota;
        }

        Timkerja::create($validatedData);
        Anggota::insert($data_anggota);
        return redirect('/timkerja')->with('notif','Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timkerja  $timkerja
     * @return \Illuminate\Http\Response
     */
    public function show(Timkerja $timkerja)
    {
        return view('pages.timkerja.show', [
            "title" => "Tim Kerja",
            "menu" => "SDM",
            "timkerja" => $timkerja,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timkerja  $timkerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Timkerja $timkerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimkerjaRequest  $request
     * @param  \App\Models\Timkerja  $timkerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimkerjaRequest $request, Timkerja $timkerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timkerja  $timkerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timkerja $timkerja)
    {
        Timkerja::where('id',$timkerja->id)->delete();
        Anggota::where('timkerja_id', $timkerja->id)->delete();
        return redirect('/timkerja')->with('notif','Data berhasil dihapus!');
    }
}
