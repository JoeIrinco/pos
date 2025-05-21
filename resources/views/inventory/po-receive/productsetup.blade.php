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

</style>

@section('content')

    <div class="container-fluid">

        <!--page title start-->
        <div class="page-title">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-8">
                        <h4 class="mb-0"> Product Receiving Area
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
            <div class="card card-shadow mb-12 ">
                <div class="card-header">
                    <div class="card-title">
                        <div class="col-md-4">
                            <p for="po_num">Invoice:</p>
                            <div class="ccol-md-4 mb-3">
                                <h4>{{ $invoice }}</h4>
                                <input type="hidden" id="invoice" value="{{$invoice}}">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="po_num">PO Number:</label>
                            <div class="ccol-md-4 mb-3">
                                <h4>{{ $po }}</h4>
                                <input type="hidden" id="po_id" value="{{$po}}">

                            </div>
                        </div>


                        <div class="col-md-4">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Location</button>                                                                                                           
                        </div>

                    </div>
                </div>
                <div id="mainVeiw">
                        @foreach ($product_details as $product_detailed)
                        <div class="card-body product_id{{$product_detailed->product_id}}">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <h5 class="productName{{$product_detailed->product_id}}">{{ $product_detailed->productname." /".$product_detailed->product_code." /".$product_detailed->product_description." /".$product_detailed->brand}}</h5>
                                    <input type="hidden" class="product_qunatity_data{{$product_detailed->product_id}}" value="{{$product_detailed->remaining}}">
                                </div>
                                <div class="col-md-3 mb-3">                             
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-md-2 col-form-label"><strong>Unit Price</strong></label>
                                        <div class="col-sm-6">
                                            <input type="number" style="" class="form-control OrderPrice_data OrderPrice{{$product_detailed->product_id}} required_input"  data-id="{{ $product_detailed->product_id }}" name="OrderPrice" id="OrderPrice{{$product_detailed->product_id}}" placeholder="0" value="{{$product_detailed->amount}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">                             
                                    <div class="form-group row">                                       
                                        <select style="width:100%" id="unit" class="form-control"  name="unit[]">
                                            <option value='0'>-- Select Unit --</option>
                                            @foreach ($units as $unit)
                                            <option @if($product_detailed->unit  == $unit->unit) selected @endif value={{$unit->unit}}>{{$unit->unit}}</option>
                                        @endforeach
                                        </select>   
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label for="po_num" style="font-size:16pt"> <strong>Quantity Order:</strong>   <a>{{$product_detailed->remaining}}</a> </label>
                                </div>
                                <div class="col-md-1 mb-3">
                                    <button type="button" class="btn btn-danger pull-right remove_product"
                                    data-id="{{ $product_detailed->product_id }} " id="remove_product">
                                    <i class="fa fa-window-close"></i>
                                    </button>
                                </div>
                                
                            </div>
                            <input type="hidden" class="product_id_data" value="{{$product_detailed->product_id}}">
                            <div class="receiveProduct{{$product_detailed->product_id}}">
                                <div class="form_location{{$product_detailed->product_id}} col-md-12">

                                    <div class="productId{{ $product_detailed->product_id }}">
                                        <div class="row">
                                            <div class="col-md-2 mb-3">
                                                <label for="po_num">Quantity</label>
                                                <input type="number" class="required_input form-control qunatity_po{{$product_detailed->product_id}} qunatity_po_tr" data-id="{{$product_detailed->product_id}}" name="Quantity_po"
                                                    id="qunatity_po" placeholder="0" value="" required>
                                                <div class="invalid-feedback">Please provide a valid Qunatity.</div>
                                            </div>
                                            @if ($product_detailed->no_lot_no == 0)
                                                <div class="col-md-2 mb-3">
                                                    <label for="po_num">Lot No.</label>
                                                    <select name="lot_no" id="lot_no" class="form-control lot_class lot_no{{$product_detailed->product_id}}" required>
                                                        <option value="">Select Please</option>
                                                        @foreach ($lots as $lot)
                                                            <option @if(isset($product_detailed->lot_no)) @if($product_detailed->lot_no == $lot->lot_no) selected @endif @endif  value="{{$lot->lot_no}}">{{$lot->lot_no}}</option>
                                                        @endforeach
                                                    </select>
                                                
                                                    <div class="invalid-feedback">Please provide a valid location.</div>
                                                </div>
                                            @endif
                                            @if ($product_detailed->no_expiration == 0)
                                                <div class="col-md-2">
                                                    <label for="po_num">Expiration Date</label>
                                                    <div class="ccol-md-4 mb-3">
                                                        <div class="input-group date dpYears" data-date-viewmode="years"
                                                            data-date-format="dd-mm-yyyy" data-date="{{ $now }}">
                                                            <input type="text" class="required_input form-control exp_date{{$product_detailed->product_id}}" id="exp_date"
                                                                placeholder="{{ $now }}" aria-label="Right Icon"
                                                                aria-describedby="dp-ig">
                                                            <div class="input-group-append">
                                                                <button id="dp-ig" class="btn btn-outline-secondary"
                                                                    type="button"><i class="fa fa-calendar f14"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-2 mb-3">
                                                <label for="po_num">Location</label>
                                                <select name="location_po" id="location_po" class="form-control location_po{{$product_detailed->product_id}}" required>
                                                    <option value="">Select Please</option>
                                                    @foreach ($locations as $location)
                                                        <option @if(isset($product_detailed->location_address)) @if($product_detailed->location_address == $location->location) selected @endif @endif value="{{$location->location}}">{{$location->location}}</option>
                                                    @endforeach
                                                </select>
                                                
                                                <div class="invalid-feedback">Please provide a valid location.</div>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="po_num">Rack</label>
                                                <select name="rock_po" id="rock_po" class="form-control rack_class rock_po{{$product_detailed->product_id}}" required>
                                                    <option value="">Select Please</option>
                                                    @foreach ($racks as $rack)
                                                        <option @if(isset($product_detailed->rock)) @if($product_detailed->rock == $rack->rack) selected @endif @endif  value="{{$rack->rack}}">{{$rack->rack}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">Please provide a valid shelf.</div>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="po_num">shelf</label>
                                                <select name="shelf_po" id="shelf_po" class="form-control shelf_class shelf_po{{$product_detailed->product_id}}" required>
                                                    <option value="">Select Please</option>
                                                    @foreach ($shelf_locations as $shelf_location)
                                                        <option @if(isset($product_detailed->shelf)) @if($product_detailed->shelf == $shelf_location->shelf) selected @endif @endif  value="{{$shelf_location->shelf}}">{{$shelf_location->shelf}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">Please provide a valid shelf.</div>
                                            </div>                                       
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="po_num" style="font-size:16pt"> <strong>Extended Price</strong>   <a class="totalPrice_tmp" id="totalPrice{{$product_detailed->product_id}}">0.0</a> </label>
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-success pull-left add_location"
                                    data-id="{{ $product_detailed->product_id }} " id="add_location">
                                    <i class="fa fa-plus"></i> Other Location for {{ $product_detailed->productname }}
                                </button>
                            </div>
                            <br>
                        </div>
                        @endforeach
                        
                    <div class="col-md-12">
                        <label style="font-size: 20pt" for="po_num" class="pull-right" style="font-size:16pt"> <strong>Total Amount Due</strong>  <a style="font-size: 20pt" id="grandPrice"><strong>0.0<strong></a> </label>
                    </div>
            
                

                <div class="card-body">
                    <div class="col-md-12">
                        <button id="Preview_print_btn" type="button" class="btn btn-dark btn-lg btn-block"> <i
                                class=" icon-cursor pr-1"></i><strong> Proceed &nbsp;</strong></button>
                        <button id="cancelButton" type="button" class="btn btn-danger btn-lg btn-block"> <i
                                class="fa fa-window-close"></i><strong> Cancel &nbsp;</strong></button>
                    </div>
                </div>
                </div>
                

                <div class="card-body SummaryReport" style="display: none">
                    <h3>Summary</h3>
                    <table style="width: 100%" id="print_preview">
                        <thead>
                            <tr>
                                <th>Produnt Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>                       
                        <tbody id="tbodySummary">
                           
                        </tbody>                    
                    </table>
                    
                    
            
                

                <div class="card-body pull-right">
                    <div class="col-md-12">
                        <label style="font-size: 20pt" for="po_num" class="pull-right" style="font-size:16pt"> <strong>Total Amount Due</strong>  <a style="font-size: 20pt" class="grandPrice" id="grandPrice2"><strong>0.0<strong></a> </label>
                    </div>
                    <div class="col-md-12">
                        <button id="Preview_print_btn_submit" type="button" class="btn btn-dark btn-lg btn-block"> <i
                                class=" icon-cursor pr-1"></i><strong> Submit &nbsp;</strong></button>
                        <button id="cancelButton_submit" type="button" class="btn btn-danger btn-lg btn-block"> <i
                                class="fa fa-window-close"></i><strong> Back &nbsp;</strong></button>
                    </div>
                </div>
                </div>
        

            </div>




        </form>

        @include('inventory.po-receive.newLocationModal') 

        <script type="text/javascript">
            var token = "{{ csrf_token() }}";
            //var auth_id = "{{ Auth::id() }}"; 
            $(document).ready(function() {
                $('.lot_class').select2();
                $('.rack_class').select2();
                $('.shelf_class').select2();
                $('body').on('click', '#Preview_print_btn_submit', function() {
                    var product_id = $('.product_id_data');
                                 
                    var invoice = $('#invoice').val();                    
                    var po_id = $('#po_id').val();
                    var product_data=[];
                    var units= $('#unit').val();
                     console.log(product_id.length);               
                    for(var i = 0 ; i<product_id.length; i++){
                        
                        var  qunatity_po = $('.qunatity_po'+$(product_id[i]).val()+'');
                        for (let index = 0; index < qunatity_po.length; index++) {
                            var obj = new Object();
                            obj.id = $(product_id[i]).val();
                            obj.price = $('#OrderPrice'+$(product_id[i]).val()).val();
                            var  qunatity_po = $('.qunatity_po'+obj.id+'');
                            var  lot_no = $('.lot_no'+obj.id+'');
                            var  exp_date = $('.exp_date'+obj.id+'');
                            var  location_po = $('.location_po'+obj.id+'');
                            var  rock_po = $('.rock_po'+obj.id+'');
                            var  shelf_po = $('.shelf_po'+obj.id+'');

                            obj.qunatity_po=$(qunatity_po[index]).val();
                            obj.lot_no=$(lot_no[index]).val();
                            obj.exp_date=$(exp_date[index]).val();
                            obj.location_po=$(location_po[index]).val();
                            obj.rock_po=$(rock_po[index]).val();
                            obj.shelf_po=$(shelf_po[index]).val();
                            product_data.push(obj);    
                        }
                      
                          
                    }
                    console.log(product_data);
                    
                                        
                        $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                        });
                        $.ajax({
                           type:'POST',
                           url:'{{ url('inventory/set-product-details') }}',
                           data:
                           {
                            invoice,
                            units,
                            po_id,
                            product_data
                            },
                           success:function(data){
                            swal({
                                    title: 'Success!',
                                    text: 'Successfully Set',
                                    timer: 1500,
                                    type: "success",
                                }, function () {
                                    window.location.href =  '../../../../inventory/receive-po/'+data;
                                });

                            
                          },
                          error: function(){
                            alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                          }
                        });
                });
                $('body').on('click', '#Preview_print_btn', function() {
                    var state =requiredData();
                    if(state>0){
                        alert("All fields are Required");
                    }else{
                        var stateQuantity = 0;
                        $('#tbodySummary').empty();
                    var product_id_data = $('.product_id_data');                    
                    for(var i = 0; i < product_id_data.length; i++){
                        var id=$(product_id_data[i]).val();

                        var qunatity = $('.qunatity_po'+id+'');
                        var totalqty=0;
                        for(var i2 = 0; i2 < qunatity.length; i2++){
                        var g_data=$(qunatity[i2]).val();
                        console.log(g_data);
                        if(parseFloat(g_data)>0){
                          totalqty = parseFloat(totalqty)+ parseFloat(g_data);
                        }
                                                          
                        }
                        var baseqty=$('.product_qunatity_data'+id+'').val();
                        console.log(baseqty);
                        console.log(totalqty);
                        if(totalqty>baseqty)  {                            
                            stateQuantity=1;
                        }else{
                            $('#tbodySummary').append('<tr>'+
                                '<td>'+$('.productName'+id+'').text()+'</td>'+
                                '<td>'+$('#OrderPrice'+id+'').val()+'</td>'+
                                '<td>'+totalqty+'</td>'+
                                '<td>'+$('#totalPrice'+id+'').text()+'</td>'+
                                '</tr>'); 
                        }

                                                   
                    }
                    if(stateQuantity==0){
                        $('#mainVeiw').hide()
                    $('.SummaryReport').show()
                    }else{
                        alert("Invalid Qunatity");
                    }
                    
                    }
                   
                });
                $('body').on('click', '#cancelButton_submit', function() {
                    $('#mainVeiw').show()
                    $('.SummaryReport').hide()
                    
                });
                
                        
                    $('body').on('keyup', '.qunatity_po_tr', function(e) {
                    var id = $(this).attr("data-id");
                    pricetotal(id);                    
                    });

                    $('body').on('keyup', '.OrderPrice', function(e) {
                    var id = $(this).attr("data-id");
                    pricetotal(id);                    
                    });
                    

               
                $('body').on('click', '#cancelButton', function() {
                    window.history.back();
                });
                $('body').on('click', '.add_location', function() {
                        var id = $(this).attr("data-id");
                        $('.lot_class').select2('destroy');
                        $('.rack_class').select2('destroy');
                        $('.shelf_class').select2('destroy');
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

                        $('.lot_class:last').val("").change();
                        $('.rack_class:last').val("").change();
                        $('.shelf_class:last').val("").change();

                        $('.lot_class').select2();
                        $('.rack_class').select2();
                        $('.shelf_class').select2();
                   
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

            $('body').on('click', '.remove_product', function() {
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
                        $(this).closest('.product_id' + id + '').remove();


                    }
                });
            });
            function pricetotal(id){
                    
                    var totalPrice_tmp = $('.totalPrice_tmp');
                    var qunatity = $('.qunatity_po'+id+'');
                    var qunatity_array = [];
                    var totalPrice=0;
                    var totalqty=0;
                    var totalqty_grand=0;
                    var price = $('#OrderPrice'+id+'').val()

                    for(var i = 0; i < qunatity.length; i++){
                        var g_data=$(qunatity[i]).val();
                        console.log(g_data);
                        if(parseFloat(g_data)>0){
                          totalqty = parseFloat(totalqty)+ parseFloat(g_data);
                        }                                    
                    }

                    

                    console.log(totalqty_grand);
                    totalPrice = parseFloat(totalqty)* parseFloat(price);
                    $('#totalPrice'+id+'').text(totalPrice.toFixed(2));
                    for(var i = 0; i < totalPrice_tmp.length; i++){
                        var g_data=$(totalPrice_tmp[i]).text();
                        console.log(g_data);
                        if(parseFloat(g_data)>0){
                            totalqty_grand = parseFloat(totalqty_grand)+ parseFloat(g_data);
                        }                                    
                    }                    
                    $('#grandPrice').text(totalqty_grand.toFixed(2));
                    $('#grandPrice2').text(totalqty_grand.toFixed(2));


                }
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
        </script>

    @endsection
