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
                        <h6 class="mb-0">Transaction History
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
                                        <th scope="col">ID</th>
                                        <th scope="col">Transaction Type</th>
                                        <th scope="col">Transaction No.</th>
                                        <th scope="col">Account Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Reference No.</th>
                                        <th scope="col">Total</th>
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

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#show-hide').DataTable({
            processing: true,
            serverSide: true,
            scrollY:"370px",
            scrollX:true,
            ajax: '{{ url('storeBackEntryRequest') }}',
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
                    "data": "payment" 
                    },
                { 
                    "data": "reference_no" 
                    },
                { 
                    "data": "total_orders" 
                    },
                { 
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                    }
            ] 
        });
    });

    $(document).on('click', '#approved', function(){
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
                url: 'processBackEntry',
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
