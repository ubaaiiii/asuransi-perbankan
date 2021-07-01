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
	                    		<h2>Rate</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive table-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Proses</th>
									<th>Produk</th>
									<th>Jns.Kelamin</th>
									<th>Min.Umur </th>
									<th>Max.Umur </th>
									<th>Min.UP</th>
									<th>Max.Up</th>
									<th>Rate</th>	                         

		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($tarifps as $tarifp)
								<tr>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('<?= $tarifp->scode ?>')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(key){
											  	window.location = "{{ url('/tarifdetail') }}"+"/"+key;
											}
										</script>
									</th>
									<td>{{ $tarifp->produk}}</td>
									<td>{{ $tarifp->jkel}}</td>
									<td>{{ $tarifp->umurb}}</td>
									<td>{{ $tarifp->umura}}</td>
									<td>{{ number_format($tarifp->minup) }}</td>
									<td>{{ number_format($tarifp->maxup)}}</td>
									<td>{{ $tarifp->rates}}</td>


									
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