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
                                <h6>Navigation Bar</h6>
                                <div class="row">
                                    <div class="offset-md-2 col-md-4">
                                    <input class="form-check-input"  type="checkbox" name="edit_purchase_order" id="edit_purchase_order" />
                                    <label class="form-check-label" for="edit_purchase_order">
                                       Purchase Order
                                    </label>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-12">
                                            <input class="form-check-input"  type="checkbox" name="edit_purchase_order_list" id="edit_purchase_order_list" />
                                            <label class="form-check-label" for="edit_purchase_order_list">
                                               Purchase Oder List
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-12">
                                            <input class="form-check-input"  type="checkbox" name="edit_purchase_order_form" id="edit_purchase_order_form" />
                                            <label class="form-check-label" for="edit_purchase_order_form">
                                               Purchase Oder Form
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-12">
                                            <input class="form-check-input"  type="checkbox" name="edit_purchase_invoice_list" id="edit_purchase_invoice_list" />
                                            <label class="form-check-label" for="edit_purchase_invoice_list">
                                               Purchase Invoice List
                                            </label>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="edit_inventory" id="edit_inventory" />
                                        <label class="form-check-label" for="edit_inventory">
                                        Inventory
                                        </label>
                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_product_inventory" id="edit_product_inventory" />
                                                <label class="form-check-label" for="edit_product_inventory">
                                                   Product Inventory
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_near_expiry_product_list" id="edit_near_expiry_product_list" />
                                                <label class="form-check-label" for="edit_near_expiry_product_list">
                                                   Near Expiry Product List
                                                </label>
                                            </div>
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_critical_level_product_list" id="edit_critical_level_product_list" />
                                                <label class="form-check-label" for="edit_critical_level_product_list">
                                                   Critical Level Product List
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="edit_product_manual_adjust" id="edit_product_manual_adjust" />
                                        <label class="form-check-label" for="edit_product_manual_adjust">
                                       Product Manual Adjustment
                                        </label>
                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_product_manual_add_list" id="edit_product_manual_add_list" />
                                                <label class="form-check-label" for="edit_product_manual_add_list">
                                                   Product Manual Add list
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_add_minus_product_qty" id="edit_add_minus_product_qty" />
                                                <label class="form-check-label" for="edit_add_minus_product_qty">
                                                   Add/Minus Product Qty
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_import_product_data" id="edit_import_product_data" />
                                                <label class="form-check-label" for="import_product_data">
                                                   Import Product Data
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_adjust_product_price_manual" id="edit_adjust_product_price_manual" />
                                                <label class="form-check-label" for="edit_adjust_product_price_manual">
                                                   Adjust Product Price Manual
                                                </label>
                                            </div>


                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_delete_details" id="edit_delete_details" />
                                                <label class="form-check-label" for="edit_delete_details">
                                                   delete Details
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_details" id="edit_details" />
                                                <label class="form-check-label" for="edit_details">
                                                    Edit Details
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="edit_setting" id="edit_setting" />
                                        <label class="form-check-label" for="edit_setting">
                                       Settings
                                        </label>
                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_branches_management" id="edit_branches_management" />
                                                <label class="form-check-label" for="edit_branches_management">
                                                   Branches Management
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_units_management" id="edit_units_management" />
                                                <label class="form-check-label" for="edit_units_management">
                                                   Units Management
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_location_management" id="edit_location_management" />
                                                <label class="form-check-label" for="edit_location_management">
                                                   Location Management
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_user_management" id="edit_user_management" />
                                                <label class="form-check-label" for="edit_ser_management">
                                                   User Management
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="edit_product_management" id="edit_product_management" />
                                        <label class="form-check-label" for="edit_product_management">
                                       Product Managemnt
                                        </label>
                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_product_list" id="edit_product_list" />
                                                <label class="form-check-label" for="edit_product_list">
                                                   Product list
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="edit_supplier_management" id="edit_supplier_management" />
                                        <label class="form-check-label" for="edit_supplier_management">
                                       Supplier Management
                                        </label>
                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_supplier_list" id="edit_supplier_list" />
                                                <label class="form-check-label" for="edit_supplier_list">
                                                   Supplier List
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"   type="checkbox" name="edit_deleteRequest_nav" id="edit_deleteRequest_nav" />
                                        <label class="form-check-label" for="edit_deleteRequest_nav">
                                            Request Return/Replace List
                                        </label>

                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="edit_deleteRequest" id="edit_deleteRequest" />
                                                <label class="form-check-label" for="edit_deleteRequest">
                                                   Delete Request
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                </div>

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