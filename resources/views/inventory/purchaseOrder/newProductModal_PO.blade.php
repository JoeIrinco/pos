<div class="modal fade addproduct_po" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="ProductForm" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="branch_add">Branch</label>
                                    <select name="branch_add" class="form-control" required>
                                        <option value="">select</option>
                                        @foreach ($branches as $branch)
                                        <option value="{{$branch->name}}">{{$branch->name}}</option>
                                        @endforeach
                                                                                                                             
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid Branch.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="brand_add">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_add" placeholder="Brand Name" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Brand Name.
                                    </div>
                                </div>
                            

                                <div class="col-md-6 mb-3">
                                    <label for="product_code_add">Product Code</label>
                                    <input type="text" class="form-control" name="product_code_add" placeholder="Product Code" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Product Code.
                                    </div>
                                </div>
                            
                                <div class="col-md-6 mb-3">
                                    <label for="productname_add">Product Name</label>
                                    <input type="text" class="form-control" name="productname_add" placeholder="Product Name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Product Name.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="product_description_add">Product description</label>
                                    <input type="text" class="form-control" name="product_description_add" placeholder="Product description" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Product description.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="unit_add">Units</label>
                                    <select name="unit_add" class="form-control" required>
                                        <option value="">select</option>
                                        @foreach ($units as $unit)
                                        <option value="{{$unit->unit}}">{{$unit->unit}}</option>
                                        @endforeach
                                                                                                                             
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid Units.
                                    </div>
                                </div>
                            
                             
                         
                               
                                <div class="col-md-6 mb-3">
                                    <label for="critical_alert_add">Critical Alert</label>
                                    <input type="number" class="form-control" name="critical_alert_add" placeholder="Critical Alert" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Critical Alert.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="location_add">Location</label>
                                    <input type="text" class="form-control" name="location_add" placeholder="Location" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Location.
                                    </div>
                                </div>                                                                                                   
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    var form = document.getElementById('ProductForm');
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                }, false);
                            })();
                        </script>
                    
                </div>
            </div>
            <div class="modal-footer">
              {{--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
            $('body').on('submit', '#ProductForm', function (event) {
                
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('inventory/insert-product') }}",
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {
                    console.log('Product Add submitting success...');
                    if(response=="sku"){
                        swal({
                        title: 'Error!',
                        text: "Error Msg: SKU CODE Already Exist",
                        //timer: 1500,
                        type: "error",
                    })
                    }else  if(response=="duplicate"){
                        swal({
                        title: 'Error!',
                        text: "Error Msg: Product was Already in system",
                        //timer: 1500,
                        type: "error",
                    })
                    }else{
                        console.log('Product Add submitting success...');
                    $('.send-loading').hide();
                    swal({
                        title: 'Success!',
                        text: 'Successfully Added',
                        timer: 1500,
                        type: "success",
                    }, function () {
                    window.location.href = 'product-management';
                    });
                    }
                },
                error: function (error) {
                    console.log('Product Add submitting error...');
                    console.log(error);
                    console.log(error.responseJSON.message);
                    $('.send-loading').hide();
                    swal({
                        title: 'Error!',
                        text: "Error Msg: " + error.responseJSON.message + "",
                        //timer: 1500,
                        type: "error",
                    })
                }
            });
        });
    });
</script>