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

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <table id="tabelkegiatan" class="table table-sm table-hover text-sm">
                        <thead>
                            <tr>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Kegiatan</th>
                                <th class="text-center">Kriteria</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Realisasi</th>
                                <th class="text-center" style="width: 8%">Nilai</th>
                                <th class="text-center">Tim</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 40px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($kegiatans != null)
                                @foreach ($kegiatans as $kegiatan)
                                    <tr>
                                        <td class="text-center">{{ date('d-m-Y', strtotime($kegiatan->tanggal)) }}
                                        </td>
                                        <td class="">{{ $kegiatan->nama }}</td>
                                        <td class="">{{ $kegiatan->kriteria }}</td>
                                        <td class="text-center">{{ $kegiatan->target }}</td>
                                        <td class="text-center">{{ $kegiatan->satuan->nama }}</td>
                                        <td class="text-center">{{ $kegiatan->realisasi }}</td>
                                        <td class="text-center">{{ $kegiatan->nilai }}</td>
                                        <td class="text-center">{{ $kegiatan->timkerja ? $kegiatan->timkerja->nama : 'Atasan Langsung' }}</td>
                                        <td class="text-center">
                                            @switch($kegiatan->flag)
                                                @case(0)
                                                    <span class="badge bg-danger">Belum Dinilai</span>
                                                @break

                                                @case(1)
                                                    <span class="badge bg-warning">Penugasan</span>
                                                @break

                                                @case(2)
                                                    <span class="badge bg-warning">Konfirmasi</span>
                                                @break

                                                @case(3)
                                                    <span class="badge bg-success">Sudah Dinilai</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="project-actions text-right">
                                            <div class="btn-group">
                                                <a id="view-detail" href="#" data-toggle="modal" data-target="#modal-detail"
                                                    data-tanggal="{{ date('d-m-Y', strtotime($kegiatan->tanggal)) }}"
                                                    data-nama="{{ $kegiatan->nama }}"
                                                    data-kriteria="{{ $kegiatan->kriteria }}"
                                                    data-butir="{{ $kegiatan->butir->keterangan }}"
                                                    data-lokasi="{{ $kegiatan->lokasi }}"
                                                    data-targetkegiatan="{{ $kegiatan->target }}"
                                                    data-satuan="{{ $kegiatan->satuan->nama }}"
                                                    data-realisasi="{{ $kegiatan->realisasi }}"
                                                    data-keterangan="{{ $kegiatan->keterangan }}"
                                                    data-nilai="{{ $kegiatan->nilai }}"
                                                    data-timkerja="{{ $kegiatan->timkerja ? $kegiatan->timkerja->nama : 'Atasan Langsung' }}"
                                                    data-flag="{{ $kegiatan->flag }}">
                                                    <button type="button" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan=10 style="text-align: center">Silahkan isi pencarian</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th>Tanggal</th>
                                <td><span id="detail-tanggal"></span></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><span id="detail-nama"></span></td>
                            </tr>
                            <tr>
                                <th>Kriteria</th>
                                <td><span id="detail-kriteria"></span></td>
                            </tr>
                            <tr>
                                <th>Butir</th>
                                <td><span id="detail-butir"></span></td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td><span id="detail-lokasi"></span></td>
                            </tr>
                            <tr>
                                <th>Target</th>
                                <td><span id="detail-target"></span></td>
                            </tr>
                            <tr>
                                <th>Satuan</th>
                                <td><span id="detail-satuan"></span></td>
                            </tr>
                            <tr>
                                <th>Realisasi</th>
                                <td><span id="detail-realisasi"></span></td>
                            </tr>
                            <tr>
                                <th>Keterangan Output</th>
                                <td><span id="detail-keterangan"></span></td>
                            </tr>
                            <tr>
                                <th>Nilai</th>
                                <td><span id="detail-nilai"></span></td>
                            </tr>
                            <tr>
                                <th>Tim Kerja</th>
                                <td><span id="detail-timkerja"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
        $(document).ready(function() {
            $(document).on('click', '#view-detail', function() {
                $('#detail-tanggal').text($(this).data('tanggal'));
                $('#detail-nama').text($(this).data('nama'));
                $('#detail-kriteria').text($(this).data('kriteria'));
                $('#detail-butir').text($(this).data('butir'));
                $('#detail-lokasi').text($(this).data('lokasi'));
                $('#detail-target').text($(this).data('targetkegiatan'));
                $('#detail-satuan').text($(this).data('satuan'));
                $('#detail-realisasi').text($(this).data('realisasi'));
                $('#detail-keterangan').text($(this).data('keterangan'));
                $('#detail-nilai').text($(this).data('nilai'));
                $('#detail-timkerja').text($(this).data('timkerja'));
            })
        })

        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#tabelkegiatan thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#tabelkegiatan thead');

            var table = $('#tabelkegiatan').DataTable({
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
