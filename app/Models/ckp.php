<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ckp extends Model
{
    use HasFactory;

    public $timestamps = False;

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

    public static function getdaftarckp($satker, $bulan, $tahun)
    {
        
        if (auth()->user()->role == 'Admin Provinsi') {
            $daftarpegawai = Pegawai::all();
        }else {
            $daftarpegawai = Pegawai::where('penilai_id', auth()->user()->pegawai->id)->get();
        }
        //$daftarpegawai = Pegawai::whereIn('satker_id', [$satker])->get();
        $query_kegiatan = DB::table('kegiatans')->selectRaw('pegawai_id, kriteria, kegiatans.nama, satuans.nama AS satuan, SUM(target) as sum_target, SUM(realisasi) AS sum_realisasi, 
        AVG(nilai) AS avg_nilai, SUM(realisasi)*100/SUM(target) AS persentase')
            ->leftJoin('satuans', 'kegiatans.satuan_id', '=', 'satuans.id')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy(['pegawai_id', 'kegiatans.nama', 'satuans.nama'])
            ->get();

        $query_ckp = ckp::where('bulan', $bulan)->where('tahun', $tahun)->select(['pegawai_id', 'is_submitted', 'submitted_at', 'is_approved', 'approved_at'])->get();
        $query_flag = DB::table('kegiatans')
            ->selectRaw('pegawai_id, AVG(flag) as flag')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy('pegawai_id')
            ->get();

        $kegiatan = collect($query_kegiatan);
        $ckp = collect($query_ckp);
        $flag = collect($query_flag);

        foreach ($daftarpegawai as $pegawai) {

            $kegiatan_pegawai = collect($kegiatan->where('pegawai_id', $pegawai->id));
            if (!is_null($kegiatan_pegawai)) {
                $kegiatan_utama = $kegiatan_pegawai->where('kriteria', 'Utama');
                $kegiatan_tambahan = $kegiatan_pegawai->where('kriteria', 'Tambahan');
            } else {
                $kegiatan_utama = [];
                $kegiatan_tambahan = [];
            }
            $jumlah = 0;
            $sum_persentase = 0;
            $sum_nilai = 0;

            foreach ($kegiatan_utama as $utama) {
                $jumlah++;
                $sum_persentase = $sum_persentase + $utama->persentase;
                $sum_nilai = $sum_nilai + $utama->avg_nilai;
            }

            foreach ($kegiatan_tambahan as $tambahan) {
                $jumlah++;
                $sum_persentase = $sum_persentase + $tambahan->persentase;
                $sum_nilai = $sum_nilai + $tambahan->avg_nilai;
            }

            if ($jumlah == 0) {
                $jumlah = 1;
            }

            $pegawai->ckp = ($sum_persentase / $jumlah + $sum_nilai / $jumlah) / 2;

            $statusckp = $ckp->firstWhere('pegawai_id', $pegawai->id);
            
            $flagkegiatan = $flag->firstWhere('pegawai_id', $pegawai->id);
            if (!isset($flagkegiatan)) {
                $flagkegiatan = new \stdClass();
                $flagkegiatan->flag = 0;
            }

            if (isset($statusckp->is_approved)) {
                $status = "CKP Approved";
            } else {
                if (isset($statusckp->is_submitted)) {
                    $status = "CKP Submitted";
                } else {
                    if ($flagkegiatan->flag == 3) {
                        $status = "Penilaian Lengkap";
                    } else {
                        $status = "Penilaian Belum Lengkap";
                    }
                }
            }


            $pegawai->ckp_status = $status;
        }

        return $daftarpegawai;
    }
}
