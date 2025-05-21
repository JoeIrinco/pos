<div class="modal fade bd-example-modal-lg" id="edit_Brand_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="BrandForm_edit" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" class="form-control" name="id_edit" id="id_edit" placeholder="Brand" value="" required>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="brand_edit">Brand Code</label>
                                    <input type="text" class="form-control" name="brand_code_edit" id="brand_code_edit" placeholder="Brand Code" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Brand Code.
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="brand_edit">Brand</label>
                                    <input type="text" class="form-control" name="brand_edit" id="brand_edit" placeholder="Brand" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Brand.
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
                                    var form = document.getElementById('BrandForm');
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
            $('body').on('submit', '#BrandForm_edit', function (event) {
                
            event.preventDefault();
            console.log('Brand Add submitting...');
            $.ajax({
                url: "{{ url('inventory/edit-brand') }}",
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {
                    console.log('brand Updating submitting success...');
                    $('.send-loading').hide();
                    swal({
                        title: 'Success!',
                        text: 'Successfully Updated',
                        timer: 1500,
                        type: "success",
                    }, function () {
                        window.location.href = 'brand-management';
                    });

                },
                error: function (error) {
                    console.log('Brand Updating submitting error...');
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