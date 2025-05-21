<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mosaddek.com/theme/diverse/table-datatable-show-hide.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2020 14:24:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>VL | My Orders</title>

    <!--google font-->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <!--common style-->
    <link href="public/css2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css2/vendor/lobicard/css/lobicard.css" rel="stylesheet">
    <link href="public/css2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css2/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--bs4 data table-->
    <link href="public/css2/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--custom css-->
    <link href="public/css2/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
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
                <h4 class="mb-0"> Welcome Back!
                    <small>{{ Auth::user()->name }}</small> 
                </h4>
                <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                    <li class="breadcrumb-item active">My Orders</li>
                </ol>
            </div>
            <!--page title end-->


            <div class="container-fluid">

                <!-- state start-->

                <div class="row">
                    <div class=" col-sm-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    My Orders List
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="table-show-hide">
                                    <strong class="mr-3">Toggle column:</strong>
                                    <a class="toggle-vis" data-column="0">P.O NO.</a> - <a class="toggle-vis" data-column="1">Account Name</a> - 
                                    <a class="toggle-vis" data-column="2">Address</a> - <a class="toggle-vis" data-column="3">Contact Person</a> 
                                    - <a class="toggle-vis" data-column="4">Contact No.</a> - <a class="toggle-vis" data-column="5">Order Date</a>
                                </div> --}}
                                <table id="show-hide" class="display table table-bordered table-striped" cellspacing="0" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th >P.O NO.</th>
                                            <th>Account Name</th>
                                            <th>Address</th>
                                            <th>Contact Person</th>
                                            <th>Contact No.</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th >P.O NO.</th>
                                            <th>Account Name</th>
                                            <th>Address</th>
                                            <th>Contact Person</th>
                                            <th>Contact No.</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                   
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- state end-->

            </div>
        </main>
        <!--main contents end-->

        <!--right sidebar start-->
       
        <!--right sidebar end-->

    </div>
    <!--===========app body end===========-->




    <!--===========footer start===========-->
    
    



    <!--===========footer end===========-->


    <!-- Placed js at the end of the page so the pages load faster -->
    <script src="public/css2/vendor/jquery/jquery.min.js"></script>
    <script src="public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="public/css2/vendor/popper.min.js"></script>
    <script src="public/css2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
    <script src="public/css2/vendor/lobicard/js/lobicard.js"></script>
    <script class="include" type="text/javascript" src="public/css2/vendor/jquery.dcjqaccordion.2.7.js"></script>
    <script src="public/css2/vendor/jquery.scrollTo.min.js"></script>

    <!--datatables-->
    <script src="public/css2/vendor/data-tables/jquery.dataTables.min.js"></script>
    <script src="public/css2/vendor/data-tables/dataTables.bootstrap4.min.js"></script>


    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--init scripts-->
    <script src="public/css2/js/scripts.js"></script>


    <script>
        $(document).ready(function() {
            /* var table = $('#show-hide').DataTable( {
                "scrollY": "400px",
                "paging": false
            } );

            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();

                // Get the column API object
                var column = table.column( $(this).attr('data-column') );

                // Toggle the visibility
                column.visible( ! column.visible() );
            } ); */
            $('#show-hide').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    scrollY: true,
                    ajax: '{{ url('getmyorders') }}',
                    columns: [
                        { "data": "id" },
                        { "data": "customer_name" },
                        { "data": "customer_address" },
                        { "data": "customer_contact_person" },
                        { "data": "customer_contact_number" },
                        { "data": "created_at" },
                        { "data": "status" },
                        { "data": "action",
                        "searchable": false,
                        "orderable": false
                                    }
                    ] 
                });


        } );
    </script>
</body>

</html>




