@extends('layouts.main')

@section('head')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('container')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-reponsive">
                    <form action="/kegiatan" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="pk">Sasaran Kinerja Atasan</label>
                            <select id="pk" class="form-control select2bs4" name="pk" required>
                                <option value="" selected disabled>Pilih Sasaran Kinerja Atasan</option>
                                @foreach ($perjanjiankinerjas as $pk)
                                    <option {{ old('pk') == $pk->id ? 'selected' : '' }} value="{{ $pk->id }}">
                                        {{ $pk->sasaran }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="kinerja">Rencana Kinerja</label>
                            <input type="text" id="kinerja" class="form-control @error('kinerja') is-invalid @enderror"
                                name="kinerja" value="{{ old('kinerja') }}" placeholder="Rencana Kinerja Pegawai" required>
                            @error('kinerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="aspek">Aspek</label>
                            <select id="aspek" class="form-control select2bs4" name="aspek" required>
                                <option value="" selected disabled>Pilih Aspek</option>
                                <option {{ old('aspek') == 'Kuantitas' ? 'selected' : '' }} value="Kuantitas">Kuantitas</option>
                                <option {{ old('aspek') == 'Kualitas' ? 'selected' : '' }} value="Kualitasi">Kualitas
                                </option>
                                <option {{ old('aspek') == 'Waktu' ? 'selected' : '' }} value="Waktu">Waktu</option>
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="kriteria">Kriteria</label>
                            <select id="kriteria" class="form-control select2bs4" name="kriteria" required>
                                <option value="" selected disabled>Pilih Kriteria</option>
                                <option {{ old('kriteria') == 'Utama' ? 'selected' : '' }} value="Utama">Utama</option>
                                <option {{ old('kriteria') == 'Tambahan' ? 'selected' : '' }} value="Tambahan">Tambahan
                                </option>
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="butir_id">Jenis/Butir Kegiatan</label>
                            <select id="butir_id" class="form-control select2bs4" name="butir_id" required>
                                <option value="" selected disabled>Pilih Jenis Kegiatan</option>
                                @foreach ($butirs as $butir)
                                    <option {{ old('butir_id') == $butir->id ? 'selected' : '' }}
                                        value="{{ $butir->id }}">{{ $butir->keterangan }}</option>
                                @endforeach
                                <option {{ old('butir_id') == 1 ? 'selected' : '' }} value="1">Lainnya</option>
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="target_min">Target Minimal</label>
                            <input type="text" id="target_min" class="form-control @error('target') is-invalid @enderror"
                                name="target_min" value="{{ old('target_min') }}" required>
                            @error('target_min')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="target_max">Target Maksimal</label>
                            <input type="text" id="target_max" class="form-control @error('target') is-invalid @enderror"
                                name="target_max" value="{{ old('target_max') }}" required>
                            @error('target_max')
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
                                    <option {{ old('satuan_id') == $satuan->id ? 'selected' : '' }}
                                        value="{{ $satuan->id }}">{{ $satuan->nama }}</option>
                                @endforeach
                            </select>

                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="realisasi">Realisasi</label>
                            <input type="text" id="realisasi"
                                class="form-control @error('realisasi') is-invalid @enderror" name="realisasi"
                                value="{{ old('realisasi') }}" required>
                            @error('realisasi')
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
    <!-- InputMask -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
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
        });
    </script>
@endsection
