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
	                    		<h2>Billing</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive table-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Proses</th>
									<th>Billno</th>
									<th>Cert.no</th>
									<th>Regid </th>
									<th>Nama</th>
									<th>Tgl. Mulai</th>
									<th>UP</th>
									<th>Premi</th>

		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($borderos as $bordero)
								<tr>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('<?= $bordero->regid ?>')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(key){
											  	window.location = "{{ url('/billingdetail') }}"+"/"+key;
											}
										</script>
									</th>
									<td>{{ $bordero->billno}}</td>
									<td>{{ $bordero->certno}}</td>
									<td>{{ $bordero->regid}}</td>
									<td>{{ $bordero->nama}}</td>
									<td>{{ $bordero->billdt}}</td>
									<td>{{ number_format($bordero->up)}}</td>
									<td>{{ number_format($bordero->grossamt)}}</td>

									
								</tr>
								@endforeach
	                      	</tbody>
	                    </table>	
        			</div>
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