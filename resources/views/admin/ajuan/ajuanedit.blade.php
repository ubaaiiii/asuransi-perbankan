@extends('template.app_admin')

@section('content_dashboard')

@foreach($ajuanedts as $adt)

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
                    <h2>Edit Data  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
		<form class="form-horizontal" action="{{url('/ajuan/edit')}}" method="post" enctype="multipart/form-data">
						@csrf		
													
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Register</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="regid" id="regid" value="<?php echo $adt->regid;; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Pinjaman</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="nopeserta"  id="nopeserta" value="<?php echo $adt->nopeserta; ?>" readonly >  
							</div>
							
						</div>  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Certificate</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="policyno"  id="policyno" value="<?php echo $adt->policyno; ?>" readonly >  
							</div>
							
						</div>  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Nama</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="nama"  id="nama" value="<?php echo $adt->nama; ?>"  >  
							</div>
							
						</div>
						  
						  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Tgl Lahir</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="tgllahir"  id="tgllahir" value="<?php echo $adt->tgllahir; ?>"  >  
							</div>
							
						</div>
						

						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Jenis Kelamin</label>
							
							<div class="col-sm-6">
							<select class="form-control" required="required" name="jkel">
							  <option value="">Pilih</option>
                                @foreach($sjkel as $jkel)
                                <option {{ ($adt->jkel == $jkel->msid ? "selected='selected'" : "") }}  value="{{ $jkel->msid }}">{{ $jkel->msdesc }}
								</option>
                                @endforeach
							</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Ktp</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="noktp"  id="bank" value="<?php echo $adt->noktp; ?>"  >  
							</div>
							
						</div>
						

						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Pekerjaan</label>
							
							<div class="col-sm-6">
							<select class="form-control" required="required" name="pekerjaan">
							  <option value="">Pilih</option>
                                @foreach($skerja as $kerja)
                                <option {{ ($adt->pekerjaan == $kerja->msid ? "selected='selected'" : "") }}  value="{{ $kerja->msid }}">{{ $kerja->msdesc }}
								</option>
                                @endforeach
							</select>
							</div>
						</div>
						

						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Cabang</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="cabang"  id="cabang" value="<?php echo $adt->cabang; ?>" readonly >  
							</div>
							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mitra</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="mitra" id="mitra" value="<?php echo $adt->mitra; ?>" readonly >  
							</div>
							
						
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Produk</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="produk"  id="produk" value="<?php echo $adt->produk; ?>" readonly >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mulai</label>

							<div class="col-sm-6">
							  <input type="date" class="form-control"  name="mulai" id="mulai" value="<?php echo $adt->mulai; ?>"  >  
							</div>
							
						</div>
						

						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Akhir</label>

							<div class="col-sm-6">
							  <input type="date" class="form-control" name="akhir" id="akhir" value="<?php echo $adt->akhir; ?>"  >  
							</div>
							
						</div>
						

						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Masa</label>

							<div class="col-sm-6">
							  <input type="number" class="form-control" name="masa" id="masa" value="<?php echo $adt->masa; ?>"  >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">UP</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control"  name="up" id="up" value="<?php echo number_format($adt->up,0); ?>"  >  
							</div>
							
						</div>  
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Premi</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="premi" id="premi" value="<?php echo number_format($adt->premi,0); ?>" readonly >  
							</div>
							
						</div>  
						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Asuransi</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="asuransi" id="asuransi" value="<?php echo $adt->asuransi; ?>" readonly >  
							</div>
							
							

							
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Status</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="status" id="status" value="<?php echo $adt->status; ?>" readonly >  
							</div>
							
						</div>
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Catatan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" name="comment" id="comment" value="<?php echo $adt->comment; ?>" readonly >  
							</div>
							
						</div>  
						<a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
						<input type="submit" class="btn btn-success" title="simpan"   value="Simpan" >
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