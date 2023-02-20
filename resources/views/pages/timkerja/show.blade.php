@extends('layouts.main')

@section('head')
@endsection

@section('container')
    <div class="row">
        <div class="col-md-3">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About</h3>
                </div>

                <div class="card-body">
                    <strong><i class="fas fa-circle mr-1"></i> Nama Tim Kerja</strong>
                    <p class="text-muted">
                        {{ $timkerja->nama }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-briefcase mr-1"></i> Satuan Kerja</strong>
                    <p class="text-muted">
                        {{ $timkerja->satker->nama }}
                    </p>
                    <hr>
                    <strong><i class="fas fa-calendar-alt mr-1"></i> Tahun</strong>
                    <p class="text-muted">
                        {{ $timkerja->tahun }}
                    </p>
                </div>

            </div>

        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="float-start">
                    </div>
                    <table id="tabelpegawai" class="table table-striped table-hover text-sm projects">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">NIP Lama</th>
                                <th class="text-center">NIP Baru</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Status</th>
                                {{-- <th class="text-center" style="width: 200px"></th> --}}
                                {{-- <th>Atasan</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timkerja->pegawai as $anggota)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="col1"><img alt="Foto {{ $anggota->nama }}" class="table-avatar"
                                            src="{{ asset('storage/' . $anggota->foto) }}"> &nbsp{{ $anggota->nama }}</td>
                                    <td class="text-center">{{ $anggota->nip_lama }}</td>
                                    <td class="text-center">{{ $anggota->nip_baru }}</td>
                                    <td class="col6">{{ $anggota->jabatan->nama }}</td>
                                    <td class="text-center">{{ $anggota->status }}</td>
                                    {{-- <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="/pegawai/{{ $anggota->nip_lama }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a onclick="deleteConfirm('/anggota/{{ $anggota->id }}')"
                                            class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
    
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Benar-Benar Ingin Menghapusnya?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <form action="" method="post" id="btn-delete">
                        @method('delete')
                        @csrf
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('action', url);
            $('#deleteModal').modal();
        }
    </script>
@endsection

@section('script')
    <script>

    </script>
@endsection
