<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Timkerja;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Contracts\Support\ValidatedData;

class PegawaiController extends Controller
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
        return view('pages.pegawai.daftar',[
            "title" => "Daftar Pegawai",
            "menu" => "SDM",
            "satkers" => $satker,
            "pegawais" => Pegawai::where('satker_id',$satker_id)->get()
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
            $jabatan = Jabatan::all();
            $struktural = collect(Pegawai::all())->where('jabatan_id','<',3);
        }else {
            $satker = Satker::where('id',auth()->user()->pegawai->satker_id)->get();
            $jabatan = Jabatan::where('id', '>', 2)->get();
            $struktural = collect(Pegawai::all())->where('jabatan_id','<',3);
        }
        return view('pages.pegawai.create',[
            "title" => "Tambah Pegawai",
            "menu" => "SDM",
            "jabatans" => $jabatan,
            "satkers" => $satker,
            "golongans" => Golongan::all(),
            "strukturals" => $struktural,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'max:255',
            'gelar_depan' => 'max:50',
            'gelar_belakang' => 'max:50',
            'nip_lama' => 'max:9|unique:pegawais',
            'nip_baru' => 'max:18|unique:pegawais',
            'golongan_id' => 'required',
            'jabatan_id' => 'required',
            'satker_id' => 'required',
            'atasan_id' => 'required',
            'status' => 'required',
            'foto' => 'image|file|max:1024'
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('foto-pegawai');
        }
        
        Pegawai::create($validatedData);
        return redirect('/pegawai')->with('notif',  'Data telah berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pages.pegawai.show',[
            "title" => "Detail Pegawai",
            "menu" => "SDM",
            "pegawai" => $pegawai,
            "timkerja_ketua" => Timkerja::where('ketua_id', $pegawai->id)->get(),
            // "timkerja_anggota" => $pegawai->timkerja,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        if (auth()->user()->role == 'Admin Provinsi') {
            $satker = Satker::all();
        }else {
            $satker = Satker::where('satker_id', auth()->user()->pegawai()->satker_id);
        }
        return view('pages.pegawai.edit',[
            "title" => "Tambah Pegawai",
            "menu" => "SDM",
            "pegawai" => $pegawai,
            "jabatans" => Jabatan::all(),
            "satkers" => $satker,
            "golongans" => Golongan::all(),
            "strukturals" => collect(Pegawai::all())->where('jabatan_id','<',3)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        $rules = [
            'nama' => 'max:255',
            'gelar_depan' => 'max:50',
            'gelar_belakang' => 'max:50',
            'golongan_id' => 'required',
            'jabatan_id' => 'required',
            'satker_id' => 'required',
            'atasan_id' => 'required',
            'status' => 'required'
        ];

        if($request->nip_lama != $pegawai->nip_lama){
            $rules['nip_lama'] = 'max:9|unique:pegawai';
        }

        if($request->nip_baru != $pegawai->nip_baru){
            $rules['nip_baru'] = 'max:18|unique:pegawai';
        }
        
        $validatedData = $request->validate($rules);

        Pegawai::where('id',$pegawai->id)->update($validatedData);
        return redirect('pegawai')->with('notif','Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->id);
        return redirect('pegawai')->with('notif','Data berhasil dihapus!');
    }
}
