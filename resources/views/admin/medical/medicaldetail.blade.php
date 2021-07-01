@extends('template.app_admin')

@section('content_dashboard')

@foreach($meddets as $meddet )

@endforeach


<?php 

?>


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
                    <h2>Detail Medical Info  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
			<form class="form-horizontal">
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Produk</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="username" value="<?php echo $meddet->produk; ?>" readonly >  
							</div>
							
						</div>
			
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Min. Umur</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nama" value="<?php echo $meddet->umurb; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Max. Umur</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="level" value="<?php echo $meddet->umura; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Min. Up</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="email" value="<?php echo number_format($meddet->minup,0); ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Max. UP</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nohp" value="<?php echo number_format($meddet->maxup,0); ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Jenis Document</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="parent" value="<?php echo $meddet->jnsdoc; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Jns. Kelamin</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="cabang" value="<?php echo $meddet->jkel; ?>" readonly >  
							</div>
							
						</div>
						
						
						
 
						</form>
					
		<a href="{{ url()->previous() }}" class="btn btn-default">Tutup</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Simpan</button>
			
        </div><br>
		
		<br>
		

		
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