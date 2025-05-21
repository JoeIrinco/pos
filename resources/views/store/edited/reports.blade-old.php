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

    <title>VL | Reports</title>

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


    {{-- <!--Auto complete-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="jquery.autocomplete.js"></script> --}}

    <!--custom css-->
    <link href="public/css2/css/main.css" rel="stylesheet">

    <!--custom select 2-->
    <link href="public/css2/vendor/select2/css/select2.css" rel="stylesheet">

    <!--date picker style-->
    <link href="public/css2/vendor/date-picker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!--bs4 data table-->
<link href="public/css2/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body class="app header-fixed left-sidebar-hidden right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

    <!--===========header start===========-->
    <header class="app-header navbar">

        <!--brand start-->
       {{--  <div class="navbar-brand">
            <a class="" >
                <img src="public/css2/img/vallery.png" srcset="assets/img/vallery.png 2x" alt="">
            </a>
        </div> --}}
        <!--brand end-->

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
            <!--page title start-->
            <div class="page-title">
                <h4 class="mb-0"> Generate Report
                  
                </h4>
                {{-- <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Purchase Order</li>
                </ol> --}}
            </div>
            <!--page title end-->
            <div class="col-md-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            Different Colors Tabs
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-info mb-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-p-info_1"><i class="icon-compass pr-2"></i> Daily Sales Report</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-p-info_2"><i class="icon-anchor pr-2"></i>Monthly Sales Report</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-p-info_3"><i class="icon-badge pr-2"></i>Tab 3</a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-p-info_1" role="tabpanel">
                                <!-- state start-->
            <div class="row">
                <div class=" col-md-3"></div>
                <div class=" col-md-6">
                    <div class="card card-shadow mb-4">
                        <div class="card-header">
                            <div class="card-title">
                               Export to Excel
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="picker-form">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12 ">Date Range</label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <div class="input-group" >
                                            <span class="px-3 py-2">From</span>
                                            <div class="input-group">
                            
                                                <input type="date" id="dt_from" onchange="handler(event);"/> 
                                                
                                            </div>
                                            <span class="px-3 py-2">To</span>
                                            <div class="input-group">
                                                
                                                <input type="date" id="dt_to" onchange="handler(event);"/>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="export-excel" type="button" class="generateReport btn btn-success">Generate</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class=" col-md-3"></div>
            </div>
            <!-- state end-->
            
                            </div>
                            <div class="tab-pane" id="tab-p-info_2" role="tabpanel">
                                <div class="row">
                                    <div class=" col-md-3"></div>
                                    <div class=" col-md-6">
                                        <div class="card card-shadow mb-4">
                                            <div class="card-header">
                                                <div class="card-title">
                                                   Export to Excel
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form class="picker-form">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12 ">Month Range</label>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <div class="input-group" >
                                                                <span class="px-3 py-2">From</span>
                                                                <div class="input-group">
                                                
                                                                    <input type="date" id="dt_from" onchange="handler(event);"/>
                                                                    
                                                                </div>
                                                                <span class="px-3 py-2">To</span>
                                                                <div class="input-group">
                                                                    
                                                                    <input type="date" id="dt_to" placeholder="MM/DD/YYYY" {{-- placeholder="dd-mm-yyyy" --}} onchange="handler(event);"/>
                                                                    <input type="date" {{-- data-date="" --}} placeholder="MM/DD/YYYY" {{-- data-date-format="DD MMMM YYYY" --}} {{-- value="2015-08-09" --}}>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="export-excel-monthly" type="button" class="generateReport btn btn-success">Generate</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-3"></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-p-info_3" role="tabpanel">
                                Take Bootstrap 4 to the next level with official premium themes—toolkits built on Bootstrap with new components and plugins, docs, and build tools.
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        <form id="form" action="orders" method="POST">
            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
            
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

function handler(e){
    var formData = new FormData();
    var token= $('#_token').val();
    formData.append("from", $("#dt_from").val());
    formData.append("to", $("#dt_to").val());
    formData.append('_token', token);
    console.log('qewqweqwe');
    $.ajax({
            url: 'updateDateFrom',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.send-loading').show();
            },
            success: function (response) {
            

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
  /* alert(e.target.value); */
}
function handler(mdt){
    //alert(mdt.target.value); 
    var formData = new FormData();
    var token= $('#_token').val();
    formData.append("from", $("#dt_from").val());
    formData.append("to", $("#dt_to").val());
    formData.append('_token', token);
    console.log('qewqweqwe');
    $.ajax({
            url: 'updateDateFrom',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.send-loading').show();
            },
            success: function (response) {
            

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
  /* alert(e.target.value); */
}

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
<!--[if lt IE 9]>
<script src="assets/vendor/modernizr.js"></script>
<![endif]-->

<!--init scripts-->
<script src="public/css2/js/scripts.js"></script>

<script src="public/css2/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
<script src="public/css2/vendor/date-picker-init.js"></script>

<!--select2-->
<script src="public/css2/vendor/select2/js/select2.min.js"></script>
<script src="public/css2/vendor/select2-init.js"></script>

</html>
