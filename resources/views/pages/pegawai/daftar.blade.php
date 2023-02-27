@extends('layouts.main')

@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <style>
        .dataTables_filter,
        .dataTables_info {
            display: none;
        }
    </style>
@endsection

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="tahun">Tahun:</label>
                            <select id="tahunSelect" class="form-control col-sm-10 select2bs4" name="tahun" required>
                                <option value="" disabled selected>Pilih Tahun</option>
                                <option value='2023'>2023</option>
                                <option value='2022'>2022</option>
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="satker_id">Satuan Kerja:</label>
                            <select id="satkerSelect" class="form-control col-sm-10 select2bs4" name="satker_id" required>
                                <option value="" disabled selected>Pilih Satker</option>
                                @foreach ($satkers as $satker)
                                    <option value="{{ $satker->id }}">{{ $satker->nama }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>

                        @can('admin')
                            <div>
                                <a href="/pegawai/create" class="btn btn-success float-right">
                                    <small><i class="fas fa-plus nav-icon"></i></small>
                                    Tambah
                                </a>
                            </div>
                        @endcan
                        <!-- /.card-body -->
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-reponsive">
                    <table id="tabelpegawai" class="table table-striped table-hover text-sm projects">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center" style="width: 7%">NIP Lama</th>
                                <th class="text-center" style="width: 10%">NIP Baru</th>
                                <th class="text-center" style="width: 10%">Pangkat</th>
                                <th class="text-center" style="width: 5%">Golongan</th>
                                <th class="text-center" style="width: 10%">Jabatan</th>
                                <th class="text-center" style="width: 12%">Satker</th>
                                <th class="text-center" style="width: 5%">Status</th>
                                <th class="text-center" style="width: 90px"></th>
                                {{-- <th>Atasan</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawais as $pegawai)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class=""><img alt="Foto {{ $pegawai->nama }}" class="table-avatar"
                                            src="{{ asset('storage/' . $pegawai->foto) }}">
                                        &nbsp{{ $pegawai->gelar_depan . ' ' . $pegawai->nama . $pegawai->gelar_belakang }}
                                    </td>
                                    <td class="text-center">{{ $pegawai->nip_lama }}</td>
                                    <td class="text-center">{{ $pegawai->nip_baru }}</td>
                                    <td class="col4">{{ $pegawai->golongan->pangkat }}</td>
                                    <td class="text-center">{{ $pegawai->golongan->golongan }}</td>
                                    <td class="">{{ $pegawai->jabatan->nama }}</td>
                                    <td class="">{{ $pegawai->satker->nama }}</td>
                                    <td class="text-center">
                                        @switch($pegawai->status)
                                            @case('Aktif')
                                                <span class="badge bg-success">
                                                @break

                                                @case('TB')
                                                    <span class="badge bg-warning">
                                                    @break

                                                    @case('Pindah')
                                                        <span class="badge bg-danger">
                                                        @break
                                                    @endswitch
                                                    {{ $pegawai->status }}</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="/pegawai/{{ $pegawai->nip_lama }}">
                                            <i class="fas fa-eye">
                                            </i>
                                        </a>
                                        @can('admin')
                                        <a class="btn btn-info btn-sm" href="/pegawai/{{ $pegawai->nip_lama }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a onclick="deleteConfirm('/pegawai/{{ $pegawai->nip_lama }}')"
                                            class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                            
                                        @endcan
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
            $("#tabel").DataTable({
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

        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#tabelpegawai thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#tabelpegawai thead');

            var table = $('#tabelpegawai').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                paging: true,
                pageLength: 10,
                lengthChange: false,
                ordering: false,
                info: true,
                // autoWidth: false,
                // responsive: false,
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function(colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            if (title != '') {
                                $(cell).html(
                                    '<input style="font-size:12px" type="text" class="form-control">'
                                );
                            }
                            // On every keypress in this input
                            $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                .off('keyup change')
                                .on('keyup change', function(e) {
                                    e.stopPropagation();

                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr =
                                        '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value +
                                                ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();

                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });
    </script>
@endsection
