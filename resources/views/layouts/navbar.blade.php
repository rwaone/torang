<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">{{ session()->get('tahun') }}</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{-- <i class="far fa-calendar-alt"></i> --}}
                {{ session()->get('tahun') }}
            </a>
            <ul class="dropdown-menu">
                <span class="dropdown-item dropdown-header">Tahun</span>

                {{-- @foreach ($daftar_tahun as $tahun)
                    <div class="dropdown-divider dropdown-menu-right"></div>
                    <a href="#" class="dropdown-item dropdown-header">
                        {{$tahun}}
                    </a>
                    {{-- <a href="#" class="dropdown-item">
                      <i class="fas fa-envelope mr-2"></i> 4 new messages
                      <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                @endforeach --}}
                
                </ul>
        </li>
        <!-- Navbar Search -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}

        <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link" style="background-color: transparent; border: none">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                </button>
            </form>
        </li>
    </ul>
</nav>
