@extends('template.app_admin')

@section('content_dashboard')

@foreach($ajuandt as $adt)
	
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
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->regid;; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Pinjaman</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->nopeserta; ?>" readonly >  
							</div>
							
						</div>  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Certificate</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->policyno; ?>" readonly >  
							</div>
							
						</div>  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Nama</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->nama; ?>" readonly >  
							</div>
							
						</div>
						  
						  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Tgl Lahir</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->tgllahir; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Jns Kelamin</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->jkel; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Ktp</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->noktp; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Pekerjaan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->pekerjaan; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Cabang</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->cabang; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mitra</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->mitra; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Produk</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->produk; ?>" readonly >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mulai</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->mulai; ?>" readonly >  
							</div>
							
						</div>
						

						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Akhir</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->akhir; ?>" readonly >  
							</div>
							
						</div>
						

						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Masa</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->masa; ?>" readonly >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">UP</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo number_format($adt->up,0); ?>" readonly >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Premi</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo number_format($adt->premi,0); ?>" readonly >  
							</div>
							
						</div>  
						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Asuransi</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->asuransi; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Status</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->status; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Catatan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="bank" value="<?php echo $adt->comment; ?>" readonly >  
							</div>
							
						</div> 
						<a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
						<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit" onclick="klike('<?= $adt->regid ?>')"><i class="fa fa-edit"></i> Edit</button>
							<script>
							function klike(key){
								window.location = "{{ url('/ajuanedit') }}"+"/"+key;
								}
							</script>
						<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Log History" onclick="klik1('<?= $adt->regid ?>')"><i class="fa fa-gear"></i> Log</button>
							<script>
							function klik1(key){
								window.location = "{{ url('/logdet') }}"+"/"+key;
								}
							</script>
						<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Document" onclick="klik2('<?= $adt->regid ?>')"><i class="fa fa-folder"></i> Doc</button>
							<script>
							function klik2(key){
								window.location = "{{ url('/doc') }}"+"/"+key;
								}
							</script>							
						</form>
					
					
        </div><br>
		<div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dokumen </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<table id="datadoc" class="table table-striped" cellspacing="0" width="100%">
                      <thead>
                        <tr>
							<th>File</th>
							<th>Type</th>
							<th>Tanggal</th>
                        </tr>
                      </thead>
						<tbody>
							@foreach($spdoc as $sdoc)

							<tr>
								<td><a href="/projects"><?php echo $sdoc->nama_file; ?></a></td>
								<td><?php echo $sdoc->tipe_file; ?></td>
								<td><?php echo $sdoc->tglupload; ?></td>
							</tr>
							@endforeach
                      </tbody>
        </table>
		</div>
		</div>
        </div>
		<br>
		
		<div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Log Status </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<table id="datalog" class="table table-striped" cellspacing="0" width="100%">
                      <thead>
                        <tr>
							<th>Status</th>
							<th>Tanggal</th>
							<th>User  </th>
                        </tr>
                      </thead>
						<tbody>
							@foreach($splog as $slog)

							<tr>
								<td><?php echo $slog->stlog; ?></td>
								<td><?php echo $slog->createdt; ?></td>
								<td><?php echo $slog->nama; ?></td>
							</tr>
							@endforeach
                      </tbody>
        </table>
		</div>
		</div>
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