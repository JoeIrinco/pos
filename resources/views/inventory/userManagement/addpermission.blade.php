<style>
    .div-header {
        background-color: #28af39;
        color: white;
    }
</style>

<div class="modal fade bd-example-modal-lg" id="new_permission" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="SupplierForm" enctype="multipart/form-data" novalidate>
                            @csrf
                                <input type="hidden" id="edit_inventory_id" class="add_user_id" name="user_id" />
                                <div class="div-header p-2">
                                    <h6>CHECK ALL</h6>
                                </div>
                                <div class="row">
                                    <div class="offset-md-2 col-md-5">
                                    <input class="form-check-input"  type="checkbox" name="check_all" id="check_all" />
                                    <label class="form-check-label" for="check_all">
                                        Check All
                                    </label>
                                    </div>
                                </div>
                                <div class="div-header p-2">
                                    <h6>Navigation Bar</h6>
                                </div>
                               
                                <div class="row">
                                    <div class="offset-md-2 col-md-4">
                                    <input class="form-check-input"  type="checkbox" name="purchase_order" id="purchase_order" />
                                    <label class="form-check-label" for="purchase_order">
                                       Purchase Order
                                    </label>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-12">
                                            <input class="form-check-input"  type="checkbox" name="purchase_order_list" id="purchase_order_list" />
                                            <label class="form-check-label" for="purchase_order_list">
                                               Purchase Oder List
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-12">
                                            <input class="form-check-input"  type="checkbox" name="purchase_order_form" id="purchase_order_form" />
                                            <label class="form-check-label" for="purchase_order_form">
                                               Purchase Oder Form
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-12">
                                            <input class="form-check-input"  type="checkbox" name="purchase_invoice_list" id="purchase_invoice_list" />
                                            <label class="form-check-label" for="purchase_invoice_list">
                                               Purchase Invoice List
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                        

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="inventory" id="inventory" />
                                        <label class="form-check-label" for="inventory">
                                        Inventory
                                        </label>
                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="product_inventory" id="product_inventory" />
                                                <label class="form-check-label" for="product_inventory">
                                                   Product Inventory
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="near_expiry_product_list" id="near_expiry_product_list" />
                                                <label class="form-check-label" for="near_expiry_product_list">
                                                   Near Expiry Product List
                                                </label>
                                            </div>
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="critical_level_product_list" id="critical_level_product_list" />
                                                <label class="form-check-label" for="critical_level_product_list">
                                                   Critical Level Product List
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="product_manual_adjust" id="product_manual_adjust" />
                                        <label class="form-check-label" for="product_manual_adjust">
                                       Product Manual Adjustment
                                        </label>

                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="product_manual_add_list" id="product_manual_add_list" />
                                                <label class="form-check-label" for="product_manual_add_list">
                                                   Product Manual Add list
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="add_minus_product_qty" id="add_minus_product_qty" />
                                                <label class="form-check-label" for="add_minus_product_qty">
                                                   Add/Minus Product Qty
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="import_product_data" id="import_product_data" />
                                                <label class="form-check-label" for="import_product_data">
                                                   Import Product Data
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="adjust_product_price_manual" id="adjust_product_price_manual" />
                                                <label class="form-check-label" for="adjust_product_price_manual">
                                                   Adjust Product Price Manual
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="add_delete_details" id="add_delete_details" />
                                                <label class="form-check-label" for="add_delete_details">
                                                   delete Details
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="add_details" id="add_details" />
                                                <label class="form-check-label" for="add_details">
                                                    Edit Details
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="setting" id="setting" />
                                        <label class="form-check-label" for="setting">
                                            Settings
                                        </label>
                                        
                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="branches_management" id="branches_management" />
                                                <label class="form-check-label" for="branches_management">
                                                   Branches Management
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="units_management" id="units_management" />
                                                <label class="form-check-label" for="units_management">
                                                   Units Management
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="location_management" id="location_management" />
                                                <label class="form-check-label" for="location_management">
                                                   Location Management
                                                </label>
                                            </div>

                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="user_management" id="user_management" />
                                                <label class="form-check-label" for="user_management">
                                                   User Management
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="product_management" id="product_management" />
                                        <label class="form-check-label" for="product_management">
                                       Product Managemnt
                                        </label>

                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="product_list" id="product_list" />
                                                <label class="form-check-label" for="product_list">
                                                   Product list
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="supplier_management" id="supplier_management" />
                                        <label class="form-check-label" for="supplier_management">
                                       Supplier Management
                                        </label>

                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="supplier_list" id="supplier_list" />
                                                <label class="form-check-label" for="supplier_list">
                                                   Supplier List
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="offset-md-2 col-md-4">
                                        <input class="form-check-input"  type="checkbox" name="deleteRequest_nav" id="deleteRequest_nav" />
                                        <label class="form-check-label" for="deleteRequest_nav">
                                            Request Return/Replace List
                                        </label>

                                        <div class="row">
                                            <div class="offset-md-2 col-md-12">
                                                <input class="form-check-input"  type="checkbox" name="deleteRequest" id="deleteRequest" />
                                                <label class="form-check-label" for="deleteRequest">
                                                   Delete Request
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                                
                                    <div class="div-header p-2">
                                        <h6>Purchase Order List</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                        <input class="form-check-input"  type="checkbox" name="view_polist" id="view_polist" />
                                        <label class="form-check-label" for="view_polist">
                                            View PO Details
                                        </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="receive_polist" id="receive_polist" />
                                            <label class="form-check-label" for="receive_polist">
                                                Receive PO Details
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input" type="checkbox" name="edit_polist" id="edit_polist" />
                                            <label class="form-check-label" for="edit_polist">
                                                Edit PO Details
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="pdf_download_polist" id="pdf_download_polist" />
                                            <label class="form-check-label" for="pdf_download_polist">
                                                PDF Download
                                            </label>
                                        </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Purchase Order Form</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                        <input class="form-check-input"  type="checkbox" name="add_product_form" id="add_product_form" />
                                        <label class="form-check-label" for="add_product_form">
                                            Add Product
                                        </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="submit_po_form" id="submit_po_form" />
                                            <label class="form-check-label" for="submit_po_form">
                                                Submit PO
                                            </label>
                                        </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Supplier List</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                        <input class="form-check-input"  type="checkbox" name="add_new_supplier" id="add_new_supplier" />
                                        <label class="form-check-label" for="add_new_supplier">
                                            Add new supplier
                                        </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="edit_supplier" id="edit_supplier" />
                                            <label class="form-check-label" for="edit_supplier">
                                                Edit Supplier
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input" type="checkbox" name="delete_supplier" id="delete_supplier" />
                                            <label class="form-check-label" for="delete_supplier">
                                                Delete Supplier
                                            </label>
                                        </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Product Invetory</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                        <input class="form-check-input"  type="checkbox" name="add_inventory" id="add_inventory" />
                                        <label class="form-check-label" for="add_inventory">
                                            View
                                        </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="relocate_inventory" id="relocate_inventory" />
                                            <label class="form-check-label" for="relocate_inventory">
                                                Relocate
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input" type="checkbox" name="pdf_download_inventory" id="pdf_download_inventory" />
                                            <label class="form-check-label" for="pdf_download_inventory">
                                                PDF Download
                                            </label>
                                        </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Product Manual List</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="pdf_download_PML" id="pdf_download_PML" />
                                            <label class="form-check-label" for="pdf_download_PML">
                                                PDF Download
                                            </label>
                                        </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Expired Product List</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="pdf_download_EPL" id="pdf_download_EPL" />
                                            <label class="form-check-label" for="pdf_download_EPL">
                                                PDF Download
                                            </label>
                                        </div >
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Purchase Invoice List</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                        <input class="form-check-input"  type="checkbox" name="view_PIL" id="view_PIL" />
                                        <label class="form-check-label" for="view_PIL">
                                            View
                                        </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="return_PIL" id="return_PIL" />
                                            <label class="form-check-label" for="return_PIL">
                                                Return
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input" type="checkbox" name="pdf_download_PIL" id="pdf_download_PIL" />
                                            <label class="form-check-label" for="pdf_download_PIL">
                                                PDF Download
                                            </label>
                                        </div>
                                    </div>
                                   
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Product Management</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="prod_list_PM" id="prod_list_PM" />
                                            <label class="form-check-label" for="prod_list_PM">
                                                Product List
                                            </label>
                                        </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Supplier Management</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="supplier_list_SM" id="supplier_list_SM" />
                                            <label class="form-check-label" for="supplier_list_SM">
                                                Supplier List
                                            </label>                                      
                                     </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Branch Management</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="add_new_branch_BM" id="add_new_branch_BM" />
                                            <label class="form-check-label" for="add_new_branch_BM">
                                                Add New Branch
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="edit_BM" id="edit_BM" />
                                            <label class="form-check-label" for="edit_BM">
                                                Edit
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="delete_BM" id="delete_BM" />
                                            <label class="form-check-label" for="delete_BM">
                                                Delete
                                            </label>
                                        </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Unit Management</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="add_new_unit" id="add_new_unit" />
                                            <label class="form-check-label" for="add_new_unit">
                                                Add New Unit
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="edit_UM" id="edit_UM" />
                                            <label class="form-check-label" for="edit_UM">
                                                Edit
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="delete_UM" id="delete_UM" />
                                            <label class="form-check-label" for="delete_UM">
                                                Delete
                                            </label>
                                        </div>
                                    </div>
                                    <hr size="30" class="bg-success" noshade>
                                    <div class="div-header p-2">
                                        <h6>Location Management</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="add_new_location" id="add_new_location" />
                                            <label class="form-check-label" for="add_new_location">
                                                Add New Location
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-check-input" type="checkbox" name="edit_location" id="edit_location" />
                                            <label class="form-check-label" for="edit_location">
                                                Edit Location
                                            </label>
                                        </div>
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="delete_location" id="delete_location" />
                                            <label class="form-check-label" for="delete_location">
                                                Delete
                                            </label>
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

<script>
    $( document ).ready(function() {
        $("input[type=text]").keyup(function () {  
            $(this).val($(this).val().toUpperCase());  
        });
    
        $( "#check_all" ).click(function() {
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
            $('body').on('submit', '#SupplierForm', function (event) {
                
            event.preventDefault();
            console.log('Product Add submitting...');
            $.ajax({
                url: "{{ url('inventory-permission-add') }}",
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
    });
</script>