@extends('template.app_admin')

@section('content_dashboard')

<div class="page-content-wrapper">

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Mersikanulsi - Purchase Data</h4>
                    <p class="text-muted m-b-30 font-14">
                        Below is the entire user data for mersikanulsi
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nomor Invoice</th>
                                <th>Total</th>
                                <th>Checkout Date</th>
                                <th>Checkout Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($checkoutData as $checkout)
                            <tr>
                                <td>#{{$checkout->nomor_invoice}}</td>
                                <td>Rp {{strrev(implode('.',str_split(strrev(strval($checkout->total)),3)))}}</td>
                                <td>{{$checkout->checkoutDate}}</td>
                                <td>{{$checkout->checkoutAddress}}</td>
                                <td style="text-align:center;"><a href="{{url('/invoice/detail/'.$checkout->id_invoice)}}"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container-fluid -->

</div> <!-- Page content Wrapper -->
@endsection