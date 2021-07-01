@extends('template.app_admin')

@section('content_dashboard')

<body class="nav-md">
    <div class="container body">
      <div class="main_container">


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div class="clearfix"></div>
		<!--begin slidder --->



		<div class="container">
		 
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			  <div class="item active">
				<img src="{{ url('assets/slider1.jpg') }}" alt="slider1" style="width:100%;">
			  </div>

			  <div class="item">
				<img src="{{ url('assets/slider2.jpg') }}" alt="slider2" style="width:100%;">
			  </div>
			
			  <div class="item">
				<img src="{{ url('assets/slider3.jpg') }}" alt="slider3" style="width:100%;">
			  </div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>
		</div>
		<!----end slidder --->
                  </div>
	<div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <div class="count">{{ number_format($member,0) }}</div>
        <h3>Member</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa fa-file-text-o"></i></div>
        <div class="count">{{ number_format($spaid,0) }}</div>
        <h3>Claim Paid</h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-check-square-o"></i></div>
        <div class="count">{{ number_format($saccept,0) }}</div>
        <h3>Claim Accept  </h3>
        <p></p>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-edge"></i></div>
        <div class="count">{{ number_format($sexcess,0) }}</div>
        <h3>Excess Claim</h3>
        <p></p>
      </div>
    </div>
  </div>

  <div class="x_content">
    <a href="{{ url('/')}}" class="btn btn-app">
      <i class="fa fa-home"></i> Home
    </a>
    <a href="{{ url('/profile')}}" class="btn btn-app">
      <i class="fa fa-user"></i> Profile  
    </a>
    <a href="{{ url('/member')}}" class="btn btn-app">
      <i class="fa fa-users"></i> Member   
    </a>
    <a href="{{ url('/claim')}}"  class="btn btn-app">
      <i class="fa fa-stethoscope"></i> Claim  
    </a>
    <a href="{{ url('/reimbursment')}}" class="btn btn-app">
      <i class="fa fa-medkit"></i> Reimbursment
    </a>
		<a href="{{ url('/provider')}}"  class="btn btn-app">
      <i class="fa fa-hospital-o"></i> Provider
    </a>
		<a href="{{ url('/report')}}"  class="btn btn-app">
      <i class="fa fa-clipboard"></i> Report
    </a>
		<a href="{{ url('/dashboard')}}"  class="btn btn-app">
      <i class="fa fa-clipboard"></i> Dashboard
    </a>
                
  <!-- /page content -->
      <!-- footer content -->
      <footer>
        <div class="pull-right"> <a href="https://digisiap.com"> digisiap.com</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>


    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>

@endsection