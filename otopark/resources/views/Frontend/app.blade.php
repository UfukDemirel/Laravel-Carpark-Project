<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Otopark</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/resources/vendors/feather/feather.css">
    <link rel="stylesheet" href="/resources/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/resources/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/resources/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/resources/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/resources/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/resources/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="shortcut icon" href="/resources/images/logo-mini.svg" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="{{route('home')}}"><img src="/resources/images/logo.svg" class="mr-2" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="/resources/images/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    @if(Auth::user()->file)
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="/public/images/{{\Illuminate\Support\Facades\Auth::user()->file}}" alt="profile"/>
                    </a>
                    @endif
                </li>
                <li class="nav-item nav-settings d-none d-lg-flex">
                    <a class="nav-link" href="#">
                        <i class="icon-ellipsis"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">Settings</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Profile File">
                                <a href="{{route('dropzone')}}"><button type="submit" class="btn btn-dark" >Go</button></a>
                            </div>
                    </div>
                    <div class="add-items d-flex px-3 mb-0">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control todo-list-input" placeholder="Logout">
                            <a href="{{route('exit')}}"><button type="submit" class="btn btn-dark">Exit</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Parking Operations</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('empty')}}">Empty Parking</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('full')}}">Full Parking</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
      @yield('content')
    </div>
</div>
<script src="/resources/vendors/js/vendor.bundle.base.js"></script>
<script src="/script.js"></script>
<script src="/resources/vendors/chart.js/Chart.min.js"></script>
<script src="/resources/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="/resources/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="/resources/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="/resources/js/off-canvas.js"></script>
<script src="/resources/js/hoverable-collapse.js"></script>
<script src="/resources/js/template.js"></script>
<script src="/resources/js/settings.js"></script>
<script src="/resources/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="/resources/js/dashboard.js"></script>
<script src="/resources/js/Chart.roundedBarCharts.js"></script>
@include('sweetalert::alert')
</body>
</html>

