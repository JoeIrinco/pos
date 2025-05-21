<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>Replacement</title>

    <!--google font-->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <!--common style-->
    <link href="{{asset("public/css2/vendor/bootstrap/css/bootstrap.min.css" )}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/lobicard/css/lobicard.css")}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/simple-line-icons/css/simple-line-icons.css")}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/themify-icons/css/themify-icons.css")}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/weather-icons/css/weather-icons.min.css")}}" rel="stylesheet">
    <!--toastr-->
    <link href="{{asset("public/css2/vendor/toastr-master/toastr.css")}}" rel="stylesheet">
    <!--sweet alert-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    <!--custom css-->
    <link href="{{asset("public/css2/css/main.css")}}" rel="stylesheet">

    <link href="{{asset("public/css2/vendor/select2/css/select2.css")}}" rel="stylesheet">

    <!--touchspin-->
    <link href="{{asset("public/css2/vendor/touchspin/jquery.bootstrap-touchspin.min.css")}}" rel="stylesheet">
    <!--bs4 data table-->
    <link href="{{asset("public/css2/vendor/data-tables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
    
</head>
<body class="app header-fixed left-sidebar-hidden right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

<!--===========header start===========-->
@include('layouts.admin.header')
<!--===========header end===========-->

<!--===========app body start===========-->
<div class="app-body">

@include('layouts.admin.sidebar-second')

    <main class="main-content">
        <div class="container-fluid">
            
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class=" col-sm-12">
                        <a id="save_replacement" class="btn btn-square btn-outline-success float-right ml-4 mt-4"><i class="ti-save"></i>  Save</a>
                        {{-- <a class="btn btn-square btn-outline-success float-right mt-4"><i class="fa fa-plus"></i>  New</a> --}}
                        <div class="col-md-2 mb-3 float-right mt-4">
                                <select style="border-color: rgb(0, 0, 0);" id="transaction_type" class="form-control" >
                                    <option value='NONE'>--- --- --- ---</option>
                                        @foreach($data as $store)
                                        <option value='{{$store}}'>{{$store}}</option>                                                                                
                                        @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>

        <div class="container-fluid">

            <!-- state start-->
            <div class="row">
                
                <div class=" col-sm-12">
                    
                    <div class="card card-shadow mb-4 mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mb-1 text-center">
                                    <strong>REPLACEMENT SLIP</strong>
                                </div>
                                <div class="col-sm-10">
                                    <Strong>Customer's Name:</Strong>
                                        {{ $order_data->customer_name }}
                                        <br>
                                        {{-- <Strong>Reason for Replacement:</Strong> --}}
                                        {{-- <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Example textarea</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div> --}}
                                        {{-- <br> --}}
                                        <Strong>Invoice No.:</Strong>
                                        <label id="slip_invoice_no">{{ $order_data->invoice_no }}</label>
                                        <label id="transaction_id" readonly hidden>{{ $transaction_id }}</label>
                                        {{-- <label id="transaction_id" readonly hidden>{{ $order_data->account_name }}</label>
                                        <label id="transaction_id" readonly hidden>{{ $order_data->account_no }}</label>
                                        <label id="transaction_id" readonly hidden>{{ $order_data->customer_name }}</label> --}}
                                </div>
                                <div class="col-sm-2">
                                    <Strong>Date:</Strong>
                                    {{ date('m-d-Y', strtotime($order_data->date)) }}
                                    {{-- {{ !! date('d/M/y', strtotime($order_data->date)) }} --}}
                                        
                                        {{--<br>
                                         <Strong>Control No.:</Strong>
                                        Cp-0
                                        <br>
                                        <Strong>SR No.:</Strong>
                                        HFK342234 --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-sm-6">
                                    <div class="card card-shadow mb-4 mt-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">QTY/UNIT</th>
                                                            <th scope="col">ITEM DESCRIPTION</th>
                                                            {{-- <th scope="col">BRAND</th> --}}
                                                            <th scope="col">UNIT PRICE</th>
                                                            <th scope="col">TOTAL</th>
                                                            <th scope="col">ACTION</th>
                                                        </tr>
                                                        </thead>
                                                            {{-- @foreach($store_items as $store)
                                                            <tbody>
                                                            <td>{{$store->quantity}}&nbsp;{{$store->unit}}</td>
                                                            <td>{{$store->product_name}}{{$store->product_description}}</td>
                                                            <td>{{$store->brand}}</td>
                                                            <td>{{$store->amount}}</td>
                                                            <td>{{$store->original_total}}</td>
                                                            <td><div class='col'>
                                                                <div class='btn-group task-list-action'>
                                                                    <div class='dropdown '>
                                                                        <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                            <i class='icon-options'></i>
                                                                        </a>
                                                                        <div class='dropdown-menu dropdown-menu-right'>
                                                                        <a class='dropdown-item update_btn' href="" data-prod_id="{{ $store->product_id }}" data-value="{{ $store->id }}" data-id="{{ $store->transaction_id }}" ><i class='fa fa-refresh text-success pr-2 '></i> Replace</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div></td>
                                                            </tbody>
                                                            @endforeach --}}
                                                            @foreach($store_items as $store_item)
                                                            <tr>
                                                                <td>{{ $store_item->quantity}} {{ $store_item->unit}}</td>
                                                                <td>{{ $store_item->brand}} {{ $store_item->product_name}} &nbsp;{{ $store_item->product_description}} &nbsp;  <a class="text-danger"></a></td>
                                                                {{-- <td></td> --}}
                                                                
                                                                <td>@if($store_item->item_status =='CUSTOM DISCOUNT')
                                                                    {{ $store_item->total / $store_item->quantity }}
                                                            @else
                                                                    {{-- <td> --}}{{ $store_item->amount}}{{-- </td> --}}
                                                            @endif</td>
                                                                <td>{{ $store_item->total }}</td>
                                           <!-- <td><span><i><a id="{{ $store_item->orders_id }}" href=''>Return</a></i></span> &nbsp; &nbsp;<span><i ><a id="{{ $store_item->orders_id }}" href=''>Replace</a></i></span></td>-->
                                                                <td><a class='dropdown-item update_btn' href="" data-prod_id="{{ $store_item->product_id }}" data-value="{{ $store_item->id }}" data-id="{{ $store_item->transaction_id }}" ><i class='fa fa-refresh text-success pr-2 '></i> Replace</a></td>
                                                            </tr>
                                                            @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-6">
                                    <div class="card card-shadow mb-4 mt-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table table-bordered table-striped" id="replaceTable">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col" class="f12">PULL OUT ITEM AND REPLACEMENT DESCRIPTION</th>
                                                            <th scope="col">UNIT PRICE</th>
                                                            <th scope="col">TOTAL</th>
                                                            <th scope="col">ACTION</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="tbodyid">
                                                            @foreach($replacements as $store_item)                                  {{-- here --}}
                                                                <tr>
                                                                    <td>@if($store_item['return_replace'] == 'REPLACED')
                                                                        <input id='input_returned_qty' data-product_id="{{ $store_item['product_id'] }}" data-id="{{ $store_item['id'] }}" data-transaction_id="{{$store_item['transaction_id']}}" style='width: 50px; height: 25px; border: none; border-bottom: 2px solid red;' value='{{$store_item['replaced_qty']}}'> <a class="text-info"> {{$store_item['product_name']}}</a> replaced by &nbsp; 
                                                                        @endif
                                                                        
                                                                        @if($store_item['replaced']=="[]")
                                                                        
                                                                        @else
                                                                            @foreach($store_item['replaced'] as $replaced)
                                                                                @if($store_item['transaction_id'] == $replaced['transaction_id1'])
                                                                                    <br><a>{{ $replaced['quantity1'] }} {{ $replaced['unit1'] }} {{ $replaced['product_name1'] }}</a>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </td>
                                                                    <td>@if($store_item['item_status'] =='CUSTOM DISCOUNT')
                                                                            @if($store_item['return_replace'] == '')
                                                                                <a class="text-info">{{ $store_item['total'] / $store_item['quantity'] }}</a>
                                                                            @endif
                                                                            @if($store_item['return_replace'] == 'REPLACED')
                                                                                <a class="text-info">{{ $store_item['total'] / $store_item['quantity'] }}</a>
                                                                            @endif
                                                                            @if($store_item['return_replace'] == '')
                                                                            @endif
                                                                    
                                                                        @else
                                                                            {{ $store_item['amount'] }}    
                                                                    
                                                                            @if($store_item['replaced']=="[]")
                                                                            @else
                                                                                @foreach($store_item['replaced'] as $replaced)
                                                                                    @if($store_item['transaction_id'] == $replaced['transaction_id1'])
                                                                                        <br>{{ $replaced['amount1'] }}
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($store_item['return_replace'] == 'REPLACED')
                                                                            <a class="text-info">{{ $store_item['total']}}</a>
                                                                        @endif
                                                                    
                                                                        @if($store_item['return_replace'] == '')
                                                                        @endif
                                                                        @if($store_item['replaced']=="[]")
                                                                        @else
                                                                            @foreach($store_item['replaced'] as $replaced)
                                                                                @if($store_item['transaction_id'] == $replaced['transaction_id1'])
                                                                                    <br>{{ $replaced['total1'] }}
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($store_item['return_replace'] == 'REPLACED')
                                                                        <a id="main_id" data-id="{{ $store_item['id'] }}" href="#">delete</a>
                                                                        @endif
                                                                    
                                                                        @if($store_item['return_replace'] == '')
                                                                        @endif
                                                                        @if($store_item['replaced']=="[]")
                                                                        @else
                                                                            @foreach($store_item['replaced'] as $replaced)
                                                                                @if($store_item['transaction_id'] == $replaced['transaction_id1'])
                                                                                    <br><a id="sub_id" data-id="{{ $replaced['id1'] }}" href="#">delete</a>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-12">
                                    <div class="card card-shadow mb-4 mt-4">
                                        <div class=" col-sm-12">
                                                {{-- <div class="form-group">
                                                    <Strong>Reason for Replacement:</Strong>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                
            </div>
            <!-- state end-->

        </div>
        {{--
        MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
        @include('store.modals.replacement-modal')
        @include('store.modals.replacement-modal-save')
            {{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL--}}


            {{--
        MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
            <div class="card-body">
                <div class="modal bd-example-modal-lg" id="return_modal_body"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Return Items</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class=" col-md-12">

                                    <div class="card-body">
                                        <table id="show-hide" style="width:100%" class="display dt-init table table-bordered table-striped " cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th scope="col">PRODUCT DESCRIPTION</th>
                                                <th scope="col">unt</th>
                                                <th scope="col">qty</th>
                                                <th scope="col">amt</th>
                                                <th scope="col">total</th>
                                                <th scope="col">Return Qty</th>
                                            </tr>
                                            </thead>
                                        </table>
                                        <br/>
                                        <br/>
                                    </div>

                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-success before_submit">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL--}}




            {{--
                    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
            <div class="card-body">

                    <div class="modal fade" id="return_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel5">Return Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Return Slip No. *:</label>
                                            <input type="text" class="form-control" id="return_slip_no">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Refund *:</label>
                                            <input type="number" class="form-control" id="return_change">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Remarks:</label>
                                            <textarea class="form-control" id="return_remarks"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-success submit_return" >Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
            {{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL--}}






</div>
<!--===========app body end===========-->
<!--===========footer start===========-->
<!--===========footer end===========-->
<!-- Placed js at the end of the page so the pages load faster -->
<script src="{{asset("public/css2/vendor/jquery/jquery.min.js")}}"></script>
<script src="{{asset("public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js")}}"></script>
<script src="{{asset("public/css2/vendor/popper.min.js")}}"></script>
<script src="{{asset("public/css2/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js")}}"></script>
<script src="{{asset("public/css2/vendor/lobicard/js/lobicard.js")}}"></script>
<script class="include" type="text/javascript" src="{{asset("public/css2/vendor/jquery.dcjqaccordion.2.7.js")}}"></script>
<script src="{{asset("public/css2/vendor/jquery.scrollTo.min.js")}}"></script>

<!--[if lt IE 9]>
<script src="assets/vendor/modernizr.js"></script>
<![endif]-->

<!--init scripts-->
<script src="{{asset("public/css2/js/scripts.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
</body>

</html>
<script>

    $(document).on('click', '#main_id', function(){

    var id = $(this).data("id");
    /* alert(id) */
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'info',
        popup: '',
        animation: false,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var token= $('#_token').val();
            /* alert(token); */
        $.ajax({
            url: '../del-replacement',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                'id':id
            },
            beforeSend: function () {
                $('.send-loading').show();
            },
            success: function (arr) {
                
                toastr.success(arr.title);
                
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 500);
                
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

    });


    $(document).on('click', '#sub_id', function(){

    var id = $(this).data("id");
    /* alert(id) */

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'info',
        popup: '',
        animation: false,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var token= $('#_token').val();
           /*  alert(token); */
        $.ajax({
            url: '../del-sub-replacement',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                'id':id
            },
            beforeSend: function () {
                $('.send-loading').show();
            },
            success: function (arr) {
                
                toastr.success(arr.title);
                
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 500);
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

    });


    $(document).on('click', '#select_rock2', function(){
        //$('#modal_body_save').modal("show");
        var len = document.getElementById("select_rock2").length;
        /* alert(len); */
        if(len <= 1){
           /*  $('#select_rock2').append(`<option value="Rock 1">Rock 1</option>`,
        `<option value="Rock 2">Rock 2</option>`,
        `<option value="Rock 3">Rock 3</option>`,
        `<option value="Rock 4">Rock 4</option>`,
        `<option value="Rock 5">Rock 5</option>`); */
        }
        /* document.getElementById("select_rock").options.length = 0;
        $('#select_rock').append(`<option value="Rock 1">Rock 1</option>`,
        `<option value="Rock 1">Rock 1</option>`,
        `<option value="Rock 1">Rock 1</option>`,
        `<option value="Rock 1">Rock 1</option>`,
        `<option value="Rock 1">Rock 1</option>`); */
    });

    $(document).on('click', '#select_shelf2', function(){
        var len = document.getElementById("select_shelf2").length;
        /* alert(len); */
        if(len <= 1){
           /*  $('#select_shelf2').append(`<option value="Shelf 1">Shelf 1</option>`,
        `<option value="Shelf 2">Shelf 2</option>`,
        `<option value="Shelf 3">Shelf 3</option>`,
        `<option value="Shelf 4">Shelf 4</option>`,
        `<option value="Shelf 5">Shelf 5</option>`); */
        }
    });

    $(document).on('click', '#save_replacement', function(){
        $('#modal_body_save').modal("show");
    });

    /* $(document).on('click','#replacement_submit',function () {

    var formData = new FormData();
    var token= $('#_token').val();
    //formData.append("input_transaction", $("#input_transaction").val());
    formData.append("input_invoice", $("#input_invoice").val());
    formData.append('_token', token);

        $.ajax({

        url: 'checkInvoice',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {

            // $(".save_client").prop('disabled', true);

        },
        success: function (response) {

            if(response!="err"){

                if(response.message == 'err'){

                    toastr.warning(response.title);
                    //$(".save_client").prop('disabled', false);
                }
                if(response.message != 'err'){
                  
                    $(".save_client").prop('disabled', false);

                }

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
            setTimeout(function(){// wait for 5 secs(2)
                $(".save_client").prop('disabled', false);
                        }, 1500);

        },

    });


    }); */

    $(document).on('click', '#replacement_submit', function(){

        
        var formData = new FormData();
        var token= $('#_token').val();

        formData.append("slip_no", $("#slip_no").val());
        formData.append("slip_date", $("#slip_date").val());
        formData.append("slip_remarks", $("#slip_remarks").val());
        formData.append("slip_invoice_no", $("#slip_invoice_no").val());

        formData.append("transaction_id", $("#transaction_id").text());
        
        formData.append('_token', token);

        
        $.ajax({

        url: '../submit-replacement',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            
            $("#replacement_submit").prop('disabled', true);
            
        },
        success: function (response) {

            if(response.message == "err"){

                toastr.warning(response.title);
                $("#replacement_submit").prop('disabled', false);

            }

            if(response.message!="err"){
                
                toastr.success(response.title);

                setTimeout(function(){
                    location.reload();
                }, 500);

                $("#replacement_submit").prop('disabled', false);
            
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
            /* setTimeout(function(){
                $(".add_order").prop('disabled', false);
                        }, 1500); */

        },

        });


        



    });



    $(document).on('click', '.delete', function(){
        var id = $(this).data("id");
        var value = $(this).data("value");
        /* console.log('id is' +  id);
        console.log('value is ' + value ); */

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'info',
            popup: '',
            animation: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var token= $('#_token').val();
                console.log('token is' +  token);
                $.ajax({
                    url: '../deleteReplaceItem',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id':id

                    },
                    beforeSend: function () {
                        $('.send-loading').show();
                    },
                    success: function (response) {

                        $('#dataTr'+response+'').remove();
                        if(response>0){

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

    });


    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).on('click', '.return', function(){

        var id = $(this).data("id");
        /* console.log('id is' +  id); */
        var invoice_no = $("#label_invoice_no").text();
        
                $.ajax({
                    url:"{{url('updateReturn')}}",
                    method:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id : id,
                        invoice_no : invoice_no
                    },
                    success: function( data ) {
                        // console.log(data);
                        /*setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 500);*/
                    }
                });

    });

    $('#transaction_type').change(function(){
        
        $("#tbodyid").empty();
        $("#save_replacement").prop('disabled', true);
        
        /*$("#replaceTable tbody").append("<tr>" + 
        "<td>My First Video</td>" +
        "<td>6/11/2015</td>" +
        "<td>www.pluralsight.com</td>" +
        "</tr>"); */

        var valueOfSelect = $(this).val();
        
            if(valueOfSelect == 'NONE'){

                $("#save_replacement").prop('disabled', false);

            }

        $.ajax({

        url: '../replacement-data/'+$(this).val(),
        type: 'GET',
        processing: true,
        serverSide: true,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('.send-loading').show();
            //$(".replaced_item").prop('disabled', true);
        },
        success: function (response) {
            $("#replaceTable tbody").append(response);

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



    $(document).on('click','.replaced_item',function () {
        /* alert("not okay") */
        //alert($("#product_id").text())
        var formData = new FormData();
        var token= $('#_token').val();
        
        /* let datap = $(this).attr('data-product_id');
        alert(datap); */
        /* var num_of_replace_no = $("#num_of_replace_no").val();
        
        if (num_of_replace_no <= 0) {
            toastr.error('Invalid number of returned items');
            return false;

        } */

        formData.append("status", $("#input_transaction_type").val());
        formData.append("productSelect", $("#showproduct").val());
        formData.append("qty", $("#qty").val());
        formData.append("unit", $("#label_unit").text());
        formData.append("srp", $("#label_srp").text());
        formData.append("price", $("#sellingprice").val());
        formData.append("custom_price", $("#custom_price").val());
        formData.append("item_id", $("#item_id").text());
        formData.append("product_id", $("#product_id").text());
        formData.append("transaction_id", $("#transaction_id").text());
        formData.append("num_of_replace_no", $("#num_of_replace_no").val());
        formData.append("select_expiry", $("#select_expiry").val());
        formData.append("select_lot_no", $("#select_lot_no").val());
        formData.append("select_shelf", $("#select_shelf2").val());
        formData.append("select_rack", $("#select_rock2").val());
        formData.append("select_shelf2", $("#select_shelf2").val());
        formData.append("select_rack2", $("#select_rock2").val());
        formData.append("id_product", $("#id_product").val());
        formData.append('_token', token);

        var valueproduct = $("#showproduct").val();
        var valueqty = $("#qty").val();
        var valueunit = $("#unit").val();
        var valueprice = $("#sellingprice").val();

        if (valueproduct && valueqty && valueprice && valueunit != "" ) {

            var custom_dicount_is_true = $('#custom_price').val();
            var input_transaction_type = $('#input_transaction_type').val();

            if(input_transaction_type === 'REGULAR'){
                if(custom_dicount_is_true == 0 && custom_dicount_is_true !=''){
                    toastr.warning('','Invalid discount price');
                    return;
                }
                if(custom_dicount_is_true <= -1){
                    toastr.warning('','Invalid discount price');
                    return;
                }
            }

            $.ajax({

                url: '../store_replaced_items',
                type: 'POST',
                data: formData,
                processing: true,
                serverSide: true,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('.send-loading').show();
                    $(".replaced_item").prop('disabled', true);
                },
                success: function (data) {

                    /* alert('okay');
                    alert(data.message);
                    alert(data.title); */
                    
                    if(data.message == "err"){

                        /* alert(data.title); */
                        $("#replacement_submit").prop('disabled', false);

                    }  

                    if(data.message != "err"){
                        
                        toastr.success('','Successfully added.');
                        var countlog = $('#no').val();
                        setTimeout(function(){// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 500);
                        $(".replaced_item").prop('disabled', false);

                        $("#num_of_replace_no").val("");

                    }

                    var transactionselect = $("#transaction_type").val();
                    /* console.log(transactionselect); */

                    /* if(transactionselect === 'si_regular'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){

                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var sum1 = total + add_product;
                            var formula = 1.12;
                            var vatformula = 0.12;

                            var netofvat = sum1 / formula;
                            var vat = netofvat * vatformula;
                            console.log(total);
                            console.log(netofvat);
                            console.log(vat);
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_net_of_vat').text(parseFloat(netofvat).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));
                            $("#custom_price").val('');

                        }else{

                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#label_srp').text());

                            var sum = add_qty * add_product;

                            var sum1 = total + sum;
                            var formula = 1.12;
                            var vatformula = 0.12;

                            var netofvat = sum1 / formula;
                            var vat = netofvat * vatformula;
                            console.log(total);
                            console.log(netofvat);
                            console.log(vat);
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_net_of_vat').text(parseFloat(netofvat).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));

                        }
                    }if(transactionselect === 'si_senior'){

                        var total = parseFloat($("#h4_total").text());
                        console.log(total);
                        var add_qty = parseFloat($('#qty').val());
                        var add_product = parseFloat($('#label_srp').text());

                        var sum = add_qty * add_product;
                        var sum1 = total + sum;

                        var formula = 1.12;
                        var vatformula = 0.12;
                        var discountformula = 0.20;

                        var vatexemptsales = sum1 / formula;
                        var discount = vatexemptsales * discountformula;
                        var finaltotal = vatexemptsales - discount;

                        $('#h4_vat_exempt_sales').text(parseFloat(vatexemptsales).toFixed(2));
                        $('#h4_discount').text(parseFloat(discount).toFixed(2));
                        $('#h4_total').text(parseFloat(sum1).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                    }if(transactionselect === 'si_pwd'){

                        var total = parseFloat($("#h4_total").text());
                        console.log(total);
                        var add_qty = parseFloat($('#qty').val());
                        var add_product = parseFloat($('#sellingprice').val());

                        var sum = add_qty * add_product;
                        var sum1 = total + sum;

                        var formula = 1.12;
                        var vatformula = 0.12;
                        var discountformula = 0.20;

                        var vatexemptsales = sum1 / formula;
                        var discount = vatexemptsales * discountformula;
                        var finaltotal = vatexemptsales - discount;

                        $('#h4_vat_exempt_sales').text(parseFloat(vatexemptsales).toFixed(2));
                        $('#h4_discount').text(parseFloat(discount).toFixed(2));
                        $('#h4_total').text(parseFloat(sum1).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                    }if(transactionselect === 'si_private'){

                        var total = parseInt($("#h4_total").text());

                        var add_qty = parseFloat($('#qty').val());
                        var add_product = parseFloat($('#sellingprice').val());

                        var sum = add_qty * add_product;
                        var sum1 = total + sum;

                        var ewtformula = 0.01;

                        var ewt = sum1 * ewtformula / 1.12;
                        var finaltotal = sum1 - ewt;


                        $('#ewt').text(parseFloat(ewt).toFixed(2));
                        $('#h4_total').text(parseFloat(sum1).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                    }if(transactionselect === 'si_government'){
                        console.log('MARK')
                        var total = parseInt($("#h4_total").text());

                        var add_qty = parseFloat($('#qty').val());
                        var add_product = parseFloat($('#sellingprice').val());

                        var sum = add_qty * add_product;
                        var sum1 = total + sum;

                        var ewtformula = 0.01;
                        var vatformula = 0.05;

                        var ewt = sum1 * ewtformula / 1.12;
                        var vat = sum1 * vatformula / 1.12;
                        var finaltotal = sum1 - ewt - vat;


                        $('#h4_vat').text(parseFloat(vat).toFixed(2));

                        $('#ewt').text(parseFloat(ewt).toFixed(2));
                        $('#h4_total').text(parseFloat(sum1).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                    }if(transactionselect === 'dr_'){

                        var total = parseFloat($("#h4_final_total").text());

                        var add_qty = parseFloat($('#qty').val());
                        var add_product = parseFloat($('#sellingprice').val());

                        var sum = add_qty * add_product;
                        var sum1 = total + sum;

                        $('#h4_total').text(parseFloat(sum1).toFixed(2));
                        $('#h4_final_total').text(parseFloat(sum1).toFixed(2));

                    }if(transactionselect === 'of_'){

                        var total = parseFloat($("#h4_final_total").text());

                        var add_qty = parseFloat($('#qty').val());
                        var add_product = parseFloat($('#sellingprice').val());

                        var sum = add_qty * add_product;
                        var sum1 = total + sum;

                        $('#h4_total').text(parseFloat(sum1).toFixed(2));
                        $('#h4_final_total').text(parseFloat(sum1).toFixed(2));

                    } */

                    $('#id_product').val('');
                    $('#showproduct').val('');
                    $('#qty').val('');
                    $('#unit').val('');
                    $('#sellingprice').val('');
                    $("#productSelect").select2().select2("val", null);
                    $("#productSelect").select2().select2("val", '-- Select Product --');

                    refresh_select_2();

                    $('#id_product').val('');
                    $('#showproduct').val('');
                    $('#qty').val('');
                    $('#unit').val('');
                    $('#sellingprice').val('');
                    document.getElementById("div_unit").style.display = "none";
                    document.getElementById("div_srp").style.display = "none";

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

        }else{

            toastr.error('Please complete all information!','Information');

        }

    });


    /* $(document).on('click','.submit_return',function () {
        alert('ok');
        var formData = new FormData();
        var token= $('#_token').val();

        formData.append("transaction_id", $("#main_transaction_id").text());
        formData.append("id", $("#label_product_id").text());
        formData.append("label_invoice_no", $("#label_invoice_no").text());
        formData.append("return_slip_no", $("#return_slip_no").val());
        formData.append("return_change", $("#return_change").val());
        formData.append("return_remarks", $("#return_remarks").val());
        formData.append('_token', token);

            $.ajax({
                url: '../returnedProduct',
                type: 'POST',
                data: formData,
                processing: true,
                serverSide: true,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('.send-loading').show();
                    $(".replaced_item").prop('disabled', true);
                },
                success: function (response) {
                    if(response.message == 'invalid_qty'){

                        toastr.warning(response.title);

                    }
                    if(response.message == 'success'){

                        toastr.success(response.title);

                    }
                    if(response.message == 'dup'){

                        toastr.warning(response.title);

                    }
                    if(response.message == 'req'){

                        toastr.warning(response.title);

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
    }); */




    $(document).on('click','.update_btn',function (e) {
        event.preventDefault();

        let href = $(this).attr('data-id');
        let datav = $(this).attr('data-value');
        let datap = $(this).attr('data-product_id');

        /* console.log(href);
        console.log(datav); */
        
        $.ajax({
            url: '/vallery/getItemInfoByid/'+href,
            data:{
                    'id':datav,
                    'product_id':datap
                },
            beforeSend: function() {
                $('#loader').show();
            },
            success: function(result) {
                /* alert(result.rock);
                alert(result.shelf); */
                /* $.each( result.rock, function( key, value ) { */
                    $('#select_rock').append($("<option/>", {
                        value: result.rock,
                        text: result.rock
                    }));
                /* }); */
                /* $.each( result.shelf, function( key, value ) { */
                    $('#select_shelf').append($("<option/>", {
                        value: result.shelf,
                        text: result.shelf
                    }));
                /* }); */

                if(result.item_status == "CUSTOM DISCOUNT"){
                    /* alert(result.product_id); */
                    /* alert(result.product_name);
                    alert(result.lot_no);
                    alert(result.expiration_date);
                    alert(result.unit);
                    alert(result.lot_no);
                    alert(result.original_total);
                    alert(result.amount); */
                    if(result.lot_no == null){
                        result.lot_no = "No Lot"
                    }

                    if(result.expiration_date == "0000-00-00"){
                        result.expiration_date = "No Expiry Date"
                    }
                    $('#item_id').text(result.id);
                    $('#product_id').text(result.product_id);
                    $('#transaction_id').text(result.transaction_id);
                    $('#mdisplay_prod_des').text(result.brand+" "+result.product_name+" "+ result.product_description);
                    $('#mdisplay_exp_date').text(result.expiration_date);
                    $('#mdisplay_lot_no').text(result.lot_no);
                    $('#mdisplay_qty_unit').text(result.quantity+" "+result.unit);
                    $('#mdisplay_unit_price').text(result.total / result.quantity);
                    $('#mdisplay_original_total').text(result.total);

                    /* $('#item_id').text(result.id);
                    $('#product_id').text(result.product_id);
                    $('#transaction_id').text(result.transaction_id);
                    $('#display_product_description').text(result.product_name);
                    $('#display_amount').text(result.original_total / result.quantity);
                    $('#display_quantity').text(result.quantity);
                    $('#display_total').text($('#display_amount').text() * result.quantity);
                    $('#display_unit').text(result.unit); */

                }else{

                    /* alert(result.product_name);
                    alert(result.lot_no);
                    alert(result.expiration_date);
                    alert(result.unit);
                    alert(result.quantity);
                    alert(result.original_total);
                    alert(result.amount);
                    
                    $('#item_id').text(result.id);
                    $('#product_id').text(result.product_id);
                    $('#transaction_id').text(result.transaction_id);
                    $('#display_product_description').text(result.product_name);
                    $('#display_amount').text(result.amount);
                    $('#display_quantity').text(result.quantity);
                    $('#display_total').text(result.original_total);
                    $('#display_unit').text(result.unit); */
                    $('#item_id').text(result.id);
                    $('#product_id').text(result.product_id);
                    $('#transaction_id').text(result.transaction_id);
                    $('#mdisplay_prod_des').text(result.brand+" "+result.product_name+" "+ result.product_description);
                    $('#mdisplay_exp_date').text(result.expiration_date);
                    $('#mdisplay_lot_no').text(result.lot_no);
                    $('#mdisplay_qty_unit').text(result.quantity+" "+result.unit);
                    $('#mdisplay_unit_price').text(result.total / result.quantity);
                    $('#mdisplay_original_total').text(result.total);

                }

                $('#modalbodyforupdate').modal("show");
                
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    $(document).on('click','.before_submit',function (e) {
        event.preventDefault();

        let href = $(this).attr('data-id');
        var value = $(this).data("value");
        /* console.log('value is ' + value ); */
        var token= $('#_token').val();

        $.ajax({
            url: '/vallery/returnProduct/'+value,
            beforeSend: function() {
                $('#loader').show();
            },
            success: function(result) {

                $('#return_product_name').text(result.brand+' '+result.product_name+' '+result.product_description);
                $('#return_available_quantity').text(result.quantity);
                $('#label_product_id').text(result.id);
                $('#label_transaction_id').text(result.transaction_id);
                $('#return_modal').modal("show");
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    /* $(document).on('click','.btn_return',function (e) {
        event.preventDefault();

        let href = $(this).attr('data-id');
        var value = $('#main_transaction_id').text();
        console.log('value is ' + value );
        var token= $('#_token').val();

        $.ajax({
            url: '/vallery/returnProduct/'+value,
            beforeSend: function() {
                $('#loader').show();
            },
            success: function(result) {

                var table = $('#show-hide').DataTable();
                table.ajax.reload();
                $('#return_modal_body').modal("show");

            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    }); */

    /* jQuery(document).on('change', '.return_input', function (){
        
        var formData = new FormData();
        var token= $('#_token').val();
        var id = $(this).data("id");
        var transaction_id = $(this).data("transaction_id");
        var product_id = $(this).data("product_id");
        var invoice_no = $('#label_invoice_no').text();

        var cardN = $('input[data-id="' + id + '"]').val();
        alert(cardN)

        formData.append("id", id);
        formData.append("transaction_id", transaction_id);
        formData.append("product_id", product_id);
        formData.append("cardN", cardN);
        formData.append("invoice_no",invoice_no);
        formData.append('_token', token);

        $.ajax({
            url: '../checkIfAvailable',
            type: 'POST',
            data: formData,
            processing: true,
            serverSide: true,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.send-loading').show();
                $(".replaced_item").prop('disabled', true);
            },
            success: function (response) {

                if(response.message == 'invalid_qty'){

                    toastr.warning(response.title);
                    var table = $('#show-hide').DataTable();
                    table.ajax.reload();
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

    }); */
                var expiry = '#select_expiry';
                 $(document).on('change',expiry,function () {
                     var prod_id=$(this).val();
                     var item_id=$('#item_id').text();
                     /* alert(item_id) */
                     var select_expiry=$('#select_expiry').val();
                     var select_lot_no=$('#select_lot_no').val();
                     $.ajax({
                         type:'get',
                         //url:'{{ url('findItemlotNo') }}',
                         url:'{{ url('findItemlotNo_v2') }}',
                         data:{'expiration_date':prod_id,
                                'item_id':item_id,
                                'select_expiry':select_expiry,
                                'select_lot_no':select_lot_no
                                },
                         dataType:'json',//return data will be json
                         success:function(data){
                             //working on this
                             //alert('qweqweqweqweqweqweqweqweqweqweqwe')
                             console.log(data.qtyOnQue);
                             document.getElementById("select_lot_no").options.length = 0;
                             document.getElementById("select_shelf2").options.length = 0;
                             document.getElementById("select_rock2").options.length = 0;
                             var tmp1=0;
                             var tmp2=0;
                             $.each( data.lot_no, function( key, value ) {
                                 $('#select_lot_no').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                                 if(tmp1==0){
                                    
                                    tmp1=value;
                                 }
                                 
                             });

                             
                              $.each( data.rock, function( key, value ) {
                                 $('#select_rock2').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                                 if(tmp2==0){
                                    
                                    tmp2=value;
                                 }
                             });

                             LoadLot(tmp1,tmp2);
                           /*  $.each( data.shelf, function( key, value ) {
                                 $('#select_shelf').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                             }); */

                             var a = data.stockIn;
                             var b = data.stockOut;
                             var c = data.qtyOnQue;
                             var d = a - b;
                             var e = d - c;

                            // $('#item_status').text("Available Stock : "+ e);
                             $(".add_item").prop('disabled', false);

                         },
                         error:function(){
                         }
                     });
                 });

               
                 var select_rock = '#select_rock2';
                 $(document).on('change',select_rock,function () {
                    var rack=$(this).val();
                     var prod_id=$('#productSelect').val();
                     var item_id=$('#item_id').text();
                     var select_expiry=$('#select_expiry').val();
                     var select_lot_no=$('#select_lot_no').val();
                     var select_shelf=$('#select_shelf2').val();
                     $.ajax({
                         type:'get',
                         //url:'{{ url('findshelf') }}',
                         url:'{{ url('findshelf_v2') }}',
                         data:{'expiration_date':prod_id,
                             'item_id':item_id,
                             'select_expiry':select_expiry,
                             'select_lot_no':select_lot_no,
                             'shelf':select_shelf,
                             'rack':rack
                         },
                         dataType:'json',//return data will be json
                         success:function(data){

                             //working on this
                            /* alert('qeqweqwe') */
                             console.log(data.qtyOnQue);
                             /* document.getElementById("select_expiry").options.length = 0; */
                             document.getElementById("select_shelf2").options.length = 0;
                             //document.getElementById("select_rock").options.length = 0;
                       /*       $.each( data.expiry, function( key, value ) {
                                 $('#select_expiry').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                             }); */

                             $.each( data.shelf, function( key, value ) {
                                 $('#select_shelf2').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                             });
                           
                             var a = data.stockIn;
                             console.log(a)
                             var b = data.stockOut;
                             console.log(b)
                             var c = data.qtyOnQue;
                             console.log(c)
                             var d = a - b;
                             var e = d - c;

                             $('#item_status').text("Available Stock : "+ 0);
                             $(".add_item").prop('disabled', false);

                         },
                         error:function(){
                         }
                     });
                 });


                 var select_rock = '#select_shelf2';
                 $(document).on('change',select_rock,function () {
                    var shelf=$(this).val();
                    var rack=$('#select_rock2').val();
                     var prod_id=$('#productSelect').val();
                     var item_id=$('#item_id').text();
                     var select_expiry=$('#select_expiry').val();
                     var select_lot_no=$('#select_lot_no').val();
                     $.ajax({
                         type:'get',
                         //url:'{{ url('findshelf') }}',
                         url:'{{ url('findshelfgetData') }}',
                         data:{'expiration_date':prod_id,
                             'item_id':item_id,
                             'select_expiry':select_expiry,
                             'select_lot_no':select_lot_no,
                             'shelf':shelf,
                             'rack':rack
                         },
                         dataType:'json',//return data will be json
                         success:function(data){

                        

                       
                           
                             var a = data.stockIn;
                             console.log(a)
                             var b = data.stockOut;
                             console.log(b)
                             var c = data.qtyOnQue;
                             console.log(c)
                             var d = a - b;
                             var e = d - c;

                             $('#item_status').text("Available Stock : "+ e);
                             $(".add_item").prop('disabled', false);

                         },
                         error:function(){
                         }
                     });
                 });


               
                 var lot_no = '#select_lot_no';
                 $(document).on('change',lot_no,function () {
                     var prod_id=$(this).val();
                     var item_id=$('#item_id').text();
                     var select_expiry=$('#select_expiry').val();
                     var select_lot_no=$('#select_lot_no').val();
                     $.ajax({
                         type:'get',
                         //url:'{{ url('findItemExpiry') }}',
                         url:'{{ url('findItemExpiry_v2') }}',
                         data:{'expiration_date':prod_id,
                             'item_id':item_id,
                             'select_expiry':select_expiry,
                             'select_lot_no':select_lot_no
                         },
                         dataType:'json',//return data will be json
                         success:function(data){

                             //working on this
                            /* alert('qeqweqwe') */
                             console.log(data.qtyOnQue);
                             /* document.getElementById("select_expiry").options.length = 0; */
                             document.getElementById("select_shelf2").options.length = 0;
                             document.getElementById("select_rock2").options.length = 0;
                       /*       $.each( data.expiry, function( key, value ) {
                                 $('#select_expiry').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                             }); */
                             var tmp4=0;

                             $.each( data.shelf, function( key, value ) {
                                 $('#select_shelf2').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                                 if(tmp4 ==0){                                   
                                    tmp4=value;
                                     }
                             });
                             var tmp3=0;
                             $.each( data.rock, function( key, value ) {
                                 $('#select_rock2').append($("<option/>", {
                                     value: value,
                                     text: value
                                   
                                 }));
                                 if(tmp3 ==0){
                                    LoadLot_3(value,tmp4);
                                    tmp3=value;
                                     }
                             });

                             var a = data.stockIn;
                             console.log(a)
                             var b = data.stockOut;
                             console.log(b)
                             var c = data.qtyOnQue;
                             console.log(c)
                             var d = a - b;
                             var e = d - c;

                            // $('#item_status').text("Available Stock : "+ e);
                             $(".add_item").prop('disabled', false);

                         },
                         error:function(){
                         }
                     });
                 });

    $(document).ready(function(){

        toastr.options = {

            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"

        }

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $( "#productSelect" ).select2({
            ajax: {
                url: '../selectgetproduct',
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
                cache: true
            }

        });

        var productselect = '#productSelect';
                $(document).on('change',productselect,function () {

                var prod_id=$(this).val();
                /* console.log(prod_id); null value */

                document.getElementById("select_expiry").options.length = 0;
                document.getElementById("select_lot_no").options.length = 0;
          /*       document.getElementById("select_shelf").options.length = 0;
                document.getElementById("select_rock").options.length = 0;
 */
                $.ajax({
                    type:'get',
                    //url:'{{ url('storefindProductList') }}',
                    url:'{{ url('storefindProductList_v2') }}',
                    data:{'id':prod_id},
                    dataType:'json',//return data will be json
                    beforeSend: function () {
                        $(".add_item").prop('disabled', true);
                    },
                    success:function(data){
                        
                        if(data.message == 'err'){

                            alert('this product doesnt have a quantity');
                            $('#item_status').text('Available Stock : 0');
                            
                        }
                        
                        $('#showproduct').val(data.productname);
                        $('#label_unit').text(data.unit);
                        $('#qty').val(1);
                        $('#item_id').text(data.id);
                        var tmp=0;
                        $.each( data.expirationDate, function( key, value ) {
                               
                                $('#select_expiry').append($("<option/>", {
                                    value: value,
                                    text: value
                                }));
                                 if(tmp ==0){
                                    LoadLo_2(value);
                                    tmp=value;
                                }
                               

                        });

                        var a = data.stockInQueues;
                        var b = data.datas2[0];
                        var c = b - a; 
                        
                       // $('#item_status').text("Available Stock : "+ c);
                        $(".add_item").prop('disabled', false);

                        var markup = data.markup / 100;
                        var capital = data.capital;
                        
                        var profit = capital * markup ;

                        var total_of_profit_and_capital = parseFloat(capital) + parseFloat(profit);

                        $('#label_srp').text(total_of_profit_and_capital);

                        var q = $("#input_transaction_type").val();

                        if (q === 'SENIOR' || q === 'PWD'){

                            var formula = 1.12;
                            var discountformula = 0.20;

                            var vatexemptsales = total_of_profit_and_capital / formula;
                            var discount = vatexemptsales * discountformula;
                            var finaltotal = vatexemptsales - discount;

                            $('#sellingprice').val(parseFloat(finaltotal).toFixed(2));

                        }else{

                                $('#sellingprice').val(total_of_profit_and_capital);

                        }

                        
                        var productselectvalue = $('#productSelect').val();

                            document.getElementById("div_unit").style.display = "block";
                            document.getElementById("div_srp").style.display = "block";
                            if(productselectvalue === null){
                            document.getElementById("div_unit").style.display = "none";
                            document.getElementById("div_srp").style.display = "none";

                        }
                        $('#item_status').text('Available Stock : 0');
                        
                    },
                    error:function(){
                        $('#item_status').text('');
                    }
                });
              
            });
            

    });

    function LoadLo_2(value){
                    $('#select_expiry').val(value).change();
                }
                function LoadLot(value,rackData){
                    $('#select_lot_no').val(value).change();                    
                }

                function LoadLot_3(rackData,shelf){
                  
                     var prod_id=$('#productSelect').val();
                     var item_id=$('#item_id').text();
                     var select_expiry=$('#select_expiry').val();
                     var select_lot_no=$('#select_lot_no').val();
                     $.ajax({
                         type:'get',
                         //url:'{{ url('findshelf') }}',
                         url:'{{ url('findshelf_v2') }}',
                         data:{'expiration_date':prod_id,
                             'item_id':item_id,
                             'select_expiry':select_expiry,
                             'select_lot_no':select_lot_no,
                             'rack':rackData,
                             'shelf':shelf
                         },
                         dataType:'json',//return data will be json
                         success:function(data){

                             //working on this
                            /* alert('qeqweqwe') */
                             console.log(data.qtyOnQue);
                             /* document.getElementById("select_expiry").options.length = 0; */
                             document.getElementById("select_shelf2").options.length = 0;
                             //document.getElementById("select_rock").options.length = 0;
                       /*       $.each( data.expiry, function( key, value ) {
                                 $('#select_expiry').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                             }); */
                             var datatmp=0
                             $.each( data.shelf, function( key, value ) {
                                 $('#select_shelf2').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                                 if(datatmp == 0){
                                    datatmp=value;
                                    LoadLot_4(datatmp);
                                 }
                             });
                             
                             var a = data.stockIn;
                             console.log(a)
                             var b = data.stockOut;
                             console.log(b)
                             var c = data.qtyOnQue;
                             console.log(c)
                             var d = a - b;
                             var e = d - c;

                             //$('#item_status').text("Available Stock : "+ e);
                             $(".add_item").prop('disabled', false);

                         },
                         error:function(){
                         }
                     });
                }

                function LoadLot_4(shelf){

                    var rack=$('#select_rock2').val();
                     var prod_id=$('#productSelect').val();
                     var item_id=$('#item_id').text();
                     var select_expiry=$('#select_expiry').val();
                     var select_lot_no=$('#select_lot_no').val();
                     $.ajax({
                         type:'get',
                         //url:'{{ url('findshelf') }}',
                         url:'{{ url('findshelfgetData') }}',
                         data:{'expiration_date':prod_id,
                             'item_id':item_id,
                             'select_expiry':select_expiry,
                             'select_lot_no':select_lot_no,
                             'shelf':shelf,
                             'rack':rack
                         },
                         dataType:'json',//return data will be json
                         success:function(data){

                        

                       
                           
                             var a = data.stockIn;
                             console.log(a)
                             var b = data.stockOut;
                             console.log(b)
                             var c = data.qtyOnQue;
                             console.log(c)
                             var d = a - b;
                             var e = d - c;

                             $('#item_status').text("Available Stock : "+ e);
                             $(".add_item").prop('disabled', false);
                             $(".replaced_item").prop('disabled', false);

                         },
                         error:function(){
                         }
                     });
             }

    var refresh_select_2 = function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $( "#productSelect" ).select2({
            ajax: {
                url: '../selectgetproduct',
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
                cache: true
            }

        });
    }

    jQuery(document).on('change', '#input_returned_qty', function (){

        /* alert('change'); */
                                                                            /* here */
        var formData = new FormData();
        var token= $('#_token').val();
        
        var id = $(this).data("id");
        /* alert("id"+id); */
        var transaction_id = $(this).data("transaction_id");
        /* alert("transaction id"+transaction_id); */
        var product_id = $(this).data("product_id");
        /* alert("product_id"+product_id); */
        var invoice_no = $('#slip_invoice_no').text();
        /* alert("invoice"+invoice_no); */
        var cardN = $('input[data-id="' + id + '"]').val();
        /* alert("card no"+cardN) */

        formData.append("id", id);
        formData.append("transaction_id", transaction_id);
        formData.append("product_id", product_id);
        formData.append("cardN", cardN);
        formData.append("invoice_no",invoice_no);
        formData.append('_token', token);

        $.ajax({
            url: '../checkStock',
            type: 'POST',
            data: formData,
            processing: true,
            serverSide: true,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.send-loading').show();
                $(".replaced_item").prop('disabled', true);
            },
            success: function (response) {

                if(response.message == 'invalid_qty'){

                    toastr.warning(response.title);
                    var table = $('#show-hide').DataTable();
                    table.ajax.reload();
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
<!--select2-->
<script src="{{asset("public/css2/vendor/select2/js/select2.min.js")}}"></script>
<script src="{{asset("public/css2/vendor/select2-init.js")}}"></script>

<!--toaster-->
<script src="{{asset("public/css2/vendor/toastr-master/toastr.js")}}"></script>
<script src="{{asset("public/css2/vendor/toastr-master/toastr-init.js")}}"></script>

<!--touchspin-->
<script src="{{asset("public/css2/vendor/touchspin/jquery.bootstrap-touchspin.min.js")}}"></script>
<script src="{{asset("public/css2/vendor/touchspin-init.js")}}"></script>

<!--datatables-->
<script src="{{asset("public/css2/vendor/data-tables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("public/css2/vendor/data-tables/dataTables.bootstrap4.min.js")}}"></script>
