@extends('template.app_admin')

@section('content_dashboard')

@foreach($ajuanadds as $adt)

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
                    <h2>Tambah Data  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
		             @if (count($errors) > 0)
                    <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                    @endif
		
			<form class="form-horizontal" action="{{url('/ajuan/add')}}" method="post" enctype="multipart/form-data">
						@csrf			

						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Register</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="regid"name="regid" required="required" >  
							</div>
							
						</div>						

						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Nama</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="nama"name="nama" required="required" >  
							</div>
							
						</div>
						  
						  
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Tgl Lahir</label>

							<div class="col-sm-6">
							  <input type="date" class="form-control" id="tgllahir" name="tgllahir" required="required"  >  
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
							  <input type="text" class="form-control" id="noktp"  name="noktp" required="required"  >  
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
							<select class="form-control" required="required" name="cabang">
							  <option value="">Pilih</option>
                                @foreach($scabang as $cab)
                                <option {{ ($adt->cabang == $cab->msid ? "selected='selected'" : "") }}  value="{{ $cab->msid }}">{{ $cab->msdesc }}
								</option>
                                @endforeach
							</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mitra</label>
							
							<div class="col-sm-6">
							<select class="form-control" required="required" name="mitra">
							  <option value="">Pilih</option>
                                @foreach($smitra as $mitra)
                                <option {{ ($adt->mitra == $mitra->msid ? "selected='selected'" : "") }}  value="{{ $mitra->msid }}">{{ $mitra->msdesc }}
								</option>
                                @endforeach
							</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Produk</label>
							
							<div class="col-sm-6">
							<select class="form-control" required="required" name="produk">
							  <option value="">Pilih</option>
                                @foreach($sproduk as $produk)
                                <option {{ ($adt->produk == $produk->msid ? "selected='selected'" : "") }}  value="{{ $produk->msid }}">{{ $produk->msdesc }}
								</option>
                                @endforeach
							</select>
							</div>
						</div>
						
						
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Mulai</label>

							<div class="col-sm-6">
							  <input type="date" class="form-control" id="mulai"  name="mulai" required="required" >  
							</div>
							
						</div>
						

						
									

						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Masa</label>

							<div class="col-sm-6">
							  <input type="number" class="form-control" id="masa" name="masa" required="required"  >  
							</div>
						</div>
						
						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">UP</label>

							<div class="col-sm-6">
							  <input type="number" class="form-control" id="up" name="up" required="required"  >  
							</div>
							
						</div>  
						

						<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Catatan</label>

							<div class="col-sm-6">
							  <input type="text" class="form-control" id="comment" name="comment"   >  
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