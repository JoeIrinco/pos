@extends('layouts.inventory.master')
@section('title','Home | Product Quantity Manual Add')
@section('page-title','Product Quantity Manual Add')

@section('stylesheets')
{{-- additional style here --}}

@endsection


<style>
    .btn-disable:hover{ 
        cursor: not-allowed;
    }
</style>

@section('content')

<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Vallery Product Quantity Manual Add</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Product Quantity Manual Add</li>
                    </ol>
                </div>
               
            </div>
        </div>
    </div>

    <!--page title end-->
    
    <!-- state start-->
    <div class="row">
        <div class=" col-sm-12">
            <div class="card card-shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        Product Quantity Manual Add
                    </div>
                    
                </div>

               
                
                <div class="card-header">
                    <div class="card-title">                            
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Location</button>                                                                                
                </div>
                
                <div class="card card-shadow mb-12">                
                <div class="card-body">
                    <div class="card-body product_id1">
                        <input type="hidden" id="transaction_Id" value="{{$datamanual->TI_id}}">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="po_num">PO Number</label>
                                <input type="text" style="" class="form-control  POnumber required_input"  name="POnumber" id="POnumber" placeholder="PO Number" value="BEGINNING" required>                                          
                                <div class="invalid-feedback">Please provide a valid PO Number.</div>
                            </div>
                            <div class="col-md-4 mb-3">                                   
                                <label for="po_num">Invoice Number</label>
                                <input type="text" style="" class="form-control  invoice_number required_input"  name="invoice_number" id="invoice_number" placeholder="Invoice Nnumber" value="BEGINNING" required>
                            </div>
                    
                        
                            
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="po_num">Product Name</label>
                                <input type="text" style="" class="form-control productSelect_data productSelect required_input" disabled  name="productSelect_value" id="productSelect_value" placeholder="" value="{{$datamanual->productname}} {{$datamanual->product_description}}" required>                                            
                                <div class="invalid-feedback">Please provide a valid Unit.</div>
                                <input type="hidden" id="productSelect" value="{{$datamanual->product_id}}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="po_num">Unit</label>
                                <select style="width:100%" id="unit" class="form-control required_input"  name="unit[]">
                                    <option value='0'>-- Select Unit --</option>                                    
                                    @foreach ($units as $unit)
                                    <option @if($unit->unit== $datamanual->unit) selected @endif value={{$unit->unit}}>{{$unit->unit}}</option>
                                @endforeach
                                </select>                                            
                                <div class="invalid-feedback">Please provide a valid Unit.</div>
                            </div>
                            <div class="col-md-3 mb-3">                                   
                                <label for="po_num">Unit Price</label>
                                <input type="number" style="" class="form-control OrderPrice_data OrderPrice required_input"  name="OrderPrice" id="OrderPrice" placeholder="0" value="{{$datamanual->price}}" required>
                            </div>
                            <div class="col-md-3 mb-3">                                   
                                <label for="action_state">Action</label>
                                <select class="form-control" name="action_state" id="action_state">
                                    <option value="" selected disabled>Select Action</option>
                                    <option selected  value="Add">Add Product Quantity Manually</option>
                                    <option value="minus">Minus Product Quantity Manually</option>
                                </select>
                            </div>
                        
                            
                        </div>
                       
                        <div class="receiveProduct">
                            <div class="form_location col-md-12">

                                <div class="productId">

                             {{-- set 2 --}}
                            <div class="row set_2">
                                <div class="col-md-2 mb-3">
                                    <label for="po_num">Quantity</label>
                                    <input type="number" class="required_input_set2 form-control qunatity_po qunatity_po_tr qunatity_po_function" value="{{$datamanual->TotalQuantity}}"  name="Quantity_po"
                                        id="qunatity_po" placeholder="0" value="" required>
                                    <div class="invalid-feedback">Please provide a valid Qunatity.</div>
                                </div>
                                    @if($datamanual->no_lot_no == 0)
                                    <div class="col-md-2 mb-3 lotDiv">
                                        <label for="lot_no">Lot No.</label>
                                        <select name="lot_no" id="lot_no" class="form-control lot_no @if($datamanual->no_lot_no == 0)required_input_set2 @endif" required>
                                            <option value="">Select Please</option>
                                            <option value="N/A"> N/A</option>
                                           
                                            @foreach ($lots as $lot)
                                                <option @if($lot->lot_no== $datamanual->lot_no) selected @endif  value="{{$lot->lot_no}}">{{$lot->lot_no}}</option>
                                            @endforeach
                                        </select>                                               
                                        <div class="invalid-feedback">Please provide a valid location.</div>
                                    </div> 
                                    @endif
                                   
                                
                                    @if($datamanual->no_lot_no == 0)
                                    <div class="col-md-2 expirationDiv">
                                        <label for="exp_date_1">Expiration Date</label>
                                    
                                       
                                        <div class="input-group date dpYears" data-date-viewmode="years"
                                                data-date-format="dd-mm-yyyy" data-date="{{ $datamanual->expiration_date }}">
                                                <input type="text" class="   @if($datamanual->no_lot_no == 0)required_input_set2  @endif form-control exp_date" id="exp_date"
                                                    placeholder="{{ $datamanual->expiration_date }}" aria-label="Right Icon"
                                                    aria-describedby="dp-ig" value="{{ $datamanual->expiration_date }}">
                                                <div class="input-group-append">
                                                    <button id="dp-ig" class="btn btn-outline-secondary"
                                                        type="button"><i class="fa fa-calendar f14"></i></button>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                  
                                
                                <div class="col-md-2 mb-3">
                                    <label for="po_num">Location</label>
                                    <select name="location_po" id="location_po" class="form-control location_po required_input_set2" required>
                                        <option value="">Select Please</option>
                                        @foreach ($locations as $location)
                                            <option @if($location->location== $datamanual->location_address) selected @endif  value="{{$location->location}}">{{$location->location}}</option>
                                        @endforeach
                                    </select>                                            
                                    <div class="invalid-feedback">Please provide a valid location.</div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="po_num">Rack</label>
                                    <select name="rock_po" id="rock_po" class="form-control rock_po required_input_set2" required>
                                        <option value="">Select Please</option>
                                        @foreach ($racks as $rack)
                                            <option  @if($rack->rack== $datamanual->rock) selected @endif value="{{$rack->rack}}">{{$rack->rack}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid shelf.</div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="po_num">shelf</label>
                                    <select name="shelf_po" id="shelf_po" class="form-control shelf_po required_input_set2" required>
                                        <option value="">Select Please</option>
                                        @foreach ($shelf_locations as $shelf_location)
                                            <option   @if($shelf_location->shelf== $datamanual->shelf) selected @endif  value="{{$shelf_location->shelf}}">{{$shelf_location->shelf}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid shelf.</div>
                                </div>    

                            
                            
                            </div>

                                </div>

                              
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <label for="remarks_manual_action">Remarks</label>
                                        <textarea class="form-control" id="remarks_manual_action" cols="10" rows="5">{{ $datamanual->remarks }}</textarea>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="po_num" style="font-size:16pt"> <strong>Extended Price</strong>   <a class="totalPrice_tmp" id="totalPrice">0.0</a> </label>
                        </div>

                        <div class="col-md-12">
                            <button type="button" class="btn btn-success pull-left add_location" id="AddManualProduct">  Update Inventory </button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- state end-->


    {{-- madal --}}
    @include('inventory.productManualAdd.newLocationModal') 
    

</div>
 


     {{--  <script src="{{asset('public/assets/js/inventory/po-list.js?v=4')}}"></script> --}}
      <script>
          var CSRF_TOKEN = "{{csrf_token()}}";
          var state_pane =0;


          function requiredData(){
                    var x=0;
                    var required_input = $('.required_input');
                    for(var i = 0; i < required_input.length; i++){
                        var g_data=$(required_input[i]).val();
                        if(g_data==""){                            
                            $(required_input[i]).addClass('requiredDataInput');
                            x++;
                        }else{
                            $(required_input[i]).removeClass('requiredDataInput');

                            
                        }
                                                            
                    }
                    if(x>0){
                            return 1;
                        }else{
                            return 0;
                        }
                }

                function requiredDataset2(){
                    var x=0;
                    var required_input = $('.required_input_set2');
                    for(var i = 0; i < required_input.length; i++){
                        var g_data=$(required_input[i]).val();
                        if(g_data==""){                            
                            $(required_input[i]).addClass('requiredDataInput');
                            x++;
                        }else{
                            $(required_input[i]).removeClass('requiredDataInput');

                            
                        }
                                                            
                    }
                    if(x>0){
                            return 1;
                        }else{
                            return 0;
                        }
                }
                

        function qty(){
            if(state_pane==1){
                    qunatity_po= $('#qunatity_po_1').val();
                }else{  
                    qunatity_po= $('#qunatity_po').val();
                }
                $('#totalPrice').text((qunatity_po*$('#OrderPrice').val()).toFixed(2));
        }
           $(document).ready(function(){
            
            $( "#action_state" ).change(function() {
              
                if($(this).val()=="minus"){
                //$('#qunatity_po').hide();
                $('#OrderPrice').prop('disabled', true);
                }else{
                //$('#qunatity_po').show();
                $('#OrderPrice').prop('disabled', false);
                }
               
                
                
            });
            var qunatity_po=0;
               $('.qunatity_po_function,.OrderPrice').keyup(function(){
                qty();
               });
            $('.set_1').hide();
           // $('.set_2').hide();

            $('#ExportForm').on('submit', function(event){ 
              
           event.preventDefault();  
           $.ajax({  
                url:"{{ url('import') }}",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){  

                }  
           });  
            }); 

               
            $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                        });

                   
                   $( "#AddManualProduct" ).click(function() {
                    var state;
                    if(state_pane==0){
                        state =requiredDataset2();
                    }else{
                        state =requiredData();
                    }  
                    if($('#unit').val() == 0 || $('#unit').val() == '0'){
                        state=1;
                    } 
                        
                if(state>0){
                    alert("All fields are Required");
                }else{
                                      
                    var invoice_number= $('#invoice_number').val();
                    var remarks = $('#remarks_manual_action').val();
                    var POnumber= $('#POnumber').val();
                    
                    var transaction_Id = $('#transaction_Id').val();
                        var action_state= $('#action_state').val();
                        var productSelect= $('#productSelect').val();
                        var OrderPrice= $('#OrderPrice').val();
                        var units= $('#unit').val();     
                        var qunatity_po= $('#qunatity_po').val();
                        var lot_no= $('#lot_no').val();
                        var exp_date= $('#exp_date').val();
                        var location_po= $('#location_po').val();
                        var rock_po= $('#rock_po').val();
                        var shelf_po= $('#shelf_po').val();
                    
                    if(lot_no == "N/A"){
                        lot_no= null;
                    }
                    $.ajax({
                           type:'POST',
                           url:'{{ url('inventory/edit-addProductInventory') }}',
                           data:
                           {
                            transaction_Id:transaction_Id,
                            action_state:action_state,
                            productSelect:productSelect,
                            OrderPrice:OrderPrice,
                            qunatity_po:qunatity_po,
                            lot_no:lot_no,
                            exp_date:exp_date,
                            location_po:location_po,
                            rock_po:rock_po,
                            shelf_po:shelf_po,
                            invoice_number,
                            POnumber,
                            units,
                            remarks
                            },
                           success:function(data){
                            if(data=="okay"){
                                swal({
                                    title: 'Success!',
                                    text: 'Successfully Update',
                                    timer: 1500,
                                    type: "success",
                                }, function () {
                                    location.href='../../inventory/list-addProductInventory';                                    
                                });
                            }
                           
                          },
                          error: function(){
                            alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                          }
                        });
                    }
                   });


                   $("#lot_no_1" ).change(function() {
                            if($('#lot_no_1').val() == "N/A"){                                
                                 $('#lot_no').removeClass('required_input_set2 ');
                                 $('#lot_no_1').removeClass('required_input ');
                            }else{
                                $(".lotDiv").show();
                                $('#lot_no').addClass('required_input_set2');
                                $('#lot_no_1').addClass('required_input');

                            }   
                    });
                    $("#lot_no" ).change(function() {
                            if($('#lot_no_1').val() == "N/A"){                             
                                 $('#lot_no').removeClass('required_input_set2 ');
                                 $('#lot_no_1').removeClass('required_input ');
                            }else{
                                $(".lotDiv").show();
                                $('#lot_no').addClass('required_input_set2');
                                $('#lot_no_1').addClass('required_input');

                            }   
                    });
                    

                  /*  $( "#lot_no" ).change(function() {
                       var lot = $(this).val();
                       var id = $('#productSelect').val();

                 
                        $.ajax({
                           type:'POST',
                           url:'{{ url('inventory/get-one-product-inventory') }}',
                           data:
                           {
                            id:id,
                            lot:lot
                            },
                           success:function(data){                                                        
                            $.each(data.transaction_items_lot, function (i, item) {
                                $('#exp_date').empty().append('<option selected="selected" value="">Select Please</option>');
                                $('#location_po').empty().append('<option selected="selected" value="">Select Please</option>');
                                $('#rock_po').empty().append('<option selected="selected" value="">Select Please</option>');
                                $('#shelf_po').empty().append('<option selected="selected" value="">Select Please</option>');
    
                                $('#exp_date').append($('<option>', { 
                                    value: item.expiration_date,
                                    text : item.expiration_date 
                                }));
                                $('#location_po').append($('<option>', { 
                                    value: item.location_address,
                                    text : item.location_address 
                                }));
                                $('#rock_po').append($('<option>', { 
                                    value: item.rock,
                                    text : item.rock 
                                }));
                                $('#shelf_po').append($('<option>', { 
                                    value: item.shelf,
                                    text : item.shelf 
                                }));


                            });

                          },
                          error: function(){
                            alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                          }
                        });
                    }); */
                    
                   $( "#productSelect" ).change(function() {

                    $('.lotDiv').show();
                    $('.expirationDiv').show();
                    $('.locationDiv').show();
                    $('.rackDiv').show();
                    $('.shelfDiv').show();
                       var id = $(this).val();
                 
                        $.ajax({
                           type:'POST',
                           url:'{{ url('inventory/get-one-product') }}',
                           data:
                           {
                            id:id
                            },
                           success:function(data){

                            $('#unit').val(data.product[0].unit).change();
                            if(data.transaction_items_lot.length == 0){
                                $('.set_1').show();
                                $('.set_2').hide();  
                                state_pane=1;                              
                            }else{
                                $('.set_1').hide();                                
                                 $('.set_2').show();
                                 state_pane=0;
                            }
                            qty();
                            if(data.product[0].no_expiration == 1){
                                 $(".expirationDiv").hide();
                                 $('#exp_date').removeClass('required_input_set2 ');
                                 $('#exp_date_1').removeClass('required_input ');
                                 
                           
                            }else{
                                $(".expirationDiv").show(); 
                                $('#exp_date').addClass('required_input_set2');                               
                                $('#exp_date_1').addClass('required_input');                               
                            }
                            if(data.product[0].no_lot_no == 1){
                                 $(".lotDiv").hide();
                                 $('#lot_no').removeClass('required_input_set2 ');
                                 $('#lot_no_1').removeClass('required_input ');
                            }else{
                                $(".lotDiv").show();
                                $('#lot_no').addClass('required_input_set2');
                                $('#lot_no_1').addClass('required_input');

                            }   
                            
                            $("#OrderPrice").val(data.product[0].selling_price);
                            var lot_no_inner=0;
                            var location_inner=0;
                            var expiration_date =0;
                            var rock=0;
                            var shelf_inner=0
                                                   
                            $('#lot_no').empty().append('<option selected="selected" value="">Select Please</option><option value="N/A">N/A</option>');
                            $('#location_po').empty().append('<option selected="selected" value="">Select Please</option>');
                            $('#rock_po').empty().append('<option selected="selected" value="">Select Please</option>');
                            $('#shelf_po').empty().append('<option selected="selected" value="">Select Please</option>');
                            $.each(data.lots, function (i, item) {
                                $('#lot_no').append($('<option>', { 
                                    value: item.lot_no,
                                    text : item.lot_no 
                                }));
                                if(item.lot_no!=""){
                                    lot_no_inner++;
                                }
                                
                            });

                           

                            
                            if(lot_no_inner==0 && state_pane !=1){
                            //    $('.lotDiv').hide();
                                $.each(data.transaction_items_lot, function (i, item) {
                                $('#lot_no').append($('<option>', { 
                                    value: item.expiration_date,
                                    text : item.expiration_date 
                                }));
                                if(item.expiration_date!="" && item.expiration_date!= null){
                                    expiration_date++;
                                }
                                
                            });
                           
                            }
                        
                    /*         if(expiration_date==0 && data.product[0].no_expiration == 0 && state_pane !=1){ */
                               
                                $.each(data.locations, function (i, item) {
                                $('#location_po').append($('<option>', { 
                                    value: item.location,
                                    text : item.location 
                                }));
                                
                            });


                            $.each(data.racks, function (i, item) {
                                $('#rock_po').append($('<option>', { 
                                    value: item.rack,
                                    text : item.rack 
                                }));
                                
                            });

                            $.each(data.shelf_locations, function (i, item) {
                                $('#shelf_po').append($('<option>', { 
                                    value: item.shelf,
                                    text : item.shelf 
                                }));                                
                            });


                            
                                                   
                          /*   } */
                            
                          },
                          error: function(){
                            alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                          }
                        });
                    });
           });
           
            
      </script>

@endsection

