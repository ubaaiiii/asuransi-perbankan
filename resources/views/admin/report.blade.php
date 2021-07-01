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
                     <h2>Report</h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
			<form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#">
				<div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Report Type  
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<select class="select2_single form-control" tabindex="-2" name="reptype" id="reptype" onChange="display(this.value)">
      							<option value="" selected="selected">-- Choose Report --</option>
                    @foreach($report as $r)
                      <option value="<?php echo $r->repname; ?>"><?php echo $r->repname; ?></option>
                    @endforeach
						</select>
                    </div>
                </div>												
				
				<div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Policy No  
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<select class="select2_single form-control" tabindex="-2" name="policyno" id="policyno" onChange="display(this.value)">
          							<option value="" selected="selected">-- Choose Policyno --</option>
                        @foreach($policyno as $p)
                          <option value="<?php echo $p->policyno; ?>"><?php echo $p->policyno.' - '.$p->clientname; ?></option>
                        @endforeach
          						</select>
                    </div>
                </div>		
				
				<div class="form-group">

                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Period#1 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
					
						<input name="period1" type="date" id="period1" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
				</div>	
				
				<div class="form-group">

                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Period#2 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
						<input name="period2" type="date" id="period2" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
				</div>	
				
				
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<a href="media.php?module=report" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Print</button>
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