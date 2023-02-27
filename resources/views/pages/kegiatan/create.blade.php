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
                            <label>Tanggal</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text"
                                    class="form-control datetimepicker-input  @error('tanggal') is-invalid @enderror"
                                    data-target="#reservationdate" data-toggle="datetimepicker" name="tanggal"
                                    value="{{ old('tanggal') }}" autocomplete="off" required>
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
                                name="nama" value="{{ old('nama') }}" required>
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
                                <option {{ old('kriteria') == 'Utama' ? 'selected' : '' }} value="Utama">Utama</option>
                                <option {{ old('kriteria') == 'Tambahan' ? 'selected' : '' }} value="Tambahan">Tambahan</option>
                                <option {{ old('kriteria') == 'Inovasi' ? 'selected' : '' }} value="Inovasi">Inovasi</option>
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
                            <label class="control-label" for="timkerja_id">Pemberi Tugas</label>
                            <select id="timkerja_id" class="form-control select2bs4" name="timkerja_id" required>
                                <option value="" selected disabled>Pilih Pemberi Tugas</option>
                                <option value="">Atasan Langsung</option>
                                @foreach ($timkerjas as $timkerja)
                                    <option {{ old('timkerja_id') == $timkerja->ketua_id ? 'selected' : '' }}
                                        value="{{ $timkerja->ketua_id }}">{{ $timkerja->nama }}</option>
                                @endforeach
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="lokasi">Lokasi Kegiatan</label>
                            <input type="text" id="lokasi" class="form-control  @error('lokasi') is-invalid @enderror"
                                name="lokasi" value="{{ old('lokasi') }}" required>
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
                                name="target" value="{{ old('target') }}" required>
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
                                    <option {{ old('satuan_id') == $satuan->id ? 'selected' : '' }}
                                        value="{{ $satuan->id }}">{{ $satuan->nama }}</option>
                                @endforeach
                            </select>

                            <div class="help-block"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="realisasi">Realisasi</label>
                            <input type="text" id="realisasi" class="form-control @error('realisasi') is-invalid @enderror"
                                name="realisasi" value="{{ old('realisasi') }}" required>
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
                                required> {{ old('keterangan') }} </textarea>
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
