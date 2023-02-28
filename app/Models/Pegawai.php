<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $load = ['kegiatan','timkerja','user'];
    protected $with = ['satker','jabatan','golongan'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function atasan()
    {
        return $this->belongsTo(Pegawai::class,'atasan_id');
    }

    public function bawahan()
    {
        return $this->hasMany(Pegawai::class,'atasan_id');
    }

    public function timkerja()
    {
        return $this->belongsToMany(Timkerja::class, 'anggotas');
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function ikis()
    {
        return $this->hasMany(iki::class);
    }

    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function getRouteKeyName()
    {
        return 'nip_lama';
    }
    
}
