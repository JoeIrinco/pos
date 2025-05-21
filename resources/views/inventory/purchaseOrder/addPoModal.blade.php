<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="product_id" name="product_id" style="border-color: rgb(0, 0, 0);" class="form-control" >
            <div class="card-body">
                <div class="row">
                        <div class="col-md-12 mt-3">
                            <strong><label >Product Description *:</label></strong>
                        </div>
                        <div class="col-md-12 mb-3">
                            <select style="width:100%" id="productSelect" class="form-control"  name="product_name[]">
                                <option value='0'>-- Select Product --</option>
                            </select>
                        </div>
                </div>
        
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong><label for="validationCustom03">Quantity *:</label></strong>
                        <input type="number" id="qty" name="quantity[]" style="border-color: rgb(0, 0, 0);" class="form-control" >
                        <input type="text" hidden  id="showproduct" class="form-control" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong><label for="validationCustom04">Unit *:</label></strong>
                        <input type="text" id="unit" name="unit[]" style="border-color: rgb(0, 0, 0);" class="form-control" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <Strong><label for="validationCustom05">Price *:</label></Strong>
                        <input type="number" id="sellingprice" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control" > 
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-info add_item"><i class="fa fa-cart-plus pr-1"></i><strong> Add Item</strong></button>
                    </div>
                </div>
                
                
            </div>
                                
                      
                
        
                <form id="form" action="orders" method="POST">
                    <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
                    <div class="container-fluid">
          
        
        
                    </div>
                
                </form>
               

            </div>
            <div class="modal-footer">
              {{--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
