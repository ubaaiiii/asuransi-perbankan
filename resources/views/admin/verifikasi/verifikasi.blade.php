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
	                    		<h2>verifikasi</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
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
		                    	@foreach($verifikasis as $verifikasi)
								<tr>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('<?= $verifikasi->regid ?>')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(key){
											  	window.location = "{{ url('/verifikasidetail') }}"+"/"+key;
											}
										</script>
									</th>
									<td>{{ $verifikasi->sproduk}}</td>
									<td>{{ $verifikasi->regid}}</td>
									<td>{{ $verifikasi->nama}}</td>
									<td>{{ $verifikasi->tgllahir}}</td>
									<td>{{ $verifikasi->mulai}}</td>
									<td>{{ number_format($verifikasi->up)}}</td>
									<td>{{ number_format($verifikasi->premi)}}</td>
									<td>{{ $verifikasi->sts}}</td>
									
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