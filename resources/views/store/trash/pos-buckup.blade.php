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
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--common style-->
    <link href="public/css2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css2/vendor/lobicard/css/lobicard.css" rel="stylesheet">
    <link href="public/css2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css2/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--custom css-->
    <link href="public/css2/css/main.css" rel="stylesheet">

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
            <div class="page-title">
                <h4 class="mb-0"> Point Of Sale
                    <small>{{ Auth::user()->name ?? '' }}</small> 
                </h4>
            </div>
            <!--page title end-->
            
        <form id="form" action="orders" method="POST">
            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
            <div class="container-fluid">

                <!-- state start-->
                <div class="row">
                    <div class=" col-md-8">
                        <div class="card card-shadow mb-4">
                            {{-- <div class="card-header">
                                <div class="card-title">
                                    Client Information
                                </div>
                            </div> --}}
                            <div class="card-body">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label>Transaction Date:</label>
                                            <div class="input-group date" id='helper-datepicker'> {{-- data-date="05/25/2018" data-date-format="mm/dd/yyyy" --}}
                                                <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <label>Account Name:</label>
                                            <input type="text" id="clientinfo" name="customer_name" class="text-uppercase form-control" placeholder="Address *" required="">
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <label>Address:</label>
                                            <input type="text" id="info2" name="customer_address" class="text-uppercase form-control" placeholder="Address *" required="">
                                        </div>
                                    </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 mb-1">
                                        <label>Transaction Type:</label>
                                    <select onchange="yesnoCheck(this);" id="transactiontype" class="form-control" >
                                        <option value='0'>-- Select Type --</option>
                                        <option value='CASH'>CASH</option>
                                        <option value='NON-VAT'>NON VAT (PAPER, CSI, O.F.)</option>
                                        <option value='CHECK'>CHECK</option>
                                        <option value='SENIOR'>SENIOR</option>
                                        <option value='PWD'>PWD</option>
                                        <option value='CASH'>PRIVATE</option>
                                        <option value='NON-VAT'>GOVERNMENT</option>
                                        </select>
                                    </div>
                                    <div id="ifPwd" style="display: none;" class="col-md-4 mb-1">
                                        <label>ID Number:</label>
                                        <input type="text" id="pwdid" name="customer_name" class="text-uppercase form-control" placeholder="Pwd ID *">
                                    </div>
                                    <div id="ifSenior" style="display: none;" class="col-md-4 mb-1">
                                        <label>ID Number:</label>
                                        <input type="text" id="seniorid" name="customer_name" class="text-uppercase form-control" placeholder="Senior ID *">
                                    </div>
                                    <div id="ifYes" style="display: none;" class="col-md-4 mb-1">
                                        <label>Check Number:</label>
                                        <input type="text" id="checknumber" name="customer_name" class="text-uppercase form-control" placeholder="Check Number *">
                                    </div>
                                    <div id="ifYes1" style="display: none;" class="col-md-4 mb-1">
                                        <label>Check Date:</label>
                                        <div class="input-group date" id='helper-datepicker'> {{-- data-date="05/25/2018" data-date-format="mm/dd/yyyy" --}}
                                            <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                            <label >Product Description</label>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            {{-- <label >Product Description</label> --}}
                                            <select id="productSelect" class="form-control"  name="product_name[]">
                                                <option value='0'>-- Select Product --</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom03">Quantity</label>
                                            <input type="number" id="qty" name="quantity[]" class="form-control" >
                                            <input type="text" hidden  id="showproduct" class="form-control" >
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom04">Unit</label>
                                            <input type="text" id="unit" name="unit[]" class="form-control" readonly>
                                            
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom05">Price</label>
                                            <input type="number" id="sellingprice" name="amount[]" class="form-control" >
                                            
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <a class="btn btn-info add_item" >Add Item</a>
                                        </div>
                                    </div>
                                    {{-- <button type="button" id="submitorder" class="btn btn-success add_order">Submit</button> --}}
                                    {{-- <a class="btn btn-info add_item">Add Item</a> --}}
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-4">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Transaction Summary
                                </div>
                            </div>
                            
                            <div class="card-body">
     <div class="col">
        
        <div class="col-md-12 mb-3">
            <label>VAT:</label>
            <input value="{{ $sell }}" type="text" id="vat" class="text-uppercase form-control" readonly>
        </div>
        <div class="col-md-12 mb-3">
            <label>EWT:</label>
            <input value="{{ $sell }}" type="text" id="vat" class="text-uppercase form-control" readonly>
        </div>
        <div class="col-md-12 mb-1">
            <label>Discount:</label>
            <input type="text" id="discount"class="text-uppercase form-control" readonly>
        </div>
        <div class="col-md-12 mb-3">
            <label>Total:</label>
            <input value="{{ $sell }}" type="number" id="total" class="text-uppercase form-control" readonly>
        </div>
        
        <div class="col-md-12 mb-1">
            <a class="btn btn-success submit" >Submit</a>
        
    </div>
    
    </div>
                                    {{-- <input type="text" hidden name="customer_name" id="info1" class="form-control"  required=""> --}}
                                    
                                        
                                    
                                    {{-- <button type="button" id="submitorder" class="btn btn-success add_order">Submit</button> --}}
                                    {{-- <a class="btn btn-info add_item">Add Item</a> --}}
                            </div>
                        </div>
                    </div>

               
                               

                </div>

                <!-- state end-->
                

<!-- start table-->

<div class="card card-shadow mb-4">
    <div class="card-header">
        <div class="card-title">
            Item Lists
        </div>
    </div>
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
</div>

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

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("#total").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });

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
                        $('#sellingprice').val(data.sellingprice)
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
                },
                success: function (response) {

                    console.log(response);
                    if(response!="err"){
                        $('#data_table tr:last').after(response);
                         Swal.fire({
                                /* 'Congratulations!',
                                'Your Purchase Order has been Placed.',
                                'success' */
                                position: 'top-end',
                                icon: 'success',
                                title: 'Item Saved',
                                showConfirmButton: false,
                                timer: 800
                            }
                                );
                               
                                /* set_number3 (); */
                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();

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
                                
                Swal.fire(
                                'Some information are required',
                                'Product, Unit, Qty cannot be null!',
                                'warning'
                                );
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
                  
                    ////alert(response); abcd
                    $('#dataTr'+response+'').remove();
                    if(response>0){
                        Swal.fire(
                                'Deleted!',
                                'Deleted Msg: Successfuly Deleted',
                                'success'
                                )
                               /*  delete_set_number(); */ //temp remove delete now suces if meorn nito
                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();

                                var table = $('#show-hide').DataTable();
                                var data = table.rows().length();
                                console.log(data);

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

function yesnoCheck(that) {
    if (that.value == "CHECK") {
  /* alert("check"); */
        document.getElementById("ifYes").style.display = "block";
        document.getElementById("ifYes1").style.display = "block";
        document.getElementById("ifSenior").style.display = "none";
        document.getElementById("ifPwd").style.display = "none";
    } else if (that.value == "SENIOR") {
        document.getElementById("ifSenior").style.display = "block";
        document.getElementById("ifYes").style.display = "none";
        document.getElementById("ifYes1").style.display = "none";
        document.getElementById("ifPwd").style.display = "none";
    }else if (that.value == "PWD") {
        document.getElementById("ifPwd").style.display = "block";
        document.getElementById("ifSenior").style.display = "none";
        document.getElementById("ifYes").style.display = "none";
        document.getElementById("ifYes1").style.display = "none";
    }else {
        document.getElementById("ifYes").style.display = "none";
        document.getElementById("ifYes1").style.display = "none";
        document.getElementById("ifSenior").style.display = "none";
        document.getElementById("ifPwd").style.display = "none";
    }
}
        /* ---------------------------------------------------------add item ENDDDDD---------------------------------------------------------- */
    

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


{{-- <script src="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> --}}


<!--init scripts-->
<script src="public/css2/js/scripts.js"></script>

<!--select2-->
<script src="public/css2/vendor/select2/js/select2.min.js"></script>
<script src="public/css2/vendor/select2-init.js"></script>
{{-- data picker --}}
<script src="public/css2/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
<script src="public/css2/vendor/date-picker-init.js"></script>

</html>
