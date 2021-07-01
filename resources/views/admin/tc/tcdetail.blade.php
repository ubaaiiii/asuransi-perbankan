@extends('template.app_admin')

@section('content_dashboard')

@foreach($tcdtls as $tcdtl)

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
                    <h2>Detail Term & Condition Info  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
			<form class="form-horizontal">
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Produk</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="produk" value="<?php echo $tcdtl->produk; ?>" readonly >  
							</div>
							
						</div>
			
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Min. Umur</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="jkel" value="<?php echo $tcdtl->umurb; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Max. Umur</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="jkel" value="<?php echo $tcdtl->umura; ?>" readonly >  
							</div>
							
						</div>						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Min. UP</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="jkel" value="<?php echo $tcdtl->umurb; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">max. UP</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="jkel" value="<?php echo number_format($tcdtl->maxup,0); ?>" readonly >  
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