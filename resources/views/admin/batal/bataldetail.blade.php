@extends('template.app_admin')

@section('content_dashboard')


@foreach($member as $m)




@endforeach


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
                    <h2>Member Info  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">

			<div class="card">
				<div class="card-body">
	              	<center>
		              	<div class="hidden-md hidden-lg">
				              <div class="col-md-12" style="margin:0 auto;">
				            	<div class="col-middle">
									<div class="text-center">
						              		<div class="row">
											    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								              		<a href="#personal" class="btn btn-dark btn-round btn-lg" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal </a> &nbsp;
								              		<a href="#plan" role="tab" class="btn btn-dark btn-round btn-lg" id="profile-tab" data-toggle="tab" aria-expanded="false">Plan </a>&nbsp;
								              		<a href="#cover" role="tab" class="btn btn-dark btn-round btn-lg" id="profile-tab2" data-toggle="tab" aria-expanded="false">Coverage</a>&nbsp;
								              	
								              		<a href="#benefit" role="tab" class="btn btn-dark btn-round btn-lg" id="profile-tab2" data-toggle="tab" aria-expanded="false">Benefit</a>&nbsp;
								              		<a href="#claim" role="tab" class="btn btn-dark btn-round btn-lg" id="profile-tab2" data-toggle="tab" aria-expanded="false">claim</a>&nbsp;
								              		<a href="#family" role="tab" class="btn btn-dark btn-round btn-lg" id="profile-tab2" data-toggle="tab" aria-expanded="false">Family</a>&nbsp;
											      <!-- <a href="" class="btn btn-primary btn-lg">Personal</a> -->
											    </div>
											    <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
											      <a href="" class="btn btn-primary btn-lg">Plan</a>
											    </div>
											    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
											      <a href="" class="btn btn-primary btn-lg">Coverage</a>
											    </div>
											    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
											    	<a href="" class="btn btn-primary btn-lg">Benefit</a>
											    </div> -->
											  </div>
					              	</div>
									
									</div>
								</div>
				              </div><br>
				          </div>
	              	</center>
				</div>
			</div>
					
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                  	<div class="hidden-xs hidden-sm">
	                  	<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	                    	<li role="presentation" class="active">
	                    		<a href="#personal" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal </a>
	                    	</li>
	                    	<li role="presentation" class="">
	                    		<a href="#plan" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Plan </a>
	                        </li>
	                        <li role="presentation" class="">
	                        	<a href="#cover" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Coverage</a>
	                        </li>
	                        <li role="presentation" class="">
	                        	<a href="#benefit" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Benefit</a>
	                        </li>
							<li role="presentation" class="">
								<a href="#claim" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">claim</a>
	                        </li>
							<li role="presentation" class="">
								<a href="#family" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Family</a>
	                        </li>
						</ul>
					</div>

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="personal" aria-labelledby="home-tab">
						<div class="box-body">
						<form class="form-horizontal">
							<div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Member No</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control " id="dob" value="<?php if(isset($m->memberno)) if(isset($m->memberno)) echo $m->memberno ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Name </label>

							<div class="col-sm-4 col-xs-8">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($m->membername)) if(isset($m->membername)) echo $m->membername ?>" readonly >  
							</div>
						  </div>
						
						  <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">DOB</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($m->dob)) if(isset($m->dob)) echo $m->dob ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Sex </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($m->sex)) if(isset($m->sex)) echo $m->sex ?>" readonly >  
							</div>
						  </div>
						  <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Relation</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="relation" value="<?php if(isset($m->relationnm1)) if(isset($m->relationnm1)) echo $m->relationnm1 ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Card No </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($m->cardno)) if(isset($m->cardno)) echo $m->cardno ?>" readonly >  
							</div>
						  </div>
						  <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Employee</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($m->empname)) if(isset($m->empname)) echo $m->empname ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">EID </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($m->eid)) if(isset($m->eid)) echo $m->eid ?>" readonly >  
							</div>
						  </div>
						  
						   <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Handphone</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($m->mfield5)) if(isset($m->mfield5)) echo $m->mfield5 ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Email </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="dob" value="<?php if(isset($m->mfield6)) if(isset($m->mfield6)) echo $m->mfield6 ?>" readonly >  
							</div>
						  </div>
						  
						   <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Unit</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="subgroup" value="<?php if(isset($m->mfield3)) if(isset($m->mfield3)) echo $m->mfield3 ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Phone/Fax </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="phone" value="<?php if(isset($m->phone)) if(isset($m->phone)) echo $m->phone ?>" readonly >  
							</div>
						  </div>
						  
						  
						   <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">PIC</label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="picname" value="<?php if(isset($m->pic)) if(isset($m->pic)) echo $m->pic ?>" readonly >  
							</div>
							<label for="text" class="col-sm-2 control-label col-xs-4">Email </label>

							<div class="col-sm-4">
							  <input type="text" class="form-control" id="picemail" value="<?php if(isset($m->cemail)) if(isset($m->cemail)) echo $m->cemail ?>" readonly >  
							</div>
						  </div>
						  
						   <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Address</label>

							<div class="col-sm-10">
							  <input type="text" class="form-control" id="address" value="<?php if(isset($m->address)) if(isset($m->address)) echo $m->address ?>" readonly >  
							</div>
							
						  </div>
						  
						   <div class="form-group">
							<label for="text" class="col-sm-2 control-label col-xs-4">Bank Account</label>

							<div class="col-sm-10">
							  <input type="text" class="form-control" id="bank" value="<?php if(isset($m->bank)) if(isset($m->bank)) echo $m->bank ?>" readonly >  
							</div>
							
						  </div>
						  
						</form>
						</div>

						</div>
                        <div role="tabpanel" class="tab-pane fade" id="family" aria-labelledby="profile-tab">

							<table id="uw" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
							  
							  <th>Memberno</th>
							  <th>Name </th>
							  <th>Sex</th>
							  <th>DOB</th>
							  <th>Relation</th>
							  <th>Plan</th>
							  <th>Effective</th>
							  <th>Expired</th>
							  <th>Status</th>
							</tr>
							</thead>
						  

							<tbody>
							@foreach($family as $f)
							<tr>
								<td><?php if(isset($f->memberno)) echo $f->memberno; ?></td>
								<td><?php if(isset($f->membername)) echo $f->membername; ?></td>
								<td><?php if(isset($f->sex)) echo $f->sex; ?></td>
								<td><?php if(isset($f->sdob)) echo $f->sdob; ?></td>
								<td><?php if(isset($f->relationnm2)) echo $f->relationnm2; ?></td>
								<td><?php if(isset($f->plancd)) echo $f->plancd; ?></td>
								<td><?php if(isset($f->seffdt)) echo $f->seffdt; ?></td>
								<td><?php if(isset($f->sexpdt)) echo $f->sexpdt; ?></td>
								<td><?php if(isset($f->statmem)) echo $f->statmem; ?></td>
							</tr>
							@endforeach
							</tbody>
							</table>
						
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="plan" aria-labelledby="profile-tab">

							<table id="pla" class="table table-hover" cellspacing="0" width="100%">
							<thead>
							<tr>
							<th>Code</th>
							<th>Description</th>
							<th>Endorsno</th>
							<th>Effective</th>
							<th>Expired</th>
							<th>Endorstype</th>
							</tr>
							</thead>
						  

							<tbody>
								@foreach($plan as $p)
								<tr>
									<td><?php if(isset($p->plancd)) echo $p->plancd; ?></td>
									<td><?php if(isset($p->plandesc)) echo $p->plandesc; ?></td>
									<td><?php if(isset($p->endorsno)) echo $p->endorsno; ?></td>
									<td><?php if(isset($p->effdt)) echo $p->effdt; ?></td>
									<td><?php if(isset($p->expdt)) echo $p->expdt; ?></td>
									<td><?php if(isset($p->endorstype)) echo $p->endorstype; ?></td>
								</tr>
								@endforeach
							</tbody>
							</table>
						
						</div>
						
							<div role="tabpanel" class="tab-pane fade" id="cover" aria-labelledby="profile-tab">

							<table id="cov" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
							<th>Code</th>
							<th>Description</th>
							<th>Limit</th>
							<th>ascharge</th>
							<th>co share</th>
							<th>provider</th>
							</tr>
							</thead>
						  

							<tbody>
								@foreach($coverage as $c)
								<tr>
									<td><?php if(isset($c->covercd)) echo $c->covercd; ?></td>
									<td><?php if(isset($c->coveragenm1)) echo $c->coveragenm1; ?></td>
									<td><?php echo number_format($c->climitamt,0); ?></td>
									<td><?php if(isset($c->ascharge)) echo $c->ascharge; ?></td>
									<td><?php if(isset($c->coshare)) echo $c->coshare; ?></td>
									<td><?php if(isset($c->providerset)) echo $c->providerset; ?></td>
								</tr>
								@endforeach
							</tbody>
							</table>
						
						</div>
						<div role="tabpanel" class="tab-pane fade" id="benefit" aria-labelledby="profile-tab">

							<table id="ben" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
							<th>Code</th>
							<th>Description</th>
							<th>Limit</th>
							<th>Per</th>
							<th>Unit</th>
							<th>Per</th>
							</tr>
							</thead>
						  

							<tbody>
								@foreach($benefit as $b)
								<tr>
									<td><?php if(isset($b->benefitcd)) echo $b->benefitcd; ?></td>
									<td><?php if(isset($b->benefitnm1)) echo $b->benefitnm1; ?></td>
									<td><?php echo number_format($b->benlimamt,0); ?></td>
									<td><?php if(isset($b->desclimamt)) echo $b->desclimamt; ?></td>
									<td><?php if(isset($b->benlimunit)) echo $b->benlimunit; ?></td>
									<td><?php if(isset($b->desclimunit)) echo $b->desclimunit; ?></td>
								</tr>
								@endforeach
							</tbody>
							</table>
						
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="claim" aria-labelledby="profile-tab">

							<table id="cov" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
                          <th>Claimno </th>
						  <th>Provider</th>
						  <th>Admission</th>
                          <th>Discharge</th>
						  <th>Bill</th>
                          <th>Accept</th>
						  <th>Excess</th>
						  <th>Paid</th>
						  <th>Process </th>
						 
							
							</tr>
							</thead>
						  

							<tbody>
								@foreach($claim as $c)
								<tr>
									<td><?php if(isset($c->claimid)) echo $c->claimid; ?></td>
									<td><?php if(isset($c->providernm)) echo $c->providernm; ?></td>
									<td><?php if(isset($c->admissiondt)) echo $c->admissiondt; ?></td>
									<td><?php if(isset($c->dischargedt)) echo $c->dischargedt; ?></td>
									<td align="right"><?php echo number_format($c->chbill,0); ?></td>
									<td align="right"><?php echo number_format($c->chaccept,0); ?></td>
									<td align="right"><?php echo number_format($c->chexcess,0); ?></td>
									<td align="right"><?php echo number_format($c->chpaid,0); ?></td>
									<th>
			                          <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('{{ $c->claimid }}')"><i class="fa fa-search"></i> Detail</button>
			                          <script>
			                            function klik(policyno){
			                              window.location = "{{ url('/claimsubdetail') }}"+"/"+policyno;
			                            }
			                          </script>
			                        </th>
								</tr>
								@endforeach
							</tbody>
							</table>
						
						</div>						
						<!-- /.box-body -->
						  </div>
						 </div>
										</div>
									  </div>
									</div>

								  </div>
								</div>
							  </div>
									
									
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
