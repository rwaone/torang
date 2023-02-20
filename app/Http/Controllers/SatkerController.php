<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use App\Http\Requests\StoreSatkerRequest;
use App\Http\Requests\UpdateSatkerRequest;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSatkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSatkerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satker  $satker
     * @return \Illuminate\Http\Response
     */
    public function show(Satker $satker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satker  $satker
     * @return \Illuminate\Http\Response
     */
    public function edit(Satker $satker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSatkerRequest  $request
     * @param  \App\Models\Satker  $satker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSatkerRequest $request, Satker $satker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satker  $satker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satker $satker)
    {
        //
    }
}
