<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['satuan', 'pegawai', 'butir', 'timkerja'];

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

    public static function getDaftarPenilaian()
    {           
        $penilai = auth()->user()->pegawai_id;
        $timkerja_id = Timkerja::where('ketua_id', $penilai)->pluck('id');
        // $daftar_tim = Timkerja::whereIn('supervisor_id',$timkerja_id)->orWhere('ketua_id', $penilai)->pluck('id');
        $query = Kegiatan::where('flag', NULL)->orWhere('flag', '0')->orWhere('flag', '2')->get();
        $daftarpenilaian = $query->whereIn('timkerja_id', $timkerja_id);

        return $daftarpenilaian;
    }

    public static function getKegiatanUtama($pegawai_id, $tahun, $bulan)
    {
        $kegiatan_utama = DB::table('kegiatans')
            ->leftJoin('satuans', 'kegiatans.satuan_id', '=', 'satuans.id')
            ->selectRaw('kegiatans.nama, satuans.nama AS satuan, SUM(target) as sum_target, SUM(realisasi) AS sum_realisasi, 
            AVG(nilai) AS avg_nilai, SUM(realisasi)*100/SUM(target) AS persentase')
            ->where('pegawai_id', $pegawai_id)
            ->whereIn('kriteria', ['Utama', 'Inovasi'])
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy(['kegiatans.nama','satuans.nama'])
            ->get();

        return $kegiatan_utama;
    }
    
    public static function getKegiatanTambahan($pegawai_id, $tahun, $bulan)
    {
        $kegiatan_utama = DB::table('kegiatans')
            ->leftJoin('satuans', 'kegiatans.satuan_id', '=', 'satuans.id')
            ->selectRaw('kegiatans.nama, satuans.nama AS satuan, SUM(target) as sum_target, SUM(realisasi) AS sum_realisasi, 
            AVG(nilai) AS avg_nilai, SUM(realisasi)*100/SUM(target) AS persentase')
            ->where('pegawai_id', $pegawai_id)
            ->where('kriteria', 'Tambahan')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy(['kegiatans.nama','satuans.nama'])
            ->get();

        return $kegiatan_utama;
    }

    public static function getKegiatanFlag($pegawai_id, $tahun, $bulan)
    {
        $flag = DB::table('kegiatans')
                    ->selectRaw('AVG(flag) as flag')
                    ->where('pegawai_id',$pegawai_id)
                    ->whereMonth('tanggal', $bulan)
                    ->whereYear('tanggal', $tahun)
                    ->value('flag');
        return $flag;
    }
}
