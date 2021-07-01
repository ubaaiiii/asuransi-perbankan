@extends('template.app_admin')

@section('content_dashboard')



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
				                    <h2>Policy Info  </h2>
				                    <div class="clearfix"></div>
				                </div>
								<!----begin page content----->
								<div class="x_content">
									<form class="form-horizontal">
										<div class="form-group">
											<label for="text" class="col-sm-2 control-label col-xs-4">Policy No</label>
											<div class="col-sm-4  col-xs-8">
												<input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo $profile->policyno; ?>" readonly >  
											</div>
											<label for="text" class="col-sm-2 control-label col-xs-4">Client Name </label>
											<div class="col-sm-4 col-xs-8">
												<input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo $profile->clientname; ?>" readonly >  
											</div>
										  </div>

										  <div class="form-group">
											<label for="text" class="col-sm-2 control-label col-xs-4">Effective</label>

											<div class="col-sm-4">
											  <input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo $profile->effdt; ?>" readonly >  
											</div>
											<label for="text" class="col-sm-2 control-label col-xs-4">Expired </label>

											<div class="col-sm-4">
											  <input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo $profile->expdt; ?>" readonly >  
											</div>
										  </div>

										  <div class="form-group">
											<label for="text" class="col-sm-2 control-label col-xs-4">Source</label>

											<div class="col-sm-4">
											  <input type="text" class="form-control" id="relation" value="<?php if($profile !== null) echo $profile->sobcd; ?>" readonly >  
											</div>
											<label for="text" class="col-sm-2 control-label col-xs-4">Reffno </label>

											<div class="col-sm-4">
											  <input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo $profile->reffno; ?>" readonly >  
											</div>
										  </div>
									
										  <div class="form-group">
											<label for="text" class="col-sm-2 control-label col-xs-4">Alt Policyno</label>

											<div class="col-sm-4">
											  <input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo $profile->altpolicyno; ?>" readonly >  
											</div>
											<label for="text" class="col-sm-2 control-label col-xs-4">Status </label>

											<div class="col-sm-4">
											  <input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo $profile->statpol; ?>" readonly >  
											</div>
										  </div>
									  
										   <div class="form-group">
											<label for="text" class="col-sm-2 control-label col-xs-4">PIC</label>

											<div class="col-sm-4">
											  <input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo '$profile->pic'; ?>" readonly >  
											</div>
											<label for="text" class="col-sm-2 control-label col-xs-4">Email </label>

											<div class="col-sm-4">
											  <input type="text" class="form-control" id="dob" value="<?php if($profile !== null) echo '$profile->email'; ?>" readonly >  
											</div>
										  </div>
									  
										   <div class="form-group">
											<label for="text" class="col-sm-2 control-label col-xs-2">Address</label>

											<div class="col-sm-10 col-xs-12">
											  <input type="text" class="form-control" id="address" value="<?php if($profile !== null) echo $address; ?>" readonly >  
											</div>
											
										  </div>
									  
										   <div class="form-group">
											<label for="text" class="col-sm-2 control-label col-xs-4">Bank Account</label>

											<div class="col-sm-10">
											  <input type="text" class="form-control" id="bank" value="<?php if($profile !== null) echo $bank; ?>" readonly >  
											</div>
											
										  </div>
										  
										</form>
									  
									  
        </div>
		<!----end page content----->

        <!-- footer content -->
        <footer>
          <div class="pull-right"> <a href="https://plninsurance.co.id"> PLN INSURANCE</a>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

 
  </body>



@endsection

                 
				  
					
					