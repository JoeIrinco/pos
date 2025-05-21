@extends('layouts.inventory.master')
@section('title','Home | Purchased Invoices List')
@section('page-title','Purchased Invoices List')

@section('stylesheets')
{{-- additional style here --}}
@endsection

@section('content')

<div class="preloader" style="display: none">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>


<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Invoice</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Purchased Invoices List</li>
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
                        Invoice # {{$invoiceData}}
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    @foreach ($transaction_items as $transaction_item)
                    <div class="card-body product_id{{$transaction_item->product_id}}">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <h5 class="productName{{$transaction_item->product_id}}">{{ $transaction_item->productname." /".$transaction_item->product_code." /".$transaction_item->product_description." /".$transaction_item->brand}}</h5>                                
                            </div>
                            <div class="col-md-3 mb-3">                             
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label"><strong>Unit Price</strong></label>
                                    <div class="col-sm-6">
                                        <input type="number" style="" class="form-control OrderPrice_data OrderPrice{{$transaction_item->product_id}} required_input"  data-id="{{ $transaction_item->product_id }}" name="OrderPrice" id="OrderPrice{{$transaction_item->product_id}}" placeholder="0" value="{{$transaction_item->price}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">                             
                                <div class="form-group row">                                       
                                    <select style="width:100%" id="unit" class="form-control unit{{$transaction_item->product_id}}"  name="unit[]">
                                        <option value='0'>-- Select Unit --</option>
                                        @foreach ($units as $unit)
                                        <option @if($transaction_item->units  == $unit->unit) selected @endif value={{$unit->unit}}>{{$unit->unit}}</option>
                                    @endforeach
                                    </select>   
                                </div>
                            </div>

                            <div class="col-md-2">
                                {{-- <label for="po_num" style="font-size:16pt"> <strong>Quantity Order:</strong>   <a>{{$transaction_item->remaining}}</a> </label> --}}
                            </div>
                 {{--            <div class="col-md-1 mb-3">
                                <button type="button" class="btn btn-danger pull-right remove_product"
                                data-id="{{ $transaction_item->product_id }} " id="remove_product">
                                <i class="fa fa-window-close"></i>
                                </button>
                            </div> --}}
                            
                        </div>
                        <input type="hidden" class="product_id_data" value="{{$transaction_item->product_id}}">
                        <div class="receiveProduct{{$transaction_item->product_id}}">
                            <div class="form_location{{$transaction_item->product_id}} col-md-12">

                                <div class="productId{{ $transaction_item->product_id }}">
                                    <div class="row">
                                        
                                            <div class="col-md-2 mb-3">
                                                <label for="po_num">Quantity</label>
                                                <input type="number" class="required_input form-control qunatity_po{{$transaction_item->product_id}} qunatity_po_tr" data-id="{{$transaction_item->product_id}}" name="Quantity_po"
                                                    id="qunatity_po" placeholder="0" value="{{$transaction_item->quantity}}" required>
                                                <div class="invalid-feedback">Please provide a valid Qunatity.</div>
                                            </div>                                     
                                      
                                        @if ($transaction_item->no_lot_no == 0)
                                            <div class="col-md-2 mb-3">
                                                <label for="po_num">Lot No.</label>
                                                <select name="lot_no" id="lot_no" class="form-control lot_class lot_no{{$transaction_item->product_id}}" required>
                                                    <option value="">Select Please</option>
                                                    @foreach ($lots as $lot)
                                                        <option @if(isset($transaction_item->lot_no)) @if($transaction_item->lot_no == $lot->lot_no) selected @endif @endif  value="{{$lot->lot_no}}">{{$lot->lot_no}}</option>
                                                    @endforeach
                                                </select>
                                            
                                                <div class="invalid-feedback">Please provide a valid location.</div>
                                            </div>
                                        @endif
                                        @if ($transaction_item->no_expiration == 0)
                                            <div class="col-md-2">
                                                <label for="po_num">Expiration Date</label>
                                                <div class="ccol-md-4 mb-3">
                                                    <div class="input-group date dpYears" data-date-viewmode="years"
                                                        data-date-format="dd-mm-yyyy" data-date="{{ $now }}">
                                                        <input type="text" class="required_input form-control exp_date{{$transaction_item->product_id}}" id="exp_date"
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
                                            <select name="location_po" id="location_po" class="form-control location_po{{$transaction_item->product_id}}" required>
                                                <option value="">Select Please</option>
                                                @foreach ($locations as $location)
                                                    <option @if(isset($transaction_item->location_address)) @if($transaction_item->location_address == $location->location) selected @endif @endif value="{{$location->location}}">{{$location->location}}</option>
                                                @endforeach
                                            </select>
                                            
                                            <div class="invalid-feedback">Please provide a valid location.</div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="po_num">Rack</label>
                                            <select name="rock_po" id="rock_po" class="form-control rack_class rock_po{{$transaction_item->product_id}}" required>
                                                <option value="">Select Please</option>
                                                @foreach ($racks as $rack)
                                                    <option @if(isset($transaction_item->rock)) @if($transaction_item->rock == $rack->rack) selected @endif @endif  value="{{$rack->rack}}">{{$rack->rack}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please provide a valid shelf.</div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="po_num">shelf</label>
                                            <select name="shelf_po" id="shelf_po" class="form-control shelf_class shelf_po{{$transaction_item->product_id}}" required>
                                                <option value="">Select Please</option>
                                                @foreach ($shelf_locations as $shelf_location)
                                                    <option @if(isset($transaction_item->shelf)) @if($transaction_item->shelf == $shelf_location->shelf) selected @endif @endif  value="{{$shelf_location->shelf}}">{{$shelf_location->shelf}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please provide a valid shelf.</div>
                                        </div>                                       
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-12">
                            <button type="button" class=" form-control btn btn-success updateData"
                            data-id="{{ $transaction_item->id }}" data-product="{{ $transaction_item->product_id }}" id="updateData">
                            Update
                            </button>
                        </div>
         
                        <br>
                    </div>
                    @endforeach
                    
                
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
    <!-- state end-->

{{-- modal --}}


</div>
      <!--datatables-->
      <script src="{{asset('public/assets/vendor/data-tables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/assets/vendor/data-tables/dataTables.bootstrap4.min.js')}}"></script>
      
      <script type="text/javascript">
          var token = "{{csrf_token()}}";


       

        
         $('.updateData').click(function(){
            $('.preloader').show();
            var id = $(this).attr("data-id");
            var dataProduct = $(this).attr("data-product");

             var OrderPrice = $('.OrderPrice'+dataProduct).val();
             var unit = $('.unit'+dataProduct).val();
             var qunatity_po = $('.qunatity_po'+dataProduct).val();
             var lot_no = $('.lot_no'+dataProduct).val();
             var exp_date = $('.exp_date'+dataProduct).val();
             var location_po = $('.location_po'+dataProduct).val();
             var rock_po = $('.rock_po'+dataProduct).val();
             var shelf_po = $('.shelf_po'+dataProduct).val();
            $.ajax({
                        url: '{{ url('inventory/update-one-transaction') }}',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                            "OrderPrice": OrderPrice,
                            "unit": unit,
                            "qunatity_po": qunatity_po,
                            "lot_no": lot_no,
                            "exp_date": exp_date,
                            "location_po": location_po,
                            "rock_po": rock_po,
                            "shelf_po": shelf_po,
                        },
                        beforeSend: function () {
                            $('.send-loading').show();
                        },
                        success: function (response) {
                            $('.status').fadeOut();
			                $('.preloader').delay(350).fadeOut('slow'); 
                            if (response == "edited") {                              
                                swal({
                                title: 'Updated',
                                text: "Product Details Updated",
                                timer: 1500,
                                type: "success",
                            });
                            }else{
                                swal({
                                title: 'Warning!',
                                text: "No change",
                                timer: 1500,
                                type: "warning",
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
         });
      </script>

@endsection

