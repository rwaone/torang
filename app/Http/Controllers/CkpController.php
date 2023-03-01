<?php

namespace App\Http\Controllers;

use App\Models\ckp;
use App\Models\Pegawai;
use App\Models\Kegiatan;
use App\Http\Requests\StoreckpRequest;
use App\Http\Requests\UpdateckpRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use \PDF;

use function PHPUnit\Framework\isNull;

class CkpController extends Controller
{
    public function myckp($bulan = NULL)
    {
        $tahun = session()->get('tahun');
        if ($bulan == NULL) {
            $date = date('d-m-y');
            $bulan = date('m', strtotime($date));
        }

        if ($bulan == '01') {
            $periode = "1 - 31 Januari " . $tahun;
        } else if ($bulan == '02') {
            $periode = "1 - 28 Februari " . $tahun;
        } else if ($bulan == '03') {
            $periode = "1 - 31 Maret " . $tahun;
        } else if ($bulan == '04') {
            $periode = "1 - 30 April " . $tahun;
        } else if ($bulan == '05') {
            $periode = "1 - 31 Mei " . $tahun;
        } else if ($bulan == '06') {
            $periode = "1 - 30 Juni " . $tahun;
        } else if ($bulan == '07') {
            $periode = "1 - 31 Juli " . $tahun;
        } else if ($bulan == '08') {
            $periode = "1 - 31 Agustus " . $tahun;
        } else if ($bulan == '09') {
            $periode = "1 - 30 September " . $tahun;
        } else if ($bulan == '10') {
            $periode = "1 - 31 Oktober " . $tahun;
        } else if ($bulan == '11') {
            $periode = "1 - 30 November " . $tahun;
        } else if ($bulan == '12') {
            $periode = "1 - 31 Desember " . $tahun;
        }

        $pegawai = auth()->user()->pegawai;
        $atasan = auth()->user()->pegawai->atasan;
        // $kegiatan_utama = Kegiatan::class("SELECT tgl, nama, nip, jabatan, b.id_bidang, b.id_seksi, nama_keg, satuan, SUM(volume) as volume, SUM(realisasi) as realisasi, cast((SUM(realisasi)/(SUM(volume))*100) as decimal(10,2)) as persenr, cast((AVG(nilai)) as decimal(10,2)) as nilai, kode_butir, cast((SUM(angka_kredit)) as decimal(10,2)) as angka_kredit FROM kegiatan a, user b WHERE a.id_user=b.id AND month(tgl)='$id' AND year(tgl)='$tahun' AND b.id='$id_user' AND (kriteria='Utama' OR kriteria='Inovasi') GROUP BY b.id, month(a.tgl), a.nama_keg");
        $kegiatan_utama = Kegiatan::getKegiatanUtama($pegawai->id, $tahun, $bulan);
        $kegiatan_tambahan = Kegiatan::getKegiatanTambahan($pegawai->id, $tahun, $bulan);

        $ckp = ckp::where('bulan', $bulan)->where('tahun', $tahun)->where('pegawai_id', $pegawai->id)->select(['is_submitted', 'submitted_at', 'is_approved', 'approved_at'])->first();
        $flag = Kegiatan::getKegiatanFlag($pegawai->id, $tahun, $bulan);

        if (isset($ckp->is_approved)) {
            $status = "CKP sudah disetujui oleh atasan";
        } else {
            if (isset($ckp->is_submitted)) {
                $status = "CKP sudah disubmit oleh pegawai";
            } else {
                if ($flag == 3) {
                    $status = "Kegiatan sudah dinilai lengkap";
                } else {
                    $status = "Penilaian kegiatan belum lengkap";
                }
            }
        }

        return view('pages.ckp.ckp', [
            "title" => "CKP",
            "menu" => "CKP",
            'ckp' => $ckp,
            "bulan" => $bulan,
            "pegawai" => $pegawai,
            "periode" => $periode,
            "kegiatan_utama" => $kegiatan_utama,
            "kegiatan_tambahan" => $kegiatan_tambahan,
            "status" => $status,
        ]);
        // $sql_nilai_null = Yii::$app->db->createCommand("SELECT COUNT(nama_keg) FROM kegiatan a, user b WHERE a.id_user=b.id AND month(tgl)='$id' AND year(tgl)='$tahun' AND b.id='$id_user' AND nilai IS NULL");
    }

    public function accept($bulan)
    {
        $data = [
            'tahun' => session()->get('tahun'),
            'bulan' => $bulan,
            'pegawai_id' => auth()->user()->pegawai_id,
            'is_submitted' => 1,
            'submitted_at' => date('Y-m-d H:i:s'),
        ];

        ckp::create($data);
        return redirect()->back()->with('notif',  'CKP telah berhasil disubmit!');
    }

    public function approve($bulan, $pegawai_id)
    {
        $data = [
            'atasan_id' => auth()->user()->pegawai_id,
            'is_approved' => 1,
            'approved_at' => date('Y-m-d H:i:s'),
        ];

        ckp::where('tahun', session()->get('tahun'))->where('bulan', $bulan)->where('pegawai_id', $pegawai_id)->update($data);
        return redirect()->back()->with('notif',  'CKP telah berhasil disetujui!');
    }

    public function daftarApprove($bulan = NULL)
    {
        $tahun = session()->get('tahun');
        if ($bulan == NULL) {
            $date = date('d-m-y');
            $bulan = date('m', strtotime($date));
        }

        $satker = auth()->user()->pegawai->satker_id;

        $daftarckp = Ckp::getdaftarckp($satker, $bulan, $tahun);

        return view('pages.ckp.approve', [
            "title" => "Approve CKP",
            "menu" => "CKP",
            "bulan" => $bulan,
            "daftarckp" => $daftarckp,
        ]);
    }

    public function exportmypdf($bulan)
    {
        $pegawai_id = auth()->user()->pegawai->id;

        return CkpController::exportpdf($bulan,$pegawai_id);
    }

    public function checkQRpegawai($link)
    {
        $kode = base64_decode($link);
        $id = str_replace('qrcodepegawai_ckpid_','',$kode);
        $ckp = ckp::findOrFail($id);
        return view('pages.ckp.checkQR', [
            "title" => 'Check QRCode Pegawai',
            "ckp" => $ckp
        ]);
    }

    public function checkQRatasan($link)
    {
        $kode = base64_decode($link);
        $id = str_replace('qrcodeatasan_ckpid_','',$kode);
        $ckp = ckp::findOrFail($id);
        return view('pages.ckp.checkQR', [
            "title" => 'Check QRCode Atasan',
            "ckp" => $ckp
        ]);
    }

    public function exportpdf($bulan, $pegawai_id)
    {

        $tahun = session()->get('tahun');

        if ($bulan == '01') {
            $periode = "1 - 31 Januari " . $tahun;
            $awal_bulan = '1 Januari ' . $tahun;
            $akhir_bulan = '31 Januari ' . $tahun;
        } else if ($bulan == '02') {
            $periode = "1 - 28 Februari " . $tahun;
            $awal_bulan = '1 Februari ' . $tahun;
            $akhir_bulan = '28 Februari ' . $tahun;
        } else if ($bulan == '03') {
            $periode = "1 - 31 Maret " . $tahun;
            $awal_bulan = '1 Maret ' . $tahun;
            $akhir_bulan = '31 Maret ' . $tahun;
        } else if ($bulan == '04') {
            $periode = "1 - 30 April " . $tahun;
            $awal_bulan = '1 April ' . $tahun;
            $akhir_bulan = '30 April ' . $tahun;
        } else if ($bulan == '05') {
            $periode = "1 - 31 Mei " . $tahun;
            $awal_bulan = '1 Mei ' . $tahun;
            $akhir_bulan = '31 Mei ' . $tahun;
        } else if ($bulan == '06') {
            $periode = "1 - 30 Juni " . $tahun;
            $awal_bulan = '1 Juni ' . $tahun;
            $akhir_bulan = '30 Juni ' . $tahun;
        } else if ($bulan == '07') {
            $periode = "1 - 31 Juli " . $tahun;
            $awal_bulan = '1 Juli ' . $tahun;
            $akhir_bulan = '31 Juli ' . $tahun;
        } else if ($bulan == '08') {
            $periode = "1 - 31 Agustus " . $tahun;
            $awal_bulan = '1 Agustus ' . $tahun;
            $akhir_bulan = '30 Agustus ' . $tahun;
        } else if ($bulan == '09') {
            $periode = "1 - 30 September " . $tahun;
            $awal_bulan = '1 September ' . $tahun;
            $akhir_bulan = '30 September ' . $tahun;
        } else if ($bulan == '10') {
            $periode = "1 - 31 Oktober " . $tahun;
            $awal_bulan = '1 Oktober ' . $tahun;
            $akhir_bulan = '30 Oktober ' . $tahun;
        } else if ($bulan == '11') {
            $periode = "1 - 30 November " . $tahun;
            $awal_bulan = '1 November ' . $tahun;
            $akhir_bulan = '30 November ' . $tahun;
        } else if ($bulan == '12') {
            $periode = "1 - 31 Desember " . $tahun;
            $awal_bulan = '1 Desember ' . $tahun;
            $akhir_bulan = '31 Desember ' . $tahun;
        }

        $pegawai = Pegawai::findOrfail($pegawai_id);
        $kegiatan_utama = Kegiatan::getKegiatanUtama($pegawai->id, $tahun, $bulan);
        $kegiatan_tambahan = Kegiatan::getKegiatanTambahan($pegawai->id, $tahun, $bulan);

        $nama_file = 'CKP_bulan-' . $bulan . '_' . $pegawai->nama . '.pdf';

        $ckp = ckp::where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->where('pegawai_id', $pegawai->id)
            ->select(['id','is_submitted', 'submitted_at', 'is_approved', 'approved_at'])
            ->first();

        if (isset($ckp)) {
            $link_pegawai = base64_encode('qrcodepegawai_ckpid_'.$ckp->id);
            $link_atasan = base64_encode('qrcodeatasan_ckpid_'.$ckp->id);
        }
        if (isset($ckp->is_approved)) {
            $qrcode_atasan = base64_encode(QrCode::format('png')->size(65)->generate(url('/ckp/checkQRatasan/'.$link_atasan)));
        }else{
            $qrcode_atasan = null;
        }

        if (isset($ckp->is_submitted)) {
            $qrcode_pegawai = base64_encode(QrCode::format('png')->size(65)->generate(url('/ckp/checkQRpegawai/'.$link_pegawai)));
        }else{
            $qrcode_pegawai = null;
        }

        $data = [
            "tahun" => $tahun,
            "pegawai" => $pegawai,
            "periode" => $periode,
            "awal_bulan" => $awal_bulan,
            "akhir_bulan" => $akhir_bulan,
            "kegiatan_utama" => $kegiatan_utama,
            "kegiatan_tambahan" => $kegiatan_tambahan,
            "nama_file" => $nama_file,
            "qrcode_pegawai" => $qrcode_pegawai,
            "qrcode_atasan" => $qrcode_atasan
        ];

        $pdf = PDF::loadView('pages.ckp.pdf-ckp', $data);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream($nama_file);
    }
}
