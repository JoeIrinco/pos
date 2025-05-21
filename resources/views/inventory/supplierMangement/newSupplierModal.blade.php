<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="SupplierForm" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="name_add">Supplier Name</label>
                                    <input type="text" class="form-control" name="name_add" placeholder="supplier Name" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid supplier Name.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="address_add">Supplier Address</label>
                                    <input type="text" class="form-control" name="address_add" placeholder="supplier Address" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid supplier Address.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="contact_person_add">Supplier Contact Person</label>
                                    <input type="text" class="form-control" name="contact_person_add" placeholder="Pontact Person email" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid supplier contact_person.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="supplier_email">Supplier Email</label>
                                    <input type="text" class="form-control" name="supplier_email_add" placeholder="supplier email" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid supplier email.
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="mobile_no_add">Mobile No.</label>
                                    <input type="text" class="form-control" name="mobile_no_add" placeholder="Mobile No." value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Mobile No..
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="landline_add">Landline</label>
                                    <input type="text" class="form-control" name="landline_add" placeholder="Landline" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Landline.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tin_add">Tin No.</label>
                                    <input type="text" class="form-control" name="tin_add" placeholder="Tin No." value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid MobileTin No..
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="payment_term_add">Payment Term</label>
                                    <input type="text" class="form-control" name="payment_term_add" placeholder="Payment Term" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Landline.
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
                                    var form = document.getElementById('SupplierSupplierFormForm');
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
        
            $('body').on('submit', '#SupplierForm', function (event) {
                
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('inventory/insert-supplier') }}",
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
                    $('.send-loading').hide();
                    swal({
                        title: 'Success!',
                        text: 'Successfully Added',
                        timer: 1500,
                        type: "success",
                    }, function () {
                        window.location.href = 'supplier-list';
                    });

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