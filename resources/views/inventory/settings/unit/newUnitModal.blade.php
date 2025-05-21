<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">New Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="unitForm" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="branch_add">Unit name </label>
                                    <input type="text" class="form-control" name="new_unit_add" placeholder="Unit" value="" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Branch.
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
        $("input[type=text]").keyup(function () {  
            $(this).val($(this).val().toUpperCase());  
        });
            $('body').on('submit', '#unitForm', function (event) {
                
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('inventory/insert-unit') }}",
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
                        window.location.href = 'branch-management';
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