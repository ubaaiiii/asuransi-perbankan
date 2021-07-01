@extends('template.app_admin')

@section('content_dashboard')

@foreach($asuransidtls as $asuransidtl)

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
                    <h2>Detail Asuransi Info  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
			<form class="form-horizontal">
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Produk</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="produk" value="<?php echo $asuransidtl->kode; ?>" readonly >  
							</div>
							
						</div>
			
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Nama</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nama" value="<?php echo $asuransidtl->nmasuransi; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Alamat </label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="alamat" value="<?php echo $asuransidtl->alamat1; ?>" readonly >  
							</div>
							
						</div>
						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">PIC</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="pic" value="<?php echo $asuransidtl->pic; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Jabatan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="picjabat" value="<?php echo $asuransidtl->picjabat; ?>" readonly >  
							</div>
							
						</div>
						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Telpon</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="phone1" value="<?php echo $asuransidtl->phone1; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Email</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="email" value="<?php echo $asuransidtl->email; ?>" readonly >  
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