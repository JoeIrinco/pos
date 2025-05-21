<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--favicon icon-->
    <link rel="icon" type="image/png" size="16x6" href="{{ asset('public/image/vallery-logo-only.png') }}">

    <title>VL | POS</title>

    <!--google font-->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

        <!--jquery append-->
    {{-- <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    <!--common style-->
    <link href="public/css2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css2/vendor/lobicard/css/lobicard.css" rel="stylesheet">
    <link href="public/css2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css2/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <link href="public/css2/vendor/animate.min.css" rel="stylesheet">
    <!--jqery steps-->
    <link href="public/css2/vendor/jquery-steps/jquery.steps.css" rel="stylesheet">
    <!--custom css-->
    <link href="public/css2/css/main.css" rel="stylesheet">

    <!--toastr-->
    <link href="public/css2/vendor/toastr-master/toastr.css" rel="stylesheet">

    <!--custom select 2-->
    <link href="public/css2/vendor/select2/css/select2.css" rel="stylesheet">

    <!--date picker style-->
    <link href="public/css2/vendor/date-picker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--bs4 data table-->
    <link href="public/css2/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 5px;
        text-align: left;
        }
        </style>
    </head>
    <body class="app header-fixed left-sidebar-hidden right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

    <!--===========header start===========-->
    <header class="app-header navbar">

        <!--left side nav toggle start-->
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item d-lg-none">
                <button class="navbar-toggler mobile-leftside-toggler" type="button"><i class="ti-align-right"></i></button>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link navbar-toggler left-sidebar-toggler" href="#"><i class=" ti-align-right"></i></a>
            </li>
            <li class="nav-item d-md-down-none-">
                <li class="nav-item d-md-down-none-">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="mb-0">Point of Sale
                                <small>Welcome back!, {{ Auth::user()->name ?? '' }}</small>
                            </h6>
                        </div>
                    </div>
                </li>
            </li>
        </ul>
        <!--left side nav toggle end-->

        
    </header>
    <!--===========header end===========-->

    <!--===========app body start===========-->
    <div class="app-body">

        <!--left sidebar start-->
        <div class="left-sidebar">
            <nav class="sidebar-menu">
                <ul id="nav-accordion">
                
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" ti-pencil-alt"></i>
                            <span>Orders</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="dashboard">Add Orders</a></li>
                            <li><a  href="#">Upload P.O.</a></li>
                            <li><a  href="myorders">My Orders</a></li>
                            {{-- <li><a href="orders">Manage P.O.</a></li> --}}
                        </ul>
                    </li>
                    {{-- @auth --}}
                    @if(Auth::user()->is_admin== 2 || 1)

                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class=" fa fa-medkit"></i>
                                    <span>Store</span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="pos">POS</a></li>
                                    {{-- not sure if admin or superadmin --}}
                                    <li><a  href="add-store-product">Stock In</a></li>
                                    
                                    <li><a  href="reports">Generate Report</a></li>
                                    <li><a  href="purchase-order">Purchase Order</a></li>
                                    {{-- <li><a href="orders">Manage P.O.</a></li> --}}
                                </ul>
                            </li>

                    @endif
                    {{-- @endauth --}}
                    

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" icon-grid"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li class="sub-menu">
                                @auth
                                @if(Auth::user()->is_admin==1)
                                    <li><a href="orders">Manage P.O.</a></li>
                                    <li><a href="add-product">Add Product</a></li>
                                    <li><a href="add-client">Add Client</a></li>
                                    <li><a href="{{ route('register') }}">{{ __('Register User') }}</a></li>
                                    @endif
                                    @endauth
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}</a>
        
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form></li>

                                    
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
        <!--left sidebar end-->

        <!--main contents start-->
        <main class="main-content">
            <div class="col-md-12">
                    <div class="card-body">
                        <div >
                            <div class="myContainer">






                                
{{-- newwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww --}}

                                <div class="row" >
                                    <div id="div_main" class=" col-md-6 mt-1" style="display: block"> {{-- start --}}
                                        
                                        <div class="card-body">
                                                <h2 class="text-center form-title mt-1 mb-1">Transaction Information</h2>
                                            <div class="row">
                                                <input type="text" id="input_cash" class="text-uppercase form-control" hidden readonly>
                                                                                            
                                                <input type="text" id="input_transaction" class="text-uppercase form-control" hidden readonly>   
                                                <input type="text" id="input_transaction_type" class="text-uppercase form-control" hidden readonly>

                                                    <div class="col-md-6 mb-3">
                                                        <label>Transaction Type:</label>
                                                            <select style="border-color: rgb(0, 0, 0);" onchange="yesnoCheck(this);" id="transactionType" class="form-control" >
                                                                <option value=''>SELECT TRANSACTION TYPE</option>
                                                                <option value='si_regular'>Sales Invoice -> Regular</option>
                                                                <option value='si_senior'>Sales Invoice -> Senior</option>
                                                                <option value='si_pwd'>Sales Invoice -> Pwd</option>
                                                                <option value='si_private'>Sales Invoice -> Private</option>
                                                                <option value='si_government'>Sales Invoice -> Government</option>
                                                                <option value='dr_'>Delivery Reciept</option>
                                                                <option value='of_'>Order Form</option>
                                                            </select>
                                                    </div>
                                            </div>
                                        <div id="div_transaction_information_content" style="display: none;">
                                            <div class="row" >
                                                <div id="div_senior_and_pwd" style="display: none;" class="col-md-3 mb-3">
                                                    <strong><label id="label_id_number">label</label></strong>
                                                    <input type="text" id="input_senior" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div id="show_transaction_number" style="display: block;" class="col-md-6 mb-3">
                                                    <strong><label id="label_transaction_number">label</label></strong>
                                                    <input type="text" id="input_invoice" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control">
                                                </div>
                                                <div class="col-md-6 mb-3" id="show_transaction_date" style="display: block;">
                                                    <strong><label>Transaction Date:</label></strong>
                                                    <input id="input_transaction_date" type="date" style="border-color: rgb(0, 0, 0);" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                                        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3" id="show_transaction_name" style="display: block;" >
                                                    <strong><label>Account Name:</label></strong>
                                                    <input type="text" id="input_accountname" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" >
                                                </div>
                                                <div class="col-md-6 mb-3" id="show_transaction_address" style="display: block;">
                                                    <strong><label>Address:</label></strong>
                                                    <input type="text" id="input_address" style="border-color: rgb(0, 0, 0);" value="CABANATUAN CITY, NUEVA ACIJA" class="text-uppercase form-control" placeholder="Address *">
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <button id="first_to_second" type="button" style="width:100%" class="btn btn-sm btn-info"><strong>NEXT &nbsp;</strong><i class=" ti-arrow-right pr-1"></i></button>
                                                </div>
                                            </div>
                                        </div>                                           
                                        </div>
                                    </div>

                                    <div id="div_second" class=" col-md-6 mt-1" style="display: none"> {{-- start --}}
                                        
                                        <div class="card-body">
                                                <h2 class="text-center form-title mt-1 mb-1">Sales Order</h2>

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
                                                    {{-- <input type="text" id="unit" name="unit[]" style="border-color: rgb(0, 0, 0);" class="form-control" readonly> --}}
                                                </div>{{-- zzzzzzzzzzzz --}}
                                                <div id="div_srp" class="col-md-6 mb-1" style="display: none;">
                                                    <strong><label for="validationCustom04">SRP:&nbsp;</label></strong><label id="label_srp" for="validationCustom05">&nbsp;</label>
                                                    {{-- <input type="number" id="sellingprice" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control" readonly> --}}
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
                                                    <input type="number" id="sellingprice" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control" > 
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    {{-- <input type="button" value="ADD ITEM" style="width:100%" class="btn btn-outline-success add_item"> --}}
                                                    <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-success add_item"><i class="fa fa-cart-plus pr-1"></i><strong> Add Item</strong></button>
                                                    {{-- <a class="btn btn-success add_item" >Add Item</a> --}}
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <button id="back_second_to_first" type="button" style="width:100%" class="btn btn-sm btn-info"><i class=" ti-arrow-left pr-1"></i><strong> BACK</strong></button>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <button id="next_second_to_third" type="button" style="width:100%" class="btn btn-sm btn-info"><strong>NEXT &nbsp;</strong><i class=" ti-arrow-right pr-1"></i></button>
                                                </div>
                                                <div class="card-body col-md-4 mb-3">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">Total :</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="h4_total" class="alert-heading">&#8369;{{ $format = number_format($sell) }}</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body col-md-4 mb-3">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">Total :</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="h4_vat" class="alert-heading">Well done!</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body col-md-4 mb-3">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">Total :</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="h4_vat_exempt" class="alert-heading">Well done!</h4>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            {{-- <div class="form-group text-center ">
                                                <input type="button" value="BACK" class="btn btn-default back">
                                                <input id="btn_next2nd" type="button" value="NEXT" class="btn btn-primary next">
                                            </div> --}}
                                        </div>
                                    </div>


                                    <div id="div_third" class=" col-md-6 mt-1" style="display: none"> {{-- start --}}
                                        <div class="card-body">
                                                <h2 class="text-center form-title mt-1 mb-1">Payment</h2>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label>Transaction Type:</label>
                                                        <select style="border-color: rgb(0, 0, 0);" onchange="yesnoCheck(this);" id="transactionType" class="form-control" >
                                                            <option value=''>SELECT TRANSACTION TYPE</option>
                                                            <option value='si_regular'>CASH</option>
                                                            <option value='si_senior'>CHECK</option>
                                                            <option value='si_pwd'>CARD -> DEBIT</option>
                                                            <option value='si_private'>CARD -> CREDIT</option>
                                                            <option value='si_government'>ONLINE PAYMENT -> GCASH</option>
                                                            <option value='dr_'>ONLINE PAYMENT -> PAYMAYA</option>
                                                            <option value='dr_'>ONLINE PAYMENT -> DEPOSIT</option>
                                                            <option value='dr_'>ONLINE PAYMENT -> ONLINEz</option>
                                                            <option value='of_'>Order Form</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 mb-3">
                                                    <button id="back_third_to_second" type="button" style="width:100%" class="btn btn-sm btn-info"><i class=" ti-arrow-left pr-1"></i><strong> BACK</strong></button>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <button id="Submit" type="button" style="width:100%" class="btn btn-sm btn-primary"><i class=" icon-cursor pr-1"></i><strong>Sumbit &nbsp;</strong></button>
                                                </div>
                                                
                                            </div>
                                            <div class="row mb-3">

                                            </div>
                                            <div class="row mb-13">

                                            </div>
                                            <div class="row mb-3">

                                            </div>
                                            <div class="row">
                                                <div class="card-body col-md-4 mb-3">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">Total :</p>
                                                        
                                                        <hr>
                                                        <h4 id="h4_total" class="alert-heading">&#8369;{{ $format = number_format($sell) }}</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body col-md-4 mb-3">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">Total :</p>
                                                        
                                                        <hr>
                                                        <h4 id="h4_vat" class="alert-heading">Well done!</h4>
                                                    </div>
                                                </div>
                                                <div class="card-body col-md-4 mb-3">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">Total :</p>
                                                       
                                                        <hr>
                                                        <h4 id="h4_vat_exempt" class="alert-heading">Well done!</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            {{-- <div class="form-group text-center ">
                                                <input type="button" value="BACK" class="btn btn-default back">
                                                <input id="btn_next2nd" type="button" value="NEXT" class="btn btn-primary next">
                                            </div> --}}
                                        </div>
                                    </div>


                                    <div class=" col-md-6 mt-1">
                                        <div class="card-body">
                                            <table id="show-hide" style="width:100%" class="display dt-init table table-bordered table-striped " cellspacing="0" {{-- id="data_table" class="table table-responsive" --}}>
                                                <thead>
                                                <tr>
                                                    <th scope="col">PRODUCT DESCRIPTION</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                                </thead>
                                            </table>
                                            <br/>
                                            <br/>
                                            
                                        </div>
                                    </div>
                                </div>

{{-- newwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww --}}







                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <form id="form" action="orders" method="POST">
            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
        </form>

        </main>
    </div>
    <!--===========app body end===========-->
    
    <!--===========footer start===========-->
    
</body>
<script type="text/javascript">
                    //working code for computation
                    var transactionselect = '#transactionType';
                    $(document).on('change',transactionselect,function () {
                    
                    var type=$(this).val();
                    console.log(type);
                    //emptyinput();
                    //emptylabel();
                    $.ajax({
                        type:'get',
                        url:'{{ url('storefindTotalPrice') }}',
                        data:{'type':type},
                        dataType:'json',//return data will be json
                        success:function(data){
                            if(type === 'si_regular'){

                               $('#input_transaction').val('SALES INVOICE');
                               $('#input_transaction_type').val('REGULAR');
                               //$('#label_id_number').text('Sales Invoice *:');
                               $('#label_transaction_number').text('Sales Invoice # *:');
                               //document.getElementById("alt2").style.display = "block";
                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "none";
                           }
                            if(type === 'si_senior'){
                               
                               $('#input_transaction').val('SALES INVOICE');
                               $('#input_transaction_type').val('SENIOR');
                               $('#label_id_number').text('Senior ID # *:');
                               $('#label_transaction_number').text('Sales Invoice # *:');
                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "block";

                            }if(type === 'si_pwd'){

                               $('#input_transaction').val('SALES INVOICE');
                               $('#input_transaction_type').val('PWD');
                               $('#label_id_number').text('PWD ID # *:');
                               $('#label_transaction_number').text('Sales Invoice # *:');
                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "block";
                               

                            }if(type === 'si_private'){
                                
                                $('#input_transaction').val('SALES INVOICE');
                                $('#input_transaction_type').val('PRIVATE');
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";

                            }if(type === 'si_government'){

                                $('#input_transaction').val('SALES INVOICE');
                                $('#input_transaction_type').val('GOVERNMENT');
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";

                            }if(type === 'dr_'){

                                $('#input_transaction').val('DELIVERY RECIEPT');
                                $('#label_transaction_number').text('Delivery Reciept # *:');
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";

                            }if(type === 'of_'){

                            $('#input_transaction').val('ORDER FORM');
                            $('#label_transaction_number').text('Order Form # *:');
                            document.getElementById("div_transaction_information_content").style.display = "block";
                            document.getElementById("div_senior_and_pwd").style.display = "none";

                            }
                        },
                        error:function(){

                        }
                    });
                });
                    /* //working code for computation
                    var transactionselect = '#transactionType';
                    $(document).on('change',transactionselect,function () {
                    
                    var type=$(this).val();
                    console.log(type);
                    //emptyinput();
                    emptylabel();
                    $.ajax({
                        type:'get',
                        url:'{{ url('storefindTotalPrice') }}',
                        data:{'type':type},
                        dataType:'json',//return data will be json
                        success:function(data){
                            if(type === 'NON-VAT'){
                               
                               $('#total').val(data.total)
                               
                               var total = parseInt($("#total").val());

                               $('#total').text(parseFloat(total).toFixed(2));
                               $('#finaltotal').text(parseFloat(total).toFixed(2));

                           }
                            if(type === 'CASH'){
                               
                                $('#total').val(data.total)
                                
                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;

                                var netofvat = total / formula;
                                var vat = netofvat * vatformula;

                                

                                $('#vat').text(parseFloat(vat).toFixed(2));
                                $('#netofvat').text(parseFloat(netofvat).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(total).toFixed(2));

                            }if(type === 'CHECK'){
                                emptylabel();
                                $('#total').val(data.total)

                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;

                                var netofvat = total / formula;
                                var vat = netofvat * vatformula;


                                $('#vat').text(parseFloat(vat).toFixed(2));
                                $('#netofvat').text(parseFloat(netofvat).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(total).toFixed(2));

                            }if(type === 'CARD'){
                                
                                $('#total').val(data.total)

                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;

                                var netofvat = total / formula;
                                var vat = netofvat * vatformula;


                                $('#vat').text(parseFloat(vat).toFixed(2));
                                $('#netofvat').text(parseFloat(netofvat).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(total).toFixed(2));

                            }if(type === 'SENIOR-CASH'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                $('#vat').text('');
                                $('#netofvat').text('');

                                $('#netofvat').val(parseFloat(netofvat).toFixed(2));
                                $('#vatexempt').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#discount').text(parseFloat(discount).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'SENIOR-CHECK'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                $('#vat').text('');
                                $('#netofvat').text('');

                                $('#netofvat').val(parseFloat(netofvat).toFixed(2));
                                $('#vatexempt').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#discount').text(parseFloat(discount).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'SENIOR-CARD'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                $('#vat').text('');
                                $('#netofvat').text('');

                                $('#netofvat').val(parseFloat(netofvat).toFixed(2));
                                $('#vatexempt').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#discount').text(parseFloat(discount).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'PWD-CASH'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;


                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                $('#vat').text('');
                                $('#netofvat').text('');

                                $('#netofvat').val(parseFloat(netofvat).toFixed(2));
                                $('#vatexempt').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#discount').text(parseFloat(discount).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'PWD-CHECK'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                $('#vat').text('');
                                $('#netofvat').text('');
                                $('#netofvat').val(parseFloat(netofvat).toFixed(2));
                                $('#vatexempt').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#discount').text(parseFloat(discount).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'PWD-CARD'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                $('#vat').text('');
                                $('#netofvat').text('');

                                $('#netofvat').val(parseFloat(netofvat).toFixed(2));
                                $('#vatexempt').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#discount').text(parseFloat(discount).toFixed(2));
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));
                            }
                            if(type === 'PRIVATE-CASH'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var ewtformula = 0.01;

                                var ewt = total * ewtformula / 1.12;
                                var finaltotal = total - ewt;

                                $('#vat').text('');
                                $('#netofvat').text('');

                                $('#vatexempt').text('');
                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#discount').text('');
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));
                            }
                            if(type === 'PRIVATE-CHECK'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var ewtformula = 0.01;

                                var ewt = total * ewtformula / 1.12;
                                var finaltotal = total - ewt;

                                $('#vat').text('');
                                $('#netofvat').text('');

                                $('#vatexempt').text('');
                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#discount').text('');
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));
                            }
                            if(type === 'PRIVATE-CARD'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var ewtformula = 0.01;

                                var ewt = total * ewtformula / 1.12;
                                var finaltotal = total - ewt;

                                $('#vat').text('');
                                $('#netofvat').text('');

                                $('#vatexempt').text('');
                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#discount').text('');
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));
                            }if(type === 'GOVERNMENT-CASH'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var ewtformula = 0.01;
                                var vatformula = 0.05;

                                var ewt = total * ewtformula / 1.12;
                                var vat = total * vatformula / 1.12;
                                var finaltotal = total - ewt - vat;


                                $('#vat').text(parseFloat(vat).toFixed(2));
                                $('#netofvat').text('');

                                $('#vatexempt').text('');
                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#discount').text('');
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));
                            }
                            if(type === 'GOVERNMENT-CHECK'){
                                
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var ewtformula = 0.01;
                                var vatformula = 0.05;

                                var ewt = total * ewtformula / 1.12;
                                var vat = total * vatformula / 1.12;
                                var finaltotal = total - ewt - vat;


                                $('#vat').text(parseFloat(vat).toFixed(2));
                                $('#netofvat').text('');

                                $('#vatexempt').text('');
                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#discount').text('');
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));
                            }
                            if(type === 'GOVERNMENT-CARD'){
                               
                                $('#total').val(data.total)
                                var total = parseInt($("#total").val());
                                var ewtformula = 0.01;
                                var vatformula = 0.05;

                                var ewt = total * ewtformula / 1.12;
                                var vat = total * vatformula / 1.12;
                                var finaltotal = total - ewt - vat;


                                $('#vat').text(parseFloat(vat).toFixed(2));
                                $('#netofvat').text('');

                                $('#vatexempt').text('');
                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#discount').text('');
                                $('#total').text(parseFloat(total).toFixed(2));
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2));
                            }
                            if(type === 'NON-VAT'){
                               // parseinput();
                                $('#total').val(data.total)
                            }else{
                               
                            }
                            console.log(data.total);
                        },
                        error:function(){

                        }
                    });
                }); */

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

    var count = $('#no').val();
    console.log(count);

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $('#show-hide').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollY:"300px",
                    scrollX:true,
                    ajax: '{{ url('getItems') }}',
                    columns: [
                        /* { "data": "quantity" },
                        { "data": "unit" },
                        { "data": "product_name" },
                        { "data": "amount" },
                        { "data": "total" },
                        { "data": "action",
                        "searchable": false,
                        "orderable": false
                                    } */
                                                
                        { "data": "product_name" },
                        { "data": "total" },
                        { "data": "action",
                        "searchable": false,
                        "orderable": false
                                    },
                    ] 
                });
                /* var table = $('#show-hide').DataTable();
                
                table.ajax.reload(); */


                //select product serverside
                $( "#productSelect" ).select2({
                    ajax: { 
                    url: 'selectgetproduct',
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
                
                $.ajax({
                    type:'get',
                    url:'{{ url('storefindProductList') }}',
                    data:{'id':prod_id},
                    dataType:'json',//return data will be json
                    success:function(data){
                        /* $('#unit').val(data.unit) */
                        $('#showproduct').val(data.productname);
                        /* $('#sellingprice').val(data.selling_price) */
                        $('#label_unit').text(data.unit);
                        $('#label_srp').text(data.selling_price);
                        var productselectvalue = $('#productSelect').val();
                        console.log(productselectvalue+'tutuytu');
                            document.getElementById("div_unit").style.display = "block";
                            document.getElementById("div_srp").style.display = "block";
                            if(productselectvalue === null){
                            document.getElementById("div_unit").style.display = "none";
                            document.getElementById("div_srp").style.display = "none";
                        }
                        /* if(productselectvalue === ''){
                            document.getElementById("div_unit").style.display = "none";
                            document.getElementById("div_srp").style.display = "none";
                        }if(productselectvalue != ''){
                            document.getElementById("div_unit").style.display = "block";
                            document.getElementById("div_srp").style.display = "block";
                        } */
                            

                    },
                    error:function(){

                    }
                });
            });


    });
    $(document).on('click','#first_to_second',function () { /* zzz */
       
               /*  var valueproduct = $("#showproduct").val();
                var valueqty = $("#qty").val();
                var valueunit = $("#unit").val();
                var valueprice = $("#sellingprice").val();

        if (valueproduct && valueqty && valueprice && valueunit != "" ) {
            

            }else{

                toastr.error('Please complete all information!','Information');  
            
            } */
            document.getElementById("div_senior_and_pwd").style.display = "none";
            document.getElementById("div_main").style.display = "none";
            document.getElementById("div_second").style.display = "block";

    });
    $(document).on('click','#back_second_to_first',function () { /* zzz */
        
        document.getElementById("div_senior_and_pwd").style.display = "none";
        document.getElementById("div_main").style.display = "block";
        document.getElementById("div_second").style.display = "none";

    });
    $(document).on('click','#next_second_to_third',function () { /* zzz */
        
        document.getElementById("div_senior_and_pwd").style.display = "none";
        document.getElementById("div_main").style.display = "none";
        document.getElementById("div_second").style.display = "none";
        document.getElementById("div_third").style.display = "block";
    });
    $(document).on('click','#back_third_to_second',function () { /* zzz */
        
        document.getElementById("div_main").style.display = "none";
        document.getElementById("div_second").style.display = "block";
        document.getElementById("div_third").style.display = "none";
    });
/* ---------------------------------------------------------add item STARTTTTTT---------------------------------------------------------- */
$(document).on('click','.add_item',function () {
        var formData = new FormData();
        var token= $('#_token').val();
        formData.append("productSelect", $("#showproduct").val());
        formData.append("qty", $("#qty").val());
        formData.append("unit", $("#label_unit").text());
        formData.append("price", $("#sellingprice").val());
        formData.append('_token', token);

                var valueproduct = $("#showproduct").val();
                var valueqty = $("#qty").val();
                var valueunit = $("#unit").val();
                var valueprice = $("#sellingprice").val();

        if (valueproduct && valueqty && valueprice && valueunit != "" ) {
            $.ajax({
                
                url: 'store-save-items',
                type: 'POST',
                data: formData,
                processing: true,
                serverSide: true,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('.send-loading').show();
                    $(".add_item").prop('disabled', true);
                },
                success: function (response) {

                    /* console.log(response); */
                    if(response!="err"){
                        
                            //toastr.success(response.message, response.title);
                            toastr.success('Item Saved','Congratulations!');
                                set_number ();
                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();
                                var countlog = $('#no').val();
                                console.log(countlog);
                                $(".add_item").prop('disabled', false);

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

    $(document).on('click', '#delete', function(){
        var id = $(this).data("id");
        console.log(id);

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
                var token= $('#_token').val();
          
            $.ajax({
                url: 'posremovedata',
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

                        var table = $('#show-hide').DataTable();
                        table.ajax.reload();
                        delete_set_number();
                        toastr.warning('Item was successfully deleted','Information');
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
    
    var set_number = function(){
                var num1 = $('#no').val();
                num1++;
                $('#no').val(num1);
    }
    var delete_set_number = function(){
                var num1 = $('#no').val();
                num1--;
                $('#no').val(num1);
    }
    var first_be_null = function(){
        $('#input_invoice').val('');
        $('#input_transaction_date').val('<?php echo date('Y-m-d'); ?>');
        $('#input_accountname').val('');
        $('#input_address').val('CABANATUAN CITY, NUEVA ECIJA');
        $('#input_senior').val('');

        //KULANG PA NG 2nd to 3rd method to follow
    }

    var refresh_select_2 = function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $( "#productSelect" ).select2({
                    ajax: { 
                    url: 'selectgetproduct',
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
        /* ---------------------------------------------------------add item ENDDDDD---------------------------------------------------------- */


    /* ---------------------------------------------------------submit order STARTTTTTT---------------------------------------------------------- */
$(document).on('click','.add_order',function () {
        var formData = new FormData();
        var token= $('#_token').val();
        formData.append("invoice_no", $("#invoice").val());
        formData.append("created_at", $("#invoiceDate").val());
        formData.append("customer_name", $("#accountName").val());
        formData.append("customer_address", $("#address").val());

        formData.append("transaction_type", $("#labeltranstype").text());
        formData.append("bir", $("#labelvatornonvat").text());
        formData.append("payment", $("#labelpayment").text());
        formData.append("payment_status", $("#labelstatus").text());

        formData.append("check_no", $("#checkNumber").val());
        formData.append("check_date", $("#checkDate").val());
        formData.append("id_no", $("#idNumber").val());
        formData.append("bank_name", $("#bank").val());
        formData.append("ewt", $("#ewt").text());
        formData.append("vat_exempt", $("#vatexempt").text());
        formData.append("net_of_vat", $("#netofvat").text());
        formData.append("vat", $("#vat").text());
        formData.append("discount", $("#discount").text());
        formData.append("total", $("#total").text());
        formData.append("final_total", $("#finaltotal").text());
        formData.append('_token', token);
   
        $.ajax({
        
                    url: 'store-save-orders',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#submitorder").prop('disabled', true);
                    },
                    success: function (response) {
                           /*  alert('ok'); */
                        /* console.log(response); */
                        
                        if(response!="err"){

                                    //toastr.success(response.message, response.title);
                                    toastr.success('Transaction Complete.','Congratulations!');

                                    setTimeout(function(){// wait for 5 secs(2)
                                        location.reload(); // then reload the page.(3)
                                    }, 1500);
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
        /* ---------------------------------------------------------Submit Order ENDDDDD---------------------------------------------------------- */

</script>



<!-- Placed js at the end of the page so the pages load faster -->
<script src="public/css2/vendor/jquery/jquery.min.js"></script>
<script src="public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="public/css2/vendor/popper.min.js"></script>
<script src="public/css2/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
<script src="public/css2/vendor/lobicard/js/lobicard.js"></script>
<script class="include" type="text/javascript" src="public/css2/vendor/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/css2/vendor/jquery.scrollTo.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<!--datatables-->
<script src="public/css2/vendor/data-tables/jquery.dataTables.min.js"></script>
<script src="public/css2/vendor/data-tables/dataTables.bootstrap4.min.js"></script>

<!--form basic wizard init-->
    <script src="public/css2/vendor/form-wizard-init.js"></script>

{{-- <script src="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> --}}


<!--init scripts-->
<script src="public/css2/js/scripts.js"></script>

<!--toaster-->
<script src="public/css2/vendor/toastr-master/toastr.js"></script>
<script src="public/css2/vendor/toastr-master/toastr-init.js"></script>

<!--select2-->
<script src="public/css2/vendor/select2/js/select2.min.js"></script>
<script src="public/css2/vendor/select2-init.js"></script>
{{-- data picker --}}
<script src="public/css2/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
<script src="public/css2/vendor/date-picker-init.js"></script>

</html>
