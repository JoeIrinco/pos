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
    <body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

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
                    @if(Auth::user()->is_admin== 2)

                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class=" fa fa-medkit"></i>
                                    <span>Store</span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="pos">POS</a></li>
                                    {{-- not sure if admin or superadmin --}}
                                    <li><a  href="add-store-product">Stock In</a></li>
                                    
                                    <li><a  href="store-reports">Generate Report</a></li>
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
            <!--page title start-->
            {{-- <div class="page-title">
                <h4 class="mb-0"> Point Of Sale
                    <small>{{ Auth::user()->name ?? '' }}</small> 
                </h4>
            </div> --}}
            <!--page title end-->


            <div class="col-md-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h4 class="mb-0"> Point Of Sale
                                <small>{{ Auth::user()->name ?? '' }}</small> 
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="{{-- form-wizard --}}">
                            {{-- <div class="steps">
                                <ul>
                                    <li>
                                        <span>1</span>
                                        Information
                                    </li>
                                    <li>
                                        <span>2</span>
                                        Place Order
                                    </li>
                                    <li>
                                        <span>3</span>
                                       Check Order
                                    </li>
                                    <li>
                                        <span>4</span>
                                        Transaction Type
                                    </li>
                                    <li>
                                        <span>5</span>
                                        Transaction Details
                                    </li>
                                </ul>
                            </div> --}}
                            <div class="myContainer">
                                <div class="form-container animated">
                                    <h2 class="text-center form-title">Transaction Information</h2>
                                    <form>
                                        
                                            <div class="card card-shadow mb-4">
                                                <div class="col-md-12 mb-1">
                                                </div>
                                                <div class="card-body">
                                                        {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-md-6 mb-1">
                                                            <label>Invoice No.:</label>
                                                            <input type="text" id="invoice" class="text-uppercase form-control" placeholder="Invoice # *">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label>Transaction Date:</label>
                                                                <input id="invoiceDate" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                                                
                                                        </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-1">
                                                                <label>Account Name:</label>
                                                                <input type="text" id="accountName" class="text-uppercase form-control" placeholder="Account Name *">
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label>Address:</label>
                                                                <input type="text" id="address" value="CABANATUAN CITY, NUEVA ACIJA" class="text-uppercase form-control" placeholder="Address *">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        <div class="form-group  text-center ">
                                            <input id="btn_next1st" type="button"  value="NEXT" class="btn btn-primary next">
                                        </div>
                                    </form>
                                </div>
                                <div class="form-container animated">
                                    <h2 class="text-center form-title mb-1">Place Order Here!</h2>
                                    <form class="mt-1">
                                        <div class="card-body">
                                                    <div class="row">
                                                            <div class="col-md-12 mt-3">
                                                                <label >Product Description</label>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                
                                                                <select style="width:100%" id="productSelect" class="form-control"  name="product_name[]">
                                                                    <option value='0'>-- Select Product --</option>
                                                                  </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">Quantity</label>
                                                                <input type="number" id="qty" name="quantity[]" class="form-control" >
                                                                <input type="text" hidden  id="showproduct" class="form-control" >
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom04">Unit</label>
                                                                <input type="text" id="unit" name="unit[]" class="form-control" readonly>
                                                                
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom05">Price</label>
                                                                <input type="number" id="sellingprice" name="amount[]" class="form-control" >
                                                                
                                                            </div>
                                                           
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <input type="button" value="ADD ITEM" class="btn btn-success add_item">
                                                                {{-- <a class="btn btn-success add_item" >Add Item</a> --}}
                                                            </div>
                                                        </div>
                                                       
                                        <div class="form-group text-center ">
                                            <input type="button" value="BACK" class="btn btn-default back">
                                            <input id="btn_next2nd" type="button" value="NEXT" class="btn btn-primary next">
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-container animated">
                                    <h2 class="text-center form-title">Item Lists</h2>
                                    <form>
                                        <div class="card-body">
                                            <table id="show-hide" class="display dt-init table table-bordered table-striped " cellspacing="0" style="width: 100%" {{-- id="data_table" class="table table-responsive" --}}>
                                                <thead>
                                                <tr>
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">UNIT</th>
                                                    <th scope="col">PRODUCT DESCRIPTION</th>
                                                    <th scope="col">PRICE</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                            </table>
                                            <br/>
                                            <br/>
                                            
                                        </div>
                                        <div class="form-group text-center ">
                                            <input type="button" value="BACK" class="btn btn-default back">
                                            <input id="btn_next3rd" type="button" value="NEXT" class="btn btn-primary next">
                                        </div>
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
                                                <input type="text" id="checkNumber" class="text-uppercase form-control" placeholder="Check Number *">
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
                                                                <label id="labelvatornonvat"></label>
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
                                                                <label id="labeltranstype"></label>
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
        <!--main contents end-->

    </div>
    <!--===========app body end===========-->
    
    <!--===========footer start===========-->
    <footer class="app-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    2020 © Vallery Enterprises.
                </div>
                <div class="col-4">
                    <a href="#" class="float-right back-top">
                        <i class=" ti-arrow-circle-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
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
                               //emptylabel();
                               var total = parseInt($("#total").val());

                               $('#total').text(parseFloat(total).toFixed(2));
                               $('#finaltotal').text(parseFloat(total).toFixed(2));

                           }
                            if(type === 'CASH'){
                               
                                $('#total').val(data.total)
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                                //emptylabel();
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
                               // emptylabel();
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

        $('#btn_next1st').click(function (event) {

        var invoiceInput = $.trim($('#invoice').val());
        var invoiceDateInput = $.trim($('#invoiceDate').val());
        var accountNameInput = $.trim($('#accountName').val());
        var addressInput = $.trim($('#address').val());
        if (invoiceInput === ''){
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
            }
        });


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

        $('#btn_next4th').click(function (event) {

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
                            $('#labeltranstype').text('PAPER, S.I, O.F');/* xxx */
                            $('#labelvatornonvat').text('NON-VAT');

                        }

                        if (transactionTypeInput === 'CASH'){

                            $('#labelpayment').text('CASH');
                            $('#labeltranstype').text('S.I');/* xxx */
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
                                $('#labeltranstype').text('S.I');/* xxx */
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
                    scrollX: true,
                    ajax: '{{ url('getItems') }}',
                    columns: [
                        { "data": "quantity" },
                        { "data": "unit" },
                        { "data": "product_name" },
                        { "data": "amount" },
                        { "data": "total" },
                        { "data": "action",
                        "searchable": false,
                        "orderable": false
                                    }
                    ] 
                });


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
                console.log(prod_id);
                
                $.ajax({
                    type:'get',
                    url:'{{ url('storefindProductList') }}',
                    data:{'id':prod_id},
                    dataType:'json',//return data will be json
                    success:function(data){
                        $('#unit').val(data.unit)
                        $('#showproduct').val(data.productname)
                        $('#sellingprice').val(data.selling_price)
                        console.log(data.unit);
                        console.log(data.productname);
                        console.log(data.sellingprice);
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
        formData.append("unit", $("#unit").val());
        formData.append("price", $("#sellingprice").val());
        formData.append('_token', token);

                var valueproduct = $("#showproduct").val();
                var valueqty = $("#qty").val();
                var valueunit = $("#unit").val();

        if (valueproduct && valueqty && valueunit != "" ) {
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

                    console.log(response);
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
                toastr.error('Quantity is required!','Information');  
                /* Swal.fire(
                                'Some information are required',
                                'Product, Unit, Qty cannot be null!',
                                'warning'
                                ); */
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

    var setnullinput = function(){
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
    }
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
       //xxx
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
