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
    
    <!--inputmask-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
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
                <div class="row">
                    <div class="col-8">
                        <h6 class="mb-0">Pending Documents
                            <small>Welcome back!, {{ Auth::user()->name ?? '' }}</small>
                        </h6>
                        
                    </div>
                </div>
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
                                    <li><a  href="transaction-history">Transaction List</a>
                                    <li><a  href="purchase-order">Make P.O</a></li>
                                    <li><a  href="purchase-order-list">P.O Lists</a>
                                    <li><a  href="void-request">Void Request</a>
                                    <li><a  href="back-entry">Back Entry</a>
                                    <li><a  href="../ar">A.R</a>
                                        
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
    <!-- <table>
<tr>
<td>Enter Identity No.:</td>
<td><input type="text" name="nic" id="nic" placeholder="123-456-789-000"></td>
</tr>
<tr>
<td>Enter Date:</td>
<td><input type="text" name="date" id="date" placeholder="MM/DD/YYYY"></td>
</tr>
<tr>
<td>Enter Phone:</td>
<td><input type="text" name="phone" id="phone" placeholder="(000) 000-000"></td>
</tr>
<tr>
<td>Enter Phone Ext:</td>
<td><input type="text" name="ext" id="ext" placeholder="(000) 000-000 Ext.00000"></td>
</tr>
<tr>
<td>Enter Mobile:</td>
<td><input type="text" name="mobile" id="mobile" placeholder="+92 000 000 000"></td>
</tr>
<tr>
<td>Enter Percentage:</td>
<td><input type="text" name="percent" id="percent" placeholder="00%"></td>
</tr>
<tr>
<td>Enter Product Key:</td>
<td><input type="text" name="productkey" id="productkey" placeholder="a*-000-a000"></td>
</tr>
<tr>
<td>Enter Order No:</td>
<td><input type="text" name="orderno" id="orderno" placeholder="PO: aaa-000-***"></td>
</tr>
<tr>
<td colspan="2" align="center"><strong>Additional Features</strong></td>
</tr>
<tr>
<td>Date Without AutoClear:</td>
<td><input type="text" name="date2" id="date2" placeholder="MM/DD/YYYY"></td>
</tr>
<tr>
<td>Date Without AutoClear & Alert:</td>
<td><input type="text" name="date3" id="date3" placeholder="MM/DD/YYYY"></td>
</tr>
<tr>
<td>Mobile With Prefix:</td>
<td><input type="text" name="mobile2" id="mobile2" placeholder="+1 000 000 000"></td>
</tr>
</table> -->
        <div class="container-fluid"> 
            <div class="card-body">
            <div class="col-md-12">
                {{-- <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h4 class="mb-0"> Point Of Sale
                                <small>{{ Auth::user()->name ?? '' }}</small> 
                            </h4>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class=" col-md-12 mt-1">
                            <div class="card-body">
                                <table id="show-hide" class="display dt-init table table-bordered table-striped" cellspacing="0" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Transaction Type</th>
                                        <th scope="col">Invoice No.</th>
                                        <th scope="col">Account Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Encoder</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Terms</th>
                                        <th scope="col">Due</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                                <br/>
                                <br/>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <form id="form" action="orders" method="POST">
            {{-- <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}"> --}}
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
        {{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
            MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
            MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
            MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
        <div class="card-body">
            <div class="modal fade bd-example-modal-lg" id="modalbodyforupdate" {{-- tabindex="-1" --}} role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Update Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class=" col-md-12">
                                <div class="mb-4">
                                    
                                            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
                                            
                                            <div class="row">  
                                                
                                                
                                                <div id="div_third" class=" col-md-12" {{-- style="display: block; "--}}>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-0">
                                                            <strong><label>Transaction Type:</label></strong>&nbsp;<u><label class="text-decoration: underline;" " id="display_transaction"></label></u>
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
                                                        <div class="col-md-6 mb-3">
                                                            <Strong><label>TIN *:</label></Strong>
                                                                <input type="text" class="form-control" style="border-color: rgb(0, 0, 0);" name="nic" id="nic">
                                                                <small class="form-text text-muted">Example : 123-456-789-000</small>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <Strong><label>ATC *:</label></Strong>
                                                            <select style="width:100%;" id="productSelect" data-placeholder='-- Select Product --' class="form-control"  name="product_name[]">
                                                                <option value='0'>---------- Select ----------</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
        
                                            </div>


                                                
                                            </div>    
                                            
                                    
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="save" type="button" class="btn btn-success">Save</button>{{-- modalUpdate --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
            MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
            MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
            MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
            </div>
        </main>
        <!--main contents end-->

    </div>
    <!--===========app body end===========-->
    
</body>
<script type="text/javascript">
        
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $( "#productSelect" ).select2({
                    ajax: { 
                    url: 'atc',
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
            });
                var productselect = '#productSelect';
                $(document).on('change',productselect,function () {
                
                var prod_id=$(this).val();
                console.log(prod_id); //null value
                
                $.ajax({
                    type:'get',
                    url:'{{ url('findAtc') }}',
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

                            //$('#sellingprice').val(finaltotal);
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

            var refresh_select_2 = function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $( "#productSelect" ).select2({
                            ajax: { 
                            url: 'atc',
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

        $(document).on('click','.update_btn',function (e) {
            event.preventDefault();
            let href = $(this).attr('data-id');
            console.log(href);
            $.ajax({
                url: 'AccountReceivable/'+href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    console.log(result[0].client_name);
                    console.log(result[0].invoice_no);
                    console.log(result[0].transaction_type);
                    console.log(result[0].balance);
                    $('#display_id').text(result[0].id);
                    $('#display_client_name').text(result[0].customer_name);
                    $('#display_invoice_no').text(result[0].invoice_no);
                    $('#display_transaction').text(result[0].transaction_type);
                    $('#display_total').text(result[0].final_total);
                    $('#display_balance').text(result[0].balance);
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

    $('#show-hide').DataTable({
            processing: true,
            serverSide: true,
            scrollY:"370px",
            scrollX:true,
            ajax: '{{ url('getPendingDocuments') }}',
            columns: [
                { 
                    "data": "id",
                    },
                { 
                    "data": "transaction_type",
                    },
                { 
                    "data": "invoice_no", 
                    },
                { 
                    "data": "customer_name",
                    },
                { 
                    "data": "customer_address" 
                    },
                { 
                    "data": "status" 
                    },
                { 
                    "data": "total_orders" 
                    },
                { 
                    "data": "balance" 
                    },
                { 
                    "data": "encoder" 
                    },
                { 
                    "data": "created_at" 
                    },
                { 
                    "data": "terms" 
                    },
                { 
                    "data": "terms_end" 
                    },
                { 
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                    }
            ] 
        });
    });

    $(document).on('click', '#process', function(){
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
                url: 'processAr',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id':id
                },
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function () {
                        var table = $('#show-hide').DataTable();
                        table.ajax.reload();
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

                    var transactionselect = '#payment_type';
                    $(document).on('change',transactionselect,function () {
                    
                    var type=$(this).val();
                    $.ajax({
                        type:'get',
                        url:'{{ url('storefindTotalPrice') }}',
                        data:{'type':type},
                        dataType:'json',//return data will be json
                        success:function(data){
                            if(type === ''){
                                
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "none";
                                document.getElementById("div_amount").style.display = "none";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();
                           }
                            if(type === 'value_cash'){

                                $('#input_payment_method').val('CASH');
                                $('#input_payment_status').val('');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "none";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();
                                
                           }
                            if(type === 'value_check'){

                                $('#input_payment_method').val('CHECK');
                                $('#input_payment_status').val('');
                                document.getElementById("div_check_number").style.display = "block";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "block";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "none";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();
                                
                            }if(type === 'value_debit'){

                                $('#input_payment_method').val('CARD');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "block";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();
                                
                            }if(type === 'value_credit'){

                                $('#input_payment_method').val('CARD');
                                $('#input_payment_status').val('CREDIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "block";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();
                                
                            }if(type === 'value_gcash'){
                                
                                $('#input_payment_method').val('GCASH');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "block";
                                document.getElementById("div_account_name").style.display = "block";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }if(type === 'value_paymaya'){

                                $('#input_payment_method').val('PAYMAYA');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "block";
                                document.getElementById("div_account_name").style.display = "block";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }if(type === 'value_deposit'){

                                $('#input_payment_method').val('DEPOSIT');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "block";
                                document.getElementById("div_account_name").style.display = "none";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();
                               
                            }if(type === 'value_online_transfer'){

                                $('#input_payment_method').val('ONLINE BANK TRANSFER');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "block";
                                document.getElementById("div_account_name").style.display = "block";
                                document.getElementById("div_amount").style.display = "block";
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();
                               
                            }
                        },
                        error:function(){

                        }
                    });
                });

                $(document).on('click','#save',function () {

                var formData = new FormData();
                var token= $('#_token').val();
                formData.append("id", $("#display_id").text());
                formData.append("display_client_name", $("#display_client_name").text());
                formData.append("display_invoice_no", $("#display_invoice_no").text());
                formData.append("display_transaction", $("#display_transaction").text());
                formData.append("display_total", $("#display_total").text());
                formData.append("display_balance", $("#display_balance").text());
                formData.append("payment_type", $("#payment_type").val());
                formData.append("input_check_number", $("#input_check_number").val());
                formData.append("input_bank", $("#input_bank").val());
                formData.append("input_check_date", $("#input_check_date").val());
                formData.append("input_ref", $("#input_ref").val());
                formData.append("input_account_name", $("#input_account_name").val());
                formData.append("input_amount", $("#input_amount").val());
                formData.append("input_payment_method", $("#input_payment_method").val());
                formData.append("input_payment_status", $("#input_payment_status").val());
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
            
                            if(response!="error"){
                                $('#show-hide tr:last').after(response);
                                /* Swal.fire(
                                        'Congratulations!',
                                        'Product Successfuly added',
                                        'success'
                                        ); */
                                        
                            }else{
                                
                                Swal.fire(
                                        'WARNING!',
                                        'Duplicate Product Name',
                                        'error'
                                        );
                                        
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


            var inputbank = '#input_bank';
                    $(document).on('change',inputbank,function () {
                    
                    var type=$(this).val();
                    console.log(type);
                    
                        if(type === 'Other Bank'){

                            //$('#input_payment_status').val(''); reusable
                            document.getElementById("div_other_bank").style.display = "block";
                            document.getElementById("div_other_bank_back").style.display = "block";
                            document.getElementById("div_bank").style.display = "none";
                        }
                    
                });
            
                var null_last_page = function(){

                //null all input

                $('#input_check_number').val('');
                $('#input_bank').val('');
                $('#input_check_date').val('');
                $('#input_ref').val('');
                $('#input_account_name').val('');
                $('#input_amount').val('');
                $('#input_other_bank').val('');

                }

                    jQuery(function($){
                            $("#nic").mask("999-999-999-999");
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

<!--init scripts-->


<!--toaster-->
<script src="public/css2/vendor/toastr-master/toastr.js"></script>
<script src="public/css2/vendor/toastr-master/toastr-init.js"></script>


<!--select2-->
<script src="public/css2/vendor/select2/js/select2.min.js"></script>
<script src="public/css2/vendor/select2-init.js"></script>
<script src="public/css2/js/scripts.js"></script>
</html>
