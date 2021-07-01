@extends('template.app_admin')

@section('content_dashboard')


@foreach($reimburs as $r)

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
                    <h2>Claim Detail</h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">

					<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						  <b>Claim Info</b><br>
						  <br>
						  <b>Batch ID:</b> <?php echo $r->batchid; ?><br>
						  <b>Batch Name:</b> <?php echo $r->batchdesc; ?><br>
						  <b>Claim id:</b> <?php echo $r->claimid; ?><br>
						  <b>Admission:</b> <?php echo $r->admissiondt; ?><br>
						  <b>Coverage:</b> <?php echo $r->covercd; ?>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
							<b>Member Info</b><br>
							<br>
							<b>Policyno:</b> <?php echo $r->policyno; ?><br>
							<b>Client  :</b> <?php echo $r->clientname; ?><br>
							<b>Memberno:</b> <?php echo $r->memberno; ?><br>
							<b>Name    :</b> <?php echo $r->membername; ?><br>
							<b>Employee:</b> <?php echo $r->empname; ?><br>
						
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
							<b>Payment Info</b><br>
							<br>
							<b>Pay to	 :</b> <?php echo $r->soc; ?><br>
							<b>Bank Name :</b> <?php echo $r->bank; ?><br>
							<b>Account   :</b> <?php echo $r->acctname; ?><br>
							<b>Pay Due   :</b> <?php echo $r->paydue; ?>
					</div>
					<!-- /.col -->
					</div><br>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
							<th>Code</th>
							<th>Description</th>
							<th>Bill  </th>
							<th>Accept </th>
							<th>Excess </th>
							<th>Paid </th>
							<th>Status</th>

						 
                        </tr>
                      </thead>
					  

						<tbody>
							@foreach($claimHdr as $c)

							<tr>
								<td><?php echo $c->benefitcd; ?></td>
								<td><?php echo $c->bendesc; ?></td>
								<td><?php if(isset($c->cdbill)) echo number_format($c->cdbill,0); ?></td>
								<td><?php if(isset($c->cdaccept)) echo number_format($c->cdaccept,0); ?></td>
								<td><?php if(isset($c->cdexcess)) echo number_format($c->cdexcess,0); ?></td>
								<td><?php if(isset($c->cdpaid)) echo number_format($c->cdpaid,0); ?></td>
								<td><?php echo $c->statclaim; ?></td>
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