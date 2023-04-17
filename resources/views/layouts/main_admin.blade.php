<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LetteR</title>
    @include('profile.partials.link_head')


</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
                    <!-- Sidebar -->
        @include('profile.partials.sidebar_admin')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                        <!-- Topbar -->
        @include('profile.partials.topnav_admin')
        <!-- End of Topbar -->

                        @yield('isi_admin')
            </div><br>
                <!-- Footer -->
                @include('profile.partials.footer')
        </div>
    </div>
@include('profile.partials.script_js')
    
</body>
</html>
    