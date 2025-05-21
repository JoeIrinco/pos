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
                <div class="row">
                    <div class="col-8">
                        <h6 class="mb-0">Purchase Order
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
                                    <li><a  href="transaction-history">Transaction Lists Lists</a>
                                    <li><a  href="purchase-order">Make P.O</a></li>
                                    <li><a  href="purchase-order-list">P.O Lists</a>
                                    <li><a  href="#">Void Request</a>
                                    <li><a  href="#">Back Entry</a>
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
                {{-- <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h4 class="mb-0"> Point Of Sale
                                <small>{{ Auth::user()->name ?? '' }}</small> 
                            </h4>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class=" col-md-4 mt-1"> {{-- start --}}
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <strong><label >Product Description *:</label></strong>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <select style="width:100%" id="productSelect" class="form-control"  name="product_name[]">
                                                <option value='0'>-- Select Product --</option>
                                            </select>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <strong><label for="validationCustom03">Quantity *:</label></strong>
                                        <input type="number" id="qty" name="quantity[]" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                        <input type="text" hidden  id="showproduct" class="form-control" >
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <strong><label for="validationCustom04">Unit *:</label></strong>
                                        <input type="text" id="unit" name="unit[]" style="border-color: rgb(0, 0, 0);" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <Strong><label for="validationCustom05">Price *:</label></Strong>
                                        <input type="number" id="sellingprice" name="amount[]" style="border-color: rgb(0, 0, 0);" class="form-control" > 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        {{-- <input type="button" value="ADD ITEM" class="btn btn-success add_item"> --}}
                                        <button type="button" value="ADD ITEM" style="width:100%" class="btn btn-sm btn-info add_item"><i class="fa fa-cart-plus pr-1"></i><strong> Add Item</strong></button>
                                        {{-- <a class="btn btn-success add_item" >Add Item</a> --}}
                                    </div>
                                </div>
                                
                                <div class="form-group text-center ">
                                    {{-- <input type="button" value="SAVE P.O" class="btn btn-info"> --}}
                                    {{-- <button type="button" id="submitorder" style="border-color: rgb(0, 0, 0);" class="btn btn-success add_order">SUBMIT</button> --}}
                                    <button id="Submit" type="button" {{-- style="width:100%" --}} class="btn btn-sm btn-primary add_order"><i class=" icon-cursor pr-1"></i><strong>Sumbit &nbsp;</strong></button>
                                    {{-- <input id="btn_next2nd" type="button" value="NEXT" class="btn btn-primary next"> --}}
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-8 mt-1">
                            <div class="card-body">
                                <table id="show-hide" class="display dt-init table table-bordered table-striped" cellspacing="0" style="width:100%">
                                    <thead>
                                    <tr style="border-color: rgb(0, 0, 0);">
                                        {{-- <th scope="col" style="border-color: rgb(0, 0, 0);">QTY</th>
                                        <th scope="col" style="border-color: rgb(0, 0, 0);">UNIT</th> --}}
                                        <th scope="col" style="border-color: rgb(0, 0, 0);">PRODUCT DESCRIPTION</th>
                                        {{-- <th scope="col" style="border-color: rgb(0, 0, 0);">PRICE</th> --}}
                                        <th scope="col" style="border-color: rgb(0, 0, 0);">TOTAL</th>
                                        {{-- <th scope="col" style="border-color: rgb(0, 0, 0);">Action</th> --}}
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


        <form id="form" action="orders" method="POST">
            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
            <div class="container-fluid">
                <!-- state start-->
                

                <!-- state end-->
                

        <!-- start table-->


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
                    scrollY:"400px",
                    scrollX:true,
                    ajax: '{{ url('getPoItems') }}',
                    columns: [
                        /* { "data": "quantity",
                        "orderable": false }, */
                        /* { "data": "unit",
                        "orderable": false }, */
                        { "data": "product_name",
                        "orderable": false } ,
                        /*{ "data": "amount" }, */
                        { "data": "total" }/* ,
                        { "data": "action",
                        "searchable": false,
                        "orderable": false
                                    } */
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
                    url:'{{ url('findProduct') }}',
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
                
                url: 'store_purchase_save_items',
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
                url: 'deletePoStore',
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
        
                    url: 'save-po',
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

<!--init scripts-->
<script src="public/css2/js/scripts.js"></script>

<!--toaster-->
<script src="public/css2/vendor/toastr-master/toastr.js"></script>
<script src="public/css2/vendor/toastr-master/toastr-init.js"></script>

<!--select2-->
<script src="public/css2/vendor/select2/js/select2.min.js"></script>
<script src="public/css2/vendor/select2-init.js"></script>

</html>
