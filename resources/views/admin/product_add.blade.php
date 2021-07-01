@extends('template.app_admin')

@section('content_dashboard')

<div class="page-content-wrapper">

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">
                    
                    

                    <h4 class="mt-0 header-title">Add Product</h4>
                    <p class="text-muted m-b-30 font-14">Fill the product description below</p>
    
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            
                    <form action="{{url('/products/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Product Name</label>
                            <input name="productName" type="text" class="colorpicker-default form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Product Price</label>
                            <input name="productPrice" type="number" class="colorpicker-rgba form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Minimum Purchase</label>
                            <input name="minimumPurchase" type="number" class="colorpicker-rgba form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Parent Categories</label>
                            <select class="form-control select2 select2-hidden-accessible" name="parentCategories" zaria-hidden="true" required>
                                <option value="">Select Parent Categories..</option>
                                <option value="TRADING">TRADING</option>
                                <option value="SERVICE">SERVICE</option>
                                <!--<option value="PERCETAKAN">PERCETAKAN</option>-->
                                <!--<option value="OTOMOTIF">OTOMOTIF</option>-->
                                <!--<option value="KONVEKSI">KONVEKSI</option>-->
                                <!--<option value="REKLAME DIGITAL">REKLAME DIGITAL</option>-->
                                <!--<option value="SABLON">SABLON</option>-->
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product Categories</label>
                            <input name="productCategories" type="text" class="colorpicker-default form-control">
                            @if (isset($product))
                             or Select from existing categories <br>
                            <select class="form-control select2 select2-hidden-accessible" name="existingCategories" zaria-hidden="true">
                                @foreach ($product as $productt)
                                    <option value="{{$productt->productCategories}}">{{$productt->productCategories}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea id="productDescription" name="productDescription" type="text" class="colorpicker-default form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">How Many Product Image ?</label>
                            <select class="form-control select2 select2-hidden-accessible" id="totalImage" name="totalImage" zaria-hidden="true" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        
                        <div class="card m-b-20">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Product Image (Max 2MB)</label><br>
                                    <input name="image" id="image" type="file" ><br><br>
                                    <input style="display:none;" name="image2" id="image2" type="file"><br>
                                    <input style="display:none;" name="image3" id="image3" type="file" >
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-20">
                            <div class="card-body">
                                <input type="submit" class="btn btn-primary" value="Add Product" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container-fluid -->
</div> <!-- Page content Wrapper -->

<script>
    totalImage = document.getElementById('totalImage');
    image1 = document.getElementById('image');
    image2 = document.getElementById('image2');
    image3 = document.getElementById('image3');
	
    totalImage.addEventListener('change', function(){
        total = totalImage.value;
        if (total == 1){
            image2.style.display = "none"
            image3.style.display = "none"
            image2.required = false;
            image3.required = false;
        }else if (total == 2){
            image2.style.display = "block"
            image3.style.display = "none"
            image2.required = true;
            image3.required = false;
        }else if (total == 3){
            image2.style.display = "block"
            image3.style.display = "block"
            image2.required = true;
            image3.required = true;
        }
        
    })
</script>

@endsection