@extends('template.app_admin')

@section('content_dashboard')

<div class="page-content-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h4 class="pull-right font-16"><strong>Invoice # {{$nomor_invoice}}</strong></h4>
                                    <h3 class="m-t-0">
                                        <img src="{{ url('assets/images/logo/logo-01.svg') }}" alt="logo" height="26"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            {{$userFullName}} ({{$userPhone}})<br>
                                            {{$userEmail}}
                                        </address>
                                    </div>
                                    <div class="col-6 text-right">
                                        <address>
                                            <strong>Shipped To:</strong><br>
                                            {{$address}}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 m-t-30">
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            Midtrans Payment
                                        </address>
                                    </div>
                                    <div class="col-6 m-t-30 text-right">
                                        <address>
                                            <strong>Checkout Date:</strong><br>
                                            {{$checkoutDate}}<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="panel panel-default">
                                    <div class="p-2">
                                        <h3 class="panel-title font-20"><strong>Checkout summary</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td><strong>Image</strong></td>
                                                    <td class="text-center"><strong>Name</strong></td>
                                                    <td class="text-center"><strong>Price</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong>
                                                    <td class="text-center"><strong>Note</strong>
                                                    </td>
                                                    <td class="text-right"><strong>Totals</strong></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $subTotal = 0; ?>
                                                @foreach ($product as $prod)
                                                
                                                <tr>
                                                    <td><image src="{{url('product/'.$prod->productImage)}}"/></td>
                                                    <td class="text-center">{{$prod->productName}}</td>
                                                    
                                                    <td class="text-center">Rp {{strrev(implode('.',str_split(strrev(strval($prod->productPrice)),3)))}}</td>
                                                    <td class="text-right">{{$prod->quantity}}</td>
                                                    <?php 
                                                        $totals = $prod->quantity * $prod->productPrice;
                                                        $subTotal = $subTotal + $totals;
                                                    ?>
                                                    <td class="text-center">
                                                        @if($prod->information == null)
                                                            No Information
                                                        @else
                                                            {{$prod->information}}
                                                        @endif
                                                    </td>
                                                    <td class="text-right">Rp {{strrev(implode('.',str_split(strrev(strval($totals)),3)))}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-center">
                                                        <strong>Subtotal</strong></td>
                                                    <td class="thick-line text-right">Rp {{strrev(implode('.',str_split(strrev(strval($subTotal)),3)))}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>Shipping</strong></td>
                                                    <td class="no-line text-right">Rp 30.000</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>Total</strong></td>
                                                        <?php $final = $subTotal+30000; ?>
                                                    <td class="no-line text-right"><h4 class="m-0">Rp {{strrev(implode('.',str_split(strrev(strval($final)),3)))}},-</h4></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-print-none">
                                            <div class="pull-right">
                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->

</div> <!-- Page content Wrapper -->

@endsection