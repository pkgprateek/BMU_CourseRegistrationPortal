<!DOCTYPE html>
<html>
<head>

  @include('partials._head')

</head>

<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    @include('partials._nav')
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('partials._sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
{{--     <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section> --}}

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('partials._footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
@include('partials._scripts')
@yield('scripts')

</body>
</html>