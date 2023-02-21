@extends('layouts.main')

@section('head')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('container')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <ul class="pagination pagination-month justify-content-center">
                        <li class="page-item {{ $bulan === '01' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/01">
                                <p class="page-month text-sm">Jan</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '02' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/02">
                                <p class="page-month text-sm">Feb</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '03' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/03">
                                <p class="page-month text-sm">Mar</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '04' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/04">
                                <p class="page-month text-sm">Apr</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '05' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/05">
                                <p class="page-month text-sm">Mei</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '06' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/06">
                                <p class="page-month text-sm">Jun</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '07' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/07">
                                <p class="page-month text-sm">Jul</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '08' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/08">
                                <p class="page-month text-sm">Agu</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '09' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/09">
                                <p class="page-month text-sm">Sep</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '10' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/10">
                                <p class="page-month text-sm">Okt</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '11' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/11">
                                <p class="page-month text-sm">Nov</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '12' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/show/12">
                                <p class="page-month text-sm">Des</p>
                            </a>
                        </li>
                    </ul>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="/ckp/pdf/{{ $bulan }}" target="_blank" class="btn btn-default btn-sm">
                            PDF
                        </a>
                        <a href="#" class="btn btn-default btn-sm">
                            Excel
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th colspan=2 align="left">Satuan Organisasi</th>
                                <th colspan=8 align="left">: {{ $pegawai->satker->lengkap }}</th>
                            </tr>
                            <tr>
                                <th colspan=2 align="left">Nama</th>
                                <th colspan=8 align="left">: {{ $pegawai->nama }}</th>
                            </tr>
                            <tr>
                                <th colspan=2 align="left">Jabatan</th>
                                <th colspan=8 align="left">: {{ $pegawai->jabatan->nama }}</th>
                            </tr>
                            <tr>
                                <th colspan=2 align="left">Periode</th>
                                <th colspan=8 align="left">: {{ $periode }}</th>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th>No.</th>
                                <th>Uraian Kegiatan</th>
                                <th>Satuan</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                                <th>%</th>
                                <th>Tingkat Kualitas (%)</th>
                                <th>Kode Butir Kegiatan</th>
                                <th>Angka Kredit</th>
                            </tr>
                            <tr>
                                <th colspan=10 align="left">Utama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $jumlah = 0;
                                $sum_persentase = 0;
                                $sum_nilai = 0;
                            @endphp
                            @foreach ($kegiatan_utama as $utama)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $utama->nama }} </td>
                                    <td> {{ $utama->satuan }} </td>
                                    <td> {{ $utama->sum_target }} </td>
                                    <td> {{ $utama->sum_realisasi }} </td>
                                    <td> {{ number_format($utama->persentase, 2) }} </td>
                                    <td> {{ number_format($utama->avg_nilai, 2) }} </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @php
                                    $jumlah++;
                                    $sum_persentase = $sum_persentase + $utama->persentase;
                                    $sum_nilai = $sum_nilai + $utama->avg_nilai;
                                @endphp
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan=10 align='left'><b>Tambahan</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan_tambahan as $tambahan)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $tambahan->nama }} </td>
                                    <td> {{ $tambahan->satuan }} </td>
                                    <td> {{ $tambahan->sum_target }} </td>
                                    <td> {{ $tambahan->sum_realisasi }} </td>
                                    <td> {{ number_format($tambahan->persentase, 2) }} </td>
                                    <td> {{ number_format($tambahan->avg_nilai, 2) }} </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @php
                                    $jumlah++;
                                    $sum_persentase = $sum_persentase + $tambahan->persentase;
                                    $sum_nilai = $sum_nilai + $tambahan->avg_nilai;
                                @endphp
                            @endforeach
                            @php if ($jumlah == 0) {
                                    $jumlah = 1;
                                }
                            @endphp
                            <tr>
                                <td colspan=5>Jumlah</td>
                                <td>{{ $sum_persentase }}</td>
                                <td>{{ number_format($sum_nilai, 2) }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan=5>Rata-Rata</td>
                                <td>{{ number_format($sum_persentase / $jumlah, 2) }}</td>
                                <td>{{ number_format($sum_nilai / $jumlah, 2) }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan=6>Capaian Kinerja Pegawai (CKP)</td>
                                <td>{{ number_format(($sum_persentase / $jumlah + $sum_nilai / $jumlah) / 2, 2) }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <p class="float-left">Status : {{ $status }}</p>
                    @if (!isset($ckp->is_submitted))
                        <a href="{{ url('/ckp/accept/' . $bulan) }}"><button type="submit"
                                class="btn btn-success float-right">Setuju</button></a>
                    @endif
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('script')
    <!-- SweetAlert2 -->
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            var notif = "{{ Session::get('notif') }}";

            if (notif != '') {
                Toast.fire({
                    icon: 'success',
                    title: notif
                })
            } else if (notif == '2') {
                Toast.fire({
                    icon: 'success',
                    title: 'Data telah berhasil dihapus.'
                })
            }
        });
    </script>
@endsection
