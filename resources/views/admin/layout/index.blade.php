<!DOCTYPE html>
<html lang="en" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <base href="{{ asset('') }}">
    <title>Sagophone - Admin</title>
    <link rel="apple-touch-icon" sizes="60x60" href="admin_asset/app-assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="admin_asset/app-assets/img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="admin_asset/app-assets/img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="admin_asset/app-assets/img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="admin_asset/app-assets/img/ico/sago.ico">
    <link rel="shortcut icon" type="image/png" href="admin_asset/app-assets/img/ico/sago-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="admin_asset/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/app-assets/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/app-assets/vendors/css/tables/datatable/datatables.min.css">

    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="admin_asset/app-assets/css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper nav-collapsed menu-collapsed">


      <!-- main menu-->
      @include('admin.layout.menu')
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
      @include('admin.layout.header')
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--Statistics cards Starts-->

        @yield('content')

          </div>
        </div>

        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2019 <a href="#" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">Sagophone </a>, Xây dựng website bán điện thoại di động<br> LÊ GIA QUÂN <a><i class="ft-github" ></i></a>NGUYỄN MINH TRƯỜNG </span></p>
        </footer>

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- END Notification Sidebar-->
    <!-- BEGIN VENDOR JS-->
    <script src="admin_asset/app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="admin_asset/app-assets/vendors/js/chartist.min.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="admin_asset/app-assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="admin_asset/app-assets/js/dashboard1.js" type="text/javascript"></script>
    <script src="admin_asset/app-assets/js/data-tables/datatable-basic.js" type="text/javascript"></script>

    <script language="javascript" src="admin_asset/ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script>
      function quayve(){
          history.back();
      }
    </script>
  </body>
</html>