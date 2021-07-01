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
	                    		<h2>Medical </h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive table-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Proses</th>
									<th>Produk</th>
									<th>J.Kel</th>
									<th>Min.Umur</th>
									<th>Max.Umur </th>
									<th>Min.UP </th>
									<th>Max.UP </th>
									<th>Jns. Doc</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($medicals as $medical)
								<tr>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('<?= $medical->scode ?>')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(key){
											  	window.location = "{{ url('/medicaldetail') }}"+"/"+key;
											}
										</script>
									</th>
									<td>{{ $medical->sproduk}}</td>
									<td>{{ $medical->jkel}}</td>
									<td>{{ $medical->umura}}</td>
									<td>{{ $medical->umurb}}</td>
									<td>{{ number_format($medical->minup)}}</td>
									<td>{{ number_format($medical->maxup)}}</td>
									<td>{{ $medical->jnsdoc}}</td>

									
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