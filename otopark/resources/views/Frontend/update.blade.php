<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
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
    <!-- endinject -->
    <link rel="shortcut icon" href="/resources/images/favicon.png" />
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
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('exit')}}">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">Exit</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="col-md-5"></div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update form</h4>
                                @foreach($post as $key)
                                    <form class="forms-sample" action="{{route('updatepost')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$key->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Surname</label>
                                            <input type="text" class="form-control" name="surname" value="{{$key->surname}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{$key->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" name="email" value="{{$key->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email Verify</label>
                                            <input type="text" class="form-control" name="email_verify" value="{{$key->email_verify}}">
                                        </div>
                                        <div align="right">
                                            <button type="submit" class="btn btn-dark mr-2">Save</button>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/resources/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
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

