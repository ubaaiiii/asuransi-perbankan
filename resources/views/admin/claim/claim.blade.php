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
					  					
						<table id="datatable" class="table table-striped table-bordered">
	                      	<thead>
	                        	<tr>
									<th>Policyno </th>
									<th>Memberno</th>
									<th>Name</th>
									<th>Sex</th>
									<th>DOB</th>
									<th>Effective</th>
									<th>Claim</th>
									<th>Accept</th>     	
									<th>Process</th>   
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($claim as $c)
								<tr>
									<td>{{ $c->policyno}}</td>
									<td>{{ $c->memberno}}</td>
									<td>{{ $c->membername}}</td>
									<td>{{ $c->sex}}</td>
									<td>{{ $c->sdob}}</td>
									<td>{{ $c->seffdt}}</td>
									<td>{{ number_format($c->sclm) }}</td>
									<td>{{ number_format($c->sacc) }}</td>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('{{ $c->member }}')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(smember){
											  window.location = "{{ url('/claimdetail') }}"+"/"+smember;
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