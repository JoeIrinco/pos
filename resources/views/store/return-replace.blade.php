<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mosaddek.com/theme/diverse/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2020 14:24:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>Return and Replace</title>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--custom css-->
    <link href="{{asset("public/css2/css/main.css")}}" rel="stylesheet">

    <link href="{{asset("public/css2/vendor/select2/css/select2.css")}}" rel="stylesheet">

    <!--touchspin-->
    <link href="{{asset("public/css2/vendor/touchspin/jquery.bootstrap-touchspin.min.css")}}" rel="stylesheet">
    <!--bs4 data table-->
    <link href="{{asset("public/css2/vendor/data-tables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
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

            <!-- state start-->
            <div class="row">
                <div class=" col-sm-12">
                    <div class="card card-shadow mb-4 mt-4">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-sm-6 mb-5">
                                    <h5>Vallery Enterprises</h5>
                                    <span><i>Access in medical supply</i></span> <br/>

                                    <br/>
                                    <span>Mabini St., Quezon Dist.,</span> <br/>
                                    <span>Cabanatuan City, Nueva Ecija</span> <br/>
                                    <span class="pr-2">Phone: (044)958 9575</span>
                                    <span>Fax: 432 1231 3456</span>
                                </div>
                                <div class="col-sm-6 text-md-right mb-5">
                                    <h3>{{ $store_orders->transaction_type}}</h3>
                                    <br/>
                                    <br/>
                                    <span>Invoice No. <span id="label_invoice_no">{{ $store_orders->invoice_no }}</span></span> <br/>
                                    <span>Date: {{ $store_orders->date }}</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-5">
                                    <h6>Account Name:</h6>
                                    <span>{{ $store_orders -> customer_name }}</span> <br/>
                                </div>

                                <div class="col-sm-12 mb-1">
                                    <strong>Order History:</strong>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <button type="button" value="{{$store_orders->transaction_id}}" class="shadow btn-sm btn-success btn_return"><i class="fa fa-refresh pr-2"></i>return</button>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-sm"></label>
                                        <label id="main_transaction_id"  hidden readonly>{{$store_orders->transaction_id}}</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Product Description</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Total</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($store_items as $store_item)
                                            <tr>
                                                <td>{{ $store_item->brand }} {{ ' ' }} {{ $store_item->product_name }} {{ ' ' }} {{ $store_item->product_description }}</td>
                                                <td>{{ $store_item->unit }}</td>
                                                <td>{{ $store_item->quantity }}</td>
                                                <td>{{ $store_item->amount }}</td>
                                                <td>{{ $store_item->total }}</td>
                                            </tr>
                                            @endforeach
                                           
                                        {{-- @foreach($replacements as $store_item)
                                            <tr>
                                                <td>@if($store_item['return_replace'] == 'RETURNED')<a class="text-info">{{ $store_item['product_name']}}
                                                    </a> &nbsp; <a class="text-danger">({{ $store_item['return_replace']}} QTY {{ $store_item['return_qty'] }})</a>
                                                    @endif
                                                    @if($store_item['return_replace'] == 'REPLACED')<a class="text-success">{{ $store_item['product_name']}}
                                                    </a> &nbsp; <a class="text-danger">{{ $store_item['return_replace']}}</a>
                                                    
                                                    @endif
                                                    @if($store_item['return_replace'] == '')<a>{{ $store_item['product_name']}}</a>
                                                    @endif
                                                    @if($store_item['replaced']=="[]")
                                                    @else
                                                        @foreach($store_item['replaced'] as $replaced)
                                                            @if($store_item['transaction_id'] == $replaced['transaction_id1'])
                                                                <br><a>{{ $replaced['product_name1'] }}</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($store_item['return_replace'] == 'RETURNED')
                                                        <a class="text-info">{{ $store_item['unit']}}</a>
                                                    @endif
                                                    @if($store_item['return_replace'] == 'REPLACED')
                                                        <a class="text-success">{{ $store_item['unit']}}</a>
                                                        
                                                    @endif
                                                    @if($store_item['return_replace'] == '')
                                                        <a>{{ $store_item['unit']}}</a>
                                                    @endif
                                                    @if($store_item['replaced']=="[]")
                                                    @else
                                                        @foreach($store_item['replaced'] as $replaced)
                                                            @if($store_item['transaction_id'] == $replaced['transaction_id1'])
                                                                <br>{{ $replaced['unit1'] }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($store_item['return_replace'] == 'RETURNED')
                                                        <a class="text-info">{{ $store_item['quantity']}}</a>
                                                    @endif
                                                    @if($store_item['return_replace'] == 'REPLACED')
                                                        <a class="text-success">{{ $store_item['quantity']}}</a>
                                                    @endif
                                                    @if($store_item['return_replace'] == '')
                                                        <a>{{ $store_item['quantity']}}</a>
                                                    @endif
                                                    @if($store_item['replaced']=="[]")
                                                    @else
                                                        @foreach($store_item['replaced'] as $replaced)
                                                            @if($store_item['transaction_id'] == $replaced['transaction_id1'])
                                                                <br>{{ $replaced['quantity1'] }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>@if($store_item['item_status'] =='CUSTOM DISCOUNT')

                                                        @if($store_item['return_replace'] == 'RETURNED')
                                                            <a class="text-info">{{ $store_item['total'] / $store_item['quantity'] }}</a>
                                                        @endif
                                                        @if($store_item['return_replace'] == 'REPLACED')
                                                            <a class="text-success">{{ $store_item['total'] / $store_item['quantity'] }}</a>
                                                           
                                                        @endif
                                                        @if($store_item['return_replace'] == '')
                                                            <a>{{ $store_item['total'] / $store_item['quantity'] }}</a>
                                                        @endif

                                                    @else
                                                        @if($store_item['return_replace'] == 'RETURNED')
                                                            <a class="text-info">{{ $store_item['amount']}}</a>
                                                        @endif
                                                        @if($store_item['return_replace'] == 'REPLACED')
                                                            <a class="text-success">{{ $store_item['amount']}}</a>
                                                        
                                                        @endif
                                                        @if($store_item['return_replace'] == '')
                                                            <a>{{ $store_item['amount']}}</a>
                                                        @endif

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
                                                    @if($store_item['return_replace'] == 'RETURNED')
                                                        <a class="text-info">{{ $store_item['total']}}</a>
                                                    @endif
                                                    @if($store_item['return_replace'] == 'REPLACED')
                                                        <a class="text-success">{{ $store_item['total']}}</a>
                                                    
                                                    @endif
                                                    @if($store_item['return_replace'] == '')
                                                        <a>{{ $store_item['total']}}</a>
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
                                                        <div class='col'>
                                                            <div class='btn-group task-list-action'>
                                                                <div class='dropdown '>
                                                                    <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                                        <i class='icon-options'></i>
                                                                    </a>
                                                                    <div class='dropdown-menu dropdown-menu-right'>
                                                                        <a class='dropdown-item return_btn' href='#' data-value='{{ $store_item['id'] }}' data-id="{{ $store_item['transaction_id'] }}"><i class='icon-eye text-info pr-2'></i> Return</a>
                                                                        <a class='dropdown-item update_btn' href='#' data-id="{{ $store_item['transaction_id'] }}"><i class='icon-close text-danger pr-2'></i> Replace</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    

                                                </td>

                                            </tr>
                                        @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-4 ml-auto">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Total Sales</td>
                                            <td>&#8369; &nbsp {{ $total_sales }}</td>
                                        </tr>
                                        <tr>
                                            <td>Debit/Credit</td>
                                            <td>&#8369; &nbsp {{ $credit_debit }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>New Total </strong>
                                            </td>
                                            <td><strong>&#8369; &nbsp; {{-- {{ $store_orders->final_total - $gettotalpayment}} --}}</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12">
                                    <div class="border p-4"><Strong>Note:</Strong>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur id illo incidunt, iste libero quisquam? A aut cumque fuga fugit iusto libero officia optio quasi, quisquam saepe voluptate voluptatibus voluptatum.
                                        <br/>
                                        <br/>
                                        <strong class="f12">Thanks for your business</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- state end-->

        </div>
        {{--
        MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
        <div class="card-body">
            <div class="modal bd-example-modal-lg" id="modalbodyforupdate"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Item Replacement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class=" col-md-12">
                                <div class="mb-4">

                                    <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">

                                    <div class="row">
                                        <div id="div_third" class=" col-md-12" >
                                            <div class="row">
                                                <div hidden>
                                                    <label hidden readonly>id</label><label id="item_id" hidden readonly></label>
                                                    <label hidden readonly>orders id</label><label id="transaction_id" hidden readonly></label>
                                                </div>
                                                <div class="col-md-6 mb-0">

                                                    <strong><label>Product Description:</label></strong>&nbsp;<u><label class="text-decoration: underline;"  id="display_product_description"></label></u>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-0">
                                                    <strong><label>Amount:</label></strong>&nbsp;<label id="display_amount"></label>
                                                </div>
                                                <div class="col-md-3 mb-0">
                                                    <strong><label>Qty:</label></strong>&nbsp;<label id="display_quantity"></label>
                                                </div>
                                                <div class="col-md-3 mb-0">
                                                    <strong><label>Total:</label></strong>&nbsp;<label id="display_total"></label>
                                                </div>
                                                <div class="col-md-3 mb-0">
                                                    <strong><label>Unit:</label></strong>&nbsp;<label id="display_unit"></label>
                                                </div>
                                                <div class="col-md-6 mb-0">
                                                    <strong><label>Lot No.:</label></strong>&nbsp;<label id="display_lotno"></label>
                                                </div>
                                                <div class="col-md-6 mb-0">
                                                    <strong><label>Expiry:</label></strong>&nbsp;<label id="display_expiry"></label>
                                                </div>
                                                <!-- <div class="col-md-6 mb-3">
                                                    <strong><label>Remaining balance:</label></strong>&nbsp;<label id="display_balance"></label>
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mt-3">
                                                    <div class="row">
                                                        <div class="col-md-12 mt-3">
                                                            <strong><label >Product Description *:</label></strong>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <select style="width:100%;" id="productSelect" data-placeholder='-- Select Product --' class="form-control"  name="product_name[]">
                                                                <option value='0'>-- Select Product --</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div id="div_unit" class="col-md-6 mb-1" style="display: none;">
                                                            <strong><label for="validationCustom04">Unit:&nbsp;</label></strong><label id="label_unit" for="validationCustom04"></label>

                                                        </div>
                                                        <div id="div_srp" class="col-md-6 mb-1" style="display: none;">
                                                            <strong><label for="validationCustom04">SRP:&nbsp;</label></strong><label id="label_srp" for="validationCustom05">&nbsp;</label>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4 mb-3">
                                                            <strong><label for="validationCustom03">Quantity *:</label></strong>
                                                            <input type="number" id="qty" name="quantity[]" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                            <input type="text" hidden  id="showproduct" class="form-control">
                                                        </div>
                                                        <div class="col-md-8 mb-3">
                                                            <strong><label for="validationCustom05">Price*:</label></strong>
                                                            <input type="number" id="sellingprice" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4 mb-3">
                                                        </div>
                                                        <div id="div_custom_price" style="display: none;" class="col-md-8 mb-3">
                                                            <strong><label for="validationCustom05">Discounted Price:</label></strong>
                                                            <input type="number" id="custom_price" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-5">
                                                            <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-success replaced_item"><i class="fa fa-cart-plus pr-1"></i><strong> REPLACE</strong></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
<!--                                 <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".show-replaced-item">View</button>-->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {{-- <button id="save" type="button" class="btn btn-success">Save</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                                <th scope="col">unit</th>
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
                                            <label for="recipient-name" class="col-form-label">Return Slip Date *:</label>
                                            <input type="date" class="form-control" id="return_date">
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

</body>

<!-- Mirrored from mosaddek.com/theme/diverse/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2020 14:24:52 GMT -->
</html>
<script>




    $(document).on('click', '.delete', function(){
        var id = $(this).data("id");
        var value = $(this).data("value");
        console.log('id is' +  id);
        console.log('value is ' + value );

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
        console.log('id is' +  id);
        var invoice_no = $("#label_invoice_no").text();
        //invoice_no//$store_orders->invoice_no
        //qty returned
        //lot_no
        //expiration_date
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

    $(document).on('click','.replaced_item',function () {

        var formData = new FormData();
        var token= $('#_token').val();

        formData.append("status", $("#input_transaction_type").val());
        formData.append("productSelect", $("#showproduct").val());
        formData.append("qty", $("#qty").val());
        formData.append("unit", $("#label_unit").text());
        formData.append("srp", $("#label_srp").text());
        formData.append("price", $("#sellingprice").val());
        formData.append("custom_price", $("#custom_price").val());
        formData.append("item_id", $("#item_id").text());
        formData.append("transaction_id", $("#transaction_id").text());
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
                success: function (response) {
                    
                    /* console.log(response); */
                    if(response!="err"){
                        
                        toastr.success('','Successfully added.');
                        var countlog = $('#no').val();
                        console.log(countlog);
                        $(".replaced_item").prop('disabled', false);

                    }

                    var transactionselect = $("#transaction_type").val();
                    console.log(transactionselect);

                    if(transactionselect === 'si_regular'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        alert(custom_dicount_is_true);
                        if(custom_dicount_is_true != ''){

                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            //var sum = add_qty * add_product;
                            //var sum1 = total + sum;
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

                    }

                    $('#showproduct').val('');
                    $('#qty').val('');
                    $('#unit').val('');
                    $('#sellingprice').val('');
                    /* $('productSelect').select2(); */
                    $("#productSelect").select2().select2("val", null);
                    $("#productSelect").select2().select2("val", '-- Select Product --');/*
                    $('select').select2().select2('val', $('.select2 option:eq(0)').val()); */

                    refresh_select_2();

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


    $(document).on('click','.submit_return',function () {
        /* alert('ok'); */
        var formData = new FormData();
        var token= $('#_token').val();

        formData.append("transaction_id", $("#main_transaction_id").text());
        formData.append("id", $("#label_product_id").text());
        formData.append("label_invoice_no", $("#label_invoice_no").text());
        formData.append("return_slip_no", $("#return_slip_no").val());
        formData.append("return_change", $("#return_change").val());
        /*formData.append("return_additional_payment", $("#return_additional_payment").val());*/
        formData.append("return_remarks", $("#return_remarks").val());
        formData.append("return_date", $("#return_date").val());
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

                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 500);

                    }
                    if(response.message == 'dup'){

                        toastr.warning(response.title);

                    }
                    if(response.message == 'req'){

                        toastr.warning(response.title);

                    }
                    if(response.message == 'err'){

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
    });




    $(document).on('click','.update_btn',function (e) {
        event.preventDefault();
        let href = $(this).attr('data-id');
        console.log(href);
        $.ajax({
            url: '/vallery/getItemInfoByid/'+href,
            beforeSend: function() {
                $('#loader').show();
            },
            success: function(result) {
                if(result.item_status == "CUSTOM DISCOUNT"){
                    $('#item_id').text(result.id);
                    $('#display_product_description').text(result.product_name);
                    $('#display_amount').text(result.total / result.quantity);
                    $('#display_quantity').text(result.quantity);
                    $('#display_total').text($('#display_amount').text() * result.quantity);
                    $('#display_unit').text(result.unit);
                }else{

                    $('#item_id').text(result.id);
                    $('#transaction_id').text(result.transaction_id);
                    $('#display_product_description').text(result.product_name);
                    $('#display_amount').text(result.amount);
                    $('#display_quantity').text(result.quantity);
                    $('#display_total').text(result.total);
                    $('#display_unit').text(result.unit);

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
        console.log('value is ' + value );
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

    $(document).on('click','.btn_return',function (e) {
        event.preventDefault();

        let href = $(this).attr('data-id');
        var value = /*$(this).data("value");*/ $('#main_transaction_id').text();
        console.log('value is ' + value );
        var token= $('#_token').val();

        $.ajax({
            url: '/vallery/returnProduct/'+value,
            beforeSend: function() {
                $('#loader').show();
            },
            success: function(result) {

                /*$('#return_product_name').text(result.brand+' '+result.product_name+' '+result.product_description);
                $('#return_available_quantity').text(result.quantity);
                $('#label_product_id').text(result.id);
                $('#label_transaction_id').text(result.transaction_id);*/
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
    });

    jQuery(document).on('change', '.return_input', function (){

        var formData = new FormData();
        var token= $('#_token').val();
        var id = $(this).data("id");
        var transaction_id = $(this).data("transaction_id");
        var product_id = $(this).data("product_id");
        var invoice_no = $('#label_invoice_no').text();

        var cardN = $('input[data-id="' + id + '"]').val();
        

        formData.append("id", id);
        formData.append("transaction_id", transaction_id);
        formData.append("product_id", product_id);
        formData.append("cardN", cardN);
        formData.append("invoice_no",invoice_no);
        formData.append('_token', token);
        /*var allAttributes = jQuery('.return_input').map(function() {
            return jQuery(this).data('id');
        }).get();

        alert(allAttributes);*/

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
                if(response.message == 'no_permission'){
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


    $(document).ready(function(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#show-hide').DataTable({
            searching: false,
            bInfo : false,
            bPaginate: false,
            processing: true,
            serverSide: true,
            /* scrollY:"600px", */
            scrollX:true,
            scrollY:"270px",
            "ajax": {
                "url": "{{ url('getItemToReturn') }}",
                "data": function ( d ) {
                        d.extra_search = $('#main_transaction_id').text();
                }
            },
            columns: [
                { "data": "product_name",
                  "orderable": false},
                { "data": "unit",
                  "orderable": false},
                { "data": "quantity",
                  "orderable": false},
                { "data": "amount",
                  "orderable": false},
                { "data": "total",
                  "orderable": false},
                { "data": "action",
                    "searchable": false,
                    "orderable": false
                },
            ]
        });
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
            console.log(prod_id);

            $.ajax({
                type:'get',
                url:'{{ url('storefindProductList') }}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){

                    $('#showproduct').val(data.productname);
                    $('#label_unit').text(data.unit);
                    $('#qty').val(1);


                    var markup = data.markup / 100;
                    $('#label_srp').text(parseInt(data.capital) * markup + parseInt(data.capital));
                    var srp = parseFloat($('#label_srp').text()).toFixed(2);
                    $('#label_srp').text(srp);

                    var q = $("#input_transaction_type").val();
                    console.log(q);
                    if (q === 'SENIOR'){
                        var sum1 = data.capital * markup;
                        var sum2 = sum1 + parseInt(data.capital);
                        console.log(sum2 + 'rwerwer');
                        console.log(sum1);
                        var formula = 1.12;
                        var discountformula = 0.20;

                        var vatexemptsales = sum2 / formula;
                        var discount = vatexemptsales * discountformula;
                        var finaltotal = vatexemptsales - discount;


                        $('#sellingprice').val(parseFloat(finaltotal).toFixed(2));

                    }else{
                        $('#sellingprice').val(parseInt(data.capital) * markup + parseInt(data.capital));
                        var sellingprice = parseFloat($('#sellingprice').val()).toFixed(2);
                        $('#sellingprice').val(sellingprice);
                    }

                    var productselectvalue = $('#productSelect').val();
                    console.log(productselectvalue+'tutuytu');
                    document.getElementById("div_unit").style.display = "block";
                    document.getElementById("div_srp").style.display = "block";
                    if(productselectvalue === null){
                        document.getElementById("div_unit").style.display = "none";
                        document.getElementById("div_srp").style.display = "none";
                    }

                },
                error:function(){

                }
            });
        });
    });

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
