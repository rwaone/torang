@extends('layouts.main')

@section('head')
@endsection

@section('container')
    <div class="row">
        <div class="col-md-3">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $pegawai->foto) }}"
                            alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"> {{ $pegawai->nama }} </h3>
                    <p class="text-muted text-center">{{ $pegawai->jabatan->nama }}</p>
                    {{-- <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul> --}}
                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                </div>

            </div>


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>

                <div class="card-body">
                    <strong><i class="fas fa-circle mr-1"></i> NIP</strong>
                    <p class="text-muted">
                        {{ $pegawai->nip_lama . ' - ' . $pegawai->nip_baru }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-briefcase mr-1"></i> Pangkat Golongan</strong>
                    <p class="text-muted">
                        {{ $pegawai->golongan->pangkat . ' ' . $pegawai->golongan->golongan }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Satuan Kerja</strong>
                    <p class="text-muted">
                        {{ $pegawai->satker->nama }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-user-tie mr-1"></i> Atasan Langsung</strong>
                    <p class="text-muted">{{ $pegawai->atasan->nama }}</p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i> Status</strong>
                    <p class="text-muted">{{ $pegawai->status }}</p>
                </div>

            </div>

        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#timkerja" data-toggle="tab">Tim
                                Kerja</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="active tab-pane" id="timkerja">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tim Kerja</th>
                                        <th>Sebagai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timkerja_ketua as $timkerja)
                                        <tr>
                                            <td>{{ $timkerja->nama }}</td>
                                            <td><span class="badge bg-success">Ketua</span></td>
                                        </tr>
                                    @endforeach
                                    @foreach ($pegawai->timkerja as $timkerja)
                                        <tr>
                                            <td>{{ $timkerja->nama }}</td>
                                            <td><span class="badge bg-warning">Anggota</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
