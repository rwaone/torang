@extends('layouts.main')

@section('head')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('template/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('template/plugins/dropzone/min/dropzone.min.css') }}">
@endsection

@section('container')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-reponsive">
                    <form action="/kegiatan/{{ $kegiatan->id }}" method="post">
                        @csrf
                        @method('put')
                      
                        <input type="hidden" name="request" value="edit">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text"
                                    class="form-control datetimepicker-input  @error('tanggal') is-invalid @enderror"
                                    data-target="#reservationdate" data-toggle="datetimepicker" name="tanggal"
                                    value="{{ old('tanggal', date('d-m-Y', strtotime($kegiatan->tanggal))) }}" autocomplete="off" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="nama">Nama Kegiatan</label>
                            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{ old('nama', $kegiatan->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="kriteria">Kriteria</label>
                            <select id="kriteria" class="form-control select2bs4" name="kriteria" required>
                                <option value="" selected disabled>Pilih Kriteria</option>
                                <option {{ old('kriteria', $kegiatan->kriteria) == 'Utama' ? 'selected' : '' }} value="Utama">Utama</option>
                                <option {{ old('kriteria', $kegiatan->kriteria) == 'Tambahan' ? 'selected' : '' }} value="Tambahan">Tambahan
                                </option>
                                <option {{ old('kriteria') == 'Inovasi' ? 'selected' : '' }} value="Inovasi">Inovasi</option>
                            </select>

                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="butir_id">Jenis/Butir Kegiatan</label>
                            <select id="butir_id" class="form-control select2bs4" name="butir_id" required>
                                <option value="" selected disabled>Pilih Jenis Kegiatan</option>
                                @foreach ($butirs as $butir)
                                    <option {{ old('butir_id', $kegiatan->butir_id) == $butir->id ? 'selected' : '' }}
                                        value="{{ $butir->id }}">{{ $butir->keterangan }}</option>
                                @endforeach
                                <option {{ old('butir_id', $kegiatan->butir_id) == $butir->id ? 'selected' : '' }} value="1">Lainnya</option>
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="timkerja_id">Pemberi Tugas</label>
                            <select id="penilai_id" class="form-control select2bs4" name="timkerja_id" required>
                                <option value="" selected disabled>Pilih Pemberi Tugas</option>
                                @foreach ($timkerjas as $timkerja)
                                    <option {{ old('timkerja_id', $kegiatan->timkerja_id) == $timkerja->id ? 'selected' : '' }}
                                        value="{{ $timkerja->id }}">{{ $timkerja->nama }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="lokasi">Lokasi Kegiatan</label>
                            <input type="text" id="lokasi" class="form-control  @error('lokasi') is-invalid @enderror"
                                name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}" required>
                            @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="target">Target</label>
                            <input type="text" id="target" class="form-control @error('target') is-invalid @enderror"
                                name="target" value="{{ old('target', $kegiatan->target) }}" required>
                            @error('target')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group ">
                            <label class="control-label" for="satuan_idn">Satuan</label>
                            <select id="satuan_id" class="form-control select2bs4" name="satuan_id" required>
                                <option value="" selected disabled>Pilih Satuan</option>
                                @foreach ($satuans as $satuan)
                                    <option {{ old('satuan_id', $kegiatan->satuan_id) == $satuan->id ? 'selected' : '' }}
                                        value="{{ $satuan->id }}">{{ $satuan->nama }}</option>
                                @endforeach
                            </select>

                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="realisasi">Realisasi</label>
                            <input type="text" id="realisasi" class="form-control @error('realisasi') is-invalid @enderror"
                                name="realisasi" value="{{ old('realisasi', $kegiatan->realisasi) }}" required>
                            @error('realisasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="keterangan">Hasil yang Dicapai</label>
                            <textarea id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="6"
                                 required>{{ old('keterangan', $kegiatan->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('template/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('template/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('template/plugins/dropzone/min/dropzone.min.js') }}"></script>
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
            $('#reservationdate').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
@endsection
