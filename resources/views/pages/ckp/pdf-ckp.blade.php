<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: left;
            padding: 2px;
        }

        .no-border {
            border: 0px;
            height: 10px;
        }
        .sign-table {
            page-break-inside: avoid;
        }
        .page-break {
            page-break-before: always;
        }
    </style>
    <title>{{ $nama_file }}</title>
    <link rel="icon" href="{{ asset('logo/logo-torang.png') }}">
</head>

<body>
    <table style="font-size: 12px">
        <thead>
            <tr>
                <th colspan=19 align="left" class="no-border" style="text-align: center">TARGET KINERJA PEGAWAI
                    TAHUN {{ $tahun }}</th>
            </tr>
            <tr>
                <th colspan=19 align="left" class="no-border"></th>
            </tr>
            <tr>
                <th colspan=8 align="left" class="no-border">Satuan Organisasi</th>
                <th colspan=11 align="left" class="no-border">: {{ $pegawai->satker->nama }}</th>
            </tr>
            <tr>
                <th colspan=8 align="left" class="no-border">Nama</th>
                <th colspan=11 align="left" class="no-border">: {{ $pegawai->nama }}</th>
            </tr>
            <tr>
                <th colspan=8 align="left" class="no-border">Jabatan</th>
                <th colspan=11 align="left" class="no-border">: {{ $pegawai->jabatan->nama }}</th>
            </tr>
            <tr>
                <th colspan=8 align="left" class="no-border">Periode</th>
                <th colspan=11 align="left" class="no-border">: {{ $periode }}</th>
            </tr>
            <tr>
                <th style="text-align: center; height: 30px">No.</th>
                <th colspan=13 style="text-align: center; height: 30px">Uraian Kegiatan</th>
                <th style="text-align: center; height: 30px">Satuan</th>
                <th style="text-align: center; height: 30px">Target</th>
                <th style="text-align: center; height: 30px">Kode Butir Kegiatan</th>
                <th style="text-align: center; height: 30px">Angka Kredit</th>
                <th style="text-align: center; height: 30px">Keterangan</th>
            </tr>
            <tr>
                <th style="text-align: center; height: 10px; font-size: 11px">(1)</th>
                <th colspan=13 style="text-align: center; height: 10px; font-size: 11px">(2)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(3)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(4)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(5)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(6)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(7)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan=19 align="left"><b>Utama</b></td>
            </tr>
            @php
                $jumlah = 0;
                $sum_persentase = 0;
                $sum_nilai = 0;
            @endphp
            @foreach ($kegiatan_utama as $utama)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td colspan=13> {{ $utama->nama }} </td>
                    <td> {{ $utama->satuan }} </td>
                    <td style="text-align: center"> {{ $utama->sum_target }} </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @php
                    $jumlah++;
                    $sum_persentase = $sum_persentase + $utama->persentase;
                    $sum_nilai = $sum_nilai + $utama->avg_nilai;
                @endphp
            @endforeach
            <tr>
                <td colspan=19 align='left'><b>Tambahan</b></td>
            </tr>
            @foreach ($kegiatan_tambahan as $tambahan)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td colspan=13> {{ $tambahan->nama }} </td>
                    <td> {{ $tambahan->satuan }} </td>
                    <td style="text-align: center"> {{ $tambahan->sum_target }} </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @php
                    $jumlah++;
                    $sum_persentase = $sum_persentase + $tambahan->persentase;
                    $sum_nilai = $sum_nilai + $tambahan->avg_nilai;
                @endphp
            @endforeach
            @php
                if ($jumlah == 0) {
                    $jumlah = 1;
                }
            @endphp
            <tr>
                <td colspan=16>Jumlah</td>
                <td style="background-color:#000000"></td>
                <td></td>
                <td style="background-color:#000000"></td>
            </tr>
        </tbody>
    </table>
    <table style="font-size: 12px" class="sign-table">
        <thead>
            <tr>
                <td colspan=22 class="no-border"><b>Penilaian Kinerja</b></td>
            </tr>
            <tr>
                <td colspan=22 class="no-border">Tanggal: {{ $akhir_bulan }}</td>
            </tr>
            <tr>
                <td colspan=22 class="no-border"></td>
            </tr>
            <tr>
                <td colspan=3 rowspan=5 class="no-border" style="text-align: center">
                    @if ($qrcode_pegawai != null)
                        <img src="data:image/png;base64, {!! $qrcode_pegawai !!}">
                    @endif
                </td>
                <td colspan=7 class="no-border" style="text-align: left">Pegawai Yang Dinilai</td>
                <td colspan=6 class="no-border"></td>
                <td colspan=6 rowspan=5 class="no-border"></td>
                <td colspan=3 rowspan=5 class="no-border" style="text-align: center">
                    @if ($qrcode_atasan)
                        <img src="data:image/png;base64, {!! $qrcode_atasan !!}">
                    @endif
                </td>
                <td colspan=3 class="no-border" style="text-align: left">Pejabat Penilai</td>
            </tr>
            <tr>
                <td colspan=7 class="no-border" style="text-align: left"></td>
                <td colspan=6 class="no-border"></td>
                <td colspan=3 class="no-border" style="text-align: left"></td>
            </tr>
            <tr>
                <td colspan=7 class="no-border" style="text-align: left"></td>
                <td colspan=6 class="no-border"></td>
                <td colspan=3 class="no-border" style="text-align: left"></td>
            </tr>
            <tr>
                <td colspan=7 class="no-border" style="text-align: left">
                    <u>{{ $pegawai->nama . $pegawai->gelar_belakang }}</u>
                </td>
                <td colspan=6 class="no-border"></td>
                <td colspan=3 class="no-border" style="text-align: left">
                    <u>{{ $pegawai->atasan->nama . $pegawai->atasan->gelar_belakang }}</u>
                </td>
            </tr>
            <tr>
                <td colspan=7 class="no-border" style="text-align: left">{{ 'NIP.' . $pegawai->nip_baru }}</td>
                <td colspan=6 class="no-border"></td>
                <td colspan=3 class="no-border" style="text-align: left">
                    {{ 'NIP.' . $pegawai->atasan->nip_baru }}
                </td>
            </tr>
        </thead>
    </table>

    <div class="page-break"></div>

    <table style="font-size: 12px">
        <thead>
            <tr>
                <th colspan=22 align="left" class="no-border" style="text-align: center">CAPAIAN KINERJA PEGAWAI
                    TAHUN {{ $tahun }}</th>
            </tr>
            <tr>
                <th colspan=22 align="left" class="no-border"></th>
            </tr>
            <tr>
                <th colspan=8 align="left" class="no-border">Satuan Organisasi</th>
                <th colspan=14 align="left" class="no-border">: {{ $pegawai->satker->lengkap }}</th>
            </tr>
            <tr>
                <th colspan=8 align="left" class="no-border">Nama</th>
                <th colspan=14 align="left" class="no-border">: {{ $pegawai->nama }}</th>
            </tr>
            <tr>
                <th colspan=8 align="left" class="no-border">Jabatan</th>
                <th colspan=14 align="left" class="no-border">: {{ $pegawai->jabatan->nama }}</th>
            </tr>
            <tr>
                <th colspan=8 align="left" class="no-border">Periode</th>
                <th colspan=14 align="left" class="no-border">: {{ $periode }}</th>
            </tr>
            <tr>
                <th style="text-align: center; height: 30px">No.</th>
                <th colspan=13 style="text-align: center; height: 30px">Uraian Kegiatan</th>
                <th style="text-align: center; height: 30px">Satuan</th>
                <th style="text-align: center; height: 30px">Target</th>
                <th style="text-align: center; height: 30px">Realisasi</th>
                <th style="text-align: center; height: 30px">%</th>
                <th style="text-align: center; height: 30px">Tingkat Kualitas</th>
                <th style="text-align: center; height: 30px">Kode Butir Kegiatan</th>
                <th style="text-align: center; height: 30px">Angka Kredit</th>
                <th style="text-align: center; height: 30px">Keterangan</th>
            </tr>
            <tr>
                <th style="text-align: center; height: 10px; font-size: 11px">(1)</th>
                <th colspan=13 style="text-align: center; height: 10px; font-size: 11px">(2)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(3)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(4)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(5)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(6)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(7)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(8)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(9)</th>
                <th style="text-align: center; height: 10px; font-size: 11px">(10)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan=22 align="left"><b>Utama</b></td>
            </tr>
            @php
                $jumlah = 0;
                $sum_persentase = 0;
                $sum_nilai = 0;
            @endphp
            @foreach ($kegiatan_utama as $utama)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td colspan=13> {{ $utama->nama }} </td>
                    <td> {{ $utama->satuan }} </td>
                    <td style="text-align: center"> {{ $utama->sum_target }} </td>
                    <td style="text-align: center"> {{ $utama->sum_realisasi }} </td>
                    <td style="text-align: center"> {{ number_format($utama->persentase, 2) }} </td>
                    <td style="text-align: center"> {{ number_format($utama->avg_nilai, 2) }} </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @php
                    $jumlah++;
                    $sum_persentase = $sum_persentase + $utama->persentase;
                    $sum_nilai = $sum_nilai + $utama->avg_nilai;
                @endphp
            @endforeach
            <tr>
                <td colspan=22 align='left'><b>Tambahan</b></td>
            </tr>
            @foreach ($kegiatan_tambahan as $tambahan)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td colspan=13> {{ $tambahan->nama }} </td>
                    <td> {{ $tambahan->satuan }} </td>
                    <td style="text-align: center"> {{ $tambahan->sum_target }} </td>
                    <td style="text-align: center"> {{ $tambahan->sum_realisasi }} </td>
                    <td style="text-align: center"> {{ number_format($tambahan->persentase, 2) }} </td>
                    <td style="text-align: center"> {{ number_format($tambahan->avg_nilai, 2) }} </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @php
                    $jumlah++;
                    $sum_persentase = $sum_persentase + $tambahan->persentase;
                    $sum_nilai = $sum_nilai + $tambahan->avg_nilai;
                @endphp
            @endforeach
            @php
                if ($jumlah == 0) {
                    $jumlah = 1;
                }
            @endphp
            <tr>
                <td colspan=17>Jumlah</td>
                <td style="text-align: center">{{ $sum_persentase }}</td>
                <td style="text-align: center">{{ number_format($sum_nilai, 2) }}</td>
                <td style="background-color:#000000"></td>
                <td></td>
                <td style="background-color:#000000"></td>
            </tr>
            <tr>
                <td colspan=17>Rata-Rata</td>
                <td style="text-align: center">{{ number_format($sum_persentase / $jumlah, 2) }}</td>
                <td style="text-align: center">{{ number_format($sum_nilai / $jumlah, 2) }}</td>
                <td style="background-color:#000000"></td>
                <td style="background-color:#000000"></td>
                <td style="background-color:#000000"></td>
            </tr>
            <tr>
                <td colspan=18>Capaian Kinerja Pegawai (CKP)</td>
                <td style="text-align: center">
                    {{ number_format(($sum_persentase / $jumlah + $sum_nilai / $jumlah) / 2, 2) }}
                </td>
                <td style="background-color:#000000"></td>
                <td style="background-color:#000000"></td>
                <td style="background-color:#000000"></td>
            </tr>
        </tbody>
    </table>
    <table style="font-size: 12px" class="sign-table">
        <thead>
            <tr>
                <td colspan=22 class="no-border"><b>Penilaian Kinerja</b></td>
            </tr>
            <tr>
                <td colspan=22 class="no-border">Tanggal: {{ $akhir_bulan }}</td>
            </tr>
            <tr>
                <td colspan=22 class="no-border"></td>
            </tr>
            <tr>
                <td colspan=3 rowspan=5 class="no-border" style="text-align: center">
                    @if ($qrcode_pegawai != null)
                        <img src="data:image/png;base64, {!! $qrcode_pegawai !!}">
                    @endif
                </td>
                <td colspan=7 class="no-border" style="text-align: left">Pegawai Yang Dinilai</td>
                <td colspan=6 class="no-border"></td>
                <td colspan=6 rowspan=5 class="no-border"></td>
                <td colspan=3 rowspan=5 class="no-border" style="text-align: center">
                    @if ($qrcode_atasan)
                        <img src="data:image/png;base64, {!! $qrcode_atasan !!}">
                    @endif
                </td>
                <td colspan=3 class="no-border" style="text-align: left">Pejabat Penilai</td>
            </tr>
            <tr>
                <td colspan=7 class="no-border" style="text-align: left"></td>
                <td colspan=6 class="no-border"></td>
                <td colspan=3 class="no-border" style="text-align: left"></td>
            </tr>
            <tr>
                <td colspan=7 class="no-border" style="text-align: left"></td>
                <td colspan=6 class="no-border"></td>
                <td colspan=3 class="no-border" style="text-align: left"></td>
            </tr>
            <tr>
                <td colspan=7 class="no-border" style="text-align: left">
                    <u>{{ $pegawai->nama . $pegawai->gelar_belakang }}</u>
                </td>
                <td colspan=6 class="no-border"></td>
                <td colspan=3 class="no-border" style="text-align: left">
                    <u>{{ $pegawai->atasan->nama . $pegawai->atasan->gelar_belakang }}</u>
                </td>
            </tr>
            <tr>
                <td colspan=7 class="no-border" style="text-align: left">{{ 'NIP.' . $pegawai->nip_baru }}</td>
                <td colspan=6 class="no-border"></td>
                <td colspan=3 class="no-border" style="text-align: left">
                    {{ 'NIP.' . $pegawai->atasan->nip_baru }}
                </td>
            </tr>
        </thead>
    </table>
</body>

</html>
