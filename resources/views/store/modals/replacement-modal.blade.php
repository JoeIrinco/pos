<div class="card-body">
    <div class="modal bd-example-modal-lg" id="modalbodyforupdate"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="myLargeModalLabel">Details of returned item</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class=" col-md-12">
                        {{-- <div class="mb-4">
                            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
                        </div> --}}
                    </div>

                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Details of replaced item</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                    </div>
                    

                    {{-- 2nd div start here --}}
                    <div class="modal-body ">
                        <div class=" col-md-12">
                            <div {{-- class="mb-4" --}}>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <strong><label >Product Description:</label></strong>
                                        <br>
                                        <label id="mdisplay_prod_des" class="text-info" > </label>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3 mb-3">
                                        <strong><label >Rack:</label></strong>
                                        <br>
                                        <select style="width:100%;" id="select_rock" data-placeholder='-- Select Shelf --' class="form-control">
                                        
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <strong><label >Shelf:</label></strong>
                                        <br>
                                        <select style="width:100%;" id="select_shelf" data-placeholder='-- Select Rock --' class="form-control">
                                        
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <strong><label >Expiration:</label></strong>
                                        <br>
                                        <label id="mdisplay_exp_date" class="text-info" > </label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <strong><label >Lot No.:</label></strong>
                                        <br>
                                        <label id="mdisplay_lot_no" class="text-info" > Lot No. Here!</label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <strong><label >Qty/Unit:</label></strong>
                                        <br>
                                        <label id="mdisplay_qty_unit" class="text-info" > Expiration Here!</label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <strong><label >Unit Price:</label></strong>
                                        <br>
                                        <label id="mdisplay_unit_price" class="text-info" > Lot No. Here!</label>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <strong><label >Total:</label></strong>
                                        <br>
                                        <label id="mdisplay_original_total" class="text-info" > Lot No. Here!</label>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-4">
                                        <strong><label for="validationCustom05">Number of returned items*:</label></strong>
                                        <input type="number" id="num_of_replace_no" style="border-color: rgb(0, 0, 0);" class="form-control">
                                    </div>
                                </div> --}}
                                
                                {{-- <div class="row">
                                    <div id="div_third" class=" col-md-12" >
                                        
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                        {{-- 2nd div end here --}}
                </div>






                <div class="modal-body">
                    <div class=" col-md-12 ">
                        {{-- <div class="mb-4"> --}}

                            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">

                            
                        {{-- </div> --}}
                    </div>

                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Details of replacement item</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                    </div>


                    {{-- 2nd div start here --}}
                    <div class="modal-body">
                        <div class=" col-md-12">
                            <div {{-- class="mb-4" --}}>

                                <div class="row">
                                    <div id="div_third" class=" col-md-12" >
                                        <div hidden class="row">
                                            <div hidden>
                                                <label hidden readonly>id</label><label id="item_id" hidden readonly></label>
                                                <label hidden readonly>orders id</label><label id="transaction_id" hidden readonly></label>
                                                <label id="product_id" hidden readonly></label>
                                            </div>
                                            <div class="col-md-6 mb-0">
    
                                                <strong><label>Product Description:</label></strong>&nbsp;<u><label class="text-decoration: underline;"  id="display_product_description"></label></u>
                                            </div>
                                        </div>
                                        <div hidden class="row">
                                            <div class="col-md-3 mb-0">
                                                <strong><label>Amount:</label></strong>&nbsp;<label id="display_amount"></label>
                                            </div>
                                            <div class="col-md-3 mb-0">
                                                <strong><label>Qty:</label></strong>&nbsp;<label id="display_quantity"></label>
                                            </div>
                                            <div class="col-md-3 mb-0">
                                                <strong><label>Total:</label></strong>&nbsp;<label id="display_total"></label>
                                            </div>
                                            <div class="col-md-3 mb-0">
                                                <strong><label>Unit:</label></strong>&nbsp;<label id="display_unit"></label>
                                            </div>
                                            <div class="col-md-6 mb-0">
                                                <strong><label>Lot No.:</label></strong>&nbsp;<label id="dis_lotno"></label>
                                            </div>
                                            <div class="col-md-6 mb-0">
                                                <strong><label>Expiry:</label></strong>&nbsp;<label id="dis_expiry"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 {{-- mt-3 --}}">
                                                
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <strong><label >Product Description *:</label></strong>
                                                        <select style="width:100%;" id="productSelect" data-placeholder='-- Select Product --' class="form-control"  name="product_name[]">
                                                            <option value='0'>-- Select Product --</option>
                                                        </select>
                                                        <label id="item_status" class="text-info" ></label>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Expiration *:</label></strong>
                                                        <select style="width:100%;" id="select_expiry" data-placeholder='-- Select Product --' class="form-control"></select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Lot No. *:</label></strong>
                                                        <select style="width:100%;" id="select_lot_no" data-placeholder='-- Select Product --' class="form-control"></select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Rack:</label></strong>
                                                        <br>
                                                        <select style="width:100%;" id="select_rock2" data-placeholder='-- Select Shelf --' class="form-control">
                                                        
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Shelf:</label></strong>
                                                        <br>
                                                        <select style="width:100%;" id="select_shelf2" data-placeholder='-- Select Rock --' class="form-control">
                                                        
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="row">
                                                    <div id="div_unit" class="col-md-6 mb-1" style="display: none;">
                                                        <strong><label for="validationCustom04">Unit:&nbsp;</label></strong><label id="label_unit" for="validationCustom04"></label>
    
                                                    </div>
                                                    <div id="div_srp" class="col-md-6 mb-1" style="display: none;">
                                                        <strong><label for="validationCustom04">SRP:&nbsp;</label></strong><label id="label_srp" for="validationCustom05">&nbsp;</label>
    
                                                    </div>
                                                </div>
    
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <strong><label for="validationCustom03">Quantity *:</label></strong>
                                                        <input type="number" id="qty" name="quantity[]" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                        <input type="text" hidden  id="showproduct" class="form-control">
                                                        <input type="text" hidden  id="id_product" class="form-control">
                                                        <input type="text" hidden  id="item_id" class="form-control">
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <strong><label for="validationCustom05">Price*:</label></strong>
                                                        <input type="number" id="sellingprice" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control" readonly>
                                                    </div>
                                                </div>
    
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                    </div>
                                                    <div id="div_custom_price" {{-- style="display: none;" --}} class="col-md-8 mb-3">
                                                        <strong><label for="validationCustom05">Custom Price:</label></strong>
                                                        <input type="number" id="custom_price" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                </div>
    
                                                <div class="row">
                                                    <div class="col-md-12 mb-5">
                                                        <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-success replaced_item" disabled><i class="fa fa-cart-plus pr-1"></i><strong> REPLACE</strong></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                        {{-- 2nd div end here --}}

                    <div class="modal-footer">
                        <!--   <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".show-replaced-item">View</button>-->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- <button id="save" type="button" class="btn btn-success">Save</button> --}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>