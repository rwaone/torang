<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="{{url('/profile')}}">
            <div class="image">
                <img src="{{ asset('storage/' . auth()->user()->pegawai->foto) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info text-truncate">
                <a href="{{url('/profile')}}" class="d-block">{{ auth()->user()->pegawai->nama }}</a>
            </div>
        </a>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/" class="nav-link {{ $title === 'Dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="../calendar.html" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Calendar
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
            </li> --}}
            <li class="nav-item {{ $menu === 'Kegiatan' ? 'menu-open' : '' }}">
                <a href="" class="nav-link {{ $menu === 'Kegiatan' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Kegiatan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/kegiatan/create"
                            class="nav-link {{ $title === 'Tambah Kegiatan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Kegiatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kegiatan" class="nav-link {{ $title === 'Data Kegiatan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Kegiatan</p>
                        </a>
                    </li>
                    @can('ketua')
                        <li class="nav-item">
                            <a href="/kegiatan/alokasi"
                                class="nav-link {{ $title === 'Alokasi Kegiatan' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Alokasi Kegiatan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kegiatan/penilaian"
                                class="nav-link {{ $title === 'Penilaian Kegiatan' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Penilaian Kegiatan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kegiatan/timkerja"
                                class="nav-link {{ $title === 'Kegiatan Tim Kerja' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Kegiatan Tim Kerja
                                </p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            <li class="nav-item {{ $menu === 'CKP' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $menu === 'CKP' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Kinerja Bulanan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/ckp/show/" class="nav-link  {{ $title === 'CKP' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CKP</p>
                        </a>
                    </li>
                    @can('struktural')
                        <li class="nav-item">
                            <a href="/ckp/daftarApprove" class="nav-link {{ $title === 'Approve CKP' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approve CKP</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            <li class="nav-item {{ $menu === 'SKP' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $menu === 'SKP' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Kinerja Tahunan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/skp') }}" class="nav-link {{ $title === 'Rencana Kinerja' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rencana Kinerja</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/skp/penilaian') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Penilaian SKP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/skp/data')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SKP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../charts/flot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Approve SKP</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ $menu === 'Rekapitulasi' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $menu === 'Rekapitulasi' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Rekapitulasi
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/rekap/kegiatan/')}}"
                            class="nav-link {{ $title === 'Kegiatan Pegawai' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kegiatan Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/rekap/harian/')}}"
                            class="nav-link {{ $title === 'Kegiatan Harian' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kegiatan Harian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/rekap/ckp/')}}"
                            class="nav-link {{ $title === 'Rekap CKP' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CKP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/rekap/skp/')}}"
                            class="nav-link {{ $title === 'SKP' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SKP</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ $menu === 'SDM' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $menu === 'SDM' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        SDM
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/pegawai" class="nav-link {{ $title === 'Daftar Pegawai' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/timkerja" class="nav-link {{ $title === 'Tim Kerja' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tim Kerja</p>
                        </a>
                    </li>
                </ul>
            </li>
            @can('admin')
                <li class="nav-header">Pengaturan</li>
                <li class="nav-item">
                    <a href="/user" class="nav-link" {{ $title === 'User' ? 'active' : '' }}>
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="../kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Kanban Board
                        </p>
                    </a>
                </li> --}}
            @endcan

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
