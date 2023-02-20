<?php

namespace App\Http\Controllers;

use App\Models\iki;
use App\Models\Butir;
use App\Models\Satuan;
use App\Models\Timkerja;
use App\Http\Requests\StoreikiRequest;
use App\Http\Requests\UpdateikiRequest;
use App\Models\PerjanjianKinerja;

class IkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.skp.daftar', [    
            'menu' => 'SKP',        
            'title' => 'Rencana Kinerja',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan_kode = auth()->user()->pegawai->jabatan->kode;
        if ($jabatan_kode == 'pelaksana'){
            $butir = Butir::all();
        }else {
            $butir = Butir::where('jabatan_kode', $jabatan_kode)->get();
        }
        $pk = PerjanjianKinerja::where('tahun', session()->get('tahun'))->get();
        return view('pages.skp.create', [
            'title' => 'Rencana Kinerja',
            'menu' => 'SKP',
            'perjanjiankinerjas' => $pk,
            'satuans' => Satuan::all(),
            'butirs' => $butir,
            'timkerjas' => Timkerja::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreikiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreikiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\iki  $iki
     * @return \Illuminate\Http\Response
     */
    public function show(iki $iki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\iki  $iki
     * @return \Illuminate\Http\Response
     */
    public function edit(iki $iki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateikiRequest  $request
     * @param  \App\Models\iki  $iki
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateikiRequest $request, iki $iki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\iki  $iki
     * @return \Illuminate\Http\Response
     */
    public function destroy(iki $iki)
    {
        //
    }
}
