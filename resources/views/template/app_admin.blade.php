<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ url('assets/images/faicon.ico') }}" type="image/ico" />

        <title>DIGISIAP </title>
        <!-- Bootstrap -->
        <link href="{{ url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ url('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ url('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{ url('assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
        
        <!-- bootstrap-progressbar -->
        <link href="{{ url('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{ url('assets/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{ url('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ url('assets/build/css/custom.min.css') }}" rel="stylesheet">
    </head>


    <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/') }}" class="site_title"><img src="{{ url('assets/images/logo.png')}}" style='width:50;height:50px;'></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
				<h2 align="center"><img src="{{ url('assets/images/img.jpg') }}" height="50" width="50" class="img-circle" alt="User Image"><h2>
              </div>
              <div class="profile_info">
				<span>Welcome,</span>
                <span></span>
                <h2>id User</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
					<li><a href="{{ url('/')}}"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="{{ url('/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li><a href="{{ url('/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
					<li><a href="{{ url('/ajuan')}}"><i class="fa fa-users"></i> Ajuan</a></li>
					<li><a href="{{ url('/validasi')}}"><i class="fa fa-medkit"></i> Validasi</a></li>
					<li><a href="{{ url('/verifikasi')}}"><i class="fa fa-medkit"></i> Verifikasi</a></li>
					<li><a href="{{ url('/inquiry')}}"><i class="fa fa-hospital-o"></i> Inquiry</a></li>
					<li><a href="{{ url('/report')}}"><i class="fa fa-file-text"></i> Report</a></li>
					<li><a><i class="fa fa-desktop"></i> Klaim <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					<li><a href="{{ url('/klaim')}}"><i class="fa fa-hospital-o"></i> Klaim</a></li>
					<li><a href="{{ url('/batal')}}"><i class="fa fa-hospital-o"></i> Batal</a></li>
					</ul>
					<li><a><i class="fa fa-desktop"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/cabang')}}">Cabang</a></li>
                      <li><a href="{{ url('/mitra')}}">Mitra</a></li>
                      <li><a href="{{ url('/klien')}}">Klien</a></li>
                      <li><a href="{{ url('/user')}}">User</a></li>
                      <li><a href="{{ url('/tarif')}}">Rate</a></li>
                      <li><a href="{{ url('/tc')}}">TC</a></li>
					  <li><a href="{{ url('/medical')}}">Medical</a></li>
					  <li><a href="{{ url('/asuransi')}}">Asuransi</a></li>
                      
                    </ul>
					<li><a><i class="fa fa-desktop"></i> Maintenance <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
					<li><a href="{{ url('/bayar')}}"><i class="fa fa-hospital-o"></i> Bayar</a></li>
					<li><a href="{{ url('/bordero')}}"><i class="fa fa-hospital-o"></i> Bordero</a></li>
					<li><a href="{{ url('/revisi')}}"><i class="fa fa-hospital-o"></i> Revisi</a></li>
					<li><a href="{{ url('/rollback')}}"><i class="fa fa-hospital-o"></i> Rollback</a></li>
					<li><a href="{{ url('/notif')}}"><i class="fa fa-hospital-o"></i> Notification</a></li>
					<li><a href="{{ url('/billing')}}"><i class="fa fa-hospital-o"></i> Billing</a></li>
					</ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
			
			
		
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ url('assets/images/img.jpg') }}" alt="">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ url('assets/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ url('assets/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->
                    @yield('content_dashboard')
          </div>
        </div>
        <!-- jQuery -->
        <script src="{{ url('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ url('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
        <!-- NProgress -->
        <script src="{{ url('assets/vendors/nprogress/nprogress.js') }}"></script>
        <!-- Chart.js -->
        <script src="{{ url('assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ url('assets/vendors/Chart.js/dist/Chart.bundle.js') }}"></script>

        <!-- gauge.js -->
        <script src="{{ url('assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{ url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ url('assets/vendors/iCheck/icheck.min.js') }}"></script>
        <!-- Skycons -->
        <script src="{{ url('assets/vendors/skycons/skycons.js') }}"></script>
        <!-- Flot -->
        <script src="{{ url('assets/vendors/Flot/jquery.flot.js') }}"></script>
        <script src="{{ url('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ url('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
        <script src="{{ url('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ url('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
        <!-- Flot plugins -->
        <script src="{{ url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
        <script src="{{ url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
        <script src="{{ url('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
        <!-- DateJS -->
        <script src="{{ url('assets/vendors/DateJS/build/date.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ url('assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
        <script src="{{ url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{ url('assets/vendors/moment/min/moment.min.js') }}"></script>
        <script src="{{ url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <!-- Custom Theme Scripts -->
        <script src="{{ url('assets/build/js/custom.min.js') }}"></script>
        
        <!-- Datatables -->
        <link href="{{ url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="') }}stylesheet">
        <link href="{{ url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="') }}stylesheet">
        <link href="{{ url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="') }}stylesheet">
        <link href="{{ url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="') }}stylesheet">
        <link href="{{ url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="') }}stylesheet">
        
        <!-- Datatables -->
        <script src="{{ url('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
        <script src="{{ url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
        <script src="{{ url('assets/vendors/jszip/dist/jszip.min.js') }}"></script>
        <script src="{{ url('assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ url('assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    </body>
</html>