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
                    <h2>Claim Header : <?php echo $claimid; ?> </h2>
                 
                    <div class="clearfix"></div>
                  </div>
				  
		<!----begin page content----->
		<div class="x_content">

					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
							<td><?php echo $c->claimid; ?></td>
							<td><?php echo $c->providernm; ?></td>
							<td><?php echo $c->admissiondt; ?></td>
							<td><?php echo $c->dischargedt; ?></td>
							<td align="right"><?php echo number_format($c->chbill,0); ?></td>
							<td align="right"><?php echo number_format($c->chaccept,0); ?></td>
							<td align="right"><?php echo number_format($c->chexcess,0); ?></td>
							<td align="right"><?php echo number_format($c->chpaid,0); ?></td>
							<th>
								<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" onclick="klik('{{ $c->claimid }}')"><i class="fa fa-search"></i> Detail</button>
								<script>
									function klik(claimid){
									  window.location = "{{ url('/claimsubdetail') }}"+"/"+claimid;
									}
								</script>
							</th>
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