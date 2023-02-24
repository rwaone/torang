@extends('layouts.main')

@section('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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
        <div class="col-md-3">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pencarian</h3>
                </div>

                <div class="card-body">
                    <form action="/rekap/kegiatan" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="pegawai_id">Nama Pegawai:</label>
                            <select id="pegawai_id" class="form-control select2bs4" name="pegawai" required>
                                <option value="" disabled selected>Pilih Pegawai</option>
                                @foreach ($pegawais as $pegawai)
                                    <option {{ old("pegawai", $filter['pegawai']) == $pegawai->id ? 'selected' : '' }}
                                        value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Mulai:</label>
                            <div class="input-group date" id="datefilterstart" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datefilterstart" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text"
                                    class="form-control datetimepicker-input  @error('tanggalawal') is-invalid @enderror"
                                    data-target="#datefilterstart" data-toggle="datetimepicker" name="tanggalawal"
                                    value="{{ old('tanggalawal', $filter['tanggalawal']) }}" autocomplete="off" required>
                                @error('tanggalawal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Akhir:</label>
                            <div class="input-group date" id="datefilterend" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datefilterend" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text"
                                    class="form-control datetimepicker-input  @error('tanggalakhir') is-invalid @enderror"
                                    data-target="#datefilterend" data-toggle="datetimepicker" name="tanggalakhir"
                                    value="{{ old('tanggalakhir', $filter['tanggalakhir']) }}" autocomplete="off" required>
                                @error('tanggalakhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>

        <div class="col-md-9">
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
                                <th class="text-center">Tim</th>
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
                                        <td class="text-center">{{ $kegiatan->timkerja ? $kegiatan->timkerja->nama : 'Atasan Langsung'}}</td>
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
                                                    data-timkerja="{{ $kegiatan->timkerja ? $kegiatan->timkerja->nama : 'Atasan Langsung'}}"
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
    <!-- Select2 -->
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
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
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#datefilterstart').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            //Date picker
            $('#datefilterend').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
        });

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
