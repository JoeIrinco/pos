<div id="receive_POModalView" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">PO Order Receive</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-md-6 mb-3">
              <label for="po_num">PO Number</label>
              <input type="text" class="form-control" name="po_num" id="po_num" disabled placeholder="Data" value="" required>
              <div class="invalid-feedback">
                  Please provide a valid PO Number.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="po_num">Invoice</label>
              <input type="text" class="form-control" name="invoice" id="invoice" placeholder="Data" value="" required>
              <div class="invalid-feedback">
                  Please provide a valid Invoice Number.
              </div>
           </div>
            <div class="col-md-12">
              <hr>
              <h5 for="po_num">Product Order Details</h5>
              <hr>
            </div>
            <div class="col-md-6 mb-3">
              <label for="branch_add">Branch</label>
              <select name="branch_add" class="form-control" required>
                  <option value="">select</option>
                  @foreach ($branches as $branch)
                  <option value="{{$branch->name}}">{{$branch->name}}</option>
                  @endforeach
                                                                                                       
              </select>
              <div class="invalid-feedback">
                  Please provide a valid Branch.
              </div>
          </div>
            <div class="col-md-6 mb-3">
              <label for="po_num">Location</label>
              <input type="text" class="form-control" name="location" id="location" placeholder="Data" value="" required>
              <div class="invalid-feedback">
                  Please provide a valid location.
              </div>
           </div>
           <div class="col-md-6 mb-3">
            <label for="po_num">Expiration Date</label>                       
            <div class="ccol-md-6 mb-3">
              <div class="input-group date dpYears" data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="03-10-2018">
                  <input type="text" class="form-control" placeholder="03-10-2018" aria-label="Right Icon" aria-describedby="dp-ig">
                  <div class="input-group-append">
                      <button id="dp-ig" class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
                  </div>
              </div>
          </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="po_num">Qunatity</label>
            <input type="number" class="form-control" name="qunatity" id="qunatity" placeholder="Data" value="" required>
            <div class="invalid-feedback">
                Please provide a valid Qunatity.
            </div>
         </div>
         
            <br> <br> 
            <div class="col-md-12">
              <button id="Submit" type="button" class="btn btn-dark btn-lg btn-block"><i class=" icon-cursor pr-1"></i><strong>Sumbit PO&nbsp;</strong></button>                                            
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-dark" type="button" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
        </div>
      </div>
  
    </div>
  </div>
  
  
  