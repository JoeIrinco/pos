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
                {{-- <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h4 class="mb-0"> Point Of Sale
                                <small>{{ Auth::user()->name ?? '' }}</small> 
                            </h4>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <div class="{{-- form-wizard --}}">
                            <div class="myContainer">
                                <div class="form-container animated">
                                    <h2 class="text-center form-title mt-1 mb-1">Transaction Information</h2>
                                    <form>
                                        
                                            <div class="mb-4">
                                               {{--  <div class="col-md-4 mb-1">
                                                    <label>Transaction Type:</label>
                                                        <select onchange="yesnoCheck(this);" id="transactionType" class="form-control" >
                                                            <option value=''>SELECT TRANSACTION TYPE</option>
                                                            <option value='NON-VAT'>Sales Invoice -> Regular</option>
                                                            <option value='NON-VAT'>Sales Invoice -> Senior</option>
                                                            <option value='NON-VAT'>Sales Invoice -> Pwd</option>
                                                            <option value='NON-VAT'>Sales Invoice -> Private</option>
                                                            <option value='NON-VAT'>Sales Invoice -> Government</option>
                                                            <option value='NON-VAT'>Delivery Reciept</option>
                                                            <option value='NON-VAT'>Order Form</option>
                                                        </select>
                                                </div> --}}
                                                {{-- <div class="card-body"> --}}
                                                        {{ csrf_field() }}
                                                    <div class="row">
                                                        <input class="input" hidden id="processclick" readonly>
                                                        <input class="input" hidden id="processclick2" readonly>
                                                        <div id="si" class="col-md-2 mb-3">
                                                        <input type="button" onclick="ifClickSi(this);" id="S.I" value="Sales Invoice" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="dr" class="col-md-2 mb-3">
                                                            <input type="button" onclick="ifClickDr(this);" id="D.R" value="Delivery Receipt" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="of" class="col-md-2 mb-3">
                                                            <input type="button" onclick="ifClickOf(this);" id="O.F" value="Order Form" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_regular" class="col-md-1 mb-1" style="display: none;">
                                                            <input type="button" onclick="ifClickRegular(this);"  id="btn_regular" value="Regular" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_senior" class="col-md-1 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickSenior(this);" id="btn_senior" value="Senior" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_pwd"  class="col-md-1 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickPwd(this);" id="btn_pwd" value="Pwd" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_private" class="col-md-1 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickPrivate(this);" id="btn_private" value="Private" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_government" class="col-md-1 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickGovernment(this);" id="btn_government" value="Government" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="alt1" class="col-md-1 mb-1" style="display: none;">
                                                            
                                                        </div>
                                                        <div id="alt2" class="col-md-2 mb-1" style="display: none;">
                                                            
                                                        </div>
                                                        <div id="alt3" class="col-md-3 mb-1" style="display: none;">
                                                            
                                                        </div>
                                                        <div id="alt4" class="col-md-4 mb-1" style="display: none;">
                                                            
                                                        </div>
                                                        <div id="alt5" class="col-md-5 mb-1">
                                                            
                                                        </div>
                                                        <div id="of"class="col-md-1 mb-1">
                                                            <button type="button" onclick="ifClickRefresh(this);" id="O.F" value="Refresh" class="btn btn-outline-success btn-sm"><i class="fa fa-refresh"></i></button>
                                                        </div>
                                                        
                                                        
                                                    </div>


                                                    <div class="row">
                                                        <div id="show_transaction_senior" style="display: none;" class="col-md-3 mb-3">
                                                            <strong><label id="label_senior"></label></strong>
                                                            <input type="text" id="input_senior" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" value="pang samantala 123">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div id="show_transaction_number" style="display: none;" class="col-md-6 mb-3">
                                                            <strong><label id="form_number"></label></strong>
                                                            <input type="text" id="input_invoice" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" {{-- value="pang samantala 123" --}}>
                                                        </div>
                                                        <div class="col-md-6 mb-3" id="show_transaction_date" style="display: none;">
                                                            <strong><label>Transaction Date:</label></strong>
                                                                <input id="input_transaction_date" type="date" style="border-color: rgb(0, 0, 0);" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                                                
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-1" id="show_transaction_name" style="display: none;" >
                                                            <strong><label>Account Name:</label></strong>
                                                            <input type="text" id="input_accountname" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" value="pang samantala 123">
                                                        </div>
                                                        <div class="col-md-6 mb-1" id="show_transaction_address" style="display: none;">
                                                            <strong><label>Address:</label></strong>
                                                            <input type="text" id="input_address" style="border-color: rgb(0, 0, 0);" value="CABANATUAN CITY, NUEVA ACIJA" class="text-uppercase form-control" placeholder="Address *">
                                                        </div>
                                                    </div>
                                                    
                                                {{-- </div> --}}
                                            </div>
                                        <div class="form-group  text-center ">
                                            <input id="btn_next1st" type="button"  value="NEXT" class="btn btn-primary next">
                                        </div>
                                    </form>
                                </div>



{{-- newwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww --}}

                                <div class="row">
                                    <div class=" col-md-6 mt-1"> {{-- start --}}
                                        <div class="card-body">
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
                                                    <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-success add_item"><i class="fa fa-cart-plus pr-1"></i>Add Item</button>
                                                    {{-- <a class="btn btn-success add_item" >Add Item</a> --}}
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
                                            
                                            <div class="form-group text-center ">
                                                <input type="button" value="BACK" class="btn btn-default back">
                                                <input id="btn_next2nd" type="button" value="NEXT" class="btn btn-primary next">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6 mt-1">
                                        <div class="card-body">
                                            <table id="show-hide" style="width:100%" class="display dt-init table table-bordered table-striped " cellspacing="0" {{-- id="data_table" class="table table-responsive" --}}>
                                                <thead>
                                                <tr>
                                                    {{-- <th scope="col">QTY</th>
                                                    <th scope="col">UNIT</th>
                                                    <th scope="col">PRODUCT DESCRIPTION</th>
                                                    <th scope="col">PRICE</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">Action</th> --}}
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


















                                <div class="form-container animated">
                                    {{-- <h2 class="text-center form-title mb-1">Place Order Here!</h2> --}}
                                    <form {{-- class="mt-1" --}}>

                                        <div class="row">
                                            <div class=" col-md-6 mt-1"> {{-- start --}}
                                                <div class="card-body">
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
                                                            <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-success add_item"><i class="fa fa-cart-plus pr-1"></i>Add Item</button>
                                                            {{-- <a class="btn btn-success add_item" >Add Item</a> --}}
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
                                                                <p class="mb-1">TOTAL AMOUNT DUE:</p>
                                                                {{-- <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p> --}}
                                                                <hr>
                                                                <h4 id="h4_vat_exempt" class="alert-heading">Well done!</h4>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group text-center ">
                                                        <input type="button" value="BACK" class="btn btn-default back">
                                                        <input id="btn_next2nd" type="button" value="NEXT" class="btn btn-primary next">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-6 mt-1">
                                                <div class="card-body">
                                                    <table id="show-hide" class="display dt-init table table-bordered table-striped " cellspacing="0" {{-- id="data_table" class="table table-responsive" --}}>
                                                        <thead>
                                                        <tr>
                                                            {{-- <th scope="col">QTY</th>
                                                            <th scope="col">UNIT</th>
                                                            <th scope="col">PRODUCT DESCRIPTION</th>
                                                            <th scope="col">PRICE</th>
                                                            <th scope="col">TOTAL</th>
                                                            <th scope="col">Action</th> --}}
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
                                        
                                    </form>
                                </div>
                                <div class="form-container animated">
                                                                                            <input type="text" id="input_cash" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_check" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_card" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_debit" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_credit" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_online_payment" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_gcash" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_paymaya" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_bank_transfer" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_deposit" class="text-uppercase form-control" hidden readonly>
                                                                                            <input type="text" id="input_online_transfer" class="text-uppercase form-control" hidden readonly>
                                    <h2 class="text-center form-title">Payment</h2>
                                    <form>
                                        {{-- <div class="form-group text-center "> --}}
                                            <div class="mb-3 row"> {{-- dating mb-4 --}}
                                                <div class="col-md-12">{{-- col-md-6 --}}

                                                    <div class="row">
                                                        <div id="of"class="col-md-2 mb-1">
                                                            <button type="button" onclick="ifClickRefresh2(this);" value="Refresh" class="btn btn-outline-danger btn-sm"><i class="fa fa-refresh"></i></button>
                                                        </div>
                                                        <div id="div_cash" class="col-md-2 mb-3">
                                                            <input type="button" onclick="ifClickCash(this);" id="btn_cash" value="CASH" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_check" class="col-md-2 mb-3">
                                                            <input type="button" onclick="ifClickCheck(this);" id="btn_check" value="CHECK" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_card" class="col-md-2 mb-3">
                                                            <input type="button" onclick="ifClickCard(this);" id="btn_card" value="CARD" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_debit" class="col-md-2 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickDebit(this);" id="btn_debit" value="DEBIT" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_credit" class="col-md-2 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickCredit(this);" id="btn_credit" value="CREDIT" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_online_payment" class="col-md-3 mb-3" >
                                                            <input type="button" onclick="ifClickOnlinePayment(this);" id="btn_online_payment" value="ONLINE PAYMENT" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_gcash" class="col-md-2 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickGcash(this);" id="btn_gcash" value="GCASH" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_paymaya" class="col-md-2 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickPaymaya(this);" id="btn_paymaya" value="PAYMAYA" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_bank_transfer" class="col-md-3 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickBankTransfer(this);" id="btn_bank_transfer" value="BANK TRANSFER" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_deposit" class="col-md-2 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickDeposit(this);" id="btn_deposit" value="DEPOSIT" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                        <div id="div_online_transfer" class="col-md-2 mb-3" style="display: none;">
                                                            <input type="button" onclick="ifClickOnlineTransfer(this);" id="btn_online_transfer" value="ONLINE TRANSFER" class="btn btn-outline-success btn-sm">
                                                        </div>
                                                    </div>

                                                    {{-- <div class="row mb-3">

                                                        <div id="show_checkNumber"  class="col-md-4 mb-1">
                                                            <label>Check Number:</label>
                                                            <input type="text" id="input_check_number" class="text-uppercase form-control" placeholder="Check Number *">                    
                                                        </div>
                                                        <div id="div_bank"  class="col-md-4 mb-1">
                                                            <label>Bank:</label>
                                                            <input type="text" id="bank"  class="text-uppercase form-control" placeholder="Bank *">
                                                        </div>
                                                        <div id="div_check_date"  class="col-md-4 mb-1">
                                                            <label>Check Date:</label>
                                                                <input id="input_check_date" type="date" class="form-control" placeholder="MM/DD/YYYY">
                                                        </div>
                                                        <div id="show_idNumber"  class="col-md-4 mb-1">
                                                            <label>ID Number:</label>
                                                            <input type="text" id="idNumber"  class="text-uppercase form-control" placeholder="ID Number *">
                                                        </div>
                                                        
                                                    </div> --}}

                                                    <div class="row">
                                                        <div class=" col-md-12 mt-1"> {{-- make it 6 if need 2 column --}}
                                                            <div > {{-- add this class if want to put design card --}} {{-- class="card card-shadow mb-4" --}}
                                                                <div > {{-- add this class if want to put design card --}} {{-- class="card-body" --}}
                                                                    
                                                                    <div class="row mb-3">

                                                                        <div id="div_check_number" style="display: none;" class="col-md-4 mb-1">
                                                                            <Strong><label>Check Number *:</label></Strong>
                                                                            <input type="text" id="input_check_number" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" >                       {{-- xxx --}}
                                                                        </div>
                                                                        <div id="div_bank" style="display: none;" class="col-md-4 mb-1">
                                                                            <strong><label>Bank *:</label></strong>
                                                                            <input type="text" id="input_bank"  style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" >
                                                                        </div>
                                                                        <div id="div_check_date" style="display: none;" class="col-md-4 mb-1">
                                                                            <strong><label>Check Date *:</label></strong>
                                                                            <input id="input_check_date" type="date" style="border-color: rgb(0, 0, 0);" class="form-control" placeholder="MM/DD/YYYY">
                                                                        </div>
                                                                        <div id="div_card_number" style="display: none;" class="col-md-4 mb-1">
                                                                            <strong><label>Card Number *:</label></strong>
                                                                            <input id="input_card_number" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                                        </div>
                                                                        <div id="div_ref" style="display: none;" class="col-md-4 mb-1">
                                                                            <strong><label>Reference Number *:</label></strong>
                                                                            <input id="input_ref" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                                        </div>
                                                                        {{-- <div id="show_idNumber"  class="col-md-4 mb-1">
                                                                            <label>ID Number:</label>
                                                                            <input type="text" id="idNumber"  class="text-uppercase form-control" placeholder="ID Number *">
                                                                        </div> --}}
                                                                        
                                                                    </div>
                                                                    
                                                                    {{-- <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Transaction:</b>
                                                                            <label id="label_vat_or_nonvat"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Invoice #:</b>
                                                                            <label id="labelinvoice"></label>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Date:</b>
                                                                            <label id="labeldate"></label>
                                                                        </div>
                                                                        
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Transaction Type:</b>
                                                                            <label id="label_transaction_type"></label>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Payment Method:</b>
                                                                            <label id="labelpayment"></label>
                                                                        </div>
                                                                        
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Status:</b>
                                                                            <label id="labelstatus"></label>
                                                                        </div>
                                                                        
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-1">
                                                                            <b>Account name:</b>
                                                                            <label id="labelname"></label>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-1">
                                                                            <b>Address:</b>
                                                                            <label id="labeladdress"></label>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
            
                                                                    <div class="row">
                                                                            <div class="col-md-6 mb-1">
                                                                                <b>ID Number:</b>
                                                                                <label id="labelidnumber"></label>
                                                                            </div>
                                                                            <div class="col-md-6 mb-1">
                                                                                <b>Check Date:</b>
                                                                                <label id="labelcheckdate"></label>
                                                                            </div>
                                                                            
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Bank:</b>
                                                                            <label id="labelbank"></label>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Check Number:</b>
                                                                            <label id="labelchecknumber"></label>
                                                                            </div>
                                                                    </div> --}}
            
                                                                </div>
                                                            </div>
                                                        </div>
            
            
                                                        {{-- <div class=" col-md-6 mt-1">
                                                            <div class="card card-shadow mb-4">
                                                                <div class="card-body">
                                                                    <input class="input" hidden id="no" value={{ $count }} required="" readonly>
                                                                    
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Total Sales (VAT Inclusive):</b>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <label id="total"></label>
                                                                        </div>
                                                                        
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>EWT:</b>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <label id="ewt"></label>
                                                                        </div>
                                                                        
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>NET of VAT:</b>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <label id="netofvat"></label>
                                                                        </div>
                                                                        
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>VAT:</b>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <label id="vat"></label>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
            
                                                                    <div class="row">
                                                                            <div class="col-md-6 mb-1">
                                                                                <b>VAT-Exempt Sales:</b>
                                                                            </div>
                                                                            <div class="col-md-6 mb-1">
                                                                                <label id="vatexempt"></label>
                                                                            </div>
                                                                            
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Discount:</b>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <label id="discount"></label>
                                                                            </div>
                                                                    </div>
            
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-1">
                                                                            <b>Total Amount Due:</b>
                                                                        </div>
                                                                        <div class="col-md-6 mb-1">
                                                                            <label id="finaltotal"></label>
                                                                        </div>
                                                                    </div>   
                                                                    <div class="form-group text-center mt-1">
                                                                        <input type="button" value="BACK" class="btn btn-default back">
                                                                        <button type="button" id="submitorder" class="btn btn-success add_order">SUBMIT</button>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="row">
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>

                                                    
                                            </div>
                                            <div class="form-group  text-center ">
                                                <input type="button" value="BACK" class="btn btn-default back">
                                                <input id="btn_next3rd" type="button"  value="NEXT" class="btn btn-primary next">
                                            </div>
                                            
                                            
                                        {{-- </div> --}}
                                    </form>
                                </div>
                                <div class="form-container animated">
                                    <h2 class="text-center form-title">Transaction Type</h2>
                                    <form>
                                        <div class="row mb-3">
                                            <div class="col-md-4 mb-1">
                                                <label>Transaction Type:</label>
                                                    <select onchange="yesnoCheck(this);" id="transactionType" class="form-control" >
                                                        <option value=''>SELECT TRANSACTION TYPE</option>
                                                        <option value='NON-VAT'>NON VAT (PAPER, CSI, O.F.)</option>
                                                        <option value='CASH'>CASH</option>
                                                        <option value='CHECK'>CHECK</option>
                                                        <option value='CARD'>CARD</option>
                                                        <option value='SENIOR-CASH'>SENIOR-CASH</option>
                                                        <option value='SENIOR-CHECK'>SENIOR-CHECK</option>
                                                        <option value='SENIOR-CARD'>SENIOR-CARD</option>
                                                        <option value='PWD-CASH'>PWD-CASH</option>
                                                        <option value='PWD-CHECK'>PWD-CHECK</option>
                                                        <option value='PWD-CARD'>PWD-CARD</option>
                                                        <option value='PRIVATE-CASH'>PRIVATE-CASH (2307)</option>
                                                        <option value='PRIVATE-CHECK'>PRIVATE-CHECK (2307)</option>
                                                        <option value='PRIVATE-CARD'>PRIVATE-CARD (2307)</option>
                                                        <option value='GOVERNMENT-CASH'>GOVERNMENT-CASH (2306)</option>
                                                        <option value='GOVERNMENT-CHECK'>GOVERNMENT-CHECK (2306)</option>
                                                        <option value='GOVERNMENT-CARD'>GOVERNMENT-CARD (2306)</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div id="show_cardType" style="display: none;" class="col-md-4 mb-1">
                                                <label>Card Type:</label>
                                                    <select id="cardType" class="form-control" >
                                                        <option value=''>SELECT CARD TYPE</option>
                                                        <option value='DEBIT'>DEBIT</option>
                                                        <option value='CREDIT'>CREDIT</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            
                                            <div id="show_checkNumber" style="display: none;" class="col-md-4 mb-1">
                                                <label>Check Number:</label>
                                                <input type="text" id="checkNumber" class="text-uppercase form-control" placeholder="Check Number *">                       {{-- xxx --}}
                                            </div>
                                            <div id="show_bank" style="display: none;" class="col-md-4 mb-1">
                                                <label>Bank:</label>
                                                <input type="text" id="bank"  class="text-uppercase form-control" placeholder="Bank *">
                                            </div>
                                            <div id="show_checkDate" style="display: none;" class="col-md-4 mb-1">
                                                <label>Check Date:</label>
                                                    <input id="checkDate" type="date" class="form-control" placeholder="MM/DD/YYYY">
                                            </div>
                                            <div id="show_idNumber" style="display: none;" class="col-md-4 mb-1">
                                                <label>ID Number:</label>
                                                <input type="text" id="idNumber"  class="text-uppercase form-control" placeholder="ID Number *">
                                            </div>
                                            
                                        </div>

                                        <div class="form-group text-center mt-5">
                                            <input type="button" value="BACK" class="btn btn-default back">
                                            <input id="btn_next4th" type="button" value="NEXT" class="btn btn-primary next">
                                        </div>
                                    </form>
                                </div>
                                <div class="form-container animated">
                                    <h2 class="text-center form-title">Transaction Details</h2>
                                    <form>
                                        <div class="row">
                                            <div class=" col-md-8 mt-1">
                                                <div class="card card-shadow mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>Transaction:</b>
                                                                <label id="label_vat_or_nonvat"></label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>Invoice #:</b>
                                                                <label id="labelinvoice"></label>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <b>Date:</b>
                                                                <label id="labeldate"></label>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>Transaction Type:</b>
                                                                <label id="label_transaction_type"></label>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <b>Payment Method:</b>
                                                                <label id="labelpayment"></label>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>Status:</b>
                                                                <label id="labelstatus"></label>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-1">
                                                                <b>Account name:</b>
                                                                <label id="labelname"></label>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-1">
                                                                <b>Address:</b>
                                                                <label id="labeladdress"></label>
                                                            </div>
                                                            
                                                        </div>
                                                        

                                                        <div class="row">
                                                                <div class="col-md-6 mb-1">
                                                                    <b>ID Number:</b>
                                                                    <label id="labelidnumber"></label>
                                                                </div>
                                                                <div class="col-md-6 mb-1">
                                                                    <b>Check Date:</b>
                                                                    <label id="labelcheckdate"></label>
                                                                </div>
                                                                
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>Bank:</b>
                                                                <label id="labelbank"></label>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <b>Check Number:</b>
                                                                <label id="labelchecknumber"></label>
                                                                </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class=" col-md-4 mt-1">
                                                <div class="card card-shadow mb-4">
                                                    <div class="card-body">
                                                        <input class="input" hidden id="no" value={{ $count }} required="" readonly>
                                                        {{-- <input class="input" hidden id="processclick" readonly>
                                                        <input class="input" hidden id="processclick2" readonly> --}}
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>Total Sales (VAT Inclusive):</b>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label id="total"></label>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>EWT:</b>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label id="ewt"></label>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>NET of VAT:</b>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label id="netofvat"></label>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>VAT:</b>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label id="vat"></label>
                                                            </div>
                                                            
                                                        </div>
                                                        

                                                        <div class="row">
                                                                <div class="col-md-6 mb-1">
                                                                    <b>VAT-Exempt Sales:</b>
                                                                </div>
                                                                <div class="col-md-6 mb-1">
                                                                    <label id="vatexempt"></label>
                                                                </div>
                                                                
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>Discount:</b>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label id="discount"></label>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <b>Total Amount Due:</b>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label id="finaltotal"></label>
                                                            </div>
                                                        </div>   
                                                        <div class="form-group text-center mt-1">
                                                            <input type="button" value="BACK" class="btn btn-default back">
                                                            <button type="button" id="submitorder" class="btn btn-success add_order">SUBMIT</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <form id="form" action="orders" method="POST">
            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
            <div class="container-fluid">
                <!-- state start-->
                

                <!-- state end-->
                

<!-- start table-->

{{-- <div class="card card-shadow mb-4">
    <div class="card-header">
        <div class="card-title">
            Item Lists
        </div>
    </div> --}}
    {{-- tabke body here --}}
{{-- </div> --}}

<!-- END table-->


            </div>
        
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

                                /* $('#vatexempt').text('');
                                $('#discount').text(''); */

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

                                /* $('#vatexempt').text('');
                                $('#discount').text(''); */

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

                                /* $('#vatexempt').text('');
                                $('#discount').text(''); */

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
                                $('#finaltotal').text(parseFloat(finaltotal).toFixed(2)); /* xxx */

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
                });
/*-----------------------------------------------------------------------------------Start 1st-----------------------------------------------------------------------------------------*/
        $('#btn_next1st').click(function (event) {

        var input_no_not_null = $.trim($('#input_invoice').val());
        var input_no_date_not_null = $.trim($('#input_transaction_date').val());
        var input_account_name_not_null = $.trim($('#input_accountname').val());
        var input_address_not_null = $.trim($('#input_address').val());
        var input_senior_not_null = $.trim($('#input_senior').val());


        var if_process_1st_selected = $.trim($('#processclick').val());
        var if_process_2st_selected = $.trim($('#processclick2').val());

        if (if_process_1st_selected === 'SALES INVOICE'){

            if(if_process_2st_selected ===''){

                    toastr.error('Select Transaction Type','Information');
                    return false;

                }
            if(if_process_2st_selected ==='REGULAR'){

                if (input_no_not_null === ''){
                    toastr.error('Invoice number is required.','Information');
                    return false;
                }
                if (input_no_date_not_null === ''){
                    toastr.error('Transaction date is required.','Information');
                    return false;
                }
                if (input_account_name_not_null === ''){
                    toastr.error('Account name is required.','Information');
                    return false;
                }
                if (input_address_not_null === ''){
                    toastr.error('Address is required.','Information');
                    return false;
                }

            }if(if_process_2st_selected ==='SENIOR'){
                
                if (input_senior_not_null === ''){
                    toastr.error('Senior ID # is required.','Information');
                    return false;
                }
                if (input_no_not_null === ''){
                    toastr.error('Invoice number is required.','Information');
                    return false;
                }
                if (input_no_date_not_null === ''){
                    toastr.error('Transaction date is required.','Information');
                    return false;
                }
                if (input_account_name_not_null === ''){
                    toastr.error('Account name is required.','Information');
                    return false;
                }
                if (input_address_not_null === ''){
                    toastr.error('Address is required.','Information');
                    return false;
                }

            }if(if_process_2st_selected ==='PWD'){

                if (input_senior_not_null === ''){
                    toastr.error('PWD ID # is required.','Information');
                    return false;
                }
                if (input_no_not_null === ''){
                    toastr.error('Invoice number is required.','Information');
                    return false;
                }
                if (input_no_date_not_null === ''){
                    toastr.error('Transaction date is required.','Information');
                    return false;
                }
                if (input_account_name_not_null === ''){
                    toastr.error('Account name is required.','Information');
                    return false;
                }
                if (input_address_not_null === ''){
                    toastr.error('Address is required.','Information');
                    return false;
                }

            }if(if_process_2st_selected ==='PRIVATE'){

                if (input_no_not_null === ''){
                    toastr.error('Invoice number is required.','Information');
                    return false;
                }
                if (input_no_date_not_null === ''){
                    toastr.error('Transaction date is required.','Information');
                    return false;
                }
                if (input_account_name_not_null === ''){
                    toastr.error('Account name is required.','Information');
                    return false;
                }
                if (input_address_not_null === ''){
                    toastr.error('Address is required.','Information');
                    return false;
                }

            }if(if_process_2st_selected ==='GOVERNMENT'){

                if (input_no_not_null === ''){
                    toastr.error('Invoice number is required.','Information');
                    return false;
                }
                if (input_no_date_not_null === ''){
                    toastr.error('Transaction date is required.','Information');
                    return false;
                }
                if (input_account_name_not_null === ''){
                    toastr.error('Account name is required.','Information');
                    return false;
                }
                if (input_address_not_null === ''){
                    toastr.error('Address is required.','Information');
                    return false;
                }
            }

        }if (if_process_1st_selected === 'DELIVERY RECEIPT'){

            if (input_no_not_null === ''){
                    toastr.error('D.R # is required.','Information');
                    return false;
                }
                if (input_no_date_not_null === ''){
                    toastr.error('Transaction date is required.','Information');
                    return false;
                }
                if (input_account_name_not_null === ''){
                    toastr.error('Account name is required.','Information');
                    return false;
                }
                if (input_address_not_null === ''){
                    toastr.error('Address is required.','Information');
                    return false;
                }

        }if (if_process_1st_selected === 'ORDER FORM'){

            if (input_no_not_null === ''){
                    toastr.error('O.F # is required.','Information');
                    return false;
                }
                if (input_no_date_not_null === ''){
                    toastr.error('Transaction date is required.','Information');
                    return false;
                }
                if (input_account_name_not_null === ''){
                    toastr.error('Account name is required.','Information');
                    return false;
                }
                if (input_address_not_null === ''){
                    toastr.error('Address is required.','Information');
                    return false;
                }

        }if (if_process_1st_selected === ''){

            toastr.error('Select Transaction Type','Information');
            return false;

        }else{
            return true;
        }

        /* if (invoiceInput === ''){
            toastr.error('Invoice number is required.','Information');
            return false;
        }
        if (invoiceDateInput === ''){
            toastr.error('Transaction date is required.','Information');
            return false;
        }
        if (accountNameInput === ''){
            toastr.error('Account name is required.','Information');
            return false;
        }
        if (addressInput === ''){
            toastr.error('Address is required.','Information');
            return false;
        } else {
            $('#labelinvoice').text(invoiceInput);
            $('#labeldate').text(invoiceDateInput);
            $('#labelname').text(accountNameInput);
            $('#labeladdress').text(addressInput);
            return true;
            } */
        });
/*-----------------------------------------------------------------------------------END 1st-----------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------Start 2nd-----------------------------------------------------------------------------------------*/
        $('#btn_next2nd').click(function (event) {
        var orderInput = $('#no').val();
        if (orderInput <= 0) {
                toastr.info('You don`t have order yet','Information');
                return false;
        } else {
        console.log("Yay, we're good to go!");
        return true;
            }
        });

/*-----------------------------------------------------------------------------------End 2nd-----------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------Start 3rd-----------------------------------------------------------------------------------------*/
        $('#btn_next3rd').click(function (event) {
            var orderInput = /* $.trim( */$('#no').val()/* ) */;
        //if ordees is 0 cant proceed
        if (orderInput <= 0) {
                toastr.info('You don`t have order yet','Information');
                return false;
        } else {
        console.log("Yay, we're good to go!");
        return true;
            }
        });
/*-----------------------------------------------------------------------------------END 3rd-----------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------Start 4th-----------------------------------------------------------------------------------------*/
        /* $('#btn_next4th').click(function (event) {

            var orderInput =$('#no').val();
            
            var transactionTypeInput = $.trim($('#transactionType').val());
            var idNumberInput = $.trim($('#idNumber').val());
            var checkNumberInput = $.trim($('#checkNumber').val());
            var checkDateInput = $.trim($('#checkDate').val());
            var bankInput = $.trim($('#bank').val());
            var cardInput = $.trim($('#cardType').val());
            
                    if (transactionTypeInput === '') {
                            
                            toastr.error('Please select transaction type','Information');
                            return false;
                    } 
                    else {
                        if (transactionTypeInput === 'NON-VAT'){

                            $('#labelpayment').text('CASH');
                            $('#labeltranstype').text('PAPER, S.I, O.F');
                            $('#labelvatornonvat').text('NON-VAT');

                        }

                        if (transactionTypeInput === 'CASH'){

                            $('#labelpayment').text('CASH');
                            $('#labeltranstype').text('S.I');
                            $('#labelvatornonvat').text('VAT');

                        }

                        if (transactionTypeInput === 'CHECK'){

                                if(checkNumberInput === ''){
                                    toastr.error('Check number is required!','Information');
                                    return false;
                                }
                                if(checkDateInput === ''){
                                    toastr.error('Check date is required!','Information');
                                    return false;
                                }
                                $('#labelpayment').text('CHECK');
                                $('#labeltranstype').text('S.I');
                                $('#labelvatornonvat').text('VAT');

                            }

                        if (transactionTypeInput === 'CARD'){

                                if(cardInput === ''){
                                    toastr.error('Card type is required!','Information');
                                    return false;
                                }
                                if(bankInput === ''){
                                    toastr.error('Bank name is required!','Information');
                                    return false;
                                }
                                if(bankInput === 'DEBIT'){
                                    $('#labelstatus').text('DEBIT');
                                }
                                if(bankInput === 'CREDIT'){
                                    $('#labelstatus').text('CREDIT');
                                }
                                $('#labelpayment').text('CARD');
                                $('#labeltranstype').text('S.I');
                                $('#labelvatornonvat').text('VAT');

                        }

                        if (transactionTypeInput === 'SENIOR-CASH' || transactionTypeInput === 'PWD-CASH'){

                                if(idNumberInput === ''){
                                    toastr.error('ID number is required!','Information');
                                    return false;
                                }
                                if (transactionTypeInput === 'SENIOR-CASH'){
                                    $('#labeltranstype').text('SENIOR');
                                }
                                if (transactionTypeInput === 'PWD-CASH'){
                                    $('#labeltranstype').text('PWD');
                                }
                                $('#labelpayment').text('CASH');
                                $('#labelvatornonvat').text('VAT');
                        }

                        if (transactionTypeInput === 'SENIOR-CHECK' || transactionTypeInput === 'PWD-CHECK'){

                                if(idNumberInput === ''){
                                    toastr.error('ID number is required!','Information');
                                    return false;
                                }
                                if(checkNumberInput === ''){
                                    toastr.error('Check number is required!','Information');
                                    return false;
                                }
                                if(checkDateInput === ''){
                                    toastr.error('Check date is required!','Information');
                                    return false;
                                }
                                if (transactionTypeInput === 'SENIOR-CHECK'){
                                    $('#labeltranstype').text('SENIOR');
                                }
                                if (transactionTypeInput === 'PWD-CHECK'){
                                    $('#labeltranstype').text('PWD');
                                }
                                $('#labelpayment').text('CHECK');
                                $('#labelvatornonvat').text('VAT');

                        }

                        if (transactionTypeInput === 'SENIOR-CARD' || transactionTypeInput === 'PWD-CARD'){

                                if(cardInput === ''){
                                    toastr.error('Card type is required!','Information');
                                    return false;
                                }
                                if(idNumberInput === ''){
                                    toastr.error('ID number is required!','Information');
                                    return false;
                                }
                                if(bankInput === ''){
                                    toastr.error('Bank name is required!','Information');
                                    return false;
                                }
                                if (transactionTypeInput === 'SENIOR-CARD'){
                                    $('#labeltranstype').text('SENIOR');
                                }
                                if (transactionTypeInput === 'PWD-CARD'){
                                    $('#labeltranstype').text('PWD');
                                }
                                $('#labelpayment').text('CARD');
                                $('#labelvatornonvat').text('VAT');

                        }
                        if (transactionTypeInput === 'PRIVATE-CASH' || transactionTypeInput === 'GOVERNMENT-CASH'){

                                if (transactionTypeInput === 'PRIVATE-CASH'){
                                    $('#labeltranstype').text('PRIVATE');
                                }
                                if (transactionTypeInput === 'GOVERNMENT-CASH'){
                                    $('#labeltranstype').text('GOVERNMENT');
                                }
                                $('#labelpayment').text('CASH');
                                $('#labelvatornonvat').text('VAT');
                        }
                        if (transactionTypeInput === 'PRIVATE-CHECK' || transactionTypeInput === 'GOVERNMENT-CHECK'){

                                if(checkNumberInput === ''){
                                    toastr.error('Check number is required!','Information');
                                    return false;
                                }
                                if(checkDateInput === ''){
                                    toastr.error('Check Date is required!','Information');
                                    return false;
                                }
                                if (transactionTypeInput === 'PRIVATE-CHECK'){
                                    $('#labeltranstype').text('PRIVATE');
                                }
                                if (transactionTypeInput === 'GOVERNMENT-CHECK'){
                                    $('#labeltranstype').text('GOVERNMENT');
                                }
                                $('#labelpayment').text('CHECK');
                                $('#labelvatornonvat').text('VAT');
                        }

                        if (transactionTypeInput === 'PRIVATE-CARD' || transactionTypeInput === 'GOVERNMENT-CARD'){
                            
                                if(cardInput === ''){
                                    toastr.error('Card type is required!','Information');
                                    return false;
                                }
                                if(bankInput === ''){
                                    toastr.error('Check Date is required!','Information');
                                    return false;
                                }
                                if (transactionTypeInput === 'PRIVATE-CARD'){
                                    $('#labeltranstype').text('PRIVATE');
                                }
                                if (transactionTypeInput === 'GOVERNMENT-CARD'){
                                    $('#labeltranstype').text('GOVERNMENT');
                                }
                                $('#labelpayment').text('CARD');
                                $('#labelvatornonvat').text('VAT');

                        }

                        if (orderInput <= 0) {

                                toastr.info('Please check your order.','Information');
                                return false;
                        }
                    
                    passall();
                    return true;
                    }
        }); */

        /*-----------------------------------------------------------------------------------END 4th-----------------------------------------------------------------------------------------*/

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

    /* var setnullinput = function(){
        $('#netofvat').val('');
        $('#vat').val('');
        $('#discount').val('');
    }
    var emptylabel = function(){
        $('#ewt').text('');
        $('#netofvat').text('');
        $('#vat').text('');
        $('#vatexempt').text('');
        $('#discount').text('');

        //new
        $('#checkNumber').val('');
        $('#bank').val('');
        $('#checkDate').val('');
        $('#idNumber').val('');
        $('#cardType').val('');
        
        $('#labelidnumber').text('');
        $('#labelcheckdate').text('');
        $('#labelbank').text('');
        $('#labelchecknumber').text('');
        //end new
        $('#labelpayment').text('');
        $('#labeltranstype').text('');
        $('#labelstatus').text('');
        $('#labelvatornonvat').text('');
    } */
    /* var emptyinput = function(){
        $('#checkNumber').val('');
        $('#bank').val('');
        $('#checkDate').val('');
        $('#idNumber').val('');
        $('#cardType').val('');

        $('#labelidnumber').text('');
        $('#labelcheckdate').text('');
        $('#labelbank').text('');
        $('#labelchecknumber').text('');
        $('#labelstatus').text('');
        
    } */
    var passall = function(){
       
        var idNumberInput = $.trim($('#idNumber').val());
        var checkNumberInput = $.trim($('#checkNumber').val());
        var checkDateInput = $.trim($('#checkDate').val());
        var bankInput = $.trim($('#bank').val());
        var cardInput = $.trim($('#cardType').val());
        $('#labelidnumber').text(idNumberInput);
        $('#labelcheckdate').text(checkDateInput);
        $('#labelbank').text(bankInput);
        $('#labelchecknumber').text(checkNumberInput);
        $('#labelstatus').text(cardInput);
    }

        function ifClickSi(that) {

            $('#processclick').val('SALES INVOICE');

            document.getElementById("div_regular").style.display = "block";
            document.getElementById("div_senior").style.display = "block";
            document.getElementById("div_pwd").style.display = "block";
            document.getElementById("div_private").style.display = "block";
            document.getElementById("div_government").style.display = "block";
            document.getElementById("alt4").style.display = "block";
            document.getElementById("alt5").style.display = "none";
            document.getElementById("dr").style.display = "none";
            document.getElementById("of").style.display = "none";
            document.getElementById("S.I").disabled = true;

            $('#label_transaction_type').text('Sales Invoice');
            $('#label_vat_or_nonvat').text('VAT');
        }
        function ifClickDr(that) { 
            
            $('#processclick').val('DELIVERY RECEIPT');

            document.getElementById("show_transaction_number").style.display = "block";
            document.getElementById("show_transaction_date").style.display = "block";
            document.getElementById("show_transaction_address").style.display = "block";
            document.getElementById("show_transaction_name").style.display = "block";
            document.getElementById("alt4").style.display = "block";
            document.getElementById("alt5").style.display = "block";
            document.getElementById("si").style.display = "none";
            document.getElementById("of").style.display = "none";
            $('#form_number').text('Delivery Receipt #:');
            document.getElementById("D.R").disabled = true;

            $('#label_transaction_type').text('Delivery Receipt');
        }
        function ifClickOf(that) { 
           
            $('#processclick').val('ORDER FORM');

            document.getElementById("show_transaction_number").style.display = "block";
            document.getElementById("show_transaction_date").style.display = "block";
            document.getElementById("show_transaction_address").style.display = "block";
            document.getElementById("show_transaction_name").style.display = "block";
            document.getElementById("alt4").style.display = "block";
            document.getElementById("alt5").style.display = "block";
            document.getElementById("si").style.display = "none";
            document.getElementById("dr").style.display = "none";
            $('#form_number').text('Order Form #:');
            document.getElementById("O.F").disabled = true;

            $('#label_transaction_type').text('Order Form');
            
        }
        function ifClickRegular(that) {

            $('#processclick2').val('REGULAR');

            document.getElementById("show_transaction_number").style.display = "block";
            document.getElementById("show_transaction_date").style.display = "block";
            document.getElementById("show_transaction_address").style.display = "block";
            document.getElementById("show_transaction_name").style.display = "block";
            document.getElementById("div_regular").style.display = "block";
            document.getElementById("div_senior").style.display = "none";
            document.getElementById("div_pwd").style.display = "none";
            document.getElementById("div_private").style.display = "none";
            document.getElementById("div_government").style.display = "none";
            document.getElementById("alt3").style.display = "block";
            document.getElementById("alt1").style.display = "block";
            document.getElementById("alt5").style.display = "none";
            document.getElementById("si").style.display = "block";
            document.getElementById("of").style.display = "none";
            $('#form_number').text('Sales Invoice #:');
            document.getElementById("btn_regular").disabled = true;
            $('#label_transaction_type').text('REGULAR');
        }
        function ifClickSenior(that) {
            $('#processclick2').val('SENIOR');
            document.getElementById("show_transaction_number").style.display = "block";
            document.getElementById("show_transaction_date").style.display = "block";
            document.getElementById("show_transaction_address").style.display = "block";
            document.getElementById("show_transaction_name").style.display = "block";
            document.getElementById("show_transaction_senior").style.display = "block";
            document.getElementById("div_regular").style.display = "none";
            document.getElementById("div_senior").style.display = "block";
            document.getElementById("div_pwd").style.display = "none";
            document.getElementById("div_private").style.display = "none";
            document.getElementById("div_government").style.display = "none";
            document.getElementById("alt3").style.display = "block";
            document.getElementById("alt1").style.display = "block";
            document.getElementById("alt5").style.display = "none";
            document.getElementById("si").style.display = "block";
            document.getElementById("of").style.display = "none";
            $('#label_senior').text('Senior ID #:');
            $('#form_number').text('Sales Invoice #:');
            document.getElementById("btn_senior").disabled = true;
            $('#label_transaction_type').text('SENIOR');
        }
        function ifClickPwd(that) {
            $('#processclick2').val('PWD');
            document.getElementById("show_transaction_number").style.display = "block";
            document.getElementById("show_transaction_date").style.display = "block";
            document.getElementById("show_transaction_address").style.display = "block";
            document.getElementById("show_transaction_name").style.display = "block";
            document.getElementById("show_transaction_senior").style.display = "block";
            document.getElementById("div_regular").style.display = "none";
            document.getElementById("div_senior").style.display = "none";
            document.getElementById("div_pwd").style.display = "block";
            document.getElementById("div_private").style.display = "none";
            document.getElementById("div_government").style.display = "none";
            document.getElementById("alt3").style.display = "block";
            document.getElementById("alt1").style.display = "block";
            document.getElementById("alt5").style.display = "none";
            document.getElementById("si").style.display = "block";
            document.getElementById("of").style.display = "none";
            $('#label_senior').text('Pwd ID #:');
            $('#form_number').text('Sales Invoice #:');
            document.getElementById("btn_pwd").disabled = true;
            $('#label_transaction_type').text('PWD');
        }
        function ifClickPrivate(that) {
            
            $('#processclick2').val('PRIVATE');

            document.getElementById("show_transaction_number").style.display = "block";
            document.getElementById("show_transaction_date").style.display = "block";
            document.getElementById("show_transaction_address").style.display = "block";
            document.getElementById("show_transaction_name").style.display = "block";
            document.getElementById("show_transaction_senior").style.display = "none";
            document.getElementById("div_regular").style.display = "none";
            document.getElementById("div_senior").style.display = "none";
            document.getElementById("div_pwd").style.display = "none";
            document.getElementById("div_private").style.display = "block";
            document.getElementById("div_government").style.display = "none";
            document.getElementById("alt3").style.display = "block";
            document.getElementById("alt1").style.display = "block";
            document.getElementById("alt5").style.display = "none";
            document.getElementById("si").style.display = "block";
            document.getElementById("of").style.display = "none";
            $('#form_number').text('Sales Invoice #:');
            document.getElementById("btn_private").disabled = true;
            $('#label_transaction_type').text('PRIVATE');
        }
        function ifClickGovernment(that) {
            
            $('#processclick2').val('GOVERNMENT');

            document.getElementById("show_transaction_number").style.display = "block";
            document.getElementById("show_transaction_date").style.display = "block";
            document.getElementById("show_transaction_address").style.display = "block";
            document.getElementById("show_transaction_name").style.display = "block";
            document.getElementById("show_transaction_senior").style.display = "none";
            document.getElementById("div_regular").style.display = "none";
            document.getElementById("div_senior").style.display = "none";
            document.getElementById("div_pwd").style.display = "none";
            document.getElementById("div_private").style.display = "none";
            document.getElementById("div_government").style.display = "block";
            document.getElementById("alt3").style.display = "block";
            document.getElementById("alt1").style.display = "block";
            document.getElementById("alt5").style.display = "none";
            document.getElementById("si").style.display = "block";
            document.getElementById("of").style.display = "none";
            $('#form_number').text('Sales Invoice #:');
            document.getElementById("btn_government").disabled = true;
            $('#label_transaction_type').text('GOVERNMENT');
        }

        function ifClickRefresh(that) {
            
            $('#processclick').val('');
            $('#processclick2').val('');
            first_be_null();

            document.getElementById("show_transaction_number").style.display = "none";
            document.getElementById("show_transaction_date").style.display = "none";
            document.getElementById("show_transaction_address").style.display = "none";
            document.getElementById("show_transaction_name").style.display = "none";
            document.getElementById("show_transaction_number").style.display = "none";
            document.getElementById("show_transaction_senior").style.display = "none";
            document.getElementById("div_regular").style.display = "none";
            document.getElementById("div_senior").style.display = "none";
            document.getElementById("div_pwd").style.display = "none";
            document.getElementById("div_private").style.display = "none";
            document.getElementById("div_government").style.display = "none";
            document.getElementById("alt1").style.display = "none";
            document.getElementById("alt2").style.display = "none";
            document.getElementById("alt3").style.display = "none";
            document.getElementById("alt4").style.display = "none";
            document.getElementById("alt5").style.display = "block";
            document.getElementById("si").style.display = "block";
            document.getElementById("of").style.display = "block";
            document.getElementById("dr").style.display = "block";
            document.getElementById("S.I").disabled = false;
            document.getElementById("O.F").disabled = false;
            document.getElementById("D.R").disabled = false;
            document.getElementById("btn_regular").disabled = false;
            document.getElementById("btn_senior").disabled = false;
            document.getElementById("btn_pwd").disabled = false;
            document.getElementById("btn_private").disabled = false;
            document.getElementById("btn_government").disabled = false;
        }
        function ifClickCash(that) {

            /* $('#processclick').val('SALES INVOICE'); */
            
            document.getElementById("div_check").style.display = "none";
            document.getElementById("div_card").style.display = "none";
            document.getElementById("div_online_payment").style.display = "none";
            document.getElementById("btn_cash").disabled = true;
            
            $('#input_cash').val('CASH');
            
        }
        function ifClickCheck(that) {               

            console.log('check ok');

            document.getElementById("div_cash").style.display = "none";
            document.getElementById("div_card").style.display = "none";
            document.getElementById("div_online_payment").style.display = "none";
            document.getElementById("btn_check").disabled = true;
            
            document.getElementById("div_check_number").style.display = "block";
            document.getElementById("div_bank").style.display = "block";
            document.getElementById("div_check_date").style.display = "block";

            $('#input_check').val('CHECK');

        }
        function ifClickCard(that) {

            document.getElementById("div_cash").style.display = "none";
            document.getElementById("div_check").style.display = "none";
            document.getElementById("div_online_payment").style.display = "none";
            document.getElementById("div_debit").style.display = "block";
            document.getElementById("div_credit").style.display = "block";
            document.getElementById("btn_card").disabled = true;

            $('#input_card').val('CARD');

        }
        function ifClickOnlinePayment(that) {

            document.getElementById("div_cash").style.display = "none";
            document.getElementById("div_card").style.display = "none";
            document.getElementById("div_check").style.display = "none";
            document.getElementById("btn_online_payment").disabled = true;
            document.getElementById("div_gcash").style.display = "block";                          /*  XXX */
            document.getElementById("div_paymaya").style.display = "block";
            document.getElementById("div_bank_transfer").style.display = "block";

            $('#input_online_payment').val('ONLINE PAYMENT');

        }
        function ifClickDebit(that) {

            document.getElementById("div_credit").style.display = "none";
            document.getElementById("btn_debit").disabled = true;

            document.getElementById("div_bank").style.display = "block";

            $('#input_debit').val('DEBIT');

        }
        function ifClickCredit(that) {

            document.getElementById("div_debit").style.display = "none";
            document.getElementById("btn_credit").disabled = true;

            document.getElementById("div_bank").style.display = "block";

            $('#input_credit').val('CREDIT');

        }
        function ifClickGcash(that) {

            document.getElementById("div_paymaya").style.display = "none";
            document.getElementById("div_bank_transfer").style.display = "none";
            document.getElementById("btn_gcash").disabled = true;

            document.getElementById("div_ref").style.display = "block";
            
            $('#input_gcash').val('GCASH');

        }
        function ifClickPaymaya(that) {

            document.getElementById("div_gcash").style.display = "none";
            document.getElementById("div_bank_transfer").style.display = "none";
            document.getElementById("btn_paymaya").disabled = true;

            document.getElementById("div_ref").style.display = "block";

            $('#input_paymaya').val('PAYMAYA');

        }
        function ifClickBankTransfer(that) {

            document.getElementById("div_paymaya").style.display = "none";
            document.getElementById("div_gcash").style.display = "none";
            document.getElementById("btn_bank_transfer").disabled = true;
            document.getElementById("div_deposit").style.display = "block";
            document.getElementById("div_online_transfer").style.display = "block";

            $('#input_bank_transfer').val('BANK TRANSFER');

        }
        function ifClickDeposit(that) {

            document.getElementById("btn_deposit").disabled = true;
            document.getElementById("div_online_transfer").style.display = "none";

            document.getElementById("div_bank").style.display = "block";
            document.getElementById("div_ref").style.display = "block";

            $('#input_deposit').val('DEPOSIT');

        }
        function ifClickOnlineTransfer(that) {

            document.getElementById("btn_online_transfer").disabled = true;
            document.getElementById("div_deposit").style.display = "none";

            
            document.getElementById("div_bank").style.display = "block";
            document.getElementById("div_ref").style.display = "block";

            $('#input_online_transfer').val('ONLINE TRANSFER');

        }

        function ifClickRefresh2(that) {

            document.getElementById("div_cash").style.display = "block";
            document.getElementById("div_check").style.display = "block";
            document.getElementById("div_card").style.display = "block";
            document.getElementById("div_online_payment").style.display = "block";
            
            document.getElementById("div_credit").style.display = "none";
            document.getElementById("div_debit").style.display = "none";
            document.getElementById("div_gcash").style.display = "none";
            document.getElementById("div_paymaya").style.display = "none";
            document.getElementById("div_bank_transfer").style.display = "none";
            document.getElementById("div_deposit").style.display = "none";
            document.getElementById("div_online_transfer").style.display = "none";
            document.getElementById("div_check_number").style.display = "none";
            document.getElementById("div_bank").style.display = "none";
            document.getElementById("div_check_date").style.display = "none";
            document.getElementById("div_card_number").style.display = "none";
            document.getElementById("div_ref").style.display = "none";

            $('#input_cash').val('');
            $('#input_check').val('');
            $('#input_card').val('');
            $('#input_debit').val('');
            $('#input_credit').val('');
            $('#input_online_payment').val('');
            $('#input_gcash').val('');
            $('#input_paymaya').val('');
            $('#input_bank_transfer').val('');
            $('#input_deposit').val('');
            $('#input_online_transfer').val('');

            $('#input_check_number').val('');
            $('#input_bank').val('');
            $('#input_check_date').val('');
            $('#input_card_number').val('');
            $('#input_ref').val('');



            document.getElementById("btn_cash").disabled = false;
            document.getElementById("btn_check").disabled = false;
            document.getElementById("btn_card").disabled = false;
            document.getElementById("btn_online_payment").disabled = false;
            document.getElementById("btn_debit").disabled = false;
            document.getElementById("btn_credit").disabled = false;
            document.getElementById("btn_gcash").disabled = false;
            document.getElementById("btn_paymaya").disabled = false;
            document.getElementById("btn_bank_transfer").disabled = false;
            document.getElementById("btn_deposit").disabled = false;
            document.getElementById("btn_online_transfer").disabled = false;

            

        }


        function yesnoCheck(that) {
            if (that.value == "CHECK") {
        /* alert("check"); */
                document.getElementById("show_checkNumber").style.display = "block";
                document.getElementById("show_checkDate").style.display = "block";
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "none";
                //setnullinput();
            } 
            else if (that.value == "CARD") {
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "block";
            }
            else if (that.value == "SENIOR-CASH") {
                document.getElementById("show_idNumber").style.display = "block";
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_bank").style.display = "none";
                document.getElementById("show_cardType").style.display = "none";
            }
            else if (that.value == "SENIOR-CHECK") {
                document.getElementById("show_idNumber").style.display = "block";
                document.getElementById("show_checkNumber").style.display = "block";
                document.getElementById("show_checkDate").style.display = "block";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "none";
            }
            else if (that.value == "SENIOR-CARD") {
                document.getElementById("show_idNumber").style.display = "block";
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "block";
            }
            else if (that.value == "PWD-CASH") {
                document.getElementById("show_idNumber").style.display = "block";
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_bank").style.display = "none";
                document.getElementById("show_cardType").style.display = "none";
            }
            else if (that.value == "PWD-CHECK") {
                document.getElementById("show_idNumber").style.display = "block";
                document.getElementById("show_checkNumber").style.display = "block";
                document.getElementById("show_checkDate").style.display = "block";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "none";
            }
            else if (that.value == "PWD-CARD") {
                document.getElementById("show_idNumber").style.display = "block";
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "block";
            }
            else if (that.value == "PRIVATE-CASH") {
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_bank").style.display = "none";
                document.getElementById("show_cardType").style.display = "none";
            }
            else if (that.value == "PRIVATE-CHECK") {
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_checkNumber").style.display = "block";
                document.getElementById("show_checkDate").style.display = "block";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "none";
            }
            else if (that.value == "PRIVATE-CARD") {
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "block";
            }
            else if (that.value == "GOVERNMENT-CASH") {
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_bank").style.display = "none";
                document.getElementById("show_cardType").style.display = "none";
            }
            else if (that.value == "GOVERNMENT-CHECK") {
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_checkNumber").style.display = "block";
                document.getElementById("show_checkDate").style.display = "block";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "none";
            }
            else if (that.value == "GOVERNMENT-CARD") {
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_bank").style.display = "block";
                document.getElementById("show_cardType").style.display = "block";
            }
            else {
                document.getElementById("show_checkNumber").style.display = "none";
                document.getElementById("show_checkDate").style.display = "none";
                document.getElementById("show_idNumber").style.display = "none";
                document.getElementById("show_bank").style.display = "none";
                document.getElementById("show_cardType").style.display = "none";
               // setnullinput();
            }
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
