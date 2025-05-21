@extends('layouts.admin.master')
@section('title','Home | POS')
@section('page-title','POS')

@section('stylesheets')
{{-- additional style here --}}

@endsection


<style>
    .btn-disable:hover{
        cursor: not-allowed;
    }

    .dropdown-menu li{
        margin-right:10px;
        cursor: pointer;
        padding-left: 10px;
    }

    .dropdown-menu .li-enabled:hover{
        background-color: #1ca61c;
    }

    .disabled:hover {
        cursor: not-allowed;
        background-color: #EBEBE4;
    }
    .dropdown-menu a {
        display:block;
    }

</style>

@section('content')

<div class="container-fluid">
        <div class="app-body mt-0">

            <!--main contents start-->
            <main class="main-content ml-0">
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

                                                    <input type="text" id="input_transaction" class="text-uppercase form-control" hidden readonly>
                                                    <input type="text"  id="input_transaction_type" class="text-uppercase form-control"  hidden readonly>
                                                    <input type="text" id="no" class="text-uppercase form-control" value="{{ $count }}" hidden readonly>

                                                        <div class="col-md-6 mb-3">
                                                            <strong><label>Transaction Type:</label></strong>
                                                                <select style="border-color: rgb(0, 0, 0);" id="transaction_type" class="form-control" >

                                                                    <option value=''>--- SELECT TRANSACTION TYPE ---</option>
                                                                    <option value='of_'>ORDER FORM</option>
                                                                    <option value='si_regular'>SALES INVOICE -> REGULAR</option>
                                                                    <option value='si_senior'>SALES INVOICE -> SENIOR</option>
                                                                    <option value='si_pwd'>SALES INVOICE -> PWD</option>
                                                                    <option value='si_government'>SALES INVOICE -> GOVERNMENT</option>
                                                                    <option value='si_private'>SALES INVOICE -> PRIVATE</option>{{-- NEW --}}
                                                                    <option value='dr_government'>DELIVERY RECIEPT -> GOVERNMENT</option>{{-- NEW --}}
                                                                    <option value='dr_private'>DELIVERY RECIEPT -> PRIVATE</option>

                                                                    {{-- <option value='dr_'>DELIVERY RECIEPT</option> --}}
                                                                    {{-- <option value='of_private'>ORDER FORM -> PRIVATE</option> --}}
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
                                                        <input type="number" id="input_invoice" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3" id="show_transaction_date" style="display: block;">
                                                        <strong><label>Transaction Date:</label></strong>
                                                        <input id="input_transaction_date" type="date" style="border-color: rgb(0, 0, 0);" class="form-control" value="<?php echo date('Y-m-d'); ?>">

                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6 mb-2" id="show_transaction_name" style="display: block;" >
                                                        <strong><label>Account Name:</label></strong>
                                                        <label id="label_accountno" hidden readonly></label>
                                                        <div class="input-group">
                                                            <input type="text" id="input_accountname" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" readonly hidden>
                                                            <select style="width:100%;" id="clientSelect" data-placeholder='-- Select Client --' class="form-control"  name="product_name[]">
                                                                <option value='0'>-- Select Client --</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 mb-3" id="show_transaction_address" style="display: block;">
                                                        <strong><label>Address:</label></strong>
                                                        <input type="text" id="input_address" style="border-color: rgb(0, 0, 0);" value="CABANATUAN CITY, NUEVA ACIJA" class="text-uppercase form-control" placeholder="Address *">
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6 mb-2" style="display: block;" >

                                                                <button type="button" class="btn  shadow btn-sm btn-success add_client"><i class="fa fa-user-plus pr-2"></i> Add Client</button>

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

                                        <div id="div_second" class=" col-md-6 mt-1 mb-1" style="display: none">

                                            <div class="card-body">
                                                    <h2 id="label_title" class="text-center form-title mt-1 mb-1">Sales Order</h2>
                <div id="div_hide_second">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <strong><label >Product Description *:</label></strong>
                                                        <select style="width:100%;" id="productSelect" data-placeholder='-- Select Product --' class="form-control"  name="product_name[]">
                                                            <option value='0'>-- Select Product --</option>
                                                        </select>
                                                        <label id="item_status" class="text-info" ></label>
                                                    </div>
                                                    {{-- <div class="col-md-3 mb-3">
                                                        <strong><label >Expiration *:</label></strong>
                                                        <select style="width:100%;" id="select_expiry" data-placeholder='-- Select Product --' class="form-control"></select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Lot No. *:</label></strong>
                                                        <select style="width:100%;" id="select_lot_no" data-placeholder='-- Select Product --' class="form-control"></select>
                                                    </div> --}}
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Expiration *:</label></strong>
                                                        <select style="width:100%;" id="select_expiry" data-placeholder='-- Select Product --' class="form-control"></select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Lot No. *:</label></strong>
                                                        <select style="width:100%;" id="select_lot_no" data-placeholder='-- Select Product --' class="form-control"></select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Rack:</label></strong>
                                                        <select style="width:100%;" id="select_rock" data-placeholder='-- Select Rock --' class="form-control"></select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <strong><label >Shelf:</label></strong>
                                                        <select style="width:100%;" id="select_shelf" data-placeholder='-- Select Shelf --' class="form-control"></select>
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
                                                        <input type="text" hidden  id="item_id" class="form-control">
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

                                                        <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-success add_item" disabled><i class="fa fa-cart-plus pr-1"></i><strong> Add Item</strong></button>

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
                                                        <strong><label>Transaction Type:</label></strong><label id="display_transaction"></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div id="div_payment_tin" style="display: none;" class="col-md-6 ">
                                                        <Strong><label>TIN *:</label></Strong>
                                                            <div class="input-group">
                                                                <input id="nic" name="nic" style="border-color: rgb(0, 0, 0);" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                                                <div class="input-group-append">
                                                                    {{-- <button style="border-color: rgb(0, 0, 0);" type="button" class="na btn btn-outline-secondary">N/A</button> --}}
                                                                    <button style="border-color: rgb(0, 0, 0);" type="button" class="incomplete btn btn-outline-secondary">PENDING</button>
                                                                </div>
                                                            </div>
                                                            <small class="form-text text-muted">Example : 123-456-789-000</small>
                                                    </div>
                                                    <div id="div_payment_atc1" style="display: none;" class="col-md-6 ">
                                                        <Strong><label>ATC 1 *:</label></Strong>
                                                        <select style="width:100%;" id="atcSelect1" data-placeholder='-- Select Product --' class="form-control"  name="product_name[]">
                                                            <option value=''>-- Select ATC --</option>
                                                            <option value='WI158'>WI158 1%</option>
                                                            <option value='WI640'>WI640 1%</option>
                                                            <option value='WC158'>WC158 1%</option>
                                                            <option value='WC640'>WC640 1%</option>
                                                        </select>
                                                    </div>
                                                    <div id="div_payment_blank" style="display: none;" class="col-md-6 ">

                                                    </div>
                                                    <div id="div_payment_atc2" style="display: none;" class="col-md-6 ">
                                                        <Strong><label>ATC 2 *:</label></Strong>
                                                        <select style="width:100%;" id="atcSelect2" data-placeholder='-- Select Product --' class="form-control"  name="product_name[]" {{-- disabled --}}>
                                                            <option value=''>-- Select ATC --</option>
                                                            <option value='WV010'>WV010 5%</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 ">

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">

                                                        <strong><label>Payment Type:</label></strong>
                                                        <input type="text" id="input_payment_method" class="text-uppercase form-control" hidden readonly>
                                                        <input type="text" id="input_payment_status" class="text-uppercase form-control" hidden readonly>

                                                        <select style="border-color: rgb(0, 0, 0);" id="payment_type" class="form-control" >
                                                            <option value=''>SELECT TRANSACTION TYPE</option>
                                                            <option value='value_cash'>CASH</option>
                                                            <option value='value_check'>CHECK</option>
                                                            <option value='value_debit'>CARD -> DEBIT</option>
                                                            <option value='value_credit'>CARD -> CREDIT</option>
                                                            <option value='value_gcash'>ONLINE PAYMENT -> GCASH</option>
                                                            <option value='value_paymaya'>ONLINE PAYMENT -> PAYMAYA</option>
                                                            <option value='value_deposit'>ONLINE PAYMENT -> DEPOSIT</option>
                                                            <option value='value_online_transfer'>ONLINE PAYMENT -> ONLINE BANK TRANSFER</option>
                                                            <option value='value_unpaid'>UNPAID</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="div_payment_type" style="display: none;">
                                                    <div class="row" >
                                                        <div id="div_terms" style="display: none;" class="col-md-3 mb-3">
                                                            <strong><label>Terms:</label></strong>
                                                            <select style="border-color: rgb(0, 0, 0);" id="input_new_terms" class="form-control" >
                                                                <option value=''>Select Days</option>
                                                                <option value='15'>15 Days</option>
                                                                <option value='30'>30 Days</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div id="div_check_number" style="display: block;" class="col-md-4 mb-3">
                                                            <Strong><label>Check Number *:</label></Strong>
                                                            <input type="text" id="input_check_number" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" >                       {{-- xxx --}}
                                                        </div>
                                                        <div id="div_bank" style="display: block;" class="col-md-4 mb-3">
                                                            <strong><label>Bank name*:</label></strong>
                                                            <select style="border-color: rgb(0, 0, 0);" id="input_bank" class="form-control" >
                                                                <option value=''>---Select Bank ---</option>
                                                                <option value='AUB (Asia United Bank Corporation)'>AUB (Asia United Bank Corporation)</option>
                                                                <option value='Banco De Oro (BDO Unibank, Inc.)'>Banco De Oro (BDO Unibank, Inc.)</option>
                                                                <option value='Bank of Commerce'>Bank of Commerce</option>
                                                                <option value='BPI (Bank of the Philippine Islands)'>BPI (Bank of the Philippine Islands)</option>
                                                                <option value='Chinabank (China Banking Corporation)'>Chinabank (China Banking Corporation)</option>
                                                                <option value='Citibank'>Citibank</option>
                                                                <option value='DBP (Development Bank of the Philippines)'>DBP (Development Bank of the Philippines)</option>
                                                                <option value='East West Banking Corporation'>East West Banking Corporation</option>
                                                                <option value='HSBC (The Hongkong and Shanghai Banking Corporation)'>HSBC (The Hongkong and Shanghai Banking Corporation)</option>
                                                                <option value='Landbank of the Philippines'>Landbank of the Philippines</option>
                                                                <option value='Maybank Philippines, Incorporated'>Maybank Philippines, Incorporated</option>
                                                                <option value='Metrobank Bank and Trust Company'>Metrobank Bank and Trust Company</option>
                                                                <option value='PBCOM (Philippine Bank of Communications)'>PBCOM (Philippine Bank of Communications)</option>
                                                                <option value='Philtrust Bank (Philippine Trust Company)'>Philtrust Bank (Philippine Trust Company)</option>
                                                                <option value='PNB (Philippine National Bank)'>PNB (Philippine National Bank)</option>
                                                                <option value='PS Bank'>PS Bank</option>
                                                                <option value='RCBC (Rizal Commercial Banking Corporation)'>RCBC (Rizal Commercial Banking Corporation)</option>
                                                                <option value='Robinsons Bank Corporation'>Robinsons Bank Corporation</option>
                                                                <option value='Security Bank Corporation'>Security Bank Corporation</option>
                                                                <option value='UCPB (United Coconut Planters Bank)'>UCPB (United Coconut Planters Bank)</option>
                                                                <option value='Unionbank of the Philippines'>Unionbank of the Philippines</option>
                                                                <option value='Veteransbank (Philippine Veterans Bank)'>Veteransbank (Philippine Veterans Bank)</option>
                                                                <option value='Other Bank'>--- Other Bank ---</option>
                                                            </select>
                                                        </div>
                                                        <div id="div_other_bank" style="display: none;" class="col-md-4 mb-3">
                                                            <strong><label>Bank Name *:</label></strong>
                                                            <div class="input-group">

                                                                <input id="input_other_bank" style="border-color: rgb(0, 0, 0);" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                                                <div class="input-group-append">
                                                                    <button style="border-color: rgb(0, 0, 0);" type="button" class="select_again btn btn-outline-secondary">Select</button>

                                                                </div>
                                                            </div>
                                                            <input type="text" id="input_other_bank_if_selected"  style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" readonly hidden>
                                                        </div>
                                                        <div id="div_check_date" style="display: block;" class="col-md-4 mb-3">
                                                            <strong><label>Check Date *:</label></strong>
                                                            <input id="input_check_date" type="date" style="border-color: rgb(0, 0, 0);" class="form-control" placeholder="MM/DD/YYYY">
                                                        </div>
                                                        <div id="div_reference_number" style="display: block;" class="col-md-4 mb-3">
                                                            <strong><label>Reference Number *:</label></strong>
                                                            <input id="input_ref" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                        </div>
                                                        <div id="div_account_name" style="display: block;" class="col-md-4 mb-3">
                                                            <strong><label>Account Name *:</label></strong>
                                                            <input id="input_account_name" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                        </div>
                                                    </div>

                                                </div>
                                                    <div class="row">
                                                        <div id="div_paid_amount" style="display: none;" class="col-md-4 mb-3">
                                                            <strong><label>Amount *:</label></strong>
                                                            
                                                            {{-- <div class="input-group-append">
                                                                <input type="number" id="paid_amount" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                                <button style="border-color: rgb(0, 0, 0);" type="button" id="max" class=" btn btn-outline-secondary">M A X</button>

                                                            </div> --}}
                                                            <div class="input-group">
                                                                <input type="number" id="paid_amount" style="border-color: rgb(0, 0, 0);" class="form-control" aria-label="Text input with segmented dropdown button">
                                                                <div class="input-group-append">
                                                                    <button style="border-color: rgb(0, 0, 0);" type="button" id="max" class=" btn btn-outline-secondary">MAX</button>
                                                                </div>
                                                            </div>
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

                                                <div class="row" id="div_sum" style="display: none">
                                                        <div class="col-sm-12">
                                                            <div class="card card-shadow mb-4">

                                                                    <ul class="list-group">
                                                                        <li id="div_total" class="list-group-item" style="display: block">
                                                                            Total Sales {{-- (VAT Inclusive) --}} :
                                                                            <ul >
                                                                                <p class="mb-1" ><h6 id="h4_total" class="alert-heading">{{--{{ $format = number_format($sell) }}--}}</h6></p>
                                                                            </ul>
                                                                        </li>
                                                                        <li id="div_net_of_vat" class="list-group-item" style="display: none">
                                                                            NET OF VAT :
                                                                            <ul>
                                                                                <p class="mb-1"><h6 id="h4_net_of_vat" class="alert-heading"></h6></p>
                                                                            </ul>
                                                                        </li>
                                                                        <li id="div_vat" class="list-group-item" style="display: none">
                                                                            VAT :
                                                                            <ul>
                                                                                <p class="mb-1"><h6 id="h4_vat" class="alert-heading"></h6></p>
                                                                            </ul>
                                                                        </li>
                                                                        <li id="div_vat_exempt_sales" class="list-group-item" style="display: none">
                                                                            VAT EXEMPT SALES:
                                                                            <ul>
                                                                                <p class="mb-1"><h6 id="h4_vat_exempt_sales" class="alert-heading"></h6></p>
                                                                            </ul>
                                                                        </li>

                                                                        <li id="div_discount" class="list-group-item" style="display: none">
                                                                            DISCOUNT:
                                                                            <ul>
                                                                                <p class="mb-1"><h6 id="h4_discount" class="alert-heading"></h6></p>
                                                                            </ul>

                                                                        </li>

                                                                        <li id="div_ewt" class="list-group-item" style="display: none">
                                                                            EWT :
                                                                            <ul>
                                                                                <p class="mb-1"><h6 id="ewt" class="alert-heading"></h6></p>
                                                                            </ul>

                                                                        </li>

                                                                        <li class="list-group-item">
                                                                            TOTAL AMOUNT DUE :
                                                                            <ul>
                                                                                <p class="mb-1"><h6 id="h4_final_total" class="alert-heading"></h6></p>
                                                                            </ul>

                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                        </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-1">

                                            <div class="col-md-6 mt-1">
<!--                                                <button id="other_payment" type="button" class="btn  shadow btn-sm btn-success"><i class="ti-wallet pr-2"></i>Other Payment</button>-->
                                            </div>

                                            <div class="card-body">
                                                <table id="show-hide" style="width:100%" class="display dt-init table table-bordered table-striped " cellspacing="0" {{-- id="data_table" class="table table-responsive" --}}>
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">ITEM STATUS</th>
                                                        <th scope="col">PRODUCT DESCRIPTION</th>
                                                        <th scope="col">EXPIRATION</th>
                                                        <th scope="col">LOT NO.</th>
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
            <div class="card-body">
                <div class="modal {{-- fade --}} bd-example-modal-lg" id="modalbodyforupdate" {{-- tabindex="-1" --}} role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Add Client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class=" col-md-12">
                                    <div class="mb-4">
                                                <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
                                                <div class="row">

                                                    <div class="form-group col-md-8 mb-3">
                                                        <label>Account Name:</label>
                                                        <input style="border-color: rgb(0, 0, 0);" type="text" id="client_account_name" class="text-uppercase form-control prod_price" placeholder="Account Name *" >
                                                    </div>

                                                    <div class="form-group col-md-4 mb-3">
                                                        <label>Account Type:</label>
                                                        <input style="border-color: rgb(0, 0, 0);" type="text" id="client_account_type" class="text-uppercase form-control prod_price" placeholder="Account Type *" readonly>
                                                    </div>

                                                    <div class="form-group col-md-12 mb-3">
                                                        <label>Address:</label>
                                                        <input style="border-color: rgb(0, 0, 0);" type="text" id="client_address" class="text-uppercase form-control prod_price" placeholder="Address *" >
                                                    </div>

                                                    <div id="div_client_contact_person" style="display: none" class="form-group col-md-4 mb-3">
                                                        <label>Contact Person :</label>
                                                        <input id="client_contact_person" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control prod_price" placeholder="Contact No. *" >
                                                    </div>

                                                    <div id="div_client_contact_no" style="display: none" class="form-group col-md-4 mb-3">
                                                        <label>Contact No.:</label>
                                                        <input id="client_contact_no" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control prod_price" placeholder="Contact No. *" >
                                                    </div>

                                                    <div id="div_client_email" style="display: none" class="form-group col-md-4 mb-3">
                                                        <label>Email:</label>
                                                        <input id="client_email" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control prod_price" placeholder="Email *" >
                                                    </div>

                                                    <div id="div_client_senior_id" style="display: none" class="form-group col-md-4 mb-3">
                                                        <label>Senior ID:</label>
                                                        <input id="client_senior_id" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control prod_price" placeholder="Senior ID *" >
                                                    </div>

                                                    <div id="div_client_pwd_id" style="display: none" class="form-group col-md-4 mb-3">
                                                        <label>Pwd ID:</label>
                                                        <input id="client_pwd_id" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control prod_price" placeholder="Pwd ID *" >
                                                    </div>

                                                    <div id="div_atc" style="display: block" class="form-group col-md-6 mb-3">
                                                        <Strong><label>ATC *:</label></Strong>
                                                        <select style="border-color: rgb(0, 0, 0);" style="width:100%;" id="atcModal" data-placeholder='-- Select ATC --' class="form-control">
                                                            <option value='default'>-- Select ATC --</option>
                                                            <option value='WI158'>WI158</option>
                                                            <option value='WI640'>WI640</option>
                                                            <option value='WC158'>WC158</option>
                                                            <option value='WC640'>WC640</option>
                                                        </select>
                                                    </div>

                                                    <div id="div_atc2" style="display: block" class="form-group col-md-6 mb-3">
                                                        <Strong><label>ATC 2 *:</label></Strong>
                                                        <select style="border-color: rgb(0, 0, 0);" style="width:100%;" id="atcModal2" data-placeholder='-- Select ATC --' class="form-control">
                                                            <option value='default'>-- Select ATC --</option>
                                                            <option value='WV010'>WV010</option>
                                                        </select>
                                                    </div>

                                                    <div id="div_tin" style="display: none" class="form-group col-md-6 mb-3">
                                                        <Strong><label>TIN *:</label></Strong>
                                                            <div class="input-group">
                                                                <input id="nic1" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                            </div>
                                                            <small class="form-text text-muted">Example : 123-456-789-000</small>
                                                    </div>

                                                </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button {{-- id="modalUpdate" --}} type="button" class="btn btn-success save_client">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
                MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
                MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
                MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
                <div class="modal {{-- fade --}} bd-example-modal-lg" id="modalbodyforpayment" {{-- tabindex="-1" --}} role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class=" col-md-12">
                                    <div class="mb-4">
                                                <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div id="div_third_modalpayment" class=" col-md-12" {{-- style="display: block; "--}}>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <Strong><label>Invoice no. *:</label></Strong>
                                                            <select style="width:100%;" id="invoiceSelect" data-placeholder='-- Search Invoice --' class="form-control"  name="product_name[]">
                                                                <option value='0'>-- Search Invoice # --</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-0">
                                                            <strong><label>Transaction Type:</label></strong>&nbsp;<u><label class="text-decoration: underline;"  id="display_transaction_modalpayment"></label></u>/<label class="text-decoration: underline;"  id="display_invoice_type"></label>
                                                        </div>
                                                        <div class="col-md-6 mb-0">
                                                            <strong><label>Invoice No.:</label></strong>&nbsp;<label id="display_invoice_no"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-0">
                                                            <strong><label>Account Name:</label></strong>&nbsp;<label id="display_client_name"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-0">
                                                            <strong><label>Total:</label></strong>&nbsp;<label id="display_total"></label>
                                                        </div>
                                                        <div class="col-md-6 mb-0">
                                                            <strong><label>Remaining balance:</label></strong>&nbsp;<label id="display_balance"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div id="div_tin_modalpayment" style="display: none;" class="col-md-6 mb-3">
                                                            <Strong><label>TIN *:</label></Strong>
                                                                {{-- <input type="text" class="form-control" style="border-color: rgb(0, 0, 0);" name="nic" id="nic"> --}}
                                                                <div class="input-group">
                                                                    <input id="nic_modalpayment" name="nic" style="border-color: rgb(0, 0, 0);" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                                                    <div class="input-group-append"><button style="border-color: rgb(0, 0, 0);" type="button" class="incomplete btn btn-outline-secondary">PENDING</button>
                                                                    </div>
                                                                </div>
                                                                <small class="form-text text-muted">Example : 123-456-789-000</small>
                                                        </div>
                                                        <div id="div_atc1_modalpayment" style="display: none;" class="col-md-3 mb-3">
                                                            <Strong><label>ATC 1 *:</label></Strong>
                                                            <select style="width:100%;" id="atcSelect1_modalpayment" class="form-control"  name="product_name[]">
                                                                <option value=''>-- Select ATC --</option>
                                                                <option value='WI158'>WI158 1%</option>
                                                                <option value='WI640'>WI640 1%</option>
                                                                <option value='WC158'>WC158 1%</option>
                                                                <option value='WC640'>WC640 1%</option>
                                                            </select>
                                                        </div>
                                                        <div id="div_atc2_modalpayment" style="display: none;" class="col-md-3 mb-3">
                                                            <Strong><label>ATC 2 *:</label></Strong>
                                                            <select style="width:100%;" id="atcSelect2_modalpayment" class="form-control"  name="product_name[]">
                                                                <option value=''>-- Select ATC --</option>
                                                                <option value='WV010'>WV010 5%</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6 mb-3">

                                                            <strong><label>Payment Type:</label></strong>
                                                            <input type="text" id="input_payment_method_modalpayment" class="text-uppercase form-control" hidden readonly>
                                                            <input type="text" id="input_payment_status_modalpayment" class="text-uppercase form-control" hidden readonly>

                                                            <select style="border-color: rgb(0, 0, 0);" id="payment_type_modalpayment" class="form-control" >
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

                                                    <div id="div_payment_type_modalpayment">
                                                        <div class="row" >
                                                            <label id="display_id" hidden></label>
                                                            <label id="display_transaction_id" hidden></label>
                                                            <div id="div_check_number_modalpayment" style="display: none;" class="col-md-4 mb-3">
                                                                <Strong><label>Check Number *:</label></Strong>
                                                                <input type="text" id="input_check_number_modalpayment" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" >                       {{-- xxx --}}
                                                            </div>
                                                            <div id="div_bank_modalpayment" style="display: none;" class="col-md-4 mb-3">
                                                                <strong><label>Bank *:</label></strong>
                                                                <!-- <input type="text" id="input_bank"  style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" > -->
                                                                <select style="border-color: rgb(0, 0, 0);" id="input_bank_modalpayment" class="form-control" >
                                                                    <option value=''>---Select Bank ---</option>
                                                                    <option value='AUB (Asia United Bank Corporation)'>AUB (Asia United Bank Corporation)</option>
                                                                    <option value='Banco De Oro (BDO Unibank, Inc.)'>Banco De Oro (BDO Unibank, Inc.)</option>
                                                                    <option value='Bank of Commerce'>Bank of Commerce</option>
                                                                    <option value='BPI (Bank of the Philippine Islands)'>BPI (Bank of the Philippine Islands)</option>
                                                                    <option value='Chinabank (China Banking Corporation)'>Chinabank (China Banking Corporation)</option>
                                                                    <option value='Citibank'>Citibank</option>
                                                                    <option value='DBP (Development Bank of the Philippines)'>DBP (Development Bank of the Philippines)</option>
                                                                    <option value='East West Banking Corporation'>East West Banking Corporation</option>
                                                                    <option value='HSBC (The Hongkong and Shanghai Banking Corporation)'>HSBC (The Hongkong and Shanghai Banking Corporation)</option>
                                                                    <option value='Landbank of the Philippines'>Landbank of the Philippines</option>
                                                                    <option value='Maybank Philippines, Incorporated'>Maybank Philippines, Incorporated</option>
                                                                    <option value='Metrobank Bank and Trust Company'>Metrobank Bank and Trust Company</option>
                                                                    <option value='PBCOM (Philippine Bank of Communications)'>PBCOM (Philippine Bank of Communications)</option>
                                                                    <option value='Philtrust Bank (Philippine Trust Company)'>Philtrust Bank (Philippine Trust Company)</option>
                                                                    <option value='PNB (Philippine National Bank)'>PNB (Philippine National Bank)</option>
                                                                    <option value='PS Bank'>PS Bank</option>
                                                                    <option value='RCBC (Rizal Commercial Banking Corporation)'>RCBC (Rizal Commercial Banking Corporation)</option>
                                                                    <option value='Robinsons Bank Corporation'>Robinsons Bank Corporation</option>
                                                                    <option value='Security Bank Corporation'>Security Bank Corporation</option>
                                                                    <option value='UCPB (United Coconut Planters Bank)'>UCPB (United Coconut Planters Bank)</option>
                                                                    <option value='Unionbank of the Philippines'>Unionbank of the Philippines</option>
                                                                    <option value='Veteransbank (Philippine Veterans Bank)'>Veteransbank (Philippine Veterans Bank)</option>
                                                                    <option value='Other Bank'>--- Other Bank ---</option>
                                                                </select>
                                                            </div>
                                                            <div id="div_other_bank_modalpayment" style="display: none;" class="col-md-4 mb-3">
                                                                <strong><label>Bank Name *:</label></strong>
                                                                <div class="input-group">
                                                                    <input id="input_other_bank_modalpayment" style="border-color: rgb(0, 0, 0);" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                                                    <div class="input-group-append">
                                                                        <button style="border-color: rgb(0, 0, 0);" type="button" class="select_again btn btn-outline-secondary">Select</button>
                                                                    </div>
                                                                </div>

                                                                <input type="text" id="input_other_bank_if_selected_modalpayment"  style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" readonly hidden>
                                                            </div>
                                                            <div id="div_check_date_modalpayment" style="display: none;" class="col-md-4 mb-3">
                                                                <strong><label>Check Date *:</label></strong>
                                                                <input id="input_check_date_modalpayment" type="date" style="border-color: rgb(0, 0, 0);" class="form-control" placeholder="MM/DD/YYYY">
                                                            </div>
                                                            <div id="div_reference_number_modalpayment" style="display: none;" class="col-md-4 mb-3">
                                                                <strong><label>Reference Number *:</label></strong>
                                                                <input id="input_ref_modalpayment" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                            </div>
                                                            <div id="div_account_name_modalpayment" style="display: none;" class="col-md-4 mb-3">
                                                                <strong><label>Account Name *:</label></strong>
                                                                <input id="input_account_name_modalpayment" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                            </div>

                                                        </div>
                                                        <div class="row" >
                                                            <div id="div_amount_modalpayment" style="display: none;" class="col-md-4 mb-3">
                                                                <strong><label>Amount *:</label></strong>
                                                                <input id="input_amount_modalpayment" type="number" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>


                                                </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="save_payment" type="button" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            </main>
        </div>
</div>
<script type="text/javascript">
                    $(document).on('click','#max',function () {
                        
                        var max = $("#h4_final_total").text();
                        $("#paid_amount").val(max);
                        /* alert(max); */
                    });

                    $(document).on('click','#save_payment',function () {

                        var formData = new FormData();
                        var token= $('#_token').val();
                        formData.append("id", $("#display_id").text());
                        formData.append("transaction_id", $("#display_transaction_id").text());
                        formData.append("display_client_name", $("#display_client_name").text());
                        formData.append("display_invoice_no", $("#display_invoice_no").text());
                        formData.append("display_transaction", $("#display_transaction").text());
                        formData.append("display_total", $("#display_total").text());
                        formData.append("display_balance", $("#display_balance").text());
                        formData.append("payment_type", $("#payment_type_modalpayment").val());
                        formData.append("input_check_number", $("#input_check_number_modalpayment").val());
                        formData.append("input_bank", $("#input_bank_modalpayment").val());
                        formData.append("input_check_date", $("#input_check_date_modalpayment").val());
                        formData.append("input_ref", $("#input_ref_modalpayment").val());
                        formData.append("input_account_name", $("#input_account_name_modalpayment").val());
                        formData.append("input_amount", $("#input_amount_modalpayment").val());
                        formData.append("input_payment_method", $("#input_payment_method_modalpayment").val());
                        formData.append("input_payment_status", $("#input_payment_status_modalpayment").val());
                        formData.append("display_invoice_type", $("#display_invoice_type").text());
                        formData.append("input_other_bank", $("#input_other_bank_modalpayment").val());
                        formData.append("tin", $("#nic_modalpayment").val());
                        formData.append("atcSelect1", $("#atcSelect1_modalpayment").val());
                        formData.append("atcSelect2", $("#atcSelect2_modalpayment").val());



                        formData.append('_token', token);

                            $.ajax({
                                url: 'updatePayment',
                                type: 'POST',
                                data: formData,
                                processing: true,
                                serverSide: true,
                                contentType: false,
                                processData: false,
                                beforeSend: function () {
                                    $('.send-loading').show();
                                },
                                success: function (response) {

                                    if(response.message !="err"){
                                        toastr.success(response.title);
                                        $('#modalbodyforpayment').modal('hide');
                                        var table = $('#show-hide').DataTable();
                                        table.ajax.reload();

                                    }/* if(response!="err"){
                                        toastr.warning(response.title);
                                    } */
                                    else{

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


                    var transactionselect_modalpayment = '#payment_type_modalpayment';
                    $(document).on('change',transactionselect_modalpayment,function () {

                    var type=$(this).val();
                    console.log(type)
                    $.ajax({
                        type:'get',
                        url:'{{ url('storefindTotalPrice') }}',
                        data:{'type':type},
                        dataType:'json',//return data will be json
                        success:function(data){
                            if(type === ''){

                                document.getElementById("div_check_number_modalpayment").style.display = "none";
                                document.getElementById("div_bank_modalpayment").style.display = "none";
                                document.getElementById("div_check_date_modalpayment").style.display = "none";
                                document.getElementById("div_reference_number_modalpayment").style.display = "none";
                                document.getElementById("div_account_name_modalpayment").style.display = "none";
                                document.getElementById("div_amount_modalpayment").style.display = "none";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();
                           }
                            if(type === 'value_cash'){

                                $('#input_payment_method_modalpayment').val('CASH');
                                $('#input_payment_status_modalpayment').val('');
                                document.getElementById("div_check_number_modalpayment").style.display = "none";
                                document.getElementById("div_bank_modalpayment").style.display = "none";
                                document.getElementById("div_check_date_modalpayment").style.display = "none";
                                document.getElementById("div_reference_number_modalpayment").style.display = "none";
                                document.getElementById("div_account_name_modalpayment").style.display = "none";
                                document.getElementById("div_amount_modalpayment").style.display = "block";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();

                           }
                            if(type === 'value_check'){

                                $('#input_payment_method_modalpayment').val('CHECK');
                                $('#input_payment_status_modalpayment').val('');
                                document.getElementById("div_check_number_modalpayment").style.display = "block";
                                document.getElementById("div_bank_modalpayment").style.display = "block";
                                document.getElementById("div_check_date_modalpayment").style.display = "block";
                                document.getElementById("div_reference_number_modalpayment").style.display = "none";
                                document.getElementById("div_account_name_modalpayment").style.display = "none";
                                document.getElementById("div_amount_modalpayment").style.display = "block";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();

                            }if(type === 'value_debit'){

                                $('#input_payment_method_modalpayment').val('CARD');
                                $('#input_payment_status_modalpayment').val('DEBIT');
                                document.getElementById("div_check_number_modalpayment").style.display = "none";
                                document.getElementById("div_bank_modalpayment").style.display = "block";
                                document.getElementById("div_check_date_modalpayment").style.display = "none";
                                document.getElementById("div_reference_number_modalpayment").style.display = "none";
                                document.getElementById("div_account_name_modalpayment").style.display = "block";
                                document.getElementById("div_amount_modalpayment").style.display = "block";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();

                            }if(type === 'value_credit'){

                                $('#input_payment_method_modalpayment').val('CARD');
                                $('#input_payment_status_modalpayment').val('CREDIT');
                                document.getElementById("div_check_number_modalpayment").style.display = "none";
                                document.getElementById("div_bank_modalpayment").style.display = "block";
                                document.getElementById("div_check_date_modalpayment").style.display = "none";
                                document.getElementById("div_reference_number_modalpayment").style.display = "none";
                                document.getElementById("div_account_name_modalpayment").style.display = "block";
                                document.getElementById("div_amount_modalpayment").style.display = "block";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();

                            }if(type === 'value_gcash'){

                                $('#input_payment_method_modalpayment').val('GCASH');
                                $('#input_payment_status_modalpayment').val('DEBIT');
                                document.getElementById("div_check_number_modalpayment").style.display = "none";
                                document.getElementById("div_bank_modalpayment").style.display = "none";
                                document.getElementById("div_check_date_modalpayment").style.display = "none";
                                document.getElementById("div_reference_number_modalpayment").style.display = "block";
                                document.getElementById("div_account_name_modalpayment").style.display = "block";
                                document.getElementById("div_amount_modalpayment").style.display = "block";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();

                            }if(type === 'value_paymaya'){

                                $('#input_payment_method_modalpayment').val('PAYMAYA');
                                $('#input_payment_status_modalpayment').val('DEBIT');
                                document.getElementById("div_check_number_modalpayment").style.display = "none";
                                document.getElementById("div_bank_modalpayment").style.display = "none";
                                document.getElementById("div_check_date_modalpayment").style.display = "none";
                                document.getElementById("div_reference_number_modalpayment").style.display = "block";
                                document.getElementById("div_account_name_modalpayment").style.display = "block";
                                document.getElementById("div_amount_modalpayment").style.display = "block";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();

                            }if(type === 'value_deposit'){

                                $('#input_payment_method_modalpayment').val('DEPOSIT');
                                $('#input_payment_status_modalpayment').val('DEBIT');
                                document.getElementById("div_check_number_modalpayment").style.display = "none";
                                document.getElementById("div_bank_modalpayment").style.display = "block";
                                document.getElementById("div_check_date_modalpayment").style.display = "none";
                                document.getElementById("div_reference_number_modalpayment").style.display = "block";
                                document.getElementById("div_account_name_modalpayment").style.display = "block";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();

                            }if(type === 'value_online_transfer'){

                                $('#input_payment_method_modalpayment').val('ONLINE BANK TRANSFER');
                                $('#input_payment_status_modalpayment').val('DEBIT');
                                document.getElementById("div_check_number_modalpayment").style.display = "none";
                                document.getElementById("div_bank_modalpayment").style.display = "block";
                                document.getElementById("div_check_date_modalpayment").style.display = "none";
                                document.getElementById("div_reference_number_modalpayment").style.display = "block";
                                document.getElementById("div_account_name_modalpayment").style.display = "block";
                                document.getElementById("div_amount_modalpayment").style.display = "block";
                                document.getElementById("div_other_bank_modalpayment").style.display = "none";
                                document.getElementById("input_other_bank_modalpayment").style.display = "none";
                                null_last_page_modalpayment ();

                            }
                        },
                        error:function(){

                        }
                    });
                });
                $(document).on('click','#first_to_second',function () {

                        var formData = new FormData();
                        var token= $('#_token').val();
                        formData.append("input_transaction", $("#input_transaction").val());
                        formData.append("input_invoice", $("#input_invoice").val());
                        formData.append('_token', token);

                            $.ajax({

                            url: 'checkInvoice',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            beforeSend: function () {

                                $(".save_client").prop('disabled', true);

                            },
                            success: function (response) {

                                if(response!="err"){

                                    if(response.message == 'err'){

                                        toastr.warning(response.title);
                                        $(".save_client").prop('disabled', false);
                                    }
                                    if(response.message != 'err'){

                                        var ifnull_transaction_type = $('#transaction_type').val();
                                        var a = $('#input_senior').val();
                                        var b = $('#input_invoice').val();
                                        var c = $('#input_accountname').val();
                                        var d = $('#input_transaction_date').val();
                                        var e = $('#input_address').val();

                                        if(ifnull_transaction_type === ''){

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

                                        }if(ifnull_transaction_type === 'dr_private'){


                                            if(b && c && d && e != ''){

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
                                        }if(ifnull_transaction_type === 'dr_government'){
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


    });
 /* ---------------------------------------------------------SAVE CLIENT UPDATE STARTTTTTT---------------------------------------------------------- */
 $(document).on('click','.save_client',function () {
        var formData = new FormData();
        var token= $('#_token').val();
        formData.append("client_account_type", $("#input_transaction_type").val());
        formData.append("client_account_name", $("#client_account_name").val());
        formData.append("client_address", $("#client_address").val());
        formData.append("client_contact_no", $("#client_contact_no").val());
        formData.append("client_contact_person", $("#client_contact_person").val());
        formData.append("client_email", $("#client_email").val());
        formData.append("client_senior_id", $("#client_senior_id").val());
        formData.append("client_pwd_id", $("#client_pwd_id").val());
        /*formData.append("nic1", $("#nic1").val());
        formData.append("atcSelect", $("#atcModal").val());
        formData.append("atcSelect2", $("#atcModal2").val());*/

        formData.append('_token', token);

                $.ajax({

                url: 'store-save-client',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {

                    $(".save_client").prop('disabled', true);

                },
                success: function (response) {

                    if(response!="err"){

                        if(response.message == 'err'){
                            toastr.warning(response.title);

                            $(".save_client").prop('disabled', false);
                        }
                        if(response.message != 'err'){
                            toastr.success(response.title);
                            $('#atcModal').prop('selectedIndex','default');
                            $('#atcModal2').prop('selectedIndex','default');
                            $("#client_account_name").val('');
                            $("#client_address").val('');
                            $("#client_contact_no").val('');
                            $("#client_contact_person").val('');
                            $("#client_email").val('');
                            $("#client_senior_id").val('');
                            $("#client_pwd_id").val('');
                            $("#nic1").val('');
                            $(".save_client").prop('disabled', false);
                            $('#modalbodyforupdate').modal('hide');
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


    });
        /* ---------------------------------------------------------SAVE CLIENT UPDATE ENDDDDD---------------------------------------------------------- */

            $(document).on('click','.add_client',function (e) {
                var value_of_transaction_type = $('#input_transaction_type').val()
                $('#client_account_type').val(value_of_transaction_type);
                var client_type = $('#client_account_type').val();
                /*alert(client_type);*/
                if (client_type === 'REGULAR'){

                    document.getElementById("div_client_contact_person").style.display = "none";
                    document.getElementById("div_client_contact_no").style.display = "none";
                    document.getElementById("div_client_email").style.display = "none";
                    document.getElementById("div_client_senior_id").style.display = "none";
                    document.getElementById("div_client_pwd_id").style.display = "none";
                    document.getElementById("div_tin").style.display = "none";
                    document.getElementById("div_atc").style.display = "none";
                    document.getElementById("div_atc2").style.display = "none";

                }
                if (client_type === 'SENIOR'){

                    document.getElementById("div_client_contact_person").style.display = "none";
                    document.getElementById("div_client_contact_no").style.display = "block";
                    document.getElementById("div_client_email").style.display = "block";
                    document.getElementById("div_client_senior_id").style.display = "block";
                    document.getElementById("div_client_pwd_id").style.display = "none";
                    document.getElementById("div_tin").style.display = "none";
                    document.getElementById("div_atc").style.display = "none";
                    document.getElementById("div_atc2").style.display = "none";

                }
                if (client_type === 'PWD'){

                    document.getElementById("div_client_contact_person").style.display = "none";
                    document.getElementById("div_client_contact_no").style.display = "block";
                    document.getElementById("div_client_email").style.display = "block";
                    document.getElementById("div_client_senior_id").style.display = "none";
                    document.getElementById("div_client_pwd_id").style.display = "block";
                    document.getElementById("div_tin").style.display = "none";
                    document.getElementById("div_atc").style.display = "none";
                    document.getElementById("div_atc2").style.display = "none";

                }
                if (client_type === 'PRIVATE'){

                    document.getElementById("div_client_contact_person").style.display = "block";
                    document.getElementById("div_client_contact_no").style.display = "block";
                    document.getElementById("div_client_email").style.display = "block";
                    document.getElementById("div_client_senior_id").style.display = "none";
                    document.getElementById("div_client_pwd_id").style.display = "none";
                    document.getElementById("div_tin").style.display = "block";
                    document.getElementById("div_atc").style.display = "block";
                    document.getElementById("div_atc2").style.display = "none";

                }
                if (client_type === 'GOVERNMENT'){

                    document.getElementById("div_client_contact_person").style.display = "block";
                    document.getElementById("div_client_contact_no").style.display = "block";
                    document.getElementById("div_client_email").style.display = "block";
                    document.getElementById("div_client_senior_id").style.display = "none";
                    document.getElementById("div_client_pwd_id").style.display = "none";
                    document.getElementById("div_tin").style.display = "block";
                    document.getElementById("div_atc").style.display = "block";
                    document.getElementById("div_atc2").style.display = "block";

                }


                $('#modalbodyforupdate').modal("show");
                /* alert(client_type); */
            });

            $(document).on('click','#other_payment',function (e) {

                $('#nic_modalpayment').val('');
                $('#atcSelect1_modalpayment').val('');
                $('#atcSelect2_modalpayment').val('');
                $('#input_amount_modalpayment').val('');
                $('#input_check_number_modalpayment').val('');
                $('#input_bank_modalpayment').val('');
                $('#input_other_bank_modalpayment').val('');
                $('#input_check_date_modalpayment').val('');
                $('#input_account_name_modalpayment').val('');
                $('#input_ref_modalpayment').val('');
                $('#payment_type_modalpayment').val('');

                document.getElementById("div_check_number_modalpayment").style.display = "none";
                document.getElementById("div_bank_modalpayment").style.display = "none";
                document.getElementById("div_check_date_modalpayment").style.display = "none";
                document.getElementById("div_reference_number_modalpayment").style.display = "none";
                document.getElementById("div_account_name_modalpayment").style.display = "none";
                document.getElementById("div_amount_modalpayment").style.display = "none";
                document.getElementById("div_other_bank_modalpayment").style.display = "none";

                $('#modalbodyforpayment').modal("show");

            });

            /////////////////////////////////////////////////////////////////////////////////////////////////////////change atc
            //working code for computation


                    //working code for computation
                    var transactionselect = '#transaction_type';
                    $(document).on('change',transactionselect,function () {
                        $("#clientSelect").select2().select2("val", null);
                        $("#clientSelect").select2().select2("val", '-- Select Client --');
                        /*refresh_select_client();*/
                    var type=$(this).val();

                    /* console.log(type + 'type is'); */
                    $.ajax({
                        type:'get',
                        url:'{{ url('storefindTotalPrice') }}',
                        data:{'type':type/* ,'type2':type */},
                        dataType:'json',//return data will be json
                        success:function(data){

                            if(type === ''){
                                // refresh_select_client();
                                refresh_select_client();
                                null_all();
                                hide_all();

                                document.getElementById("div_transaction_information_content").style.display = "none";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_payment_tin").style.display = "none";
                                document.getElementById("div_payment_atc1").style.display = "none";
                                document.getElementById("div_payment_blank").style.display = "none";
                                document.getElementById("div_payment_atc2").style.display = "none";



                            }
                             if(type === 'si_regular'){

                               null_all();
                               $('#input_transaction').val('SALES INVOICE');
                               $('#input_transaction_type').val('REGULAR');
                               $('#label_transaction_number').text('Sales Invoice # *:');

                               refresh_select_client();
                               hide_all();
                               document.getElementById("div_total").style.display = "block";
                               document.getElementById("div_vat").style.display = "block";
                               document.getElementById("div_net_of_vat").style.display = "block";

                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "none";
                               document.getElementById("div_custom_price").style.display = "block";
                               $('#custom_price').val('');

                               document.getElementById("div_next_second_to_third").style.display = "block";
                               document.getElementById("div_payment_tin").style.display = "none";
                               document.getElementById("div_payment_atc1").style.display = "none";
                               document.getElementById("div_payment_blank").style.display = "none";
                               document.getElementById("div_payment_atc2").style.display = "none";

                                $('#h4_total').val(data.original_total);

                                var total = parseFloat($("#h4_total").val());
                                var formula = 1.12;
                                var vatformula = 0.12;

                                var netofvat = total / formula;
                                var vat = netofvat * vatformula;

                                /* console.log(netofvat);
                                console.log(vat);
                                console.log(total); */

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

                                refresh_select_client();


                               hide_all();
                               document.getElementById("div_vat_exempt_sales").style.display = "block";
                               document.getElementById("div_discount").style.display = "block";
                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "block";
                               document.getElementById("div_next_second_to_third").style.display = "block";
                               /* document.getElementById("div_custom_price").style.display = "none"; */
                               document.getElementById("div_custom_price").style.display = "block";
                               document.getElementById("div_payment_tin").style.display = "none";
                               document.getElementById("div_payment_atc1").style.display = "none";
                               document.getElementById("div_payment_blank").style.display = "none";
                               document.getElementById("div_payment_atc2").style.display = "none";
                               $('#custom_price').val('');
                               $('#h4_total').val(data.original_total); //to be replaced

                                var total = parseFloat($("#h4_total").val());
                                /* console.log(total); */

                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                /* console.log(formula);
                                console.log(vatformula);
                                console.log(discountformula);
                                console.log(total); */

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

                                refresh_select_client();


                               hide_all();
                               document.getElementById("div_vat_exempt_sales").style.display = "block";
                               document.getElementById("div_discount").style.display = "block";
                               document.getElementById("div_transaction_information_content").style.display = "block";
                               document.getElementById("div_senior_and_pwd").style.display = "block";
                               document.getElementById("div_next_second_to_third").style.display = "block";
                               /* document.getElementById("div_custom_price").style.display = "none"; */
                               document.getElementById("div_custom_price").style.display = "block";
                               document.getElementById("div_payment_tin").style.display = "none";
                               document.getElementById("div_payment_atc1").style.display = "none";
                               document.getElementById("div_payment_blank").style.display = "none";
                               document.getElementById("div_payment_atc2").style.display = "none";
                               $('#custom_price').val('');
                               $('#h4_total').val(data.original_total); //to be replaced

                                var total = parseFloat($("#h4_total").val());
                                /* console.log(total); */ //to be replaced


                                var formula = 1.12;
                                var vatformula = 0.12;
                                var discountformula = 0.20;

                                var vatexemptsales = total / formula;
                                var discount = vatexemptsales * discountformula;
                                var finaltotal = vatexemptsales - discount;

                                /* console.log(formula);
                                console.log(vatformula);
                                console.log(discountformula);
                                console.log(total); */

                                $('#h4_vat_exempt_sales').text(parseFloat(vatexemptsales).toFixed(2));
                                $('#h4_discount').text(parseFloat(discount).toFixed(2));
                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                            }if(type === 'dr_private'){

                                null_all();
                                $('#input_transaction').val('DELIVERY RECIEPT');
                                $('#input_transaction_type').val('PRIVATE');
                                $('#label_transaction_number').text('Delivery Reciept # *:');

                                refresh_select_client();

                                hide_all();

                                document.getElementById("div_ewt").style.display = "block";
                                document.getElementById("div_vat").style.display = "block";
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                /* document.getElementById("div_custom_price").style.display = "none"; */
                                document.getElementById("div_custom_price").style.display = "block";
                                document.getElementById("div_payment_tin").style.display = "block";
                                document.getElementById("div_payment_atc1").style.display = "block";
                                document.getElementById("div_payment_blank").style.display = "block";
                                document.getElementById("div_payment_atc2").style.display = "none";
                                $('#custom_price').val('');
                                $('#h4_total').text(data.original_total)

                                var total = parseFloat($('#h4_total').text());
                                var vat = total / 1.12 * 0.12;
                                var ewt = total / 1.12 * 0.01;
                                var finaltotal = total - ewt;

                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#h4_vat').text(parseFloat(vat).toFixed(2));
                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(total).toFixed(2));

                            }if(type === 'si_private'){

                                null_all();
                                $('#input_transaction').val('SALES INVOICE');
                                $('#input_transaction_type').val('PRIVATE');
                                $('#label_transaction_number').text('Sales Invoice # *:');

                                refresh_select_client();

                                hide_all();

                                document.getElementById("div_ewt").style.display = "block";
                                document.getElementById("div_vat").style.display = "block";
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                /* document.getElementById("div_custom_price").style.display = "none"; */
                                document.getElementById("div_custom_price").style.display = "block";
                                document.getElementById("div_payment_tin").style.display = "block";
                                document.getElementById("div_payment_atc1").style.display = "block";
                                document.getElementById("div_payment_blank").style.display = "block";
                                document.getElementById("div_payment_atc2").style.display = "none";
                                $('#custom_price').val('');
                                $('#h4_total').text(data.original_total)
                                // try lang
                                var total = parseFloat($('#h4_total').text());
                                var vat = total / 1.12 * 0.12;
                                var ewt = total / 1.12 * 0.01;
                                var finaltotal = total - ewt;

                                $('#ewt').text(parseFloat(ewt).toFixed(2));
                                $('#h4_vat').text(parseFloat(vat).toFixed(2));
                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(total).toFixed(2));

                            }if(type === 'si_government'){

                                null_all();
                                $('#input_transaction').val('SALES INVOICE');
                                $('#input_transaction_type').val('GOVERNMENT');
                                $('#label_transaction_number').text('Sales Invoice # *:');

                                refresh_select_client();

                                hide_all();

                                document.getElementById("div_vat").style.display = "block";
                                document.getElementById("div_ewt").style.display = "block";
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                /* document.getElementById("div_custom_price").style.display = "none"; */
                                document.getElementById("div_custom_price").style.display = "block";
                                document.getElementById("div_payment_tin").style.display = "block";
                                document.getElementById("div_payment_atc1").style.display = "block";
                                document.getElementById("div_payment_blank").style.display = "block";
                                document.getElementById("div_payment_atc2").style.display = "block";
                                $('#custom_price').val('');
                                $('#h4_total').val(data.original_total)
                                var total = parseInt($("#h4_total").val());
                                var ewtformula = 0.06;
                                /* var vatformula = 0.05; */

                                var ewt = total * ewtformula / 1.12;
                                var vat = total / 1.12 *0.12;
                                /*var finaltotal = total - ewt;*/
                                var finaltotal = total;
                                $('#h4_vat').text(parseFloat(vat).toFixed(2));
                                $('#ewt').text(parseFloat(ewt).toFixed(2));

                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(total).toFixed(2));

                            }if(type === 'dr_government'){

                                null_all();
                                $('#input_transaction').val('DELIVERY RECIEPT');
                                $('#input_transaction_type').val('GOVERNMENT');
                                $('#label_transaction_number').text('Delivery Reciept # *:');
                                refresh_select_client();

                                hide_all();

                                document.getElementById("div_vat").style.display = "block";
                                document.getElementById("div_ewt").style.display = "block";
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                /* document.getElementById("div_custom_price").style.display = "none"; */
                                document.getElementById("div_custom_price").style.display = "block";
                                document.getElementById("div_payment_tin").style.display = "block";
                                document.getElementById("div_payment_atc1").style.display = "block";
                                document.getElementById("div_payment_blank").style.display = "block";
                                document.getElementById("div_payment_atc2").style.display = "block";
                                $('#custom_price').val('');
                                $('#h4_total').val(data.original_total)
                                var total = parseInt($("#h4_total").val());
                                var ewtformula = 0.06;
                                /* var vatformula = 0.05; */

                                var ewt = total * ewtformula / 1.12;
                                var vat = total / 1.12 *0.12;
                                /*var finaltotal = total - ewt;*/
                                var finaltotal = total;
                                $('#h4_vat').text(parseFloat(vat).toFixed(2));
                                $('#ewt').text(parseFloat(ewt).toFixed(2));

                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(total).toFixed(2));

                            }/* if(type === 'dr_'){
                                null_all();
                                hide_all();
                                $('#input_transaction').val('DELIVERY RECIEPT');
                                $('#input_transaction_type').val('PRIVATE');
                                refresh_select_client();
                                $('#label_transaction_number').text('Delivery Reciept # *:');
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                document.getElementById("div_custom_price").style.display = "none";
                                document.getElementById("div_payment_tin").style.display = "block";
                                document.getElementById("div_payment_atc1").style.display = "block";
                                document.getElementById("div_payment_blank").style.display = "block";
                                document.getElementById("div_payment_atc2").style.display = "none";
                                $('#custom_price').val('');
                                $('#h4_final_total').val(data.original_total);//to be replaced
                                var finaltotal = parseInt($("#h4_final_total").val());
                                $('#h4_final_total').text(parseFloat(data.original_total).toFixed(2));

                            } */if(type === 'of_'){
                                null_all();
                                $('#input_transaction').val('ORDER FORM');
                                $('#input_transaction_type').val('REGULAR');
                                $('#label_transaction_number').text('Order Form # *:');
                                refresh_select_client();

                                hide_all();

                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                /* document.getElementById("div_custom_price").style.display = "none"; */
                                document.getElementById("div_custom_price").style.display = "block";
                                document.getElementById("div_payment_tin").style.display = "none";
                                document.getElementById("div_payment_atc1").style.display = "none";
                                document.getElementById("div_payment_blank").style.display = "none";
                                document.getElementById("div_payment_atc2").style.display = "none";
                                $('#custom_price').val('');
                                $('#h4_total').text(data.original_total)//working on this
                                $('#h4_final_total').val(data.original_total);//to be replaced
                                var finaltotal = parseInt($("#h4_final_total").val());
                                $('#h4_final_total').text(parseFloat(data.original_total).toFixed(2));

                            }/* if(type === 'of_private'){
                                null_all();
                                hide_all();
                                $('#input_transaction').val('ORDER FORM');
                                $('#input_transaction_type').val('PRIVATE');
                                refresh_select_client();
                                $('#label_transaction_number').text('Order Form # *:');
                                document.getElementById("div_transaction_information_content").style.display = "block";
                                document.getElementById("div_senior_and_pwd").style.display = "none";
                                document.getElementById("div_next_second_to_third").style.display = "block";
                                document.getElementById("div_custom_price").style.display = "none";
                                document.getElementById("div_payment_tin").style.display = "block";
                                document.getElementById("div_payment_atc1").style.display = "block";
                                document.getElementById("div_payment_blank").style.display = "block";
                                document.getElementById("div_payment_atc2").style.display = "none";
                                $('#custom_price').val('');
                                $('#h4_final_total').val(data.original_total);//to be replaced
                                var finaltotal = parseInt($("#h4_final_total").val());
                                $('#h4_final_total').text(parseFloat(data.original_total).toFixed(2));

                            } */
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
                    /* console.log(type); */
                    $('#input_payment_method').val('');
                    $('#input_payment_status').val('');
                    //emptyinput();
                    //emptylabel();

                            if(type === ''){

                                document.getElementById("div_payment_type").style.display = "none";
                                document.getElementById("div_terms").style.display = "none";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_paid_amount").style.display = "none";
                                null_last_page ();

                           }
                            if(type === 'value_cash'){

                               $('#input_payment_method').val('CASH');
                               $('#input_payment_status').val('');
                               document.getElementById("div_payment_type").style.display = "none";
                               document.getElementById("div_account_name").style.display = "none";
                               document.getElementById("div_terms").style.display = "none";
                               document.getElementById("div_paid_amount").style.display = "block";
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
                               document.getElementById("div_terms").style.display = "none";
                               document.getElementById("div_other_bank").style.display = "none";
                               document.getElementById("div_paid_amount").style.display = "block";

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
                               document.getElementById("div_terms").style.display = "none";
                               document.getElementById("div_other_bank").style.display = "none";
                               document.getElementById("div_paid_amount").style.display = "block";
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
                               document.getElementById("div_terms").style.display = "none";
                               document.getElementById("div_other_bank").style.display = "none";
                               document.getElementById("div_paid_amount").style.display = "block";
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
                               document.getElementById("div_terms").style.display = "none";
                               document.getElementById("div_other_bank").style.display = "none";
                               document.getElementById("div_paid_amount").style.display = "block";

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
                               document.getElementById("div_terms").style.display = "none";
                               document.getElementById("div_other_bank").style.display = "none";
                               document.getElementById("div_paid_amount").style.display = "block";

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
                               document.getElementById("div_terms").style.display = "none";
                               document.getElementById("div_other_bank").style.display = "none";
                               document.getElementById("div_paid_amount").style.display = "block";

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
                               document.getElementById("div_terms").style.display = "none";
                               document.getElementById("div_other_bank").style.display = "none";
                               document.getElementById("div_paid_amount").style.display = "block";
                               null_last_page ();
                            }if(type === 'value_unpaid'){
                                $('#input_payment_method').val('UNPAID');
                                $('#input_payment_status').val('CREDIT');
                                $('#paid_amount').val('');
                                document.getElementById("div_payment_type").style.display = "block";
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "none";
                                document.getElementById("div_terms").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_paid_amount").style.display = "none";
                                null_last_page ();
                                }



                });
                var inputbank = '#input_bank';
                    $(document).on('change',inputbank,function () {

                    var type=$(this).val();
                    /* console.log(type); */

                        if(type === 'Other Bank'){

                            document.getElementById("div_other_bank").style.display = "block";
                            document.getElementById("div_bank").style.display = "none";
                        }

                });

 $(document).ready(function(){
    /* $(document).bind("contextmenu",function(e){
              return false;
       }); */ //disable r-click
     a= $('#h4_total').text();
     console.log(a);
     console.log(   $('#h4_final_total').text());

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
    /* console.log(count); */

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var type = $("#input_transaction_type").val();
    /* console.log('typeeee is'+type); */
            $('#show-hide').DataTable({
                    processing: true,
                    serverSide: true,
                    /* scrollY:"600px", */
                    scrollX:true,
                    ajax: '{{ url('getItems') }}',
                    columns: [
                        { "data": "status" },
                        { "data": "product_name" },
                        { "data": "expiration_date" },
                        { "data": "lot_no" },
                        { "data": "total" },
                        { "data": "action",
                        "searchable": false,
                        "orderable": false
                                    },
                    ]
                });

                /* $(document).on('click','#clientSelect',function () {

                    $.ajax({
                        url: 'storeselectgetclient',
                        type: 'POST',
                        data: function (params,formData) {
                        return {
                        _token: CSRF_TOKEN,
                        search: params.term, // search term
                        type:type
                        };
                    },
                    processResults: function (response) {
                        return {
                        results: response
                        };
                    },
                    cache: true

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
                             document.getElementById("select_shelf").options.length = 0;
                             document.getElementById("select_rock").options.length = 0;
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
                                 $('#select_rock').append($("<option/>", {
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

                 var select_rock = '#select_rock';
                 $(document).on('change',select_rock,function () {
                    var rack=$(this).val();
                     var prod_id=$('#productSelect').val();
                     var item_id=$('#item_id').text();
                     var select_expiry=$('#select_expiry').val();
                     var select_lot_no=$('#select_lot_no').val();
                     var select_shelf=$('#select_shelf').val();
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
                             document.getElementById("select_shelf").options.length = 0;
                             //document.getElementById("select_rock").options.length = 0;
                       /*       $.each( data.expiry, function( key, value ) {
                                 $('#select_expiry').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                             }); */

                             $.each( data.shelf, function( key, value ) {
                                 $('#select_shelf').append($("<option/>", {
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


                 var select_rock = '#select_shelf';
                 $(document).on('change',select_rock,function () {
                    var shelf=$(this).val();
                    var rack=$('#select_rock').val();
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
                             document.getElementById("select_shelf").options.length = 0;
                             document.getElementById("select_rock").options.length = 0;
                       /*       $.each( data.expiry, function( key, value ) {
                                 $('#select_expiry').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                             }); */
                             var tmp4=0;

                             $.each( data.shelf, function( key, value ) {
                                 $('#select_shelf').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                                 if(tmp4 ==0){                                   
                                    tmp4=value;
                                     }
                             });
                             var tmp3=0;
                             $.each( data.rock, function( key, value ) {
                                 $('#select_rock').append($("<option/>", {
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

                $( "#clientSelect" ).select2({//ccc

                    ajax: {
                    url: 'storeselectgetclient',
                    type: 'post',
                    dataType: 'json',
                    delay: 250,
                    data: function (params,formData) {
                        return {
                        _token: CSRF_TOKEN,
                        search: params.term, // search term
                        type:type
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

                var productselect = '#clientSelect';
                $(document).on('change',productselect,function () {

                var prod_id=$(this).val();

                $.ajax({
                    type:'get',
                    url:'{{ url('storefindClientList') }}',
                    data:{'id':prod_id},
                    dataType:'json',//return data will be json
                    success:function(data){

                        $('#input_address').val(data.address);
                        $('#input_accountname').val(data.account_name);
                        $('#label_accountno').text(data.account_no);
                        /* $('#atcSelect1').val(data.atc);
                        $('#atcSelect2').val(data.atc2); */
                        /* alert(data.atc); */
                        /* if(data.account_type === 'PRIVATE'){

                            if(data.atc != null){

                            var total = parseFloat($('#h4_total').text());
                            alert(total);
                            var vat = total / 1.12 * 0.12;
                            var ewt = total / 1.12 * 0.01;
                            var finaltotal = total - ewt;

                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_total').text(parseFloat(total).toFixed(2));
                            $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));
                            $("#atcSelect1").prop('disabled', true);

                            }
                            if(data.atc === null){
                                $("#atcSelect1").prop('disabled', false);
                                $('#ewt').text('');
                                $('#h4_vat').text('');
                                var total = parseFloat($('#h4_total').text());

                                $('#h4_total').text(parseFloat(total).toFixed(2));
                                $('#h4_final_total').text(parseFloat(total).toFixed(2));

                                }
                        } */

                        if(data.senior_id == null){

                            $('#input_senior').val(data.pwd_id);

                        }if(data.pwd_id == null){

                            $('#input_senior').val(data.senior_id);

                        }
                    },
                    error:function(){

                    }
                });
            });//------------------------------------------------------------------------------------------------------------------------------------------------------------

            $( "#invoiceSelect" ).select2({
                    ajax: {
                    url: 'searchInvoice',
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

                var productselect = '#invoiceSelect';
                $(document).on('change',productselect,function () {

                var prod_id=$(this).val();
                /* console.log(prod_id); null value */

                $.ajax({
                    type:'get',
                    url:'{{ url('getInvoiceInfo') }}',
                    data:{'id':prod_id},
                    dataType:'json',//return data will be json
                    success:function(data){

                        $('#display_invoice_type').text(data.client[0].invoice_type);
                        $('#display_transaction_modalpayment').text(data.client[0].transaction_type);
                        $('#display_invoice_no').text(data.client[0].invoice_no);
                        $('#display_client_name').text(data.client[0].customer_name);
                        $('#display_total').text(data.client[0].final_total);
                        $('#display_balance').text(data.client[0].final_total - data.payment);
                        $('#display_transaction_id').text(data.client[0].transaction_id);

                    },
                    error:function(){

                    }
                });
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

                document.getElementById("select_expiry").options.length = 0;
                document.getElementById("select_lot_no").options.length = 0;
                document.getElementById("select_shelf").options.length = 0;
                document.getElementById("select_rock").options.length = 0;

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
                        //alert(data.sellingprice);
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
                             document.getElementById("select_shelf").options.length = 0;
                             //document.getElementById("select_rock").options.length = 0;
                       /*       $.each( data.expiry, function( key, value ) {
                                 $('#select_expiry').append($("<option/>", {
                                     value: value,
                                     text: value
                                 }));
                             }); */
                             var datatmp=0
                             $.each( data.shelf, function( key, value ) {
                                 $('#select_shelf').append($("<option/>", {
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

                    var rack=$('#select_rock').val();
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
             }
    $(document).on('click','#first_to_second',function () {

            /*var ifnull_transaction_type = $('#transaction_type').val();
            var a = $('#input_senior').val();
            var b = $('#input_invoice').val();
            var c = $('#input_accountname').val();
            var d = $('#input_transaction_date').val();
            var e = $('#input_address').val();

            if(ifnull_transaction_type === ''){

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

                }if(ifnull_transaction_type === 'dr_private'){

                        if(b && c && d && e != ''){

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
                }if(ifnull_transaction_type === 'dr_government'){
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
                }*/

    });


    $(document).on('click','#back_second_to_first',function () {

            document.getElementById("div_senior_and_pwd").style.display = "none";
            document.getElementById("div_main").style.display = "block";
            document.getElementById("div_second").style.display = "none";

    });

    $(document).on('click','.select_again',function () {

                document.getElementById("div_other_bank").style.display = "none";
                document.getElementById("div_bank").style.display = "block";
                $('#input_other_bank').val('');
                $('#input_bank').val('');

        });

    $(document).on('click','#next_second_to_third',function () { /* zzz */
        document.getElementById("div_sum").style.display = "block";
        var orderInput = $('#no').val();
        if (orderInput <= 0) {
                toastr.info('You don`t have order yet','Information');
                document.getElementById("div_sum").style.display = "none";
                return false;
        } else {

                document.getElementById("div_senior_and_pwd").style.display = "none";
                document.getElementById("div_main").style.display = "none";
                document.getElementById("div_hide_second").style.display = "none";
                document.getElementById("div_third").style.display = "block";
                $('#label_title').text('Payment');
                var a = $('#input_transaction').val();
                var b = $('#input_transaction_type').val();
                $('#display_transaction').text(a +'/'+ b);

                /* var total = parseInt($("#h4_total").val());
                vat = total / 1.12 * 0.12;
                ewt = total / 1.12 * 0.01;
                finaltotal = total - ewt;

                $('#h4_vat').text(parseFloat(vat).toFixed(2));
                $('#ewt').text(parseFloat(ewt).toFixed(2));
                $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2)); */

                /* var transactionselect = $("#transaction_type").val();
                    alert(transactionselect);

                   if(transactionselect === 'dr_private'){
                        var actType = $('#atcSelect1').val();
                        var total = parseFloat($("#h4_total").val());
                        alert(actType);
                        alert(total);
                        if(actType == 'WI158' || actType == 'WI640' || actType == 'WC158' || actType == 'WC640'){

                                    var total = parseInt($("#h4_total").val());
                                    vat = total / 1.12 * 0.12;
                                    ewt = total / 1.12 * 0.01;
                                    finaltotal = total - ewt;

                                    $('#h4_vat').text(parseFloat(vat).toFixed(2));
                                    $('#ewt').text(parseFloat(ewt).toFixed(2));
                                    $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                                }
                   } */


            }





    });
    $(document).on('click','#back_third_to_second',function () { /* zzz */
        document.getElementById("div_sum").style.display = "none";
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
        /* alert('save') */
        a= $('#h4_total').text();
        console.log(a);
        var formData = new FormData();
        var token= $('#_token').val();

        formData.append("status", $("#input_transaction_type").val());
        formData.append("productSelect", $("#showproduct").val());
        formData.append("qty", $("#qty").val());
        formData.append("unit", $("#label_unit").text());
        formData.append("srp", $("#label_srp").text());
        formData.append("price", $("#sellingprice").val());
        formData.append("custom_price", $("#custom_price").val());
        formData.append("select_expiry", $("#select_expiry").val());
        formData.append("select_lot_no", $("#select_lot_no").val());
        formData.append("select_shelf", $("#select_shelf").val());
        formData.append("select_rock", $("#select_rock").val());
        formData.append("item_id", $("#item_id").text());
        //double entry
        /* formData.append("select_expiry", $("#select_expiry").val());
        formData.append("select_lot_no", $("#select_lot_no").val()); */
        formData.append('_token', token);

        var valueproduct = $("#showproduct").val();
        var valueqty = $("#qty").val();
        var valueunit = $("#label_unit").text();
        var valueprice = $("#sellingprice").val();
        console.log(valueproduct + " valueproduct" );
        console.log(valueqty + " valueqty" );
        console.log(valueunit + " valueunit" );
        console.log(valueprice + " valueprice" );
        if (valueproduct && valueqty && valueprice && valueunit != "" ) {

            var custom_dicount_is_true = $('#custom_price').val();
            var input_transaction_type = $('#input_transaction_type').val();
            if(valueqty <= 0){
                toastr.warning('','Invalid quantity');
                return;
            }
            if(input_transaction_type === 'REGULAR'){
                if(custom_dicount_is_true < 0 && custom_dicount_is_true !=''){
                    toastr.warning('','Invalid discount price');
                    return;
                }
                if(custom_dicount_is_true <= -1){
                    toastr.warning('','Invalid discount price');
                    return;
                }
            }


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
                    /*if(response.message = "err"){

                        toastr.warning(response.title);
                        return;
                    }*/
                    if(response.message != "err"){

                        toastr.success(/*'','Successfully added.'*/response.title);
                        set_number ();
                        var table = $('#show-hide').DataTable();
                        table.ajax.reload();
                        var countlog = $('#no').val();
                        /* console.log(countlog); */
                        $(".add_item").prop('disabled', false);
                        $('#item_status').text('');

                    }else if(response.message = "err"){
                        toastr.warning(response.title);
                        $(".add_item").prop('disabled', false);
                        return;
                    }

                    var transactionselect = $("#transaction_type").val();
                    /* console.log(transactionselect); */

                   if(transactionselect === 'si_regular'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){
                            /* alert('ok may discount'); */
                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var new_total = add_qty * add_product;
                            var sum1 = total + new_total;
                            var formula = 1.12;
                            var vatformula = 0.12;

                            var netofvat = sum1 / formula;
                            var vat = netofvat * vatformula;

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
                            /* console.log(total);
                            console.log(netofvat);
                            console.log(vat); */
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_net_of_vat').text(parseFloat(netofvat).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));

                        }


                    }if(transactionselect === 'si_senior'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){

                            /* alert('ok may discount senior'); */
                            //idk
                            /*var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var new_total = add_qty * add_product;
                            var sum1 = total + new_total;*/

                            //old computation
                            /*var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var sum = add_product;
                            var sum1 = total + sum;*/


                            //new computation
                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var new_total = add_qty * add_product;
                            var sum1 = total + new_total;



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
                            $("#custom_price").val('');

                        }else{

                            var total = parseFloat($("#h4_total").text());
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

                        }


                    }if(transactionselect === 'si_pwd'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){

                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var sum = add_product;
                            var sum1 = total + sum;

                            var formula = 1.12;
                            var vatformula = 0.12;      /* new senior */
                            var discountformula = 0.20;

                            var vatexemptsales = sum1 / formula;
                            var discount = vatexemptsales * discountformula;
                            var finaltotal = vatexemptsales - discount;

                            $('#h4_vat_exempt_sales').text(parseFloat(vatexemptsales).toFixed(2));
                            $('#h4_discount').text(parseFloat(discount).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));
                            $("#custom_price").val('');

                        }else{

                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#label_srp').text());/*parseFloat($('#sellingprice').val());*/

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

                        }

                    }if(transactionselect === 'dr_private'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){

                            /* alert('ok may discount "private ka ee" '); */
                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var new_total = add_qty * add_product;
                            var sum1 = total + new_total;


                            /*var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var sum1 = total + add_product;*/

                            var vat = sum1 / 1.12 * 0.12;
                            var ewt = sum1 / 1.12 * 0.01;
                            var finaltotal = sum1 - ewt;


                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));
                            $("#custom_price").val('');

                        }else{

                            var total = parseInt($("#h4_total").text());

                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#sellingprice').val());

                            var sum = /*add_qty **/ add_product;
                            var sum1 = total + sum;

                            var vat = sum1 / 1.12 * 0.12;
                            var ewt = sum1 / 1.12 * 0.01;
                            var finaltotal = sum1 - ewt;


                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));

                        }

                    }if(transactionselect === 'si_private'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){

                            /* alert('ok may discount si_private'); */

                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var new_total = add_qty * add_product;
                            var sum1 = total + new_total;

                            /*var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var sum1 = total + add_product;*/

                            var vat = sum1 / 1.12 * 0.12;
                            var ewt = sum1 / 1.12 * 0.01;
                            var finaltotal = sum1 - ewt;


                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));
                            $("#custom_price").val('');

                        }else{

                            var total = parseInt($("#h4_total").text());

                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#sellingprice').val());

                            var sum = /*add_qty **/ add_product;
                            var sum1 = total + sum;

                            var vat = sum1 / 1.12 * 0.12;
                            var ewt = sum1 / 1.12 * 0.01;
                            var finaltotal = sum1 - ewt;


                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));

                        }

                    }if(transactionselect === 'si_government'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){

                            /* alert('ok may discount si gov'); */
                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var new_total = add_qty * add_product;
                            var sum1 = total + new_total;

                            /*var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var sum1 = total + add_product;*/

                            var ewtformula = 0.06;
                            var ewt = sum1 * ewtformula / 1.12;
                            var vat = sum1 / 1.12 *0.12;
                            /*var finaltotal = sum1 - ewt;*/
                            var finaltotal = sum1;

                            $('#h4_vat').text(parseFloat(vat).toFixed(2));

                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));
                            $("#custom_price").val('');

                        }else{

                            var total = parseInt($("#h4_total").text());

                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#sellingprice').val());

                            var sum = /*add_qty **/ add_product;
                            var sum1 = total + sum;

                            var ewtformula = 0.06;
                            var ewt = sum1 * ewtformula / 1.12;
                            var vat = sum1 / 1.12 *0.12;
                            /*var finaltotal = sum1 - ewt;*/
                            var finaltotal = sum1;

                            $('#h4_vat').text(parseFloat(vat).toFixed(2));

                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }

                    }if(transactionselect === 'dr_government'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){

                            /* alert('ok may discount dr gov'); */
                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var new_total = add_qty * add_product;
                            var sum1 = total + new_total;

                            /*var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var sum1 = total + add_product;*/

                            var ewtformula = 0.06;
                            var ewt = sum1 * ewtformula / 1.12;
                            var vat = sum1 / 1.12 *0.12;
                            /*var finaltotal = sum1 - ewt;*/
                            var finaltotal = sum1;

                            $('#h4_vat').text(parseFloat(vat).toFixed(2));

                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));
                            $("#custom_price").val('');

                        }else{

                            var total = parseInt($("#h4_total").text());

                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#sellingprice').val());

                            var sum = /*add_qty * */add_product;
                            var sum1 = total + sum;

                            var ewtformula = 0.06;
                            var ewt = sum1 * ewtformula / 1.12;
                            var vat = sum1 / 1.12 *0.12;
                            /*var finaltotal = sum1 - ewt;*/
                            var finaltotal = sum1;

                            $('#h4_vat').text(parseFloat(vat).toFixed(2));

                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }

                    }/* if(transactionselect === 'dr_'){

                        var total = parseFloat($("#h4_final_total").text());

                        var add_qty = parseFloat($('#qty').val());
                        var add_product = parseFloat($('#sellingprice').val());

                        var sum = add_qty * add_product;
                        var sum1 = total + sum;

                        $('#h4_total').text(parseFloat(sum1).toFixed(2));
                        $('#h4_final_total').text(parseFloat(sum1).toFixed(2));

                    } */if(transactionselect === 'of_'){

                        var custom_dicount_is_true = $('#custom_price').val();
                        if(custom_dicount_is_true != ''){
                            /*alert('mark');*/

                            /* alert('ok may discount'); */
                            var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var new_total = add_qty * add_product;
                            var sum1 = total + new_total;


                            /*var total = parseFloat($("#h4_total").text());
                            var add_qty = parseFloat($('#qty').val());
                            var add_product = parseFloat($('#custom_price').val());
                            var sum1 = total + add_product;*/


                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));
                            $("#custom_price").val('');

                        }else{

                            var total = parseFloat($("#h4_final_total").text());
                            /*alert(total);*/
                            var add_qty = parseFloat($('#qty').val());

                            var add_product = parseFloat($('#sellingprice').val());

                            var sum = add_product;
                            var sum1 = total + sum;

                            $('#h4_total').text(parseFloat(sum1).toFixed(2));
                            $('#h4_final_total').text(parseFloat(sum1).toFixed(2));
                        }


                    }

                    $('#showproduct').val('');
                    $('#qty').val('');
                    $('#unit').val('');
                    $('#sellingprice').val('');
                    $("#productSelect").select2().select2("val", null);
                    $("#productSelect").select2().select2("val", '-- Select Product --');

                    refresh_select_2();

                    document.getElementById("select_shelf").options.length = 0;
                    document.getElementById("select_rock").options.length = 0;
                    
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

    $(document).on('click', '.delete', function(){
        var id = $(this).data("id");
        var value = $(this).data("value");

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

                        var transactionselect = $("#transaction_type").val();
                        if(transactionselect === 'si_regular'){

                        var total = $("#h4_total").text();

                        var newtotal = total - value;

                        $('#h4_total').text(newtotal);

                        var total = $("#h4_total").text();

                        var formula = 1.12;
                        var vatformula = 0.12;

                        var netofvat = total / formula;
                        var vat = netofvat * vatformula;

                        $('#h4_vat').text(parseFloat(vat).toFixed(2));
                        $('#h4_net_of_vat').text(parseFloat(netofvat).toFixed(2));
                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(total).toFixed(2));

                        }if(transactionselect === 'si_senior' || transactionselect === 'si_pwd'){

                        // start ajax delete
                        $.ajax({
                            url: 'deleteDiscount',
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}"/* ,
                                'id':id */

                            },
                            beforeSend: function () {
                                $('.send-loading').show();
                            },
                            success: function (response) {

                                var regular = parseFloat(response.data_regular);
                                var discounted = parseFloat(response.data_discounted);
                                var total_of_all = regular + discounted;

                                $('#h4_total').text(parseFloat(total_of_all));

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

                                $('#h4_vat_exempt_sales').text(parseFloat(final_vatexemptsales).toFixed(2));
                                $('#h4_discount').text(parseFloat(final_discount).toFixed(2));
                                $('#h4_total').text(parseFloat(total_of_all).toFixed(2));
                                $('#h4_final_total').text(parseFloat(final_total_of_all_items).toFixed(2));
                                /* console.log('regular value is '+regular);
                                console.log('discounted value is'+discounted);
                                console.log('total value is '+total_of_all); */

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
                        // end ajax delete
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

                        }if(transactionselect === 'dr_private'){

                            var total = parseFloat($('#h4_total').text());

                            var new_total = total - value;
                            var vat = new_total / 1.12 * 0.12;
                            var ewt = new_total / 1.12 * 0.01;
                            var finaltotal = new_total - ewt;

                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_total').text(parseFloat(new_total).toFixed(2));
                            $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }if(transactionselect === 'si_private'){

                            var total = parseFloat($('#h4_total').text());

                            var new_total = total - value;
                            var vat = new_total / 1.12 * 0.12;
                            var ewt = new_total / 1.12 * 0.01;
                            var finaltotal = new_total - ewt;

                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_vat').text(parseFloat(vat).toFixed(2));
                            $('#h4_total').text(parseFloat(new_total).toFixed(2));
                            $('#h4_final_total').text(parseFloat(new_total).toFixed(2));

                            }if(transactionselect === 'si_government'){

                            var total = $("#h4_total").text();
                            var newtotal = total - value;
                            $('#h4_total').text(newtotal);

                            var total = parseInt($("#h4_total").text());

                            var ewtformula = 0.01;
                            var vatformula = 0.05;

                            var ewt = total * ewtformula / 1.12;
                            var vat = total * vatformula / 1.12;
                            /*var finaltotal = total - ewt - vat;*/
                            var finaltotal = total;

                            $('#h4_vat').text(parseFloat(vat).toFixed(2));

                            $('#ewt').text(parseFloat(ewt).toFixed(2));
                            $('#h4_total').text(parseFloat(total).toFixed(2));
                            $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }if(transactionselect === 'dr_government'){

                        var total = $("#h4_total").text();
                        var newtotal = total - value;
                        $('#h4_total').text(newtotal);

                        var total = parseInt($("#h4_total").text());

                        var ewtformula = 0.01;
                        var vatformula = 0.05;

                        var ewt = total * ewtformula / 1.12;
                        var vat = total * vatformula / 1.12;
                        /*var finaltotal = total - ewt - vat;*/
                        var finaltotal = total;

                        $('#h4_vat').text(parseFloat(vat).toFixed(2));

                        $('#ewt').text(parseFloat(ewt).toFixed(2));
                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(finaltotal).toFixed(2));

                        }/* if(transactionselect === 'dr_'){

                        var total = $("#h4_total").text();
                        var newtotal = total - value;
                        $('#h4_total').text(newtotal);

                        var total = parseFloat($("#h4_total").text());

                        $('#h4_total').text(parseFloat(total).toFixed(2));
                        $('#h4_final_total').text(parseFloat(total).toFixed(2));

                        } */if(transactionselect === 'of_'){

                        var total = $("#h4_total").text();
                        var newtotal = total - value;
                        $('#h4_total').text(newtotal);

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
        $('#input_new_terms').val('');
        $('#input_other_bank').val('');

        }

    var null_last_page_modalpayment = function(){

        //null last page

        $('#input_check_number_modalpayment').val('');
        $('#input_bank_modalpayment').val('');
        $('#input_check_date_modalpayment').val('');
        $('#input_ref_modalpayment').val('');
        $('#input_account_name_modalpayment').val('');
        $('#input_other_bank_modalpayment').val('');
        $('#input_amount_modalpayment').val('');


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
    var refresh_select_client = function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        q = document.getElementById("input_transaction_type").value;
        /*alert(q);*/
        $( "#clientSelect" ).select2({
                    ajax: {
                    url: 'storeselectgetclient',
                    type: 'post',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        /* q = document.getElementById("input_transaction_type").value;
                        alert(q); */
                        return {
                        _token: CSRF_TOKEN,
                        search: params.term, // search term
                        type:q
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

        formData.append("invoice_type", $("#input_transaction_type").val());
        formData.append("transaction_type", $("#input_transaction").val());
        //formData.append("bir", $("#labelvatornonvat").text());
        formData.append("payment", $("#input_payment_method").val());
        formData.append("payment_status", $("#input_payment_status").val());
        formData.append("reference_no", $("#input_ref").val());

        formData.append("check_no", $("#input_check_number").val());
        formData.append("check_date", $("#input_check_date").val());
        formData.append("id_no", $("#input_senior").val());
        formData.append("bank_name", $("#input_bank").val());
        formData.append("other_bank_name", $("#input_other_bank").val());
        formData.append("ewt", $("#ewt").text());
        formData.append("vat_exempt", $("#h4_vat_exempt_sales").text());
        formData.append("net_of_vat", $("#h4_net_of_vat").text());
        formData.append("vat", $("#h4_vat").text());
        formData.append("discount", $("#h4_discount").text());
        formData.append("total", $("#h4_total").text());
        formData.append("final_total", $("#h4_final_total").text());
        formData.append("terms", $("#input_new_terms").val());
        formData.append("account_name", $("#input_account_name").val());
        formData.append("paid_amount", $("#paid_amount").val());
        formData.append("atc1",$('#atcSelect1').val());
        formData.append("atc2",$('#atcSelect2').val());
        formData.append("nic",$('#nic').val());
        formData.append("label_accountno",$("#label_accountno").text());
        formData.append('_token', token);//now


        var when_submit_payment_type = $("#input_payment_method").val();
        var before_submit_check_number = $("#input_check_number").val();
        var before_submit_bank = $("#input_bank").val();
        var before_submit_other_bank = $("#input_other_bank").val();
        var before_submit_check_date = $("#input_check_date").val();
        var before_submit_reference_no = $("#input_ref").val();
        var before_submit_payment_method = $('#input_payment_method').val();
        var before_submit_payment_status = $('#input_payment_status').val();
        var before_submit_input_transaction = $('#input_transaction').val();
        var before_submit_terms = $('#input_new_terms').val();
        var noo = $('#no').val();
        var before_submit_paid_amount = $('#paid_amount').val();
        var before_submit_invoice_type = $('#input_transaction_type').val();
        var before_submit_atc1 = $('#atcSelect1').val();
        var before_submit_atc1 = $('#atcSelect2').val();



        if(before_submit_payment_method === ''){

            if(before_submit_input_transaction === 'DELIVERY RECIEPT'){

            }else{

                toastr.info('please select payment method','Information');
                return;

            }

        }
        
        if(before_submit_paid_amount === ''){

            if(when_submit_payment_type === 'UNPAID'){

            }else{

                toastr.info('amount is required','Information');
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

            }if(before_submit_bank === 'Other Bank'){

                if(before_submit_other_bank === ''){

                toastr.info('bank name is required','Information');
                return;

                }
            }

            if(before_submit_check_date === ''){

                toastr.info('check date is required','Information');
                return;

            }

        }if(when_submit_payment_type === 'CARD'){

            if(before_submit_bank === ''){

                toastr.info('bank is required','Information');
                return;

            }if(before_submit_bank === 'Other Bank'){

                if(before_submit_other_bank === ''){

                    toastr.info('bank name is required','Information');
                    return;

                }
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

            }if(before_submit_bank === 'Other Bank'){

                if(before_submit_other_bank === ''){

                    toastr.info('bank name is required','Information');
                    return;

                }
            }
            if(before_submit_reference_no === ''){

                toastr.info('reference no. is required','Information');
                return;

            }

        }if(when_submit_payment_type === 'UNPAID'){

            if(before_submit_terms === ''){

            toastr.info('Terms is required','Information');
            return;

            }

            }
        if(when_submit_payment_type === 'ONLINE BANK TRANSFER'){

            if(before_submit_bank === ''){

            toastr.info('bank is required','Information');
            return;

            }if(before_submit_bank === 'Other Bank'){

                if(before_submit_other_bank === ''){

                toastr.info('bank name is required','Information');
                return;

                }
            }
            if(before_submit_reference_no === ''){

            toastr.info('reference no. is required','Information');
            return;

            }
            else{   /* console.log('im working') */
                $.ajax({

                url: 'store-save-orders',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    //$("#submitorder").prop('disabled', true);
                    $(".add_order").prop('disabled', true);
                    /* alert('ok'); */
                },
                success: function (response) {
                   
                    if(response!="err"){

                                //toastr.success(response.message, response.title);
                                toastr.success('Transaction Completed.','');

                                setTimeout(function(){// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 500);

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

        }/* xxx */


        else{   /* console.log('im working') */
                $.ajax({

                url: 'store-save-orders',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    //$("#submitorder").prop('disabled', true);
                    $(".add_order").prop('disabled', true);
                    /* alert('ok'); */
                },
                success: function (response) {
                    /*  alert('ok'); */
                    /* console.log(response); */

                    if(response!="err"){

                                //toastr.success(response.message, response.title);
                                toastr.success('Transaction Completed.','');

                                setTimeout(function(){// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 500);

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
                        /* console.log(q); */
                    if (q === 'SENIOR' || q === 'PWD'){

                        var label_srp = $('#label_srp').text();
                        var qty = $('#qty').val();
                        var sum = label_srp * qty;
                        var formula = 1.12;
                        var discountformula = 0.20;

                        var vatexemptsales = sum / formula;
                        var discount = vatexemptsales * discountformula;
                        var finaltotal = vatexemptsales - discount;

                        $('#sellingprice').val(parseFloat(finaltotal).toFixed(2));
                        //parseFloat(finaltotal).toFixed(2)

                    }else{
                        /* $('#sellingprice').val(parseInt(data.capital) * markup + parseInt(data.capital)); */
                        var qty = $('#qty').val();
                        var label_srp = $('#label_srp').text();

                        var sum = label_srp * qty;

                        $('#sellingprice').val(sum);
                        var sellingprice = parseFloat($('#sellingprice').val()).toFixed(2);
                        $('#sellingprice').val(sellingprice)/* .toFixed(2) */;
                    }

                });

                $(document).on('click', '.discount', function(){
                var id = $(this).data("id");
                /* console.log(id); */
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


                                $('#h4_vat_exempt_sales').text(parseFloat(final_vatexemptsales).toFixed(2));
                                $('#h4_discount').text(parseFloat(final_discount).toFixed(2));
                                $('#h4_total').text(parseFloat(total_of_all).toFixed(2));
                                $('#h4_final_total').text(parseFloat(final_total_of_all_items).toFixed(2));
                                /* console.log('regular value is '+regular);
                                console.log('discounted value is'+discounted);
                                console.log('total value is '+total_of_all); */

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
                var inputbank = '#input_bank_modalpayment';
                    $(document).on('change',inputbank,function () {

                            var type=$(this).val();
                            console.log(type);

                                if(type === 'Other Bank'){

                                    document.getElementById("div_other_bank_modalpayment").style.display = "block";
                                    document.getElementById("div_bank_modalpayment").style.display = "none";
                                    document.getElementById("input_other_bank_modalpayment").style.display = "block";
                                    $('#input_bank_modalpayment').val('');

                                }

                        });
</script>

@endsection



