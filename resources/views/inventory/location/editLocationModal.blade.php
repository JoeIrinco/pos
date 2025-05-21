<div class="modal fade bd-example-modal-lg" id="edit_location_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                    <form  method="POST"  class="container" id="LocationFormIedit" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" id="id_edit" name="id_edit" value="">
                        <div class="row">
          

                            <div class="col-md-6 mb-3 lot_no_edit">
                                <label for="brand_add">Lot No</label>
                                <input type="text" class="form-control" id="lot_no_edit" name="lot_no_edit" placeholder="Lot No" value="" >
                                <div class="invalid-feedback">
                                    Please provide a valid Lot No.
                                </div>
                            </div>
                        

                            <div class="col-md-6 mb-3 Location_edit">
                                <label for="product_code_add">Location</label>
                                <input type="text" class="form-control" id="Location_edit" name="Location_edit" placeholder="Location" value="" >
                                <div class="invalid-feedback">
                                    Please provide a valid Location.
                                </div>
                            </div>
                        
                            <div class="col-md-6 mb-3 Rack_edit">
                                <label for="productname_add">Rack</label>
                                <input type="text" class="form-control"  id="Rack_edit" name="Rack_edit" placeholder="Rack" >
                                <div class="invalid-feedback">
                                    Please provide a valid Rack.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3 Shelf_edit">
                                <label for="product_description_add">Shelf</label>
                                <input type="text" class="form-control" name="Shelf_edit" id="Shelf_edit" placeholder="Shelf" >
                                <div class="invalid-feedback">
                                    Please provide a valid Product description.
                                </div>
                            </div>                            
                                                                                                                          
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                      {{--   <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    var form = document.getElementById('LocationFormIedit');
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                }, false);
                            })();
                        </script> --}}
                    
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
            $('body').on('submit', '#LocationFormIedit', function (event) {
                
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('inventory/edit-location') }}",
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
                        window.location.href = 'location-management';
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