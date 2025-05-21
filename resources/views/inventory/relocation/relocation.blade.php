@extends('layouts.inventory.master')
@section('title', 'Home | Inventory')
@section('page-title', 'Inventory')

@section('stylesheets')
    
@endsection
<style>
    #print_preview {
font-family: Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#print_preview td, #print_preview th {
border: 1px solid #ddd;
padding: 8px;
}

#print_preview tr:nth-child(even){background-color: #f2f2f2;}

#print_preview tr:hover {background-color: #ddd;}

#print_preview th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #04AA6D;
color: white;
}


.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>

@section('content')

    <div class="container-fluid">

        <!--page title start-->
        <div class="page-title">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-8">
                        <h4 class="mb-0"> Product Replace Area
                            {{-- <small>Purchase Order receive</small> --}}
                        </h4>
                        <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                            {{-- <li class="breadcrumb-item"><a href="{{ url('inventory/purchase_order-list') }}" class="default-color">PO List</a></li> --}}
                            <li class="breadcrumb-item active">{{-- {{$store_purchase_orders->po_num}} --}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <form class="form-group" id="product_form_set" method="POST" enctype="multipart/form-data" novalidate>
            
            @csrf

            <input type="hidden" id="location_address" value="{{$transaction_items->location_address}}">
            <input type="hidden" id="pruduct_id" value="{{$transaction_items->product_id}}">
            <input type="hidden" id="lot_no" value="{{$transaction_items->lot_no}}">
            <input type="hidden" id="expiration_date_new" value="{{$transaction_items->expiration_date}}">
            <input type="hidden" id="rock_new" value="{{$transaction_items->rock}}">
            <input type="hidden" id="shelfnew" value="{{$transaction_items->shelf}}">
            

            <div class="card card-shadow mb-12 ">
                <div class="card-header">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-3">
                                <p for="po_num"><Strong> Product Name: </Strong></p>
                                <div class="ccol-md-4 mb-2">
                                    <h4>{{$transaction_items->productname}} {{$transaction_items->product_description}}</h4>
                                  
    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <p for="po_num"><Strong>Location:</Strong></p>
                                <div class="ccol-md-4 mb-2">
                                    <h4>{{$transaction_items->location_address}}</h4>    
                                </div>
                            </div>
                            @if ($transaction_items->no_lot_no == 0)
                            <div class="col-md-3">
                                <p for="po_num"><Strong>Lot:</Strong></p>
                                <div class="ccol-md-4 mb-2">
                                    <h4>{{$transaction_items->lot_no}}</h4>    
                                </div>
                            </div>
                            @endif

                            @if ($transaction_items->no_expiration == 0)
                            <div class="col-md-3">
                                <p for="po_num"><Strong>Expiration date:</Strong></p>
                                <div class="ccol-md-4 mb-2">
                                    <h4>{{$transaction_items->expiration_date}}</h4>    
                                </div>
                            </div>
                            @endif

                            <div class="col-md-3">
                                <p for="po_num"><Strong>Rack:</Strong></p>
                                <div class="ccol-md-4 mb-2">
                                    <h4>{{$transaction_items->rock}}</h4>    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p for="po_num"><Strong>Shelf:</Strong></p>
                                <div class="ccol-md-4 mb-2">
                                    <h4>{{$transaction_items->shelf}}</h4>    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p for="po_num"><Strong>All Stocks:</Strong></p>
                                <div class="ccol-md-4 mb-3">
                                    <p style="font-size: 25px">{{$stocks}}</p>    
                                </div>
                            </div>
                            

                        </div>
                       

                    </div>
                </div>
                <div id="mainVeiw">
                    <div class="productId{{ $transaction_items->product_id }}">  
                    <div class="form_location{{$transaction_items->product_id}} col-md-12">

                        <div class="productId{{ $transaction_items->product_id }}">
                            <div class="row">
                                <div class="col-md-1 mb-3">
                                    <label for="po_num">Quantity</label>
                                    <input type="number" class="required_input form-control qunatity_po{{$transaction_items->product_id}} qunatity_po_tr" data-id="{{$transaction_items->product_id}}" name="Quantity_po"
                                        id="qunatity_po" placeholder="0" value="" required>
                                    <div class="invalid-feedback">Please provide a valid Qunatity.</div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="po_num">Unit</label>
                                    <input type="text" class="form-control" id="unit" value="{{$transaction_items->units}}" readonly>                                          
                                    <div class="invalid-feedback">Please provide a valid Unit.</div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="po_num">Location</label>
                                    <select name="location_po" id="location_po" class="form-control location_po{{$transaction_items->product_id}}" required>
                                        <option value="">Select Please</option>
                                        @foreach ($locations as $location)
                                            <option @if(isset($transaction_items->location_address)) @if($transaction_items->location_address == $location->location) selected @endif @endif value="{{$location->location}}">{{$location->location}}</option>
                                        @endforeach
                                    </select>
                                    
                                    <div class="invalid-feedback">Please provide a valid location.</div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="po_num">Rack</label>
                                    <select name="rock_po" id="rock_po" class="form-control rock_po{{$transaction_items->product_id}}" required>
                                        <option value="">Select Please</option>
                                        @foreach ($racks as $rack)
                                            <option @if(isset($transaction_items->rock)) @if($transaction_items->rock == $rack->rack) selected @endif @endif  value="{{$rack->rack}}">{{$rack->rack}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid shelf.</div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="po_num">shelf</label>
                                    <select name="shelf_po" id="shelf_po" class="form-control shelf_po{{$transaction_items->product_id}}" required>
                                        <option value="">Select Please</option>
                                        @foreach ($shelf_locations as $shelf_location)
                                            <option @if(isset($transaction_items->shelf)) @if($transaction_items->shelf == $shelf_location->shelf) selected @endif @endif  value="{{$shelf_location->shelf}}">{{$shelf_location->shelf}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid shelf.</div>
                                </div>                                       
                            </div>
                        </div>
                        </div>
                        {{--     <div class="col-md-12">
                                <button type="button" class="btn btn-success pull-left add_location"
                                    data-id="{{ $transaction_items->product_id }} " id="add_location">
                                    <i class="fa fa-plus"></i> Other Location for {{ $transaction_items->productname }}
                                </button>
                            </div> --}}
                            <br>





                            
                       
                    </div>
                            
                    <div class="card-body">
                        <div class="col-md-12">
                            @if ($stocks >0)
                            <button id="Preview_print_btn" type="button" class="btn btn-dark btn-lg btn-block"> <i
                                class=" icon-cursor pr-1"></i><strong> Relocate &nbsp;</strong></button>
                            @endif
                            
                            <button onclick="history.back()" id="cancelButton" type="button" class="btn btn-danger btn-lg btn-block"> <i
                                    class="fa fa-window-close"></i><strong> Cancel &nbsp;</strong></button>
                        </div>
                    </div>


                </div>
            </div>




        </form>



        <script type="text/javascript">
            var token = "{{ csrf_token() }}";
            var baseqty =0;
            $(document).ready(function() {
                function requiredData(){
                    var x=0;
                    var required_input = $('.required_input');
                    for(var i = 0; i < required_input.length; i++){
                        var g_data=$(required_input[i]).val();
                        console.log(g_data);
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

             $('#Preview_print_btn').click(function(){
               
                var invoice = $('#invoice').val();
                var po_id = $('#po_id').val();
                var location_address = $('#location_address').val();
                var pruduct_id = $('#pruduct_id').val();
                var lot_no = $('#lot_no').val();
                var qunatity_po = $('#qunatity_po').val();
                var lot_no = $('#lot_no').val();
                var expireData = $('#expiration_date_new').val();
                var location_po = $('#location_po').val();
                var rock_po = $('#rock_po').val();
                var shelf_po = $('#shelf_po').val();
                var unit = $('#unit').val();
                var rock_new = $('#rock_new').val();
                var shelfnew = $('#shelfnew').val();
                var state =requiredData();
                var baseqty = '{{$stocks}}';
                if( baseqty< qunatity_po){
                    alert("Quantity invalid");
                }else if(state>0){
                        alert("All fields are Required");
                    }else{                                                                  
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to relocate this product!",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, submit it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            url: '{{ url('inventory/saveRelocation') }}',
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'invoice':invoice,
                                'po_id':po_id,
                                'location_address':location_address,
                                'pruduct_id':pruduct_id,
                                'lot_no':lot_no,
                                'qunatity_po':qunatity_po,
                                'lot_no':lot_no,
                                'expireData':expireData,
                                'location_po':location_po,
                                'rock_po':rock_po,
                                'shelf_po':shelf_po,
                                'unit':unit,
                                'rock_new':rock_new,
                                'shelfnew':shelfnew,

                            },
                            beforeSend: function () {
                              
                            },
                            success: function (response) {                                     
                            if(response=="okay"){
                                swal({
                                    title: 'Success!',
                                    text: 'Successfully Item Relocated',
                                    timer: 1500,
                                    type: "success",
                                }, function () {
                                    window.location.href = "../../../../../../Product-inventory";

                                });
                            }else{
                                swal({
                                    title: 'Error!',
                                    text: "Error Msg: Please Contact your IT personel",
                                    timer: 1500,
                                    type: "error",
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
               
                    
                    }
               

              
             });    
            

             
             $('body').on('change', '.expiryData', function() {
                var expry = $(this).val();
                var invoice = $('#invoice').val();
                var po_id = $('#po_id').val();
                var location_address = $('#location_address').val();
                var pruduct_id = $('#pruduct_id').val();
                var lot_no = $('#lot_no').val();
                
                $.ajax({
                   url: '{{ url('inventory/relocationExpiry') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'expiration_date':expry,
                       'invoice':invoice,
                       'po_id':po_id,
                       'location_address':location_address,
                       'pruduct_id':pruduct_id,
                       'lot_no':lot_no
                       
                   },
                   beforeSend: function () {
                       $('.send-loading').show();
                   },
                   success: function (response) {                                     
                   baseqty =response;
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

             }); 
            $('body').on('click', '.btn_rm_product_location', function() {
                var id = $(this).attr("data-id");
                var state = "";
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, submit it!'
                }).then((result) => {
                    if (result.isConfirmed) {                       
                        var token = $('#_token').val();
                        var po_receive_id_edit = $('.po_receive_id_edit');
                        var data = $(po_receive_id_edit[0]).val();
                        $(this).closest('.productId' + id + '').remove();
                        pricetotal(id);
                    }
                });
            });
            
                $('body').on('click', '.add_location', function() {
                        var id = $(this).attr("data-id");
                        var content_clone = $('.form_location'+id+':first').clone();
                         content_clone.appendTo('.form_location'+id+'');
                         $('.form_location'+id+'').find('.qunatity_po'+id+'').last().val("");
                         $('.form_location'+id+'').find('.productId'+id+'').last().append('<div class="row"><div class="col-md-12"><button data-id="'+id+'" class="btn btn-danger btn_rm_product_location" type="button"><i class="fa fa-times"></i> Remove</button><br><br></div></div>');
                         $('.dpYears').datepicker({
                        autoclose: true,
                        orientation: "bottom",
                        templates: {
                        leftArrow: '<i class="fa fa-angle-left"></i>',
                        rightArrow: '<i class="fa fa-angle-right"></i>'
                        }});
                   
                });
            });
           
        </script>

    @endsection
