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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/resources/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/resources/images/logo-mini.svg"/>
</head>

<body>
@yield('content')
<script src="/resources/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="/resources/js/off-canvas.js"></script>
<script src="/resources/js/hoverable-collapse.js"></script>
<script src="/resources/js/template.js"></script>
<script src="/resources/js/settings.js"></script>
<script src="/resources/js/todolist.js"></script>
@include('sweetalert::alert')
</body>
</html>
