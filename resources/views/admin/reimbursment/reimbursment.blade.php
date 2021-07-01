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
	                    		<h2>Reimbursment</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive table-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Batchid</th>
									<th>Reffno</th>
									<th>Received</th>
									<th>Close</th>
									<th>Paid</th>
									<th>status</th>                  
									<th>Process</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($reimbursment as $r)
		                    		<?php 
		                    			if ($r->providercd == "1000") {
		                    				$batchname = $r->providernm.' '.$r->clientname;
		                    			}else{
		                    				$batchname = $r->providernm;
		                    			}
		                    			$closedt = substr($r->closedt,0, 10);
		                    			$paiddt = substr($r->receivedt,0, 10);
		                    		?>

									<tr>
										<td>{{$r->batchid}}</td>
										<td>{{$r->refno}}</td>
										<td>{{$r->receivedt}}</td>
										<td>{{$closedt}}</td>
										<td>{{$paiddt}}</td>
										<td>{{$r->msdesc}}</td>
										<th>
											<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('{{ $r->batchid }}')"><i class="fa fa-search"></i> Detail</button>
					                        <script>
					                            function klik(batchid){
					                              	window.location = "{{ url('/reimbursmentdetail') }}"+"/"+batchid;
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