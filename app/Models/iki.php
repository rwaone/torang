<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iki extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    protected $with = ['satuan', 'pegawai', 'penilai', 'butir'];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function butir()
    {
        return $this->belongsTo(Butir::class);
    }

    public function timkerja()
    {
        return $this->belongsTo(Timkerja::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function perjanjiankinerja()
    {
        return $this->belongsTo(PerjanjianKinerja::class);
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
