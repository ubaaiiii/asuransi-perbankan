@extends('template.app_admin')

@section('content_dashboard')

<div class="page-content-wrapper">

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Mersikanulsi - Product Data</h4>

                    @if (session('addSuccess'))
                        <div class="alert alert-success">
                            {!! session('addSuccess') !!}
                        </div>
                    @endif

                    @if (session('deleted'))
                        <div class="alert alert-success">
                            {!! session('deleted') !!}
                        </div>
                    @endif
                    
                    @if (session('editSuccess'))
                        <div class="alert alert-success">
                            {!! session('editSuccess') !!}
                        </div>
                    @endif

                    <p class="text-muted m-b-30 font-14">
                        Below is the entire product data for mersikanulsi
                    </p>
                    <button type="button" class="btn btn-primary btn-lg waves-effect waves-light" style="color:white;margin-bottom:20px;"><a target="_blank" style="color:white;" href="{{url('products/add')}}">Add Product &nbsp <i class="fa fa-plus"></i></a></button>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Parent Categories</th>
                                <th>Product Categories</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($productData as $product)
                            <tr>
                                <td>{{$product->productName}}</td>
                                <td>{{$product->productPrice}}</td>
                                <td>{{$product->parentCategories}}</td>
                                <td>{{$product->productCategories}}</td>
                                <td style="text-align:center;"><a onclick="confirm('Delete this product?')" href="{{url('products/delete/'.$product->id_product)}}"><i class="fa fa-trash"></i></a>
                                &nbsp <a target="_blank" href="{{url('products/edit/'.$product->id_product)}}"><i class="fa fa-edit"></i></a></td>
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