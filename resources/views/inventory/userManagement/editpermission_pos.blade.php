<div class="modal fade bd-example-modal-lg" id="pos_edit_permission" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pos_myLargeModalLabel">Update Permission POS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                    <form  method="POST"  class="container" id="pos_edit_permission" enctype="multipart/form-data" novalidate>
                        @csrf
                            <input type="hidden" id="edit_pos_user_id" name="edit_pos_user_id" value=""/>
                            <div class="div-header p-2">
                                <h6>CHECK ALL</h6>
                            </div>
                            <div class="row">
                                <div class="offset-md-2 col-md-5">
                                <input class="form-check-input"  type="checkbox" name="check_all" id="edit_pos_check_all" />
                                <label class="form-check-label" for="edit_pos_check_all">
                                    Check All
                                </label>
                                </div>
                            </div>
                            <div class="div-header p-2">
                                <h6>Navigation Bar</h6>
                            </div>
                           
                            <div class="row">
                                <div class="offset-md-2 col-md-4">
                                <input class="form-check-input"  type="checkbox" name="edit_pos_Store" id="edit_pos_Store" />
                                <label class="form-check-label" for="edit_pos_Store">
                                   Store
                                </label>
                                <div class="row">
                                    <div class="offset-md-2 col-md-12">
                                        <input class="form-check-input"  type="checkbox" name="edit_pos_dashboard" id="edit_pos_dashboard" />
                                        <label class="form-check-label" for="edit_pos_dashboard">
                                            dashboard
                                        </label>
                                    </div>
                                    <div class="offset-md-2 col-md-12">
                                        <input class="form-check-input"  type="checkbox" name="edit_pos_pos" id="edit_pos_pos" />
                                        <label class="form-check-label" for="edit_pos_pos">
                                            pos
                                        </label>
                                    </div>
                                    <div class="offset-md-2 col-md-12">
                                        <input class="form-check-input"  type="checkbox" name="edit_pos_generate_report" id="edit_pos_generate_report" />
                                        <label class="form-check-label" for="edit_pos_generate_report">
                                            Generate Report
                                        </label>
                                    </div>
                                    <div class="offset-md-2 col-md-12">
                                        <input class="form-check-input"  type="checkbox" name="edit_pos_transaction_history" id="edit_pos_transaction_history" />
                                        <label class="form-check-label" for="edit_pos_transaction_history">
                                            Transaction History
                                        </label>
                                    </div>
                                    <div class="offset-md-2 col-md-12">
                                        <input class="form-check-input"  type="checkbox" name="edit_pos_AR" id="edit_pos_AR" />
                                        <label class="form-check-label" for="edit_pos_AR">
                                            AR
                                        </label>
                                    </div>
                                    <div class="offset-md-2 col-md-12">
                                        <input class="form-check-input"  type="checkbox" name="edit_pos_pending_Document" id="edit_pos_pending_Document" />
                                        <label class="form-check-label" for="edit_pos_pending_Document">
                                            Pending Document
                                        </label>
                                    </div>
                                </div>
                                </div>
                                    
                            </div>
                                
                                <hr size="30" class="bg-success" noshade> 
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                        
                    
                </div>
            </div>
            <div class="modal-footer">
              {{--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>

<script>
    $( document ).ready(function() {


        function checked(checked_box) {
            if(checked_box == 0) {
                return false;
            }
            if(checked_box == 1) {
                return true;
            }
        }

        $("input[type=text]").keyup(function () {  
            $(this).val($(this).val().toUpperCase());
        });
        

        $( "#edit_pos_check_all" ).click(function() {
            if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }

        });

        
        $('body').on('submit', '#pos_edit_permission', function (event) {
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('pos-permission-edit-data') }}",
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
                        text: 'Successfully Edited',
                        timer: 1500,
                        type: "success",
                    }, function () {
                        window.location.href = 'user-management';
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
        

        /* $('body').on('click', '.btn-edit-inventory', function(){
            
        }); */
        //get user details
        
    });
</script>