<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timkerja extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $load = ['kegiatan'];
    protected $with = ['ketua','pegawai','satker'];

    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class, 'anggotas');
    }

    public function ketua()
    {
        return $this->belongsTo(Pegawai::class, 'ketua_id');
    }

    public function gugus()
    {
        return $this->belongsTo(Timkerja::class,'supervisor_id');
    }

    public function bawahan()
    {
        return $this->hasMany(Timkerja::class,'supervisor_id');
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }

    public static function getLastID()
    {

        $statement = DB::select("SHOW TABLE STATUS LIKE 'timkerjas'");
        $nextid = $statement[0]->Auto_increment;

        return $nextid;
    }

    public static function getMyTimkerja()
    {   
        $timkerja_id = [];
        $my_id = auth()->user()->pegawai_id;
        $myTeams = Timkerja::where('ketua_id', $my_id)->get();
        foreach ($myTeams as $team) {
            array_push($timkerja_id, $team->id);
        }

        $gugus_kerja = Timkerja::whereIn('supervisor_id', $timkerja_id)->get();

        foreach ($gugus_kerja as $gugus) {
            array_push($timkerja_id, $gugus->id);
        }

        $timkerjas = Timkerja::whereIn('id', $timkerja_id)->get();

        return $timkerjas;
        // $anggota_id = [];
        // foreach ($timkerjas as $timkerja) {
        //     array_push($anggota_id, $timkerja->ketua_id);
        //     foreach ($timkerja->pegawai as $pegawai){
        //         array_push($anggota_id, $pegawai->id);
        //     }
        // }
        
        // return array_values(array_unique($anggota_id));
    }
}
