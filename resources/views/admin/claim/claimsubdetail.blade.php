@extends('template.app_admin')

@section('content_dashboard')

@foreach($claim as $c)

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
                    <h2>Claim Detail : <?php echo $claimid; ?> </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
				<div class="box-body">
					<div class="row invoice-info">
						<div class="col-sm-4 invoice-col">
							  <b>Claim Info</b><br>
							  <br>
							  <b>Batch ID:</b> <?php echo $c->batchid; ?><br>
							  <b>Batch Name:</b> <?php echo $c->batchdesc; ?><br>
							  <b>Claim id:</b> <?php echo $c->claimid; ?><br>
							  <b>Admission:</b> <?php echo $c->admissiondt; ?><br>
							  <b>Coverage:</b> <?php echo $c->covercd; ?>
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col">
								<b>Member Info</b><br>
								<br>
								<b>Policyno:</b> <?php echo $c->policyno; ?><br>
								<b>Client  :</b> <?php echo $c->clientname; ?><br>
								<b>Memberno:</b> <?php echo $c->memberno; ?><br>
								<b>Name    :</b> <?php echo $c->membername; ?><br>
								<b>Employee:</b> <?php echo $c->empname; ?><br>
							
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col">
								<b>Payment Info</b><br>
								<br>
								<b>Pay to	 :</b> <?php echo $c->soc; ?><br>
								<b>Bank Name :</b> <?php echo $c->bank; ?><br>
								<b>Account   :</b> <?php echo $c->acctname; ?><br>
								<b>Pay Due   :</b> <?php echo $c->paydue; ?>
						</div>
						<!-- /.col -->
				</div>
                      
			</div>
					<br><br>
                    <table id="datatable-responsive2" class="table table-hover" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Claimno </th>
						  <th>Code</th>
						  <th>Description</th>
						  <th>Bill</th>
                          <th>Accept</th>
						  <th>Excess</th>
						  <th>Paid</th>
						  <th>Not Paid</th>
						  <th>Status</th>
							
                        </tr>
                      </thead>
					  

                      <tbody>
                      	@foreach($subdetail as $s)
						<tr>
							<td><?php echo $s->claimid; ?></td>
							<td><?php echo $s->benefitcd; ?></td>
							<td><?php echo $s->benefitnm1; ?></td>
							<td align="right"><?php echo number_format($s->cdbill,0); ?></td>
							<td align="right"><?php echo number_format($s->cdaccept,0); ?></td>
							<td align="right"><?php echo number_format($s->cdexcess,0); ?></td>
							<td align="right"><?php echo number_format($s->cdpaid,0); ?></td>
							<td align="right"><?php echo number_format($s->cdexcessnotpaid,0); ?></td>
							<td><?php echo $s->statclaim; ?></td>
						</tr>
						@endforeach
                      </tbody>
                    </table>
					
					
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