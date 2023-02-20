<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skp extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $with = ['pegawai', 'atasan'];
    
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    
    public function atasan()
    {
        return $this->belongsTo(Pegawai::class, 'atasan_id');
    }
}
