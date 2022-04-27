<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@include('_partials._dashboard_customer._head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('_partials._dashboard_customer._navbar')

<!-- Main Sidebar Container -->
@include('_partials._dashboard_customer._sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('_partials._dashboard_customer._footer')

