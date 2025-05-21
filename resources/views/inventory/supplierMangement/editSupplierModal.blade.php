<div class="modal fade bd-example-modal-lg" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                    <form  method="POST"  class="container" id="SupplierForm_edit" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id_edit" id="id_edit">
                            <div class="col-md-6 mb-3">
                                <label for="name_edit">Supplier Name</label>
                                <input type="text" class="form-control" name="name_edit" id="name_edit" placeholder="supplier Name" value="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid supplier Name.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="address_edit">Supplier Address</label>
                                <input type="text" class="form-control" name="address_edit" id="address_edit"  placeholder="supplier Address" value="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid supplier Address.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="contact_person_edit">Supplier Contact Person</label>
                                <input type="text" class="form-control" name="contact_person_edit" id="contact_person_edit" placeholder="Pontact Person email" value="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid supplier contact_person.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="supplier_email_edit">Supplier Email</label>
                                <input type="text" class="form-control" name="supplier_email_edit" id="supplier_email_edit" placeholder="supplier email" value="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid supplier email.
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="mobile_no_edit">Mobile No.</label>
                                <input type="text" class="form-control" name="mobile_no_edit" id="mobile_no_edit" placeholder="Mobile No." value="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Mobile No..
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="landline_edit">Landline</label>
                                <input type="text" class="form-control" name="landline_edit" id="landline_edit" placeholder="Landline" value="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Landline.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tin_edit">Tin No.</label>
                                <input type="text" class="form-control" name="tin_edit" id="tin_edit" placeholder="Tin No." value="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid MobileTin No..
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="payment_term_edit">Payment Term</label>
                                <input type="text" class="form-control" name="payment_term_edit" id="payment_term_edit" placeholder="Payment Term" value="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Landline.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status_edit">Status</label>
                                <Select id="status_edit" class="form-control" name ="status_edit">
                                    <option value="">Select</option>
                                    <option value="active">active</option>
                                    <option value="Banned">Banned</option>
                                    <option value="Inactive">Inactive</option>
                                </Select>
                                <div class="invalid-feedback">
                                    Please provide a valid Landline.
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
            $('body').on('submit', '#SupplierForm_edit', function (event) {
                
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('inventory/edit-supplier') }}",
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
                    swal({
                        title: 'Success!',
                        text: 'Successfully Updated',
                        timer: 1500,
                        type: "success",
                    }, function () {
                        window.location.href = 'supplier-list';
                    });

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