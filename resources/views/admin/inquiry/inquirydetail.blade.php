@extends('template.app_admin')

@section('content_dashboard')

@foreach($inquirydtls as $inquirydtl)

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
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->regid;; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Pinjaman</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->nopeserta; ?>" readonly >  
							</div>
							
						</div>  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Certificate</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->policyno; ?>" readonly >  
							</div>
							
						</div>  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Nama</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->nama; ?>" readonly >  
							</div>
							
						</div>
						  
						  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Tgl Lahir</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->tgllahir; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Jns Kelamin</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->jkel; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Ktp</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->noktp; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Pekerjaan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->pekerjaan; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Cabang</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->cabang; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mitra</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->mitra; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Produk</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->produk; ?>" readonly >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mulai</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->mulai; ?>" readonly >  
							</div>
							
						</div>
						

						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Akhir</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->akhir; ?>" readonly >  
							</div>
							
						</div>
						

						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Masa</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->masa; ?>" readonly >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">UP</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo number_format($inquirydtl->up,0); ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Premi</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo number_format($inquirydtl->premi,0); ?>" readonly >  
							</div>
							
						</div>  
						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Asuransi</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->asuransi; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Status</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->status; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Catatan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $inquirydtl->comment; ?>" readonly >  
							</div>
							
						</div>  
						</form>
					
		<a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
		<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Log History" onclick="klik1('<?= $inquirydtl->regid ?>')"><i class="fa fa-gear"></i> Log</button>
			<script>
			function klik1(key){
				window.location = "{{ url('/logdet') }}"+"/"+key;
				}
			</script>
		<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Document" onclick="klik2('<?= $inquirydtl->regid ?>')"><i class="fa fa-folder"></i> Doc</button>
			<script>
			function klik2(key){
				window.location = "{{ url('/doc') }}"+"/"+key;
				}
			</script>	
		
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