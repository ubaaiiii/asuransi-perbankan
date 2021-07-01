@extends('template.app_admin')

@section('content_dashboard')


<?php 

$sregid=$p->regid;
$snama=$p->nama;
$stgllahir=$p->tgllahir;



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
                    <h2>Provider Info  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
			<form class="form-horizontal">
							<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">No Register</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($sregid)) echo $sprovidercd ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Provider Name </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($snama)) echo $sprovidernm; ?>" readonly >  
							</div>
						  </div>
						
						  <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Phone</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($stgllahir)) echo $sphone; ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Fax </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($sfax)) echo $sfax; ?>" readonly >  
							</div>
						  </div>
						  <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4" >Email</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="relation" value="<?php if(isset($ssobcd)) echo $ssobcd; ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">PIC </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($sreffno)) echo $sreffno; ?>" readonly >  
							</div>
						  </div>
						  <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Alt Policyno</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($saltpolicyno)) echo $saltpolicyno; ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Status </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($sstatpol)) echo $sstatpol; ?>" readonly >  
							</div>
						  </div>
						  
						   <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">PIC</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($spic)) echo $spic; ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Email </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($semail)) echo $semail; ?>" readonly >  
							</div>
						  </div>
						  
						  
						  
						   <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Address</label>

							<div class="col-sm-10">
							  <input type="text" class="form-control" id="address" value="<?php echo "saddress"; ?>" readonly >  
							</div>
							
						  </div>
						  
						   <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Bank Account</label>

							<div class="col-sm-10">
							  <input type="text" class="form-control" id="bank" value="<?php echo "sbank"; ?>" readonly >  
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