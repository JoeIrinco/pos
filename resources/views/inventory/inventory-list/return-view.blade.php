@extends('layouts.inventory.master')
@section('title','Home | Purchase Order')
@section('page-title','Purchase Order')

@section('stylesheets')
{{-- additional style here --}}


@endsection

@section('content')



<div class="container-fluid">


    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Vallery Purchase Return Invoice List</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Return Invoice List</li>
                    </ol>
                </div>
               
            </div>
        </div>
    </div>

    <!--page title end-->

    <!--page title end-->
    
      <!-- state start-->
      <div class="row">
        <div class=" col-sm-12">
            <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            Return Invoice List
                        </div>
                        <div class="card card-shadow mb-4">
                            {{--      <div class="card-header">
                                    <div class="card-title">
                                        <button id="print_po" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                                    </div>
                                    
                                </div> --}}
                            
                            <div class="card-body">
                                <table id="invoice-table" class="display table table-bordered table-striped" style="width: 100%">
                                    <thead>
                                        <tr>                  
                                            <th>PO</th>                                                      
                                            <th>Product ID</th>                            
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Lot</th>
                                            <th>Location</th>
                                            <th>Shelf</th>
                                            <th>Rack</th>
                                            <th>Expiration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($invoicelist as $item)
                                            <tr>
                                                <td>{{ $item->po_id }}</td>
                                                <td>{{ $item->productname." ".$item->product_description." ".$item->brand }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->lot_no }}</td>
                                                <td>{{ $item->location_address }}</td>
                                                <td>{{ $item->shelf }}</td>
                                                <td>{{ $item->rock }}</td>
                                                <td>@if (!isset($item->expiration_date))
                                                    N/A
                                                    @else
                                                    {{$item->expiration_date}}
                                                @endif</td>
                                                <td>
                                                    <div class='dropdown'>
                                                        <button class='btn btn-dark' type='button' onclick='btn_action({{ $item->transaction_id }},"return")'>Return</button>
                                                       {{--  @if ($item->transaction_type == "REPLACEMENT_P_PO")
                                                        <button class='btn btn-danger' id="deleteBtn" data-id="{{ $item->transaction_id }}" type='button' >Delete Replace</button>    
                                                        @endif --}}
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                        
                                    </tbody>
                                    <tfoot>
                                    
                                    </tfoot>
                                </table>

                               {{--  <br>
                                <h3>Return/Replace Transaction</h3>
                                <table id="invoice-table" class="display table table-bordered table-striped" style="width: 100%">
                                    <thead>
                                        <tr>                  
                                            <th>PO</th>                                                      
                                            <th>Product ID</th>                            
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Lot</th>
                                            <th>Location</th>
                                            <th>Shelf</th>
                                            <th>Rack</th>
                                            <th>Expiration</th>
                                            <th>Transaction type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($invoicelistData as $item)
                                            <tr>
                                                <td>{{ $item->po_id }}</td>
                                                <td>{{ $item->productname." ".$item->product_description." ".$item->brand }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->lot_no }}</td>
                                                <td>{{ $item->location_address }}</td>
                                                <td>{{ $item->shelf }}</td>
                                                <td>{{ $item->rock }}</td>
                                                <td>@if (!isset($item->expiration_date))
                                                    N/A
                                                    @else
                                                    {{$item->expiration_date}}
                                                @endif</td>
                                                <td>
                                                    @if ($item->transaction_type == "REPLACEMENT_P_PO")
                                                    Replacement
                                                    @elseif($item->transaction_type == "RETURN_P_PO")
                                                    Return
                                                    @endif
                                                
                                                </td>
                                                <td>
                                                    <div class='dropdown'>
                                                        <button class='btn btn-danger' id="deleteBtn" data-id="{{ $item->transaction_id }}" type='button' >Delete Transaction</button>    
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                        
                                    </tbody>
                                    <tfoot>
                                    
                                    </tfoot>
                                </table> --}}
                            </div>
                    </div>
                    </div>
                   
        </div>
    </div>
    <!-- state end-->
</div>



<div class="modal fade bd-example-modal-lg" id="return_item" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Return Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="SupplierForm" enctype="multipart/form-data" novalidate>
                            @csrf
                                <input type="hidden" id="transaction_id" name="transaction_id" />

                                    <div class="row">
                                        <label class="col-sm-3 col-sm-offset-9 col-form-label">Max Allowed: <span id="max_allowed"></span></label>
                                    </div>   
                                    <div class="form-group row">
                                        <label for="return_qty" class="col-sm-3 col-form-label">Quantity to be return</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="return_qty" onkeypress="return isNumber(event)"  placeholder="0">
                                        </div>

                                        <div class="col-sm-12">
                                        <label for="remarks_return" class="col-sm-3 col-form-label">Remarks</label>
                                            <Textarea class="form-control" id="remarks_return"></Textarea>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="remarks_return" class="col-sm-3 col-form-label">Operation</label>
                                            <select name="operationData" id="operationData" class="form-control">
                                                <option value="">Select Operation</option>
                                                <option value="replacement">For Replacement</option>
                                                <option value="return">For Return</option>
                                            </select>                                              
                                            </div>


                                    </div>     
                            <div id="buttonReturn" style="display: none">
                                <div class="col-md-12 mb-3">
                                    <select style="width:100%" id="productSelect" class="form-control"  name="product_name[]">
                                        <option value='0'>-- Select Product --</option>
                                    </select>
                                </div>                                
                            </div>  
                            <button class="btn btn-primary" id="sumbmitFunction"  type="button">Return</button>
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
<!-- Placed js at the end of the page so the pages load faster -->
{{-- conflict --}}
{{-- <script src="/vallery/public/css2/vendor/jquery/jquery.min.js"></script>
<script src="/vallery/public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script> --}}


<script src="/vallery/public/css2/vendor/popper.min.js"></script>

<script src="/vallery/public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
<script src="/vallery/public/css2/vendor/lobicard/js/lobicard.js"></script>
<script class="include" type="text/javascript" src="/vallery/public/css2/vendor/jquery.dcjqaccordion.2.7.js"></script>
<script src="/vallery/public/css2/vendor/jquery.scrollTo.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!--datatables-->
<script src="/vallery/public/css2/vendor/data-tables/jquery.dataTables.min.js"></script>
<script src="/vallery/public/css2/vendor/data-tables/dataTables.bootstrap4.min.js"></script>



{{-- <!--init scripts--> --}}
{{-- <script src="/vallery/public/css2/js/scripts.js"></script> --}}

<!--toaster-->
<script src="/vallery/public/css2/vendor/toastr-master/toastr.js"></script>
<script src="/vallery/public/css2/vendor/toastr-master/toastr-init.js"></script>


<script>
    $( document ).ready(function() {
        var CSRF_TOKEN = "{{csrf_token()}}";
    
        
           /*  $('#operationData').change(function(){
                var stateData = $(this).val();
                    if(stateData == "return"){
                        $('#buttonReturn').hide()
                    }else{
                        $('#buttonReturn').show()
                        
                    }
            }); */
    
    
                    
            $( "#productSelect" ).select2({
                           ajax: { 
                           url: '../selectgetproduct_PO',
                           type: 'post',
                           dataType: 'json',
                           delay: 250,
                           data: function (params) {
                               return {
                               _token: CSRF_TOKEN,
                               search: params.term // search term
                               };
                           },
                           processResults: function (response) {
                               return {
                               results: response
                               };
                           },
                           dropdownParent: $('#return_item'),
                           cache: true
                           }
       
                       });
    
    
                    
    });
    $('#deleteBtn').click(function(){
         swal({
          title: "Are you sure?",
          text: "But you will still be able to retrieve this Data.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, archive it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
                 alert("not functional");
                 location.reload();
          } else {
            swal("Cancelled", "Your Data file is safe :)", "error");
          }
        });
    });
    $('#sumbmitFunction').click(function(){
        
        var id = $('#transaction_id').val();
                    var qty = $('#return_qty').val();
                    var returnDefProduct = $('#productSelect').val();
                    var operationData =  $('#operationData').val();
                    var remarks_return = $('#remarks_return').val();
                    if(remarks_return==""){
                        swal({
                            title: 'Error!',
                            text: "Error Msg: Remarks are required",
                            //timer: 1500,
                            type: "error",
                        });
                    }else if(qty == "" || qty<=0){
                        swal({
                            title: 'Error!',
                            text: "Error Msg: Quantity are required",
                            //timer: 1500,
                            type: "error",
                        });
                    }
                    else{
                        
                    
                    $.ajax({
                        url: '{{ url('inventory/save-one-return') }}',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id':id,
                            'qty':qty,
                            'operationData':operationData,
                            'remarks_return':remarks_return,
                            'product': returnDefProduct
                        },
                        beforeSend: function () {
                            $('.send-loading').show();
                        },
                        success: function (response) {
                           if(response=="qtyU"){
                            swal({
                            title: 'Error!',
                            text: "Error Msg: Quantity Invalid",
                            //timer: 1500,
                            type: "error",
                        });
    
                           } 
                           else if(response=="noReturn"){
                            swal({
                            title: 'Error!',
                            text: "Error Msg: No Return for this item",
                            //timer: 1500,
                            type: "error",
                        });
                           } else 
                           if(response=="ok"){
                            swal({
                                        title: 'Success!',
                                        text: 'Successfully Set as Return Item',
                                        timer: 1500,
                                        type: "success",
                                    }, function () {
                                        window.location.href =  '../invoice-list';
    
                                    });
                           }
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
                }
    });

            function btn_action(id,Transaction){
                console.log(id+" "+ Transaction);
                if(Transaction=='return'){               
                    $.ajax({
                        url: '{{ url('inventory/get-one-transaction') }}',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id':id
                        },
                        beforeSend: function () {
                            $('.send-loading').show();
                        },
                        success: function (response) {
                            if(response == 'invalidQuantity'){
                                swal({
                                title: 'Error!',
                                text: "Error Msg: Already Request all Stocks",
                                timer: 1500,
                                type: "error",
                            });
                            }else{
                                $('#transaction_id').val(response.id);
                                $('#max_allowed').text(response.finalQty);
                                $("#return_item").modal('show');
    
                            }
                           
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
                }
            }
    
            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
    
     
    
    
    </script>
    
@endsection

