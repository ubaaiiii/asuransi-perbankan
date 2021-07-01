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
	                    		<h2>Member Enquiry</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive table-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Policyno</th>
									<th>memberno</th>
									<th>Name</th>
									<th>Sex </th>
									<th>DOB </th>
									<th>Effective</th>
									<th>Expired</th>
									<th>Status</th>	                         
									<th>Process</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($members as $member)
								<tr>
									<td>{{ $member->policyno}}</td>
									<td>{{ $member->memberno}}</td>
									<td>{{ $member->membername}}</td>
									<td>{{ $member->sex}}</td>
									<td>{{ date($member->dob)}}</td>
									<td>{{ date($member->effdt)}}</td>
									<td>
									<?php if(isset($member->expdt)){ 
										echo date($member->expdt); 
									}else{ 
										echo "-"; 
									}   ?></td>
									<td>{{ $member->statmem}}</td>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('<?= $member->policyno.$member->memberno ?>')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(key){
											  	window.location = "{{ url('/memberdetail') }}"+"/"+key;
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