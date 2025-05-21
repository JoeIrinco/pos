<div class="modal fade bd-example-modal-lg" id="edit_permission" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="EditUserInventoryForm" enctype="multipart/form-data" novalidate>
                            @csrf
                                <input type="hidden" id="user_id_edit" name="user_id_edit" />
                                <input type="hidden" id="permission_id_edit" name="permission_id_edit" />
                                 <h6>Product Management</h6>
                                  <div class="row">
                                      <div class="offset-md-2 col-md-5">
                                      <input class="form-check-input" name="add_product" type="checkbox" id="add_product_edit" />
                                      <label class="form-check-label" for="add_product">
                                          Add New Product
                                      </label>
                                      </div >
                                      <div class="col-md-5">
                                          <input class="form-check-input" type="checkbox" name="edit_product" id="edit_product_edit" />
                                          <label class="form-check-label" for="edit_product">
                                              Edit Product
                                          </label>
                                      </div>
                                  </div>
                                  <h6>Purchase Order List</h6>
                                  <div class="row">
                                      <div class="offset-md-2 col-md-5">
                                      <input class="form-check-input"  type="checkbox" name="view_polist" id="view_polist_edit" />
                                      <label class="form-check-label" for="view_polist">
                                          View PO Details
                                      </label>
                                      </div >
                                      <div class="col-md-5">
                                          <input class="form-check-input" type="checkbox" name="receive_polist" id="receive_polist_edit" />
                                          <label class="form-check-label" for="receive_polist">
                                              Receive PO Details
                                          </label>
                                      </div>
                                      <div class="offset-md-2 col-md-5">
                                          <input class="form-check-input" type="checkbox" name="edit_polist" id="edit_polist_edit" />
                                          <label class="form-check-label" for="edit_polist">
                                              Edit PO Details
                                          </label>
                                      </div>
                                  </div>

                                  <h6>Purchase Order Form</h6>
                                  <div class="row">
                                      <div class="offset-md-2 col-md-5">
                                      <input class="form-check-input"  type="checkbox" name="add_product_form" id="add_product_form_edit" />
                                      <label class="form-check-label" for="add_product_form">
                                          Add Product
                                      </label>
                                      </div >
                                      <div class="col-md-5">
                                          <input class="form-check-input" type="checkbox" name="submit_po_form" id="submit_po_form_edit" />
                                          <label class="form-check-label" for="submit_po_form">
                                              Submit PO
                                          </label>
                                      </div>
                                  </div>
                                  <h6>Supplier List</h6>
                                  <div class="row">
                                      <div class="offset-md-2 col-md-5">
                                      <input class="form-check-input"  type="checkbox" name="add_new_supplier" id="add_new_supplier_edit" />
                                      <label class="form-check-label" for="add_new_supplier">
                                          Add new supplier
                                      </label>
                                      </div >
                                      <div class="col-md-5">
                                          <input class="form-check-input" type="checkbox" name="edit_supplier" id="edit_supplier_edit" />
                                          <label class="form-check-label" for="edit_supplier">
                                              Edit Supplier
                                          </label>
                                      </div>
                                      <div class="offset-md-2 col-md-5">
                                          <input class="form-check-input" type="checkbox" name="delete_supplier" id="delete_supplier_edit" />
                                          <label class="form-check-label" for="delete_supplier">
                                              Delete Supplier
                                          </label>
                                      </div>
                                  </div>    
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
        
        $('body').on('submit', '#EditUserInventoryForm', function (event) {
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('inventory-permission-edit') }}",
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
                        window.location.href = 'user-permission-view';
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
        

        $('body').on('click', '.btn-edit-inventory', function(){
            
            var user_id = $(this).data('id');
            $('#user_id_edit').val(user_id);

            $.ajax({
            url: '{{ url("/get-one-user") }}',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                'id':user_id
            },
            success: function (response) {  
                //console.log(response[0].add_product);
                $('#permission_id_edit').val(response[0].id);
                $('#add_product_edit').prop('checked',checked(response[0].add_product));
                $('#edit_product_edit').prop('checked',checked(response[0].edit_product));
                $('#view_polist_edit').prop('checked',checked(response[0].view_polist));
                $('#receive_polist_edit').prop('checked',checked(response[0].receive_polist));
                $('#edit_polist_edit').prop('checked',checked(response[0].edit_polist));
                $('#add_new_supplier_edit').prop('checked',checked(response[0].add_new_supplier));
                $('#edit_supplier_edit').prop('checked',checked(response[0].edit_supplier));
                $('#delete_supplier_edit').prop('checked',checked(response[0].delete_supplier));
                $('#submit_po_form_edit').prop('checked',checked(response[0].submit_po_form));
                $('#add_product_form_edit').prop('checked',checked(response[0].add_product_form));

                console.log(response[0]);
            },
            error: function (error) {
                console.log('User update submitting error...');
                console.log(error);
                console.log(error.responseJSON.message);
                $('.send-loading').hide();
                    swal({
                        title: 'Error!',
                        text: "Error Msg: " + error.responseJSON.message + "",
                        timer: 1500,
                        type: "error",
                    });
                }
            });          
            $('#edit_permission').modal('show');
        });
        //get user details
        
    });
</script>