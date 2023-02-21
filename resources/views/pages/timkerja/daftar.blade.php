@extends('layouts.main')

@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('container')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <a href="/timkerja/create" class="btn btn-success">
                    <small><i class="fas fa-plus nav-icon"></i></small>
                    Tambah
                </a>
            </div>
            <div class="card-tools">
                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button> --}}
            </div>
        </div>
        <div class="card-body">
            <table id="tabeltimkerja" class="table table-striped table-hover projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Tim Kerja
                        </th>
                        <th class="text-center">
                            Ketua Tim
                        </th>
                        <th>
                            Anggota
                        </th>
                        <th style="width: 250px">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timkerjas as $timkerja)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $timkerja->nama }}</td>
                            <td class="text-center"><img alt="Foto {{ $timkerja->ketua->nama }}" class="table-avatar"
                                    title="{{ $timkerja->ketua->nama }}"
                                    src="{{ asset('storage/' . $timkerja->ketua->foto) }}"></td>
                            <td>
                                <ul class="list-inline">
                                    @foreach ($timkerja->pegawai as $anggota)
                                        <li class="list-inline-item">
                                            <img alt="Foto {{ $anggota->nama }}" class="table-avatar"
                                                title="{{ $anggota->nama }}"
                                                src="{{ asset('storage/' . $anggota->foto) }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/timkerja/{{ $timkerja->id }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="/timkerja/{{ $timkerja->id }}/edit">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a onclick="deleteConfirm('/timkerja/{{ $timkerja->id }}')" class="btn btn-danger btn-sm"
                                    href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

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
                <form action="" method="post" id="btn-delete">
                    <div class="modal-footer justify-content-between">
                        @method('delete')
                        @csrf
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
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
    <!-- SweetAlert2 -->
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#tabeltimkerja").DataTable({
                "ordering" : false,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');

        });
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
