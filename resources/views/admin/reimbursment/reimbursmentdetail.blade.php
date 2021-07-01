@extends('template.app_admin')

@section('content_dashboard')


<?php 

if ($r->reimburs == "0") {
	$batchdesc = $r->providernm;
}else{
	$batchdesc = $r->clientname;
}

if ($r->reimburs == "0") {
	$soc = "Provider";
}else{
	$soc = "reimburs";
}


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
                    <h2>Claim Header  </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">
			<form class="form-horizontal">
				<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
					  <b>Bacth Info</b><br>
					  <br>
					  <b>Batch ID:</b> <?php echo $r->batchid; ?><br>
					  <b>Received:</b> <?php echo $r->receivedt; ?><br>
					  <b>Reffno  :</b> <?php echo $r->refno; ?>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
						<b>Provider Info</b><br>
						<br>
						<b>Source:</b> <?php echo $soc; ?><br>
						<b>Code:</b> <?php echo $r->providercd; ?><br>
						<b>Provider:</b> <?php echo $batchdesc; ?>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
						<b>Payment Info</b><br>
						<br>
						<b>Bank Name :</b> <?php echo "r->bank"; ?><br>
						<b>Account   :</b> <?php echo "r->acctname"; ?><br>
						<b>Pay Due   :</b> <?php echo "r->paydue"; ?>
				</div>
						 
						
				</div>
			</form><br><br>
			<table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
					<th>Process</th>
                    <th>ClaimID</th>
                   	<th>MemberNo</th>
					<th>Name</th>
					<th>Admission </th>
					<th>Cover </th>
					<th>Bill </th>
					<th>Accept </th>
					<th>Excess </th>
					<th>Paid</th>
					<th>Status </th>
					
                    </tr>
                </thead>
                <tbody>
                	@foreach($rd as $d)
	                <tr>                   
						<td><?php echo $d->claimid ?></td>
						<td><?php echo $d->memberno ?></td>
						<td><?php echo $d->membername ?></td>
						<td><?php echo $d->admissiondt ?></td>
						<td><?php echo $d->covercd ?></td>
						<td><?php echo number_format($d->chbill, 0); ?></td>
						<td><?php echo number_format($d->chaccept, 0); ?></td>
						<td><?php echo number_format($d->chexcess, 0); ?></td>
						<td><?php echo number_format($d->chpaid, 0); ?></td>		
						<td><?php echo $d->msdesc ?></td>						
						<th>
							<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('{{ $d->claimid }}')"><i class="fa fa-search"></i> Detail</button>
	                          <script>
	                            function klik(claimid){
	                              window.location = "{{ url('/reimbursmentclmhdr') }}"+"/"+claimid;
	                            }
	                          </script>
						</th>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                 
                </tr>
                </tfoot>
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