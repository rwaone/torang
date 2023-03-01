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
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <ul class="pagination pagination-month justify-content-center">
                        <li class="page-item {{ $bulan === '01' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/01">
                                <p class="page-month text-sm">Jan</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '02' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/02">
                                <p class="page-month text-sm">Feb</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '03' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/03">
                                <p class="page-month text-sm">Mar</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '04' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/04">
                                <p class="page-month text-sm">Apr</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '05' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/05">
                                <p class="page-month text-sm">Mei</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '06' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/06">
                                <p class="page-month text-sm">Jun</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '07' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/07">
                                <p class="page-month text-sm">Jul</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '08' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/08">
                                <p class="page-month text-sm">Agu</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '09' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/09">
                                <p class="page-month text-sm">Sep</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '10' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/10">
                                <p class="page-month text-sm">Okt</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '11' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/11">
                                <p class="page-month text-sm">Nov</p>
                            </a>
                        </li>
                        <li class="page-item {{ $bulan === '12' ? 'active' : '' }}">
                            <a class="page-link" href="/ckp/daftarApprove/12">
                                <p class="page-month text-sm">Des</p>
                            </a>
                        </li>
                    </ul>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-default btn-sm">
                            Excel
                        </a>
                        <a href="#" class="btn btn-default btn-sm">
                            PDF
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-reponsive">
                    <table id="daftarCKP" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Pegawai</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">CKP</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarckp as $data)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $data->nama }} </td>
                                    <td> {{ $data->jabatan->nama }} </td>
                                    <td class="text-center"> {{ number_format($data->ckp, 2) }} </td>
                                    <td class="text-center"> {{ $data->ckp_status }} </td>
                                    <td>
                                        <button onclick="approveConfirm('/ckp/approve/{{ $bulan . '/' . $data->id }}')"
                                            type="button"
                                            class="btn btn-sm {{ $data->ckp_status === 'CKP Approved' ? 'btn-success' : ($data->ckp_status === 'CKP Submitted' ? 'btn-primary' : 'btn-warning') }}"
                                            {{ $data->ckp_status === 'CKP Submitted' ? '' : 'disabled' }}>
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
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
    <div class="modal fade" id="approveModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Benar-Benar Ingin Menyetujui CKP ini?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a id="btn-approve" href=""><button type="submit" class="btn btn-success">Approve</button></a>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script>
            function approveConfirm(url) {
                $('#btn-approve').attr('href', url);
                $('#approveModal').modal();
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
                $('#daftarCKP thead tr')
                    .clone(true)
                    .addClass('filters')
                    .appendTo('#daftarCKP thead');

                var table = $('#daftarCKP').DataTable({
                    orderCellsTop: true,
                    fixedHeader: true,
                    paging: true,
                    pageLength: 15,
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
                                    $(cell).html('<input type="text" class="form-control">');
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
