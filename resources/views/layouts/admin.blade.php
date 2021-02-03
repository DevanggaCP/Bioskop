<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Movie Indo xxi
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('backend/demo/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="">
  <div class="wrapper ">

    @include('layouts/components/backend/sidebar')

    <div class="main-panel">

    @include('layouts/components/backend/navbar')

      <div class="content">

        @yield('content')

      </div>

      @include('layouts/components/backend/footer')

    </div>
  </div>
 <!--   Core JS Files   -->
 <script src="{{ asset('backend/js/core/jquery.min.js') }}"></script>
 <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
 <script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
 <!-- Chart JS -->
 <script src="{{ asset('backend/js/plugins/chartjs.min.js') }}"></script>
 <!--  Notifications Plugin    -->
 <script src="{{ asset('backend/js/plugins/bootstrap-notify.js') }}"></script>
 <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
 <script src="https://demos.creative-tim.com/paper-dashboard-2-pro/assets/js/plugins/jquery.dataTables.min.js"></script>
 <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="{{ asset('backend/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
 <script src="{{ asset('backend/demo/demo.js') }}"></script>
 <script>
   $(document).ready(function() {
     // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
     demo.initChartsPages();
   });
 </script>
</body>
</html>