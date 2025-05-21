<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="public/css2/img/favicon.html">

    <title>Admin Dashboard</title>

    <!--google font-->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

    <!--common style-->
    <link href="public/css2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css2/vendor/lobicard/css/lobicard.css" rel="stylesheet">
    <link href="public/css2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css2/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    {{-- <!--easy pie chart-->
    <link href="public/css2/vendor/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet"> --}}

    <!--custom css-->
    <link href="public/css2/css/main.css" rel="stylesheet">
</head>
<body class="app header-fixed left-sidebar-hidden right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

    <!--===========header start===========-->
    <header class="app-header navbar">

        <!--brand start-->
        {{-- <div class="navbar-brand">
            <a class="" href="index-2.html">
                <img src="assets/img/logo-dark.png" srcset="public/css2/img/logo-dark@2x.png 2x" alt="">
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




        <!--right side nav end-->
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
                                <a href="javascript:">
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
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="mb-0"> Dashboard
                                <small>statistics, charts many more</small>
                            </h4>
                            <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <div class="col-4">



                            <div class="btn-group float-right ml-2">


                            </div>

                            <div class="btn-group float-right"><div class="row" >
                                <div class="col-md-3 mb-3">
                                    <strong><label>Date:</label></strong>
                                    <input id = "dt" type="date" value="<?php echo date('Y-m-d'); ?>" onchange="handler(event);">
                                </div>

                            </div>
                               {{--  <button class="btn btn-danger btn-sm dropdown-toggle mt-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Quick Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--page title end-->


            <div class="container-fluid">

                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            Monthly Goal
                        </div>
                    </div>
                    <div class="card-body">
                        <p>3,000,000<Strong> Total Sales</Strong> / 4,000,000 <Strong>Quota</Strong></p>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>
                    </div>
                </div>

                <!--state widget start-->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-basket-loaded text-info f30"></i>
                                <h6 class="mb-0 mt-3">Order Placed</h6>
                                <p id="label_today_transaction" class="f12 mb-0">{{ $format = number_format($today_transaction) }} New Order Placed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="fa fa-money text-success f30"></i>
                                <h6 class="mb-0 mt-3">Sale</h6>
                                <p id="label_today_sell" class="f12 mb-0"><span>&#8369;</span>{{ /*$format = number_format(*/$today_sell/*)*/ }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-wallet text-primary f30"></i>
                                <h6 class="mb-0 mt-3">Cash</h6>
                                <p id="label_today_cash" class="f12 mb-0"><span>&#8369;</span>{{ /*$format = number_format(*/$today_cash/*)*/ }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="fa fa-credit-card text-success f30"></i>
                                <h6 class="mb-0 mt-3">Check</h6>
                                <p id="label_today_check"class="f12 mb-0"><span>&#8369;</span>{{ $format = number_format($today_check) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="fa fa-credit-card-alt text-info f30"></i>
                                <h6 class="mb-0 mt-3">Card (Debit)</h6>
                                <p id="label_today_card_debit" class="f12 mb-0"><span>&#8369;</span>{{ $format = number_format($today_card_debit) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="fa fa-credit-card-alt text-danger f30"></i>
                                <h6 class="mb-0 mt-3">Card (Credit)</h6>
                                <p id="label_today_card_credit" class="f12 mb-0"><span>&#8369;</span>{{ $format = number_format($today_card_credit) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="fa fa-credit-card-alt text-danger f30"></i>
                                <h6 class="mb-0 mt-3">Gcash</h6>
                                <p id="label_today_gcash" class="f12 mb-0"><span>&#8369;</span> {{ $format = number_format($today_gcash) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class=" icon-badge text-success f30"></i>
                                <h6 class="mb-0 mt-3">Paymaya</h6>
                                <p id="label_today_paymaya" class="f12 mb-0"><span>&#8369;</span> {{ $format = number_format($today_paymaya) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="fa fa-credit-card-alt text-danger f30"></i>
                                <h6 class="mb-0 mt-3">Online Transaction</h6>
                                <p id="label_today_online_transaction" class="f12 mb-0"><span>&#8369;</span> {{ $format = number_format($today_online) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="fa fa-credit-card-alt text-danger f30"></i>
                                <h6 class="mb-0 mt-3">Unpaid Transaction</h6>
                                <p id="label_today_online_transaction" class="f12 mb-0"><span>&#8369;</span> {{--{{ $collection ?? ''}}--}} </p>
                            </div>
                        </div>
                    </div>
                {{--{{ $format = number_format($collection ?? '') }}--}}
<!--                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class=" icon-badge text-success f30"></i>
                                <h6 class="mb-0 mt-3">Unpaid</h6>
                                <p id="label_today_unpaid" class="f12 mb-0">&#8369;  {{ $format = number_format($today_unpaid) }} <span class="float-right text-success"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class=" icon-badge text-success f30"></i>
                                <h6 class="mb-0 mt-3">Daily Profit</h6>
                                <p id="label_today_profit" class="f12 mb-0">$9887 This Daily Profit <span class="float-right text-success"><i class=" ti-arrow-circle-up"></i></span></p>
                            </div>
                        </div>
                    </div>-->
                </div>
                <!--state widget end-->





                <div class="row">
                    <!--Report widget start-->
                    <div class="col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                   {{--  Sales Statistics --}}
                                </div>
                            </div>

                            {{-- cointainer graph--}}
                            <div id="sales-chart-container" style="height: 300px;"></div>
                            <div class="card-header">
                                <div class="card-title">
                                   {{--  Sales Statistics --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Report widget end-->

                </div>




                {{-- <div class="row">
                    <!--Report widget start-->
                    <div class="col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Sales Report
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-0 ">ID #</th>
                                        <th class="border-0">Buyers</th>
                                        <th class="border-0">Product Name</th>
                                        <th class="border-0">Quantity</th>
                                        <th class="border-0">Price</th>
                                        <th class="border-0">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>15" Mackbook Pro</td>
                                        <td>1</td>
                                        <td>$1999</td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">Processing</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Szzad Tas</td>
                                        <td>iPhone X</td>
                                        <td>1</td>
                                        <td>$1299</td>
                                        <td>
                                            <span class="badge badge-pill badge-success">Delivered</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Tnisha Sabrin</td>
                                        <td>27" iMack SSD</td>
                                        <td>1</td>
                                        <td>$1499</td>
                                        <td>
                                            <span class="badge badge-pill badge-danger">Cancel</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Keny Rose</td>
                                        <td>iPad Mini</td>
                                        <td>3</td>
                                        <td>$2199</td>
                                        <td>
                                            <span class="badge badge-pill badge-warning">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jass Bery</td>
                                        <td>15" Mackbook Pro</td>
                                        <td>1</td>
                                        <td>$1999</td>
                                        <td>
                                            <span class="badge badge-pill badge-info">Processing</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>MH Geek</td>
                                        <td>Mac mini pro</td>
                                        <td>1</td>
                                        <td>$799</td>
                                        <td>
                                            <span class="badge badge-pill badge-success">Shipped</span>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Report widget end-->

                </div> --}}
            </div>
            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
        </main>
        <!--main contents end-->



    </div>
    <!--===========app body end===========-->


    <!--===========footer start===========-->
    <footer class="app-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    2021 © Vallery Enterprises
                </div>
                <div class="col-4">
                    <a href="#" class="float-right back-top">
                        <i class=" ti-arrow-circle-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!--===========footer end===========-->


    <!-- Placed js at the end of the page so the pages load faster -->
    <script src="public/css2/vendor/jquery/jquery.min.js"></script>
    <script src="public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="public/css2/vendor/popper.min.js"></script>
    <script src="public/css2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
    <script class="include" type="text/javascript" src="public/css2/vendor/jquery.dcjqaccordion.2.7.js"></script>
    <script src="public/css2/vendor/lobicard/js/lobicard.js"></script>
    <script src="public/css2/vendor/jquery.scrollTo.min.js"></script>

    <!--chartjs-->
    <script src="public/css2/vendor/chartjs/Chart.min.js"></script>

    <!--fromweb-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" integrity="sha512-dnUg2JxjlVoXHVdSMWDYm2Y5xcIrJg1N+juOuRi0yLVkku/g26rwHwysJDAMwahaDfRpr1AxFz43ktuMPr/l1A==" crossorigin="anonymous"></script>
    <!--chartjs initialization-->



<script>
    const salesChart = new Chartisan({
      el: '#sales-chart-container',
      url: "@chart('line_chart')",
      hooks: new ChartisanHooks()
      .colors()
      /* .datasets(['line','bar']) */
      /* .datasets([{type:'line',fill:false, borderColor:'green'},'bar']) */
      .datasets([{type:'line',fill:false, borderColor:'green'},'bar'])
      .title({
          display:true,text:'Daily Sales Statistics',fontSize:25
      })
    });

    function handler(e){
    var formData = new FormData();
    var token= $('#_token').val();
    formData.append("dt", $("#dt").val());
    formData.append('_token', token);
    $.ajax({
            url: 'updateDashboard',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.send-loading').show();
            },
            success: function (response) {
                /*alert('ok');*/
                $('#label_today_transaction').text(response.today_transaction); //console.log(response.today_transaction);
                $('#label_today_sell').text(response.today_sell);//console.log(response.today_sell);
                $('#label_today_cash').text(response.today_cash);//console.log(response.today_cash);
                $('#label_today_check').text(response.today_check);//console.log(response.today_card_debit);
                $('#label_today_card_debit').text(response.today_card_debit);//console.log(response.today_card_credit);
                $('#label_today_card_credit').text(response.today_card_credit);//console.log(response.today_check);
                $('#label_today_gcash').text(response.today_gcash);//console.log(response.today_check);
                $('#label_today_paymaya').text(response.today_paymaya);//console.log(response.today_check);
                $('#label_today_online_transaction').text(response.today_onlinetransfer);//console.log(response.today_check);
                $('#label_today_unpaid').text(response.today_unpaid);//console.log(response.today_check);
                $('#label_today_profit').text('ready for future update');//console.log(response.today_check);

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
   alert(e.target.value);
}

  </script>

        <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

    @stack('js')

    {{-- <!--custom chart-->
    <script src="public/css2/vendor/custom-chart/Chart.min.js"></script>
    <script src="public/css2/vendor/custom-chart/underscore-min.js"></script>
    <script src="public/css2/vendor/custom-chart/moment.min.js"></script>
    <script src="public/css2/vendor/custom-chart/accounting.min.js"></script>
    <!--custom chart init-->
    <script src="public/css2/vendor/custom-chart/custom-chart-init.js"></script> --}}


    {{-- <!--easy pie chart-->
    <script src="public/css2/vendor/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="public/css2/vendor/jquery-easy-pie-chart/easy-pie-chart-init.js"></script> --}}



    <!--init scripts-->
    <script src="public/css2/js/scripts.js"></script>

</body>

</html>

