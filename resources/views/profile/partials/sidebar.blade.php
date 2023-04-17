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

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::path() === 'dashboard' ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main
            </div>
            <!-- Pages Form Pengajuan -->
            <li class="nav-item {{ Request::path() === 'form-survey' ? 'active' : ''}} {{ Request::path() === 'form-izin' ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    <span>Formulir Pengajuan</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Formulir Components:</h6>
                        <a class="collapse-item {{ Request::path() === 'form-survey' ? 'active' : ''}}" href="{{ route('form_survey') }}">Pengajuan Survey</a>
                        <a class="collapse-item {{ Request::path() === 'form-izin' ? 'active' : ''}}" href="{{ route('form_izin') }}">Pengajuan Surat Izin</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse History -->
            <li class="nav-item {{ Request::path() === 'status-survey' ? 'active' : ''}} {{ Request::path() === 'status-izin' ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                    <span>Status Pengajuan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Status Components:</h6>
                        <a class="collapse-item {{ Request::path() === 'status-survey' ? 'active' : ''}}" href="{{ route('status_survey') }}">Pengajuan Survey</a>
                        <a class="collapse-item {{ Request::path() === 'status-izin' ? 'active' : ''}}" href="{{ route('status_izin') }}">Pengajuan Surat Izin</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ Request::path() === 'history-survey' ? 'active' : ''}} {{ Request::path() === 'history-izin' ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-history" aria-hidden="true"></i>
                    <span>History Pengajuan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">History Components:</h6>
                        <a class="collapse-item {{ Request::path() === 'history-survey' ? 'active' : ''}}" href="{{ route('history_survey') }}">Pengajuan Survey</a>
                        <a class="collapse-item {{ Request::path() === 'history-izin' ? 'active' : ''}}" href="{{ route('history_izin') }}">Pengajuan Surat Izin</a>
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
            <li class="nav-item {{ Request::path() === 'profile' ? 'active' : ''}}">
                <a class="nav-link collapsed" href="{{ route('profile') }}">
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