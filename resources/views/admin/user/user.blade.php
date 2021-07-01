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
	                    		<h2>User</h2>
	                    		<div class="clearfix"></div>
		                  </div>
						<!----begin page content----->
						<div class="x_content">
					  					
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive table-responsive nowrap" cellspacing="0" width="100%">
	                      	<thead>
	                        	<tr>
									<th>Proses</th>
									<th>Username</th>
									<th>Nama</th>
									<th>Level</th>
									<th>Mitra</th>
									<th>Cabang</th>
									<th>Parent</th>
									
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($users as $user)
								<tr>
									<th>
										<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('<?= $user->username ?>')"><i class="fa fa-search"></i> Detail</button>
										<script>
											function klik(key){
											  	window.location = "{{ url('/userdetail') }}"+"/"+key;
											}
										</script>
									</th>
									<td>{{ $user->username}}</td>
									<td>{{ $user->nama}}</td>
									<td>{{ $user->level}}</td>
									<td>{{ $user->mitra}}</td>
									<td>{{ $user->cabang}}</td>
									<td>{{ $user->parent}}</td>
									
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