<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php $setting =\App\Setting::pluck('value','name')->toArray(); @endphp
    @include('admin.partials._head')
    <style>
        thead > tr > th {
            color: black;
        }

        tbody > tr > td {
            color: black;
            font-weight: 400;
        }

        #side-menu > li > a.active {
            background-color: orange;
        }

        #side-menu li a {
            color: aliceblue;
        }

        .bg-title {
            background: orange !important;
            border-bottom: 1px solid rgba(120, 130, 140, .13);
        }

        h4.page-title {
            color: #ffffff;
        }

        .bg-title .breadcrumb a {
            color: #FFF;
        }

        .bg-title .breadcrumb .active {
            color: #000000;
        }

        .white-box .box-title{
            color: orange;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
            border: 1px solid orange;
            background-color: orange;
        }

        button.btn.btn-success {
            background-color: orange;
            border-color: orange;
        }
        a.btn.btn-success {
            background-color: orange;
            border-color: orange;
        }
        .footer{
            background-color: #ff8800;
            color: #fff;
        }
    </style>
</head>
<body class="fix-header">
@include('admin.partials._pre_loader')
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
@include('admin.partials._nav_bar')
<!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
@include('admin.partials._side_bar')
<!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
    @yield('content')
    <!-- /.container-fluid -->
        @include('admin.partials._footer')
    </div>
    <!-- /#page-wrapper -->
</div>
@include('admin.partials._scripts')
</body>

</html>
