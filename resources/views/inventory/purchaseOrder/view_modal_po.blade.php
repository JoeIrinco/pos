

<div id="POModalView" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">PO Order View</h5>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div id="div-action-psi"></div>
          <br/>
          <div class="panel panel-primary main-content-panel">
            <div class="panel-heading">
              <h4 class="panel-title">View Purchase Order</h4>
            </div>
            
            <div class="panel-body">
              
              <div class="table-responsive">
                <button id="print_po" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                <table class="table table-hover table-bordered" id="table_view_project">
                  <tbody>
                      
                      <tr style="background-color:lightgrey">
                        <th colspan="4"><h4>PO Details</h4></th>
                      </tr>
                      <tr>
                          <th>PO Number :</th>
                          <td id="po_number">data</td>
                          <th>Status :</th>
                          <td id="Status">data</td>                   
                        </tr>
                      <tr>
                          <th>Order By :</th>
                          <td id="orderBy">data</td>  
                          <th>Order Date :</th>
                          <td id="oderDate" >data</td>                           
                        </tr>
  
                        <tr>
                            <th>Total Price :</th>
                            <td id="total_price" >data</td>                                           
                        </tr>


                        <tr style="background-color:lightgrey">
                          <th colspan="4"><h4>Supplier Details</h4></th>
                        </tr>
                        <tr>
                            <th>Supplier :</th>
                            <td id="supplier_name">data</td>
                            <th>Address :</th>
                            <td id="supplier_address">data</td>          
                          </tr>
                    
    
  
                    </tbody>  
                </table>
                
              </div>  
            </div>
          </div>
        </div>
        <div class="modal-footer">
          
          <button class="btn btn-dark" type="button" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
        </div>
      </div>
  
    </div>
  </div>
  
  
  