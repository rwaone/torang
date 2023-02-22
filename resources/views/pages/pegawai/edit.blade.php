@extends('layouts.main')

@section('head')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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
                    <form action="/pegawai/{{ $pegawai->nip_lama }}" method="post">
                        @csrf
                        @method('put')
                        
                        <div class="form-group">
                            <label class="control-label" for="nama">Nama Pegawai:</label>
                            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                required value="{{ old('nama',$pegawai->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="gelar_depan">Gelar Depan:</label>
                            <input type="text" id="gelar_depan" class="form-control @error('gelar_depan') is-invalid @enderror" name="gelar_depan"
                             value="{{ old('gelar_depan',$pegawai->gelar_depan) }}">
                            @error('gelar_depan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="gelar_belakang">Gelar Belakang:</label>
                            <input type="text" id="gelar_belakang" class="form-control @error('gelar_belakang') is-invalid @enderror" name="gelar_belakang"
                                 value="{{ old('gelar_belakang',$pegawai->gelar_belakang) }}">
                            @error('gelar_belakang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="nip_lama">NIP Lama:</label>
                            <input type="text" id="nip_lama" class="form-control @error('nip_lama') is-invalid @enderror"
                                name="nip_lama" required value="{{ old('nip_lama',$pegawai->nip_lama) }}">
                            @error('nip_lama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="nip_baru">NIP Baru:</label>
                            <input type="text" id="nip_baru" class="form-control @error('nip_baru') is-invalid @enderror"
                                name="nip_baru" required value="{{ old('nip_baru',$pegawai->nip_baru) }}">
                            @error('nip_baru')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="golongan_id">Pangkat Golongan:</label>
                            <select id="golongan_id" class="form-control select2bs4" name="golongan_id" required>
                                <option value="" disabled>Pilih Pangkat Golongan</option>
                                @foreach ($golongans as $golongan)
                                    <option {{ old('golongan_id',$pegawai->golongan->id) == $golongan->id ? "selected" : "" }} value="{{ $golongan->id }}">
                                        {{ $golongan->pangkat }} - {{ $golongan->golongan }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="jabatan_id">Jabatan:</label>
                            <select id="jabatan_id" class="form-control select2bs4" name="jabatan_id" required>
                                <option value="" disabled>Pilih Jabatan</option>
                                @foreach ($jabatans as $jabatan)
                                    <option {{ old('jabatan_id',$pegawai->jabatan->id) == $jabatan->id ? "selected" : "" }} value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="satker_id">Satuan Kerja:</label>
                            <select id="satker_id" class="form-control select2bs4" name="satker_id" required>
                                <option value="" disabled>Pilih Satker</option>
                                @foreach ($satkers as $satker)
                                    <option {{ old('satker_id',$pegawai->satker->id) == $satker->id ? "selected" : "" }} value="{{ $satker->id }}">{{ $satker->nama }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="atasan_id">Atasan Langsung:</label>
                            <select id="atasan_id" class="form-control select2bs4" name="atasan_id" required>
                                <option value="" disabled>Pilih Atasan</option>
                                @foreach ($strukturals as $struktural)
                                    <option {{ old('atasan_id',$pegawai->atasan->id) == $struktural->id ? "selected" : "" }} value="{{ $struktural->id }}">{{ $struktural->nama }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="status">Status Pegawai:</label>
                            <select id="status" class="form-control select2bs4" name="status" required>
                                <option value="" disabled>Pilih Status</option>
                                <option value="Aktif" {{ old('status',$pegawai->status) == 'Aktif' ? "selected" : "" }}>Aktif</option>
                                <option value="TB" {{ old('status',$pegawai->status) == 'TB' ? "selected" : "" }} >Tugas Belajar</option>
                                <option value="Pindah" {{ old('status',$pegawai->status) == 'Pindah' ? "selected" : "" }}>Pindah</option>
                            </select>
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
                format: 'DD/MM/YYYY'
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
