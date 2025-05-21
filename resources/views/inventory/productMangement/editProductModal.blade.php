<div class="modal fade bd-example-modal-lg" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="ProductForm_edit" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" class="form-control" name="id_edit" id="id_edit" placeholder="Branch" value="" required>
                            <div class="row">
                                 <div class="col-md-6 mb-3">
                                   {{--  <label for="branch_add">Branch</label>
                                    <input type="text" class="form-control" name="branch_add" placeholder="Branch" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Branch.
                                    </div> --}}

                                    <label for="branch_add">Branch</label>
                                    <select id="branch_edit" name="branch_edit" class="form-control" required>
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
                                    <label for="brand_edit">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_edit" id="brand_edit" placeholder="Brand Name" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Brand Name.
                                    </div>
                                </div>
                            

                                <div class="col-md-6 mb-3">
                                    <label for="product_code_edit">Product Code</label>
                                    <input type="text" class="form-control" name="product_code_edit" id="product_code_edit" placeholder="Product Code" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Product Code.
                                    </div>
                                </div>
                            
                                <div class="col-md-6 mb-3">
                                    <label for="productname_edit">Product Name</label>
                                    <input type="text" class="form-control" name="productname_edit" id="productname_edit" placeholder="Product Name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Product Name.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="product_description_edit">Product description</label>
                                    <input type="text" class="form-control" name="product_description_edit" id="product_description_edit" placeholder="Product description" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Product description.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                        <label for="unit_edit">Units</label>
                                        <select name="unit_edit" id="unit_edit" class="form-control" required>
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
                                    <label for="critical_alert_edit">Critical Alert</label>
                                    <input type="number" class="form-control" name="critical_alert_edit" id="critical_alert_edit" placeholder="Critical Alert" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Critical Alert.
                                    </div>
                                </div>
                              
                                <div class="col-md-6 mb-3">
                                    <label class="control control-solid control-solid-success control--checkbox">No Expiration
                                        <input type="checkbox" name="no_expiration_edit" id="no_expiration_edit"/>
                                        <span class="control__indicator"></span>
                                    </label>
                                    <label class="control control-solid control-solid-success control--checkbox">No Lot Number
                                        <input type="checkbox" name="no_lot_no_edit" id="no_lot_no_edit"/>
                                        <span class="control__indicator"></span>
                                    </label>
                                </div>
                              
                               

                                <div class="col-md-6 mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="">select</option>                                       
                                        <option value="Active">Active</option>                                                                          
                                        <option value="Phase Out">Phase Out</option>     
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid Units.
                                    </div>
                            </div>
                                                                                                                            
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
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
        $("input[type=text]").keyup(function () {  
            $(this).val($(this).val().toUpperCase());  
        });
            $('body').on('submit', '#ProductForm_edit', function (event) {
                
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('inventory/edit-product') }}",
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {
                    console.log('Product Updating submitting success...');
                    $('.send-loading').hide();

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
                        text: 'Successfully Updated',
                        timer: 1500,
                        type: "success",
                    }, function () {
                       window.location.href = 'product-management';
                    });
                    }

                    

                },
                error: function (error) {
                    console.log('Product Updating submitting error...');
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