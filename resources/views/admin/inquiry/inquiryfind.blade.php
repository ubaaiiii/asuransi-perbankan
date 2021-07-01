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
	                    		<h2>Inquiry</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  	<div class="row">
						<form action="{{ url('/inquiryfind') }}" method="GET">
							<div class="row">
								  <div class="col-sm-4">
									<input type="text" class="form-control" name="q">
									
								  </div>
								  <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Cari" ><i class="fa fa-search"></i> Cari</button>
							</div>
						</form>
						 <br/>			
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive table-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Proses</th>
									<th>Produk</th>
									<th>Noregister</th>
									<th>Nama </th>
									<th>Tgl Lahir </th>
									<th>Mulai</th>
									<th>UP</th>
									<th>Premi</th>	                         
									<th>Status</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($inquirys as $inquiry)
								<tr>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('<?= $inquiry->regid ?>')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(key){
											  	window.location = "{{ url('/inquirydetail') }}"+"/"+key;
											}
										</script>
									</th>
									<td>{{ $inquiry->sproduk}}</td>
									<td>{{ $inquiry->regid}}</td>
									<td>{{ $inquiry->nama}}</td>
									<td>{{ $inquiry->tgllahir}}</td>
									<td>{{ $inquiry->mulai}}</td>
									<td>{{ number_format($inquiry->up)}}</td>
									<td>{{ number_format($inquiry->premi)}}</td>
									<td>{{ $inquiry->sts}}</td>
									
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