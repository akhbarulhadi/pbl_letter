       <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar"><br>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="img/LetteR2.png" alt="" class="img-fluid rounded-circle" id="logo">
                </div>
                <div class="sidebar-brand-text mx-3"><sup></sup></div>
            </a>
                <br><br><br><br>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard 
            <li class="nav-item {{ Request::path() === 'dashboard-admin' ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('dashboard_admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main
            </div>
            <!-- Pages Form Pengajuan -->
            <li class="nav-item {{ Request::path() === 'verifikasi-survey-admin' ? 'active' : ''}} {{ Request::path() === 'verifikasi-izin-admin' ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <span>Verifikasi Pengajuan</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Verifikasi Components:</h6>
                        <a class="collapse-item {{ Request::path() === 'verifikasi-survey-admin' ? 'active' : ''}}" href="{{ route('verifikasi_survey') }}">Pengajuan Survey</a>
                        <a class="collapse-item {{ Request::path() === 'verifikasi-izin-admin' ? 'active' : ''}}" href="{{ route('verifikasi_izin') }}">Pengajuan Surat Izin</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ Request::path() === 'history-survey-admin' ? 'active' : ''}} {{ Request::path() === 'history-izin-admin' ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-history" aria-hidden="true"></i>
                    <span>History Verifikasi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">History Components:</h6>
                        <a class="collapse-item {{ Request::path() === 'history-survey-admin' ? 'active' : ''}}" href="{{ route('history_survey_admin') }}">History Survey</a>
                        <a class="collapse-item {{ Request::path() === 'history-izin-admin' ? 'active' : ''}}" href="{{ route('history_izin_admin') }}">History Surat Izin</a>
                    </div>
                </div>
            </li>
            <!-- Pages Cetak Laporan -->
            <li class="nav-item {{ Request::path() === 'laporan-survey-admin' ? 'active' : ''}} {{ Request::path() === 'laporan-izin-admin' ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThe"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <span>Cetak Laporan</span>
                </a>
                <div id="collapseThe" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan Components:</h6>
                        <a class="collapse-item {{ Request::path() === 'laporan-survey-admin' ? 'active' : ''}}" href="{{ route('laporan_survey') }}">Laporan Survey</a>
                        <a class="collapse-item {{ Request::path() === 'laporan-izin-admin' ? 'active' : ''}}" href="{{ route('laporan_izin') }}">laporan Surat Izin</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Account
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ Request::path() === 'profile-admin' ? 'active' : ''}}">
                <a class="nav-link collapsed" href="{{ route('profile_admin') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           
        </ul>
