@extends('template.app_admin')

@section('content_dashboard')

@foreach($validdts as $validdt)

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
                    <h2>Detail Info  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
			<form class="form-horizontal">
													
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Register</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->regid;; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Pinjaman</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->nopeserta; ?>" readonly >  
							</div>
							
						</div>  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Certificate</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->policyno; ?>" readonly >  
							</div>
							
						</div>  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Nama</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->nama; ?>" readonly >  
							</div>
							
						</div>
						  
						  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Tgl Lahir</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->tgllahir; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Jns Kelamin</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->jkel; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Ktp</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->noktp; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Pekerjaan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->pekerjaan; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Cabang</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->cabang; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mitra</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->mitra; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Produk</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->produk; ?>" readonly >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mulai</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->mulai; ?>" readonly >  
							</div>
							
						</div>
						

						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Akhir</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->akhir; ?>" readonly >  
							</div>
							
						</div>
						

						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Masa</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->masa; ?>" readonly >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">UP</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo number_format($validdt->up,0); ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Premi</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo number_format($validdt->premi,0); ?>" readonly >  
							</div>
							
						</div>  
						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Asuransi</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->asuransi; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Status</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->status; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Catatan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $validdt->comment; ?>" readonly >  
							</div>
							
						</div>  
						</form>
					
		<a href="{{ url()->previous() }}" class="btn btn-default">Tutup</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Simpan</button>
			
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