@extends('template.app_admin')

@section('content_dashboard')

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>

	            <div class="row">
	              	<div class="col-md-12 col-sm-12 col-xs-12">
	                	<div class="x_panel">
	                  		<div class="x_title">
	                    		<h2>Log History</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  		<table id="datalog" class="table table-striped" cellspacing="0" width="100%">
							<thead>
	                        	<tr>
									<th>Status</th>
									<th>Tanggal</th>
									<th>Nama </th>                    
									<th>Keterangan </th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($logdets as $logdet)
								<tr>

									<td>{{ $logdet->stlog}}</td>
									<td>{{ $logdet->createdt}}</td>
									<td>{{ $logdet->nama}}</td>
									<td>{{ $logdet->comment}}</td>

									
								</tr>
								@endforeach
	                      	</tbody>
	                    </table>	
        			</div>
					<a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>

		<!----end page content----->

        <!-- footer content -->
        <footer>
          <div class="pull-right"> <a href="https://digisiap.com"> digisiap.com</a>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

 
  </body>
@endsection