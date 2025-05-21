@extends('layouts.inventory.master')
@section('title','Home | Inventory')
@section('page-title','Inventory')

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
                    <h4 class="mb-0"> Receiving Area
                        {{-- <small>Purchase Order receive</small> --}}
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="{{ url('inventory/purchase_order-list') }}" class="default-color">PO List</a></li>
                        <li class="breadcrumb-item active">{{$store_purchase_orders->po_num}}</li>
                    </ol>
                </div>
               
            </div>
        </div>
    </div>


                <!-- state start-->
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="card card-shadow mb-12">
                            <div class="card-header">
                                <div class="card-title">
                                    Order Details
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-group" id="receive_submit" method="POST"  enctype="multipart/form-data" novalidate>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="po_num">PO Number</label>
                                            <input type="text" class="form-control" name="po_num" id="po_num" disabled placeholder="Data" value="{{$store_purchase_orders->po_num}}" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid PO Number.
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <label for="po_num">Invoice Number</label>
                                            <input type="text" class="form-control" name="invoice_number_display" id="invoice_number_display" disabled placeholder="######"  required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Invoice Number.
                                            </div>
                                          </div>
                                          <div class="col-md-3">
                                            <label for="po_num"></label>
                                            <button id="Submit_receive" data-id="{{$store_purchase_orders->id}}" type="button" class="btn btn-dark btn-lg btn-block"> <i class=" icon-cursor pr-1"></i><strong> Set Invoice&nbsp;</strong></button>
                                          </div>
                                          <div class="col-md-3">
                                            <label for="po_num"></label>
                                            <button id="Print_Pending" data-id="{{$store_purchase_orders->id}}" type="button" class="btn btn-dark btn-lg btn-block"> <i class="fa fa-print"></i><strong> Print Pending &nbsp;</strong></button>
                                          </div>
                                          
                                <div class="col-md-12">
                                    
                                    <div class="card-body">
                                        <h4>Product Details</h4>
                                        <table id="Product_order" class="display table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product Name</th>
                                                <th>quantity Order</th>                            
                                                <th>Unit</th>                            
                                                <th>Price</th>
                                                <th>Total Price</th>                     
                                                <th>Order Date</th>
                                                <th>Remaining Order</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                           
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $store_purchase_item)
                                                <tr  @if ($store_purchase_item['items_status']=="Completed" || $store_purchase_item['items_status']=="Cancel") style=" background-color: rgb(180, 180, 180)"   @endif>
                                                    <td>{{$store_purchase_item['product_id']}}</td>
                                                    <td>{{$store_purchase_item['product_name']}}</td>
                                                    <td>{{$store_purchase_item['quantity']}}</td>
                                                    <td>{{$store_purchase_item['unit']}}</td>
                                                    <td>{{$store_purchase_item['amount']}}</td>
                                                    <td>{{$store_purchase_item['total']}}</td>
                                                    <td>{{date('M-d-Y', strtotime($store_purchase_item['created_at']))}}</td>
                                                    <td>{{$store_purchase_item['Remaining_Order']}}</td>
                                                    <td>{{$store_purchase_item['items_status']}}</td>
                                                    @if ($store_purchase_item['items_status'] == "Completed" || $store_purchase_item['items_status'] == "Replaced")
                                                    <td>No Action</td>
                                                     @else
                                                     <td><button  data-id="{{$store_purchase_item['id']}}"  type="button" class="btn btn-dark btn-block changeProduct"> Change Product</button> </td>
                                                    @endif
                                                    
                                              
                                                  </tr> 
                                                @endforeach

                                                                                               
                                              </tbody>
                                            <tfoot>
                                           
                                            </tfoot>
                                        </table>
                                            
                                        <div class="col-md-4 pull-right">
                                            <label for="po_num"></label>                                          
                                            <button id="Submit_receive2" disabled data-id="{{$store_purchase_orders->id}}" type="button" class="btn btn-dark btn-lg btn-block"> <i class=" icon-cursor pr-1"></i><strong> Receive Product &nbsp;</strong></button>                                            
                                          </div>

                                         
                                    </div>
                                    </div>
                                </div>    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- state end-->

       @include('inventory.po-receive.LocationModal')   
       @include('inventory.po-receive.receivePoModal')     
       @include('inventory.po-receive.replaceProductModal')     

     
      <script type="text/javascript">
      
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}";
                 
          $( document ).ready(function() {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            var CSRF_TOKEN = "{{csrf_token()}}";
                 $( "#productSelect_data" ).select2({
                       ajax: { 
                        type:'POST',
                       url:'{{ url('inventory/selectgetproduct_PO') }}',
                       data: function (params) {
                           return {
                           _token: CSRF_TOKEN,
                           search: params.term // search term
                           };
                       },
                       processResults: function(data, page) {
                         var Data2 = JSON.parse(data);
                         return {
                             results: $.map(Data2, function(item) {
                                 return { id: item.id, text: item.text };
                             })
                         };
                    }
                       
                     
                       }
                       
                   });
                   
    });


                var productselect = '#productSelect_data';
                   $(document).on('change',productselect,function () {
                   var prod_id=$(this).val();
                   console.log(prod_id);
                   
                   $.ajax({
                       type:'get',
                       url:'{{ url('findProduct_orderlist') }}',
                       data:{'id':prod_id},
                       dataType:'json',//return data will be json
                       success:function(data){
                      
                           if(data['state'] == 0){
                            $('#unit').val(data['data'].unit);
                            $('#showproduct').val(data['data'].product_name);
                            $('#sellingprice').val(data['data'].amount);
                            $('#product_id').val(data['data'].product_id);
                           }
                           if(data['state'] == 1){
                            $('#sellingprice').val(data['data'].capital);
                            $('#unit').val(data['data'].unit);
                            $('#showproduct').val(data['data'].productname);                            
                            $('#product_id').val(data['data'].id);
                           }
                           
                         
                           
                           
                        /*    console.log(data.productname);
                           console.log(data.sellingprice); */
   
                       },
                       error:function(){
   
                       }
                   });
               });

          $('.changeProduct').click(function(){
            var id = $(this).attr("data-id");  
            $('#productId').val(id);
            $('.replacedProduct').modal('show');
          });
          $( document ).ready(function() {

            $('.receivePoModal_form_joe').on('hidden.bs.modal', function () {
                var invoice = $('#invoice_number').val();
                if(invoice==""){
                    $('#Submit_receive2').prop("disabled", true); // Element(s) are now enabled.
                    $('#invoice_number_display').val(""); // Element(s) are now enabled.                

                }else{                    
                    $('#Submit_receive2').prop("disabled", false); // Element(s) are now enabled.
                    $('#invoice_number_display').val(invoice); // Element(s) are now enabled.                
                }
            });

            var table = $('#Product_order').DataTable({                    
              'columnDefs': [
                 {
                    'targets': 0,
                    'checkboxes': {
                       'selectRow': true
                    }
                 }
              ],
              'select': {
                 'style': 'multi'
              },
              /* 'order': [[2, 'asc']], */
              "aoColumnDefs": [
              { "bSortable": false, "aTargets": [0] }, 
    ]
              
            });
   
            
            $('body').on('click', '#Print_Pending', function(e) {
                var id = $(this).attr("data-id");
                window.open('../../inventory/get-po-details-pending-pdf/'+id);
            });
            
            
            $('body').on('click', '#submitChangeProduct', function(e) {
                var oldId = $('#productId').val();
                var productId = $('#productSelect_data').val();
                var qty = $('#qty').val();
                var unit = $('#unit').val();
                var sellingprice = $('#sellingprice').val();
                $.ajax({
                   type:'POST',
                   url:'{{ url('inventory/change-product') }}',
                   data:
                   {
                    _token:token,
                    oldId:oldId,
                    productId:productId,
                    qty: qty,
                    unit: unit,
                    sellingprice: sellingprice,
                    },
                   success:function(data){

                                swal({
                                   title: 'Sucess!',
                                   text: "Warning Msg: Product was Replaced",
                                   //timer: 1500,
                                   type: "success",
                               });

                    location.reload();
                    },
                  error: function(){
                    alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                  }
                });
            });

            $('body').on('click', '#Submit_receive2', function(e) {
                var form = $('#receive_submit');
                var rows_selected = table.column(0).checkboxes.selected();
                var invoice_number = $('#invoice_number').val();
                var po = $('#po_num').val();
                var product_ids= rows_selected.join("-");

                $.ajax({
                   type:'POST',
                   url:'{{ url('inventory/get-invoice') }}',
                   data:
                   {
                    invoice:invoice_number, 
                    _token:token,
                    product_ids:product_ids,
                    po:po
                    },
                   success:function(data){
                    console.log(data);
                    if(product_ids == ""){
                            swal({
                                   title: 'warning!',
                                   text: "Warning Msg: You need Choose atleast one(1) Product",
                                   //timer: 1500,
                                   type: "warning",
                               });
                    }else
                    if(data.store_purchase_orders>0){
                        swal({
                                   title: 'warning!',
                                   text: "Warning Msg: Incoive already Exist",
                                   //timer: 1500,
                                   type: "warning",
                               });
                    }else if(data.orderPo>0){
                        swal({
                                   title: 'warning!',
                                   text: "Warning Msg:One of the product Was cancelled",
                                   //timer: 1500,
                                   type: "warning",
                               });
                    }else{
                        if(product_ids != ""){
                           window.location.href = "../receive-product/"+invoice_number+"/"+product_ids+"/"+po;

                        }
                    }

                  },
                  error: function(){
                    alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                  }
                });
              
               
                e.preventDefault();
             });   
                 
          
            $("#Submit_receive").click(function( event ) {                      
                $('.receivePoModal_form_joe').modal('show');
            });
        });    
   

      </script>

@endsection

