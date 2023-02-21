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
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body table-reponsive">
                    <div class="float-start">
                        <a href="/user/create" class="btn btn-success">
                            <small><i class="fas fa-plus nav-icon"></i></small>
                            Tambah
                        </a>
                    </div>
                    <table id="tabelpegawai" class="table table-striped table-hover text-sm projects">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Satker</th>
                                <th class="text-center" style="width: 150px"></th>
                                {{-- <th>Atasan</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">#</td>
                                <td><input class="form-control" type="text" id="filter1"></td>
                                <td><input class="form-control" type="text" id="filter2"></td>
                                <td><input class="form-control" type="text" id="filter3"></td>
                                <td><input class="form-control" type="text" id="filter4"></td>
                                <td><input class="form-control" type="text" id="filter5"></td>
                                <td></td>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-left col2">{{ $user->pegawai->nama }}</td>
                                    <td class="text-center col2">{{ $user->username }}</td>
                                    <td class="text-center col3">{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->role }}</td>
                                    <td class="text-center col5">{{ $user->pegawai->satker->nama }}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="/user/{{ $user->username }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a onclick="deleteConfirm('/user/{{ $user->username }}')"
                                            class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                    {{-- <td>{{ $pegawai->atasan->nama }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
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
    <!-- /.modal -->
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('action', url);
            $('#deleteModal').modal();
        }
    </script>
@endsection

@section('script')
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
    <!-- SweetAlert2 -->
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function() {
            $('#filter1').change(function() {
                $("#tabelpegawai td.col1:contains('" + $(this).val() + "')").parent().show();
                $("#tabelpegawai td.col1:not(:contains('" + $(this).val() + "'))").parent().hide();
            });
        });
        $(function() {
            $('#filter2').change(function() {
                $("#tabelpegawai td.col2:contains('" + $(this).val() + "')").parent().show();
                $("#tabelpegawai td.col2:not(:contains('" + $(this).val() + "'))").parent().hide();
            });
        });
        $(function() {
            $('#filter3').change(function() {
                $("#tabelpegawai td.col3:contains('" + $(this).val() + "')").parent().show();
                $("#tabelpegawai td.col3:not(:contains('" + $(this).val() + "'))").parent().hide();
            });
        });
        $(function() {
            $('#filter4').change(function() {
                $("#tabelpegawai td.col4:contains('" + $(this).val() + "')").parent().show();
                $("#tabelpegawai td.col4:not(:contains('" + $(this).val() + "'))").parent().hide();
            });
        });
        $(function() {
            $('#filter5').change(function() {
                $("#tabelpegawai td.col5:contains('" + $(this).val() + "')").parent().show();
                $("#tabelpegawai td.col5:not(:contains('" + $(this).val() + "'))").parent().hide();
            });
        });
        $(function() {
            $('#filter6').change(function() {
                $("#tabelpegawai td.col6:contains('" + $(this).val() + "')").parent().show();
                $("#tabelpegawai td.col6:not(:contains('" + $(this).val() + "'))").parent().hide();
            });
        });
        $(function() {
            $('#filter7').change(function() {
                $("#tabelpegawai td.col7:contains('" + $(this).val() + "')").parent().show();
                $("#tabelpegawai td.col7:not(:contains('" + $(this).val() + "'))").parent().hide();
            });
        });
        $(function() {
            $('#filter8').change(function() {
                $("#tabelpegawai td.col8:contains('" + $(this).val() + "')").parent().show();
                $("#tabelpegawai td.col8:not(:contains('" + $(this).val() + "'))").parent().hide();
            });
        });

        $(function() {
            $("#tabel").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');

        });
        $('#tabelpegawai').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": false,
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
