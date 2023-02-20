<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Response;

class AjaxController extends Controller
{
    public function show($id)
    {
        $kegiatan  = Kegiatan::where('id',$id)->get();
 
        return json_encode($kegiatan);
    }
}
