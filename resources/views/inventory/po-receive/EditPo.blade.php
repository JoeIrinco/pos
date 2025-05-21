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
                    <h4 class="mb-0"> Edit PO
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
                                        <div class="col-md-6">
                                            <label for="po_id">PO Number</label>
                                            <input type="text" class="form-control" name="po_id" id="po_id" disabled placeholder="Data" value="{{$store_purchase_orders->po_num}}" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid PO Number.
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <label for="status_po">PO Status</label>
                                            <select name="status" id="status_po" class="form-control" value="" required>
                                                <option value="">select</option>                                            
                                                <option value="Pending">Pending</option>
                                                <option value="Cancel">Cancel</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid PO Number.
                                            </div>
                                          </div>
                                     
                                          <div class="col-md-12" id="commentSection" @if ($store_purchase_orders->status =="Cancel")   style="display:block"@else style="display:none"   @endif >
                                            <label for="commentSection_data">Remarks</label>
                                            <textarea class="form-control" name="commentSection_data"   id="commentSection_data" >{{$store_purchase_orders->comment}}</textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid PO Number.
                                            </div>
                                          </div>
                                     
                                    </div>     
                                 
                                                        
                                    @foreach ($store_purchase_items as $store_purchase_item)
                                      <br>     
                                      <input type="hidden" class="form-control purchase_item_id" name="purchase_item_id" id="purchase_item_id" disabled placeholder="Data" value="{{$store_purchase_item->store_purchase_items_id}}" required>
                                      <div class="row">                
                                            <div class="col-md-4 mb-3">
                                                <label for="product_name">Product Name ({{$store_purchase_item->product_code}})</label>
                                                    <input type="text" disabled class="form-control product_name" name="product_name" id="product_name" placeholder="Data" value="{{$store_purchase_item->product_name}} {{$store_purchase_item->product_description}} {{$store_purchase_item->brand}}" required>
                                                <div class="invalid-feedback">
                                                  Please provide a valid Qunatity.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="qunatity">Quantity</label>
                                                    <input type="number" class="form-control qunatity" name="Quantity" id="quantity" placeholder="Data" value="{{$store_purchase_item->quantity}}" required>
                                                <div class="invalid-feedback">
                                                  Please provide a valid Qunatity.
                                                </div>
                                            </div>

                                            <div class="col-md-4  mb-3">
                                                <label for="status_product">Product Status</label>
                                                <select name="status" id="status_product" class="form-control status_product" value="" required>                                          
                                                    <option  @if ($store_purchase_item->items_status=="Pending")  selected @endif  value="Pending">Pending</option>
                                                    <option  @if ($store_purchase_item->items_status=="Cancel") selected @endif value="Cancel">Cancelled</option>
                                                    <option  @if ($store_purchase_item->items_status=="Completed") selected @endif value="Completed">Completed</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid PO Number.
                                                </div>
                                              </div>
                                              
                                       {{--      @if ($store_purchase_items_count>1)
                                            <div class="col-md-12 mb-3" align="right">
                                                <button  type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                            @endif --}}
                                            

                                        </div>   
                                    @endforeach
                                
                                          <br> <br> 
                                        <div class="col-md-12">
                                          <button id="Submit_receive" type="button" class="btn btn-dark btn-lg btn-block"><i class=" icon-cursor pr-1"></i><strong>Update PO&nbsp;</strong></button>                                            
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- state end-->

    
      <!--datatables-->
      <script src="{{asset('public/assets/vendor/data-tables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/assets/vendor/data-tables/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('public/assets/js/inventory/inventory.js?v=1')}}"></script>
      <script type="text/javascript">
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 
          $( document ).ready(function() {
              $('#status_po').val("{{$store_purchase_orders->status}}");

              $( "#status_po" ).change(function() {
                  if($( "#status_po" ).val()=="Cancel"){
                    $("#commentSection").css("display", "block");
                  }else{
                    $("#commentSection").css("display", "none");
                  }
                
            });
              
        });  

        $( "#Submit_receive").click(function( event ) {
          
            var po_id = $('#po_id').val();
            var status_po= $('#status_po').val()
            var qunatity = $('.qunatity');
            var purchase_item_id = $('.purchase_item_id');
            var commentSection_data = $('#commentSection_data').val();
            var status_product = $('.status_product');
            
            var qunatity_array = [];

            var purchase_item_id_array = [];

            var status_product_array = [];

            
            for(var i = 0; i < status_product.length; i++){
                  var g_data=$(status_product[i]).val();
                  status_product_array.push(g_data);
                  if(g_data==""){
                    add_count_null+=1;
                    $(status_product[i]).css("border","1px solid red");
                  }else{
                    $(status_product[i]).removeAttr("style");
                  }
          }

            for(var i = 0; i < qunatity.length; i++){
                  var g_data=$(qunatity[i]).val();
                  qunatity_array.push(g_data);
                  if(g_data==""){
                    add_count_null+=1;
                    $(qunatity[i]).css("border","1px solid red");
                  }else{
                    $(qunatity[i]).removeAttr("style");
                  }
          }

          for(var i = 0; i < purchase_item_id.length; i++){
                  var g_data=$(purchase_item_id[i]).val();
                  purchase_item_id_array.push(g_data);
                  if(g_data==""){
                    add_count_null+=1;
                    $(purchase_item_id[i]).css("border","1px solid red");
                  }else{
                    $(purchase_item_id[i]).removeAttr("style");
                  }
          } 


        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          $.ajax({
                url: "{{ url('inventory/update-po') }}",
                type: 'POST',
                data:
               {
                _token:token,
                po_id,
                status_po,
                qunatity_array,
                purchase_item_id_array,
                commentSection_data,
                status_product_array
                },
                success: function (response) {
                    console.log(response);
                    $('.send-loading').hide();
                    swal({
                        title: 'Success!',
                        text: 'Successfully Updated',
                        timer: 1500,
                        type: "success",
                    }, function () {
                       
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
        
   

      </script>

@endsection

