@extends('layouts.main')

@section('head')
@endsection

@section('container')
    <div class="row">
        <div class="col-md-3">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('storage/' . $user->pegawai->foto) }}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"> {{$user->pegawai->gelar_depan.' '.$user->pegawai->nama.$user->pegawai->gelar_belakang}} </h3>
                    <p class="text-muted text-center">{{ $user->role }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        {{-- <li class="list-group-item">
                            <b>Jenis Akun</b> <a class="float-right">{{auth()->user()->role}}</a>
                        </li> --}}
                        {{-- <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li> --}}
                    </ul>
                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                </div>

            </div>


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>

                <div class="card-body">
                    <strong><i class="fas fa-circle mr-1"></i>Jabatan</strong>
                    <p class="text-muted">
                        {{ $user->pegawai->jabatan->nama }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-circle mr-1"></i> NIP</strong>
                    <p class="text-muted">
                        {{ $user->pegawai->nip_lama . ' - ' . $user->pegawai->nip_baru }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-briefcase mr-1"></i> Pangkat Golongan</strong>
                    <p class="text-muted">
                        {{ $user->pegawai->golongan->pangkat . ' ' . $user->pegawai->golongan->golongan }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Satuan Kerja</strong>
                    <p class="text-muted">
                        {{ $user->pegawai->satker->nama }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-user-tie mr-1"></i> Atasan Langsung</strong>
                    <p class="text-muted">{{ $user->pegawai->atasan->nama }}</p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i> Status</strong>
                    <p class="text-muted">{{ $user->pegawai->status }}</p>
                </div>

            </div>

        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings"
                                data-toggle="tab">Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal" action="/updatePassword" method="post">
                                @csrf

                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"aria-hidden="true">&times;</button>
                                        <strong>{{ session('error') }}</strong>
                                    </div>
                                @endif

                                @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"aria-hidden="true">&times;</button>
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label for="old_password" class="col-sm-2 col-form-label">Password Lama</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="old_password"
                                            placeholder="Password Lama" name="old_password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password"
                                            placeholder="Password Baru" name="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                            placeholder="Konfirmasi Password" name="password_confirmation" required>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
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
