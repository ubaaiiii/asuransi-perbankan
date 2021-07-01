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
	                    		<h2>Claim Enquiry</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive table-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Process</th>
									<th>Code</th>
									<th>Provider </th>
									<th>Address </th>
									<th>City </th>                      
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($provider as  $p)
									<tr>
										<td>{{ $p->providercd }}</td>
										<td>{{ $p->providernm }}</td>
										<td>{{ $p->address1 }}</td>
										<td>{{ $p->citynm }}</td>
										<th>
											<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('{{ $p->providercd }}')"><i class="fa fa-search"></i> Detail</button>
					                        <script>
					                            function klik(providercd){
					                              	window.location = "{{ url('/providerdetail') }}"+"/"+providercd;
					                            }
					                        </script>
										</th>
									</tr>
		                    	@endforeach
	                      	</tbody>
	                    </table>
					
					
        </div>
		<!----end page content----->

        <!-- footer content -->
        <footer>
          <div class="pull-right"> <a href="https://plninsurance.co.id"> Asuransi Tugu Kresna Pratama</a>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

 
  </body>
@endsection