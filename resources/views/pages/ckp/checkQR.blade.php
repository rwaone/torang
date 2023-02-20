<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TORANG | {{ $title }} </title>
    <link rel="icon" href="{{ asset('logo/logo-torang.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('logo/logo-torang-small.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">TORANG BISA</span>
                </a>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">


                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        @auth

                        <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="background-color: transparent; border: none">
                                Log Out &nbsp<i class="nav-icon fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/login') }}">
                                    Log In &nbsp<i class="fas fa-sign-in-alt"></i>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> --}}
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/ckp/show') }}">CKP</a></li>
                                <li class="breadcrumb-item active">Check QRCode</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($title == 'Check QRCode Pegawai')
                            <div class="callout alert-success alert-dismissible">
                                <h5><i class="icon fas fa-check"></i>&nbsp Disetujui</h5>
                                CKP Telah disetujui oleh pegawai {{ $ckp->pegawai->nama }} pada
                                {{ $ckp->submitted_at }} melalui Aplikasi Torang Bisa.
                            </div>
                                
                            @else
                            <div class="callout alert-success alert-dismissible">
                                <h5><i class="icon fas fa-check"></i>&nbsp Disetujui</h5>
                                CKP Telah disetujui oleh {{ $ckp->pegawai->atasan->nama }} selaku atasan pegawai pada
                                {{ $ckp->submitted_at }} melalui Aplikasi Torang Bisa.
                            </div>
                                
                            @endif
                            <div class="card card-outline">
                                <div class="card-body p-0">
                                    <table class="table">
                                        {{-- <thead>
                                            <tr>
                                                <th >#</th>
                                                <th>Task</th>
                                            </tr>
                                        </thead> --}}
                                        <tbody>
                                            <tr>
                                                <td><b>Keterangan CKP</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%">Nama</td>
                                                <td>: {{ $ckp->pegawai->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%">Bulan</td>
                                                <td>: {{ $ckp->bulan }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%">Tahun</td>
                                                <td>: {{ $ckp->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%">Disetujui Pegawai</td>
                                                <td>
                                                    @if (isset($ckp->is_submitted))
                                                    : <div class="badge badge-success text-wrap"><i class="fas fa-check"></i> Sudah</div>
                                                    @else
                                                    : <div class="badge badge-warning text-wrap"><i class="fas fa-info"></i> Belum</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%">Disetujui Atasan Pegawai</td>
                                                <td>
                                                    @if (isset($ckp->is_approved))
                                                    : <div class="badge badge-success text-wrap"><i class="fas fa-check"></i> Sudah</div>
                                                    @else
                                                    : <div class="badge badge-warning text-wrap"><i class="fas fa-info"></i> Belum</div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{url('ckp/export/pdf/'.$ckp->bulan.'/'.$ckp->pegawai->id)}}" target="_blank" class="btn btn-primary float-right"><i class="fas fa-download"></i> Download PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>
