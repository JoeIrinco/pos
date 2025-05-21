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
                                <input type="hidden" id="edit_inventory_id" name="user_id" />
                                
                                    <div class="div-header p-2">
                                        <h6>Purchase Order List</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                        <input class="form-check-input"  type="checkbox" name="view_polist" id="view_polist" />
                                        <label class="form-check-label" for="view_polist">
                                            View PO Details
                                        </label>
                                        </div >
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
                                        </div >
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
                                        </div >
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
                                        </div >
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
                                        </div >
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
                                        </div >
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
                                        <h6>Product Add Manual</h6>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-2 col-md-5">
                                            <input class="form-check-input"  type="checkbox" name="add_prod_qty_PAM" id="add_prod_qty_PAM" />
                                            <label class="form-check-label" for="add_prod_qty_PAM">
                                                Add Product Quantity
                                            </label>

                                            <input class="form-check-input"  type="checkbox" name="add_prod_edit_PAM" id="add_prod_edit_PAM" />
                                            <label class="form-check-label" for="add_prod_edit_PAM">
                                                Edit Manual Add Details
                                            </label>
                                        </div >
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
                                        </div >
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
                                        </div >
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
    });
</script>