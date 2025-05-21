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
                
                    @if(Auth::user()->is_admin== 2 || 1)

                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class=" fa fa-medkit"></i>
                                    <span>Store</span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="pos">POS</a></li>
                                    <li><a  href="item-lists">Product Lists</a></li>
                                    {{-- not sure if admin or superadmin --}}
                                    <li><a  href="add-store-product">Stock In</a></li>
                                    
                                    <li><a  href="reports">Generate Report</a></li>
                                    <li><a  href="transaction-history">Transaction Lists Lists</a>
                                    <li><a  href="purchase-order">Make P.O</a></li>
                                    <li><a  href="purchase-order-list">P.O Lists</a>
                                    <li><a  href="void-request">Void Request</a>
                                    <li><a  href="back-entry">Back Entry</a>
                                    <li><a  href="ar">A.R</a>
                                        
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
                                            {{-- <li><a href="orders">Manage P.O.</a></li>
                                            <li><a href="add-product">Add Product</a></li>
                                            <li><a href="add-client">Add Client</a></li> --}}
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
                                                
                                                

                                                <input type="text" id="input_transaction" class="text-uppercase form-control" {{-- hidden --}} readonly>
                                                <input type="text" id="input_transaction_type" class="text-uppercase form-control" {{-- hidden --}} readonly>
                                                <input type="text" id="no" class="text-uppercase form-control" value="{{ $count }}" {{-- hidden --}} readonly>

                                                    <div class="col-md-6 mb-3">
                                                        <strong><label>Transaction Type:</label></strong>
                                                            <select style="border-color: rgb(0, 0, 0);" {{-- onchange="yesnoCheck(this);" --}} id="transaction_type" class="form-control" >
                                                                <option value=''>SELECT TRANSACTION TYPE</option>
                                                                <option value='si_regular'>SALES INVOICE -> REGULAR</option>
                                                                <option value='si_senior'>SALES INVOICE -> SENIOR</option>
                                                                <option value='si_pwd'>SALES INVOICE -> PWD</option>
                                                                <option value='si_private'>SALES INVOICE -> PRIVATE</option>
                                                                <option value='si_government'>SALES INVOICE -> GOVERNMENT</option>
                                                                <option value='dr_'>DELIVERY RECIEPT</option>
                                                                <option value='of_'>ORDER FORM</option>
                                                            </select>
                                                    </div>
                                            </div>
                                        <div id="div_transaction_information_content" style="display: none;">
                                            <div class="row" >
                                                <div id="div_terms" style="display: none;" class="col-md-3 mb-3">
                                                    <strong><label>Terms:</label></strong>
                                                    <select style="border-color: rgb(0, 0, 0);" {{-- onchange="yesnoCheck(this);" --}} id="input_terms" class="form-control" >
                                                        <option value=''>Select Days</option>
                                                        <option value='15'>15 Days</option>
                                                        <option value='30'>30 Days</option>
                                                    </select>
                                                    {{-- <input type="text" id="input_terms" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control"> --}}
                                                </div>
                                            </div>
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
                                                    <button id="first_to_second" type="button" style="width:100%" class="btn btn-sm btn-info"><strong>PLACE ORDER &nbsp;</strong><i class=" ti-arrow-right pr-1"></i></button>
                                                </div>
                                            </div>
                                        </div>                                           
                                        </div>
                                    </div>

                                    <div id="div_second" class=" col-md-6 mt-1" style="display: none"> {{-- start --}}
                                        
                                        <div class="card-body">
                                                <h2 id="label_title" class="text-center form-title mt-1 mb-1">Sales Order</h2>
            <div id="div_hide_second">
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
                                                    <input type="number" id="sellingprice" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control" readonly>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-5">
                                                    {{-- <input type="button" value="ADD ITEM" style="width:100%" class="btn btn-outline-success add_item"> --}}
                                                    <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-success add_item"><i class="fa fa-cart-plus pr-1"></i><strong> Add Item</strong></button>
                                                    {{-- <a class="btn btn-success add_item" >Add Item</a> --}}
                                                </div>
                                                <div class="col-md-6 mb-5">
                                                    <button id="back_second_to_first" type="button" style="width:100%" class="btn btn-sm btn-info"><i class=" ti-arrow-left pr-1"></i><strong> BACK</strong></button>
                                                </div>
                                                <div id="div_next_second_to_third" class="col-md-6 mb-5" style="display: none;">
                                                    <button id="next_second_to_third" type="button" style="width:100%" class="btn btn-sm btn-info"><strong>PROCEED PAYMENT &nbsp;</strong><i class=" ti-arrow-right pr-1"></i></button>
                                                </div>
                                                <div id="div_submit" class="col-md-6 mb-3" style="display: none;">
                                                    <button id="Submit" type="button" style="width:100%" class="btn btn-sm btn-primary add_order"><i class=" icon-cursor pr-1"></i><strong>Sumbit &nbsp;</strong></button>
                                                </div>
                                            </div>
            </div>
                                    <div id="div_third" style="display: none;">

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <strong><label>Payment Type:</label></strong>
                                                    <input type="text" id="input_payment_method" class="text-uppercase form-control" hidden readonly>
                                                    <input type="text" id="input_payment_status" class="text-uppercase form-control" hidden readonly>
                                                    

                                                        <select style="border-color: rgb(0, 0, 0);" {{-- onchange="yesnoCheck(this);" --}} id="payment_type" class="form-control" >
                                                            <option value=''>SELECT TRANSACTION TYPE</option>
                                                            <option value='value_cash'>CASH</option>
                                                            <option value='value_check'>CHECK</option>
                                                            <option value='value_debit'>CARD -> DEBIT</option>
                                                            <option value='value_credit'>CARD -> CREDIT</option>
                                                            <option value='value_gcash'>ONLINE PAYMENT -> GCASH</option>
                                                            <option value='value_paymaya'>ONLINE PAYMENT -> PAYMAYA</option>
                                                            <option value='value_deposit'>ONLINE PAYMENT -> DEPOSIT</option>
                                                            <option value='value_online_transfer'>ONLINE PAYMENT -> ONLINE BANK TRANSFER</option>
                                                        </select>
                                                </div>
                                            </div>

                                            <div id="div_payment_type" style="display: none;">
                                                <div class="row" >
                                                    <div id="div_check_number" style="display: block;" class="col-md-4 mb-3">
                                                        <Strong><label>Check Number *:</label></Strong>
                                                        <input type="text" id="input_check_number" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" >                       {{-- xxx --}}
                                                    </div>
                                                    <div id="div_bank" style="display: block;" class="col-md-4 mb-3">
                                                        <strong><label>Bank *:</label></strong>
                                                        <input type="text" id="input_bank"  style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" >
                                                    </div>
                                                    <div id="div_check_date" style="display: block;" class="col-md-4 mb-3">
                                                        <strong><label>Check Date *:</label></strong>
                                                        <input id="input_check_date" type="date" style="border-color: rgb(0, 0, 0);" class="form-control" placeholder="MM/DD/YYYY">
                                                    </div>
                                                    {{-- <div id="div_card_number" style="display: block;" class="col-md-4 mb-3">
                                                        <strong><label>Card Number *:</label></strong>
                                                        <input id="input_card_number" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                    </div> --}}
                                                    <div id="div_reference_number" style="display: block;" class="col-md-4 mb-3">
                                                        <strong><label>Reference Number *:</label></strong>
                                                        <input id="input_ref" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                    </div>
                                                    <div id="div_account_name" style="display: block;" class="col-md-4 mb-3">
                                                        <strong><label>Account Name *:</label></strong>
                                                        <input id="input_account_name" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                    </div>
                                                    {{-- <div id="show_idNumber"  class="col-md-4 mb-1">
                                                        <label>ID Number:</label>
                                                        <input type="text" id="idNumber"  class="text-uppercase form-control" placeholder="ID Number *">
                                                    </div> --}}
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="col-md-6 mb-3">
                                                    <button id="back_third_to_second" type="button" style="width:100%" class="btn btn-sm btn-info"><i class=" ti-arrow-left pr-1"></i><strong> BACK</strong></button>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <button id="Submit" type="button" style="width:100%" class="btn btn-sm btn-primary add_order"><i class=" icon-cursor pr-1"></i><strong>Sumbit &nbsp;</strong></button>
                                                </div>
                                                
                                            </div>

                                    </div>

                                            <div class="row">
                                                
                                                <div id="div_total" class="{{-- card-body --}} col-md-4 mb-3" style="display: block">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">TOTAL :</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4  class="alert-heading" id="h4_total">{{-- &#8369; --}}{{ $format = number_format($sell) }}</h4>
                                                    </div>
                                                </div>
                                                <div id="div_vat" class="{{-- card-body --}} col-md-4 {{-- mb-3 --}}" style="display: none">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">VAT :</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="h4_vat" class="alert-heading"></h4>
                                                    </div>
                                                </div>
                                                <div id="div_net_of_vat" class="{{-- card-body --}} col-md-4 {{-- mb-3 --}}" style="display: none">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">NET OF VAT :</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="h4_net_of_vat" class="alert-heading"></h4>
                                                    </div>
                                                </div>
                                                <div id="div_vat_exempt_sales" class="{{-- card-body --}} col-md-4 {{-- mb-3 --}}" style="display: none">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">VAT EXEMPT SALES:</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="h4_vat_exempt_sales" class="alert-heading"></h4>
                                                    </div>
                                                </div>
                                                <div id="div_discount" class="{{-- card-body --}} col-md-4 {{-- mb-3 --}}" style="display: none">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">DISCOUNT:</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="h4_discount" class="alert-heading"></h4>
                                                    </div>
                                                </div>
                                                <div id="div_ewt" id="" class="{{-- card-body --}} col-md-4 {{-- mb-3 --}}" style="display: none">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">EWT :</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="ewt" class="alert-heading"></h4>
                                                    </div>
                                                </div>
                                                
                                                <div class="{{-- card-body --}} col-md-12 {{-- mb-3 --}}">
                                                    <div class="alert alert-success" role="alert">
                                                        <p class="mb-1">TOTAL AMOUNT DUE :</p>
                                                        {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                        <hr>
                                                        <h4 id="h4_final_total" class="alert-heading"></h4>
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
                                                    <th scope="col">ITEM STATUS</th>
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
                    var transactionselect = '#transaction_type';
                    $(document).on('change',transactionselect,function () {
                    
                    var type=$(this).val();
                    console.log(type + 'type is');
                    //emptyinput();
                    //emptylabel();
                    $.ajax({
                        type:'get',
                        url:'{{ url('storefindTotalPrice') }}',
                        data:{'type':type},
                        dataType:'json',//return data will be json
                        success:function(data){
                            if(type === ''){
                                
                                null_all();
                                hide_all();

                                document.getElementById("div_transaction_information_content").style.display = "none";
                                document.getElementById("div_senior_and_pwd").style.display = "none";

                            }
                             if(type === 'si_regular'){

                               null_all();
                               $('#input_transaction').val('SALES INVOICE');
                               $('#input_transaction_type').val('REGULAR');
                               
                               $('#label_transaction_number').text('Sales Invoice # *:');
                               
                               hide_all();
                               document.getElementById("div_total").style.display = "block";
                               document.getElementById("div_vat").style.display = "block";
                               document.getElementById("div_net_of_vat").style.display = "block";
                               document.getElementById("div_terms").style.display = "none";

                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "none";

                               document.getElementById("div_next_second_to_third").style.display = "block";

                                $('#h4_total').val(data.original_total);
                                
                                var total = parseFloat($("#h4_total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;
                                
                                var netofvat = total / formula;
                                var vat = netofvat * vatformula;
                                
                                console.log(netofvat);
                                console.log(vat);
                                console.log(total);

                                $('#h4_vat').text(parseFloat(vat).toFixed(2));
                                $('#h4_net_of_vat').text(parseFloat(netofvat).toFixed(2));
                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(total).toFixed(2));
                                
                                


                           }
                            if(type === 'si_senior'){
                                null_all();
                               $('#input_transaction').val('SALES INVOICE');
                               $('#input_transaction_type').val('SENIOR');
                               $('#label_id_number').text('Senior ID # *:');
                               $('#label_transaction_number').text('Sales Invoice # *:');
                               hide_all();
                               document.getElementById("div_vat_exempt_sales").style.display = "block";
                               document.getElementById("div_discount").style.display = "block";
                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "block";
                               document.getElementById("div_next_second_to_third").style.display = "block";
                               document.getElementById("div_terms").style.display = "none";
                               $('#h4_total').val(data.original_total); //to be replaced

                                var total = parseFloat($("#h4_total").val());
                                console.log(total);

                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                console.log(formula);
                                console.log(vatformula);
                                console.log(discountformula);
                                console.log(total);

                                $('#h4_vat_exempt_sales').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#h4_discount').text(parseFloat(discount).toFixed(2));
                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'si_pwd'){
                                null_all();
                               $('#input_transaction').val('SALES INVOICE');
                               $('#input_transaction_type').val('PWD');
                               $('#label_id_number').text('PWD ID # *:');
                               $('#label_transaction_number').text('Sales Invoice # *:');
                               hide_all();
                               document.getElementById("div_vat_exempt_sales").style.display = "block";
                               document.getElementById("div_discount").style.display = "block";
                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "block";
                               document.getElementById("div_next_second_to_third").style.display = "block";
                               document.getElementById("div_terms").style.display = "none";

                               $('#h4_total').val(data.original_total); //to be replaced
                               
                                var total = parseFloat($("#h4_total").val());
                                console.log(total); //to be replaced


                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                console.log(formula);
                                console.log(vatformula);
                                console.log(discountformula);
                                console.log(total);

                                $('#h4_vat_exempt_sales').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#h4_discount').text(parseFloat(discount).toFixed(2));
                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'si_private'){
                                null_all();
                                hide_all();
                                $('#input_transaction').val('SALES INVOICE');
                                $('#input_transaction_type').val('PRIVATE');
                                document.getElementById("div_ewt").style.display = "block";
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                document.getElementById("div_terms").style.display = "none";

                                $('#h4_total').val(data.original_total)//to be replaced
                                var total = parseInt($("#h4_total").val());
                                var ewtformula = 0.01;

                                var ewt = total * ewtformula / 1.12;
                                var finaltotal = total - ewt;

                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'si_government'){
                                null_all();
                                hide_all();
                                $('#input_transaction').val('SALES INVOICE');
                                $('#input_transaction_type').val('GOVERNMENT');
                                document.getElementById("div_vat").style.display = "block";
                                document.getElementById("div_ewt").style.display = "block";
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                document.getElementById("div_terms").style.display = "none";

                                $('#h4_total').val(data.original_total)//to be replaced
                                var total = parseInt($("#h4_total").val());
                                var ewtformula = 0.01;
                                var vatformula = 0.05;

                                var ewt = total * ewtformula / 1.12;
                                var vat = total * vatformula / 1.12;
                                var finaltotal = total - ewt - vat;

                                $('#h4_vat').text(parseFloat(vat).toFixed(2));
                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                
                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'dr_'){
                                null_all();
                                hide_all();
                                $('#input_transaction').val('DELIVERY RECIEPT');
                                $('#label_transaction_number').text('Delivery Reciept # *:');
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "none";
                                document.getElementById("div_submit").style.display = "block";
                                document.getElementById("div_terms").style.display = "block";

                                $('#h4_final_total').val(data.original_total);//to be replaced
                                var finaltotal = parseInt($("#h4_final_total").val());
                                $('#h4_final_total').text(parseFloat(data.original_total).toFixed(2));
                                
                            }if(type === 'of_'){
                                null_all();
                                hide_all();
                                $('#input_transaction').val('ORDER FORM');
                                $('#label_transaction_number').text('Order Form # *:');
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                document.getElementById("div_terms").style.display = "none";

                                $('#h4_final_total').val(data.original_total);//to be replaced
                                var finaltotal = parseInt($("#h4_final_total").val());
                                $('#h4_final_total').text(parseFloat(data.original_total).toFixed(2));

                            }
                            var table = $('#show-hide').DataTable();
                            table.ajax.reload();
                        },
                        error:function(){

                        }
                    });
                });

                var transactionselect = '#payment_type';
                    $(document).on('change',transactionselect,function () {
                    
                    var type=$(this).val();
                    console.log(type);
                    $('#input_payment_method').val('');
                    $('#input_payment_status').val('');
                    //emptyinput();
                    //emptylabel();
                    $.ajax({
                        type:'get',
                        url:'{{ url('storefindTotalPrice') }}',
                        data:{'type':type},
                        dataType:'json',//return data will be json
                        success:function(data){
                            if(type === ''){

                                document.getElementById("div_payment_type").style.display = "none";
                                //console.log(data.total);
                                //$('#total').val(data.total);
                                null_last_page ();
                                
                           }
                            if(type === 'value_cash'){

                               $('#input_payment_method').val('CASH');
                               $('#input_payment_status').val('');
                               document.getElementById("div_payment_type").style.display = "none";
                               document.getElementById("div_account_name").style.display = "none";
                               
                               null_last_page ();
                           }
                            if(type === 'value_check'){

                               $('#input_payment_method').val('CHECK');
                               $('#input_payment_status').val('');
                               document.getElementById("div_payment_type").style.display = "block";
                               document.getElementById("div_check_number").style.display = "block";
                               document.getElementById("div_bank").style.display = "block";
                               document.getElementById("div_check_date").style.display = "block";
                               document.getElementById("div_reference_number").style.display = "none";
                               
                               null_last_page ();

                            }if(type === 'value_debit'){

                                $('#input_payment_method').val('CARD');
                               $('#input_payment_status').val('DEBIT');
                               document.getElementById("div_payment_type").style.display = "block";
                               document.getElementById("div_check_number").style.display = "none";
                               document.getElementById("div_bank").style.display = "block";
                               document.getElementById("div_check_date").style.display = "none";
                               document.getElementById("div_reference_number").style.display = "block";
                               document.getElementById("div_account_name").style.display = "block";
                               null_last_page ();

                            }if(type === 'value_credit'){
                                
                                $('#input_payment_method').val('CARD');
                               $('#input_payment_status').val('CREDIT');
                               document.getElementById("div_payment_type").style.display = "block";
                               document.getElementById("div_check_number").style.display = "none";
                               document.getElementById("div_bank").style.display = "block";
                               document.getElementById("div_check_date").style.display = "none";
                               document.getElementById("div_reference_number").style.display = "block";
                               document.getElementById("div_account_name").style.display = "block";
                               null_last_page ();

                            }if(type === 'value_gcash'){

                                $('#input_payment_method').val('GCASH');
                               $('#input_payment_status').val('DEBIT');
                               document.getElementById("div_payment_type").style.display = "block";
                               document.getElementById("div_check_number").style.display = "none";
                               document.getElementById("div_bank").style.display = "none";
                               document.getElementById("div_check_date").style.display = "none";
                               document.getElementById("div_reference_number").style.display = "block";
                               document.getElementById("div_account_name").style.display = "block";
                               null_last_page ();

                            }if(type === 'value_paymaya'){

                                $('#input_payment_method').val('PAYMAYA');
                               $('#input_payment_status').val('DEBIT');
                               document.getElementById("div_account_name").style.display = "block";
                               document.getElementById("div_payment_type").style.display = "block";
                               document.getElementById("div_check_number").style.display = "none";
                               document.getElementById("div_bank").style.display = "none";
                               document.getElementById("div_check_date").style.display = "none";
                               document.getElementById("div_reference_number").style.display = "block";
                               
                               null_last_page ();

                            }if(type === 'value_deposit'){

                               $('#input_payment_method').val('DEPOSIT');
                               $('#input_payment_status').val('DEBIT');
                               document.getElementById("div_payment_type").style.display = "block";
                               document.getElementById("div_check_number").style.display = "none";
                               document.getElementById("div_bank").style.display = "block";
                               document.getElementById("div_check_date").style.display = "none";
                               document.getElementById("div_reference_number").style.display = "block";
                               document.getElementById("div_account_name").style.display = "block";
                               null_last_page ();

                            }if(type === 'value_online_transfer'){

                                $('#input_payment_method').val('ONLINE BANK TRANSFER');
                               $('#input_payment_status').val('DEBIT');
                               document.getElementById("div_payment_type").style.display = "block";
                               document.getElementById("div_check_number").style.display = "none";
                               document.getElementById("div_bank").style.display = "block";
                               document.getElementById("div_check_date").style.display = "none";
                               document.getElementById("div_reference_number").style.display = "block";
                               document.getElementById("div_account_name").style.display = "block";
                               null_last_page ();
                            }
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

    var count = $('#no').val();
    console.log(count);

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $('#show-hide').DataTable({
                    processing: true,
                    serverSide: true,
                    /* scrollY:"600px", */
                    scrollX:true,
                    ajax: '{{ url('getItems') }}',
                    columns: [   
                        { "data": "status" },
                        { "data": "product_name" },
                        { "data": "total" },
                        { "data": "action",
                        "searchable": false,
                        "orderable": false
                                    },
                    ] 
                });

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
                        /*$('#unit').val(data.unit)*/
                        $('#showproduct').val(data.productname);
                        /*$('#sellingprice').val(data.selling_price)*/
                        $('#label_unit').text(data.unit);
                        $('#qty').val(1);
                        //$('#label_srp').text(data.selling_price);
                        
                        var markup = data.markup / 100;
                        $('#label_srp').text(parseInt(data.capital) * markup + parseInt(data.capital));
                        
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

                            $('#sellingprice').val(finaltotal);

                        }else{
                                $('#sellingprice').val(parseInt(data.capital) * markup + parseInt(data.capital));
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
    $(document).on('click','#first_to_second',function () { /* zzz */
       
            var ifnull_transaction_type = $('#transaction_type').val();
            var a = $('#input_senior').val();
            var b = $('#input_invoice').val();
            var c = $('#input_accountname').val();
            var d = $('#input_transaction_date').val();
            var e = $('#input_address').val();

            if(ifnull_transaction_type === ''){
                        alert('di ka pwedeng tumuloy kulang pa info');
                }if(ifnull_transaction_type === 'si_regular'){

                        if(b && c && d && e != ''){

                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_main").style.display = "none";
                                document.getElementById("div_second").style.display = "block";

                        }else{

                            toastr.error('Please complete all information!','Information');

                        }
                    
                }if(ifnull_transaction_type === 'si_senior'){
                    
                        if(a && b && c && d && e != ''){

                            document.getElementById("div_senior_and_pwd").style.display = "none";
                            document.getElementById("div_main").style.display = "none";
                            document.getElementById("div_second").style.display = "block";

                        }else{

                            toastr.error('Please complete all information!','Information');

                        }

                }if(ifnull_transaction_type === 'si_pwd'){
                    
                        if(a && b && c && d && e != ''){

                            document.getElementById("div_senior_and_pwd").style.display = "none";
                            document.getElementById("div_main").style.display = "none";
                            document.getElementById("div_second").style.display = "block";

                        }else{

                            toastr.error('Please complete all information!','Information');

                        }

                }if(ifnull_transaction_type === 'si_private'){
                    
                        if(b && c && d && e != ''){

                            document.getElementById("div_senior_and_pwd").style.display = "none";
                            document.getElementById("div_main").style.display = "none";
                            document.getElementById("div_second").style.display = "block";

                        }else{

                            toastr.error('Please complete all information!','Information');

                        }

                }if(ifnull_transaction_type === 'si_government'){
                        if(b && c && d && e != ''){

                            document.getElementById("div_senior_and_pwd").style.display = "none";
                            document.getElementById("div_main").style.display = "none";
                            document.getElementById("div_second").style.display = "block";

                        }else{

                            toastr.error('Please complete all information!','Information');

                        }
                }if(ifnull_transaction_type === 'dr_'){
                        if(b && c && d && e != ''){

                            document.getElementById("div_senior_and_pwd").style.display = "none";
                            document.getElementById("div_main").style.display = "none";
                            document.getElementById("div_second").style.display = "block";

                        }else{

                            toastr.error('Please complete all information!','Information');

                        }
                }if(ifnull_transaction_type === 'of_'){
                        if(b && c && d && e != ''){

                            document.getElementById("div_senior_and_pwd").style.display = "none";
                            document.getElementById("div_main").style.display = "none";
                            document.getElementById("div_second").style.display = "block";

                        }else{

                            toastr.error('Please complete all information!','Information');

                        }
                }

    });
    $(document).on('click','#back_second_to_first',function () { /* zzz */
                
            document.getElementById("div_senior_and_pwd").style.display = "none";
            document.getElementById("div_main").style.display = "block";
            document.getElementById("div_second").style.display = "none";
    
    });
    $(document).on('click','#next_second_to_third',function () { /* zzz */
        
        var orderInput = $('#no').val();
        if (orderInput <= 0) {
                toastr.info('You don`t have order yet','Information');
                return false;
        } else {
        console.log("Yay, we're good to go!");
        document.getElementById("div_senior_and_pwd").style.display = "none";
        document.getElementById("div_main").style.display = "none";
        document.getElementById("div_hide_second").style.display = "none";
        /* document.getElementById("div_hide_second_buttons").style.display = "none"; */
        /* document.getElementById("div_second").style.display = "none"; */
        document.getElementById("div_third").style.display = "block";
        $('#label_title').text('Payment');
            }



        

    });
    $(document).on('click','#back_third_to_second',function () { /* zzz */
        $('#payment_type option:first').prop('selected',true).trigger( "change" ); //done
        $('#input_payment_method').val('');
        $('#input_payment_status').val('');
        document.getElementById("div_payment_type").style.display = "none";
        document.getElementById("div_main").style.display = "none";
        document.getElementById("div_second").style.display = "block";
        document.getElementById("div_third").style.display = "none";
        document.getElementById("div_hide_second").style.display = "block";
        document.getElementById("div_third").style.display = "none";
        $('#label_title').text('Sales Order');
        null_last_page();
    });
/* ---------------------------------------------------------add item STARTTTTTT---------------------------------------------------------- */
$(document).on('click','.add_item',function () {
        var formData = new FormData();
        var token= $('#_token').val();
        
        formData.append("status", $("#input_transaction_type").val());
        formData.append("productSelect", $("#showproduct").val());
        formData.append("qty", $("#qty").val());
        formData.append("unit", $("#label_unit").text());
        formData.append("srp", $("#label_srp").text());
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
                            toastr.success('','Successfully added.');
                                set_number ();
                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();
                                var countlog = $('#no').val();
                                console.log(countlog);
                                $(".add_item").prop('disabled', false);

                    }

                    var transactionselect = $("#transaction_type").val();
                    console.log(transactionselect);

                   if(transactionselect === 'si_regular'){

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

                    /* xxx */
                    
                    
                    

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

    $(document).on('click', '.delete', function(){
        var id = $(this).data("id");
        var value = $(this).data("value");
        /* console.log(id);
        console.log(value); */

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
                        
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        
                        var total = $("#h4_total").text();
                        var newtotal = total - value;
                        $('#h4_total').text(newtotal);


                        var transactionselect = $("#transaction_type").val();



                        if(transactionselect === 'si_regular'){

                        var total = $("#h4_total").text();
                        
                        var formula = 1.12;
                        var vatformula = 0.12;

                        var netofvat = total / formula;
                        var vat = netofvat * vatformula;
                        
                        $('#h4_vat').text(parseFloat(vat).toFixed(2));
                        $('#h4_net_of_vat').text(parseFloat(netofvat).toFixed(2));
                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(total).toFixed(2));

                        }if(transactionselect === 'si_senior'){

                        var total = $("#h4_total").text();

                        var formula = 1.12;
                        var vatformula = 0.12;
                        var discountformula = 0.20;

                        var vatexemptsales = total / formula;
                        var discount = vatexemptsales * discountformula;
                        var finaltotal = vatexemptsales - discount;

                        $('#h4_vat_exempt_sales').text(parseFloat(vatexemptsales).toFixed(2));
                        $('#h4_discount').text(parseFloat(discount).toFixed(2));
                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }if(transactionselect === 'si_pwd'){

                        var total = parseFloat($("#h4_total").text());

                        var formula = 1.12;
                        var vatformula = 0.12;
                        var discountformula = 0.20;

                        var vatexemptsales = total / formula;
                        var discount = vatexemptsales * discountformula;
                        var finaltotal = vatexemptsales - discount;

                        $('#h4_vat_exempt_sales').text(parseFloat(vatexemptsales).toFixed(2));
                        $('#h4_discount').text(parseFloat(discount).toFixed(2));
                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }if(transactionselect === 'si_private'){

                        var total = parseInt($("#h4_total").text());

                        var ewtformula = 0.01;

                        var ewt = total * ewtformula / 1.12;
                        var finaltotal = total - ewt;

                        $('#ewt').text(parseFloat(ewt).toFixed(2));
                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }if(transactionselect === 'si_government'){

                        var total = parseInt($("#h4_total").text());
                        

                        var ewtformula = 0.01;
                        var vatformula = 0.05;

                        var ewt = total * ewtformula / 1.12;
                        var vat = total * vatformula / 1.12;
                        var finaltotal = total - ewt - vat;


                        $('#h4_vat').text(parseFloat(vat).toFixed(2));

                        $('#ewt').text(parseFloat(ewt).toFixed(2));
                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }if(transactionselect === 'dr_'){
                        var total = parseFloat($("#h4_total").text());

                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(total).toFixed(2));

                        }if(transactionselect === 'of_'){

                        var total = parseFloat($("#h4_total").text());

                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(total).toFixed(2));

                        }

                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
    var null_all = function(){

        //null all except h4_total

        $('#input_invoice').val('');
        $('#input_transaction_date').val('<?php echo date('Y-m-d'); ?>');
        $('#input_accountname').val('');
        $('#input_address').val('CABANATUAN CITY, NUEVA ECIJA');

        $('#h4_vat').text('');
        $('#h4_net_of_vat').text('');
        $('#h4_vat_exempt_sales').text('');
        $('#h4_discount').text('');
        $('#ewt').text('');
        $('#h4_final_total').text('');
        $('#input_transaction').val('');
        $('#input_transaction_type').val('');
        $('#input_payment_status').val('');
        $('#input_senior').val('');
        $('#input_terms').val('');
        
    }
    var hide_all = function(){

        //hide all totals

        document.getElementById("div_vat").style.display = "none";
        document.getElementById("div_net_of_vat").style.display = "none";
        document.getElementById("div_vat_exempt_sales").style.display = "none";
        document.getElementById("div_discount").style.display = "none";
        document.getElementById("div_ewt").style.display = "none";
        document.getElementById("div_submit").style.display = "none";

    }
    var null_last_page = function(){

        //null last page

        $('#input_check_number').val('');
        $('#input_bank').val('');
        $('#input_check_date').val('');
        $('#input_ref').val('');
        $('#input_account_name').val('');
        
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
        formData.append("invoice_no", $("#input_invoice").val());
        formData.append("created_at", $("#input_transaction_date").val());
        formData.append("customer_name", $("#input_accountname").val());
        formData.append("customer_address", $("#input_address").val());

        formData.append("transaction_type", $("#input_transaction").val());
        //formData.append("bir", $("#labelvatornonvat").text());
        formData.append("payment", $("#input_payment_method").val());
        formData.append("payment_status", $("#input_payment_status").val());
        formData.append("reference_no", $("#input_ref").val());

        formData.append("check_no", $("#input_check_number").val());
        formData.append("check_date", $("#input_check_date").val());
        formData.append("id_no", $("#input_senior").val());
        formData.append("bank_name", $("#input_bank").val());
        formData.append("ewt", $("#ewt").text());
        formData.append("vat_exempt", $("#h4_vat_exempt_sales").text());
        formData.append("net_of_vat", $("#h4_net_of_vat").text());
        formData.append("vat", $("#h4_vat").text());
        formData.append("discount", $("#h4_discount").text());
        formData.append("total", $("#h4_total").text());
        formData.append("final_total", $("#h4_final_total").text());
        formData.append("terms", $("#input_terms").val());
        formData.append('_token', token);

        
        var when_submit_payment_type = $("#input_payment_method").val();
        var before_submit_check_number = $("#input_check_number").val();
        var before_submit_bank = $("#input_bank").val();
        var before_submit_check_date = $("#input_check_date").val();
        var before_submit_reference_no = $("#input_ref").val();
        var before_submit_payment_method = $('#input_payment_method').val();
        var before_submit_payment_status = $('#input_payment_status').val();
        var before_submit_input_transaction = $('#input_transaction').val();
        var noo = $('#no').val();

        console.log(noo);
        console.log(before_submit_input_transaction + 'elyen');
        console.log(when_submit_payment_type + 'qweqweqw');

        
        if(before_submit_payment_method === ''){

            if(before_submit_input_transaction === 'DELIVERY RECIEPT'){
            console.log('done')
            }else{

                toastr.info('please select payment method','Information');
                return;

            }

        }
        
        if(noo < 1){

            toastr.info('you don`t have order yet','Information');
            return;

        }if(when_submit_payment_type === 'SELECT TRANSACTION TYPE'){

            toastr.info('check no. is required','Information');
            return;

        }if(when_submit_payment_type === 'CHECK'){

            if(before_submit_check_number === ''){
                
                toastr.info('check no. is required','Information');
                return;

            }
            if(before_submit_bank === ''){

                toastr.info('bank is required','Information');
                return;

            }
            if(before_submit_check_date === ''){

                toastr.info('check date is required','Information');
                return;

            }
        
        }if(when_submit_payment_type === 'CARD'){

            if(before_submit_bank === ''){

                toastr.info('bank is required','Information');
                return;

            }
            if(before_submit_reference_no === ''){

                toastr.info('reference no. is required','Information');
                return;

            }
            
        }if(when_submit_payment_type === 'GCASH'){

            if(before_submit_reference_no === ''){

            toastr.info('reference no. is required','Information');
            return;

            }

        }if(when_submit_payment_type === 'PAYMAYA'){

            if(before_submit_reference_no === ''){

            toastr.info('reference no. is required','Information');
            return;

            }

        }if(when_submit_payment_type === 'DEPOSIT'){

            if(before_submit_bank === ''){

                toastr.info('bank is required','Information');
                return;

            }
            if(before_submit_reference_no === ''){

                toastr.info('reference no. is required','Information');
                return;

            }

        }if(when_submit_payment_type === 'ONLINE BANK TRANSFER'){

            if(before_submit_bank === ''){

            toastr.info('bank is required','Information');
            return;

            }
            if(before_submit_reference_no === ''){

            toastr.info('reference no. is required','Information');
            return;

            }

        }
        else{   console.log('im working')
                $.ajax({
                
                url: 'store-save-orders',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    //$("#submitorder").prop('disabled', true);
                    $(".add_order").prop('disabled', true);
                },
                success: function (response) {
                    /*  alert('ok'); */
                    /* console.log(response); */
                    
                    if(response!="err"){

                                //toastr.success(response.message, response.title);
                                toastr.success('Transaction Complete.','Congratulations!');

                                /* setTimeout(function(){// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1500); */
                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();
                                $(".add_order").prop('disabled', false);
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
                        $(".add_order").prop('disabled', false);
                                }, 1500);
                    
                },
            
        });
        }
        
    });
        /* ---------------------------------------------------------Submit Order ENDDDDD---------------------------------------------------------- */

                
                var onchangeQty = '#qty';
                $(document).on('input',onchangeQty,function () {
                    
                    var q = $("#input_transaction_type").val();
                        console.log(q);
                    if (q === 'SENIOR' || q === 'PWD'){

                        var label_srp = $('#label_srp').text();
                        var qty = $('#qty').val();
                        var sum = label_srp * qty;
                        var formula = 1.12;
                        var discountformula = 0.20;

                        var vatexemptsales = sum / formula;
                        var discount = vatexemptsales * discountformula;
                        var finaltotal = vatexemptsales - discount;

                        $('#sellingprice').val(finaltotal);

                    }else{
                        /* $('#sellingprice').val(parseInt(data.capital) * markup + parseInt(data.capital)); */
                        var qty = $('#qty').val();
                        var label_srp = $('#label_srp').text();
                        
                        var sum = label_srp * qty;
                        $('#sellingprice').val(sum);
                    }

                });

                $(document).on('click', '.discount', function(){
                var id = $(this).data("id");
                console.log(id);
                var transaction_type = $("#input_transaction_type").val();

                if(transaction_type != "SENIOR" && transaction_type != "PWD"){
                    toastr.warning('Discount cannot be applied.','Warning!');
                    return;
                }
                            $.ajax({
                            url: 'updateDiscount',
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id':id
                                
                            },
                            beforeSend: function () {
                                $('.send-loading').show();
                            },
                            success: function (response) {
                            
                                var regular = parseFloat(response.data_regular);
                                var discounted = parseFloat(response.data_discounted);
                                var total_of_all = regular + discounted;

                                $('#h4_total').text(parseFloat(total_of_all));

                                //var total_of_all = parseFloat($("#h4_total").val());

                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                // for discounted computation
                                var vatexemptsales_of_discounted_items = discounted / formula;
                                var discount_of_discounted_items = vatexemptsales_of_discounted_items * discountformula;
                                var finaltotal_of_discounted_items = vatexemptsales_of_discounted_items - discount_of_discounted_items;


                                // for regular computation
                                var vatexemptsales_regular_items = regular / formula;
                                var finaltotal_of_regular_items = regular ;

                                var final_vatexemptsales = vatexemptsales_of_discounted_items + vatexemptsales_regular_items;
                                var final_discount = discount_of_discounted_items;
                                var final_total_of_all_items = finaltotal_of_regular_items + finaltotal_of_discounted_items;

                                /* console.log(final_vatexemptsales + 'vat exemp sale');
                                console.log(final_vatexemptsales + 'vat exemp sale');
                                console.log(final_discount + 'discount');
                                console.log(final_total_of_all_items + 'total');

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount; */

                                $('#h4_vat_exempt_sales').text(parseFloat(final_vatexemptsales).toFixed(2));
                                $('#h4_discount').text(parseFloat(final_discount).toFixed(2));
                                $('#h4_total').text(parseFloat(total_of_all).toFixed(2));
                                $('#h4_final_total').text(parseFloat(final_total_of_all_items).toFixed(2));
                                console.log('regular value is '+regular);
                                console.log('discounted value is'+discounted);
                                console.log('total value is '+total_of_all);

                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();
                                toastr.success('Discount Successfuly Applied','Congratulations!');

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






