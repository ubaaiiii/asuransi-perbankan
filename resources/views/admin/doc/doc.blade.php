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
	                    		<h2>Document</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
							<table id="datalog" class="table table-striped" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Proses</th>
									<th>File</th>
									<th>Tipe</th>
									<th>Tgl Upload</th>                    

		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($docs as $doc)
								<tr>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('<?= $doc->nama_file ?>')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(key){
											  	window.location = "{{ url('/docdetail') }}"+"/"+key;
											}
										</script>
									</th>
									<td><a href="<?php echo $doc->nama_file . ".pdf" ?>" target="pdf-frame">{{ $doc->nama_file}}<a></td>
									<td><a href="<?php echo $doc->nama_file ?>" target="pdf-frame">{{ $doc->nama_file}}<a></td>
									<td>{{ $doc->tipe_file}}</td>
									<td>{{ $doc->tglupload}}</td>

									

									
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