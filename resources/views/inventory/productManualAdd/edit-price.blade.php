<div id="receive_POModalView" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Price</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <input type="hidden" id="productID" value="">
        <div class="modal-body">
         <div class="row">
            <div class="col-md-12 mb-3">
              <label for="po_num">Capital Price</label>
              <input type="number" class="form-control" name="capital" id="capital"  placeholder="Data" value="" required>
              <div class="invalid-feedback">
                  Please provide a valid PO Number.
              </div>
            </div>
{{--             <div class="col-md-6 mb-3">
              <label for="po_num">SRP Price</label>
              <input type="number" class="form-control" name="selling" id="selling"  placeholder="Data" value="" required>
              <div class="invalid-feedback">
                  Please provide a valid PO Number.
              </div>
            </div> --}}

            <br> <br> 
            <div class="col-md-12">
              <button id="submit" type="button" class="btn btn-dark btn-lg btn-block"><i class=" icon-cursor pr-1"></i><strong>Update&nbsp;</strong></button>                                            
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-dark" type="button" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
        </div>
      </div>
  
    </div>
  </div>
  
  
  