@extends('template.app_admin')

@section('content_dashboard')

@foreach($profiles as $pro )

@endforeach



<body class="nav-md">
    <div class="container body">
      <div class="main_container">


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile Info  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
			<form class="form-horizontal">
													
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Userid</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="username" value="<?php echo $pro->username; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Nama</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nama" value="<?php echo $pro->nama; ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Level</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nama" value="<?php echo $pro->level; ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mitra</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nama" value="<?php echo $pro->mitra; ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Cabang</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nama" value="<?php echo $pro->cabang; ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Parent</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nama" value="<?php echo $pro->sparent; ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Email</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="email" value="<?php echo $pro->email; ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Hp</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nohp" value="<?php echo $pro->nohp; ?>" readonly >  
							</div>
							
						</div>  
						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mitra</label>
							
							<div class="col-sm-6">
							<select class="form-control" required="required" name="kategori">
							  <option value="">Pilih</option>
                                @foreach($mitras as $mitra)
                                <option {{ ($pro->mitra == $mitra->msid ? "selected='selected'" : "") }}  value="{{ $mitra->msid }}">{{ $mitra->msdesc }}
								</option>
                                @endforeach
							</select>
						</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Cabang</label>
							
							<div class="col-sm-6">
							<select class="form-control" required="required" name="kategori">
							   <option value="">Pilih</option>
                                @foreach($cabangs as $cab)
                                <option {{ ($pro->cabang == $cab->msid ? "selected='selected'" : "") }}  value="{{ $cab->msid }}">{{ $cab->msdesc }}
								</option>
                                @endforeach
							</select>
							</div>
						</div>
						
						
						
						
						</div>
						</form>
					
					
        </div><br>
		
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