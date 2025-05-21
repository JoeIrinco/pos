<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">

    <!--favicon icon-->
    <link rel="icon" type="image/png" size="16x6" href="{{ asset('public/image/vallery-logo-only.png') }}">

    <title>Admin-Order List</title>

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
    {{-- sweet alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    

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
                    <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                    <li class="breadcrumb-item active">Purchase Order</li>
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
                                    Orders List
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="table-show-hide">
                                    <strong class="mr-3">Toggle column:</strong>
                                    <a class="toggle-vis" data-column="0">P.O NO.</a> - <a class="toggle-vis" data-column="1">Account Name</a> - 
                                    <a class="toggle-vis" data-column="2">Address</a> - <a class="toggle-vis" data-column="3">Contact Person</a> 
                                    - <a class="toggle-vis" data-column="4">Contact No.</a> - <a class="toggle-vis" data-column="5">Order Date</a>
                                    - <a class="toggle-vis" data-column="6">Sales Agent</a>- <a class="toggle-vis" data-column="7">Action</a>
                                </div> --}}
                                <table id="show-hide" class="display dt-init table table-bordered table-striped" cellspacing="0" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th >P.O NO.</th>
                                        <th>Account Name</th>
                                        <th>Address</th>
                                        <th>Contact Person</th>
                                        <th>Contact No.</th>
                                        <th>Sales Agent</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    {{-- <tfoot>
                                    <tr>
                                        <th >P.O NO.</th>
                                        <th>Account Name</th>
                                        <th>Address</th>
                                        <th>Contact Person</th>
                                        <th>Contact No.</th>
                                        <th>Sales Agent</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot> --}}
                                   
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


            

            $('#show-hide').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: '{{ url('getPO') }}',
                    columns: [
                        { "data": "id" },
                        { "data": "customer_name" },
                        { "data": "customer_address" },
                        { "data": "customer_contact_person" },
                        { "data": "customer_contact_number" },
                        { "data": "sendername" },
                        { "data": "created_at" },
                        { "data": "status" },
                        { "data": "action",
                        "searchable": false,
                        "orderable": false
                                    }
                    ] 
                });

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
                $(document).on('click','.approved',function () {
                  
                                //var status = $(this).prop('checked') == true ? 'Approved' : 'Pending';
                                let href = $(this).attr('data-id');
                                console.log(href); 
                               /*  var id = $(this).data('data-id');
                                console.log(id); */
                                $.ajax({
                                    type: "GET",
                                    dataType: "json",
                                    url: 'changeStatusToApproved',
                                    data: {
                                            //'status': status, 
                                            'id': href
                                          },
                                    success: function(data){
                                    //console.log(data.success)
                                    Swal.fire(
                                    'Success!',
                                    'Msg success: status updated successfuly.',
                                    'success'
                                    )
                                    var table = $('#show-hide').DataTable();
                                    table.ajax.reload();
                                    }
                                });
                            });
                            
                            $(document).on('click','.delivered',function () {
                  
                  //var status = $(this).prop('checked') == true ? 'Approved' : 'Pending';
                  let href = $(this).attr('data-id');
                  console.log(href); 
                 /*  var id = $(this).data('data-id');
                  console.log(id); */
                  $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: 'changeStatusToDelivered',
                      data: {
                              //'status': status, 
                              'id': href
                            },
                      success: function(data){
                      //console.log(data.success)
                      Swal.fire(
                      'Success!',
                      'Msg success: status updated successfuly.',
                      'success'
                      )
                      var table = $('#show-hide').DataTable();
                      table.ajax.reload();
                      }
                  });
              });

              $(document).on('click','.canceled',function () {
                  
                  //var status = $(this).prop('checked') == true ? 'Approved' : 'Pending';
                  let href = $(this).attr('data-id');
                  console.log(href); 
                 /*  var id = $(this).data('data-id');
                  console.log(id); */
                  $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: 'changeStatusToCanceled',
                      data: {
                              //'status': status, 
                              'id': href
                            },
                      success: function(data){
                      //console.log(data.success)
                      Swal.fire(
                      'Success!',
                      'Msg success: status updated successfuly.',
                      'success'
                      )
                      var table = $('#show-hide').DataTable();
                      table.ajax.reload();
                      }
                  });
              });



        } );
    </script>
</body>

</html>



{{-- $nestedData['action'] =" <div class='dropdown'>
    <button class='btn btn-xs btn-warning dropdown-toggle' type='button' data-toggle='dropdown'>Action
        <span class='caret'></span></button>
    <ul class='dropdown-menu'>
    <label class='control control-solid control-solid-primary control--checkbox'>Approved
                            <input type='checkbox' checked='checked'/>
                            <span class='control__indicator'></span>
                        </label>
        <li><input data-id='{$item->id}' class='toggle-class' type='checkbox' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' data-on='Active' data-off='InActive' {{ $item->status ? 'checked' : '' }}>Approved</li>
        <li><a data-id='{$item->id}' href='items/{$item->id}' class='cancel-inspec' title='Cancel Inspection'>Delivered</a></li>
        <li><a data-id='{$item->id}' href='items/{$item->id}' class='cancel-inspec' title='Cancel Inspection'>Canceled</a></li>
        <li><a href='items/{$item->id}' title='View Project Details'>View</li>
        <li><a href='printPDF/{$item->id}' title='Edit Project Details'>Download</li>
        <li><a data-id='{$item->id}' class='cancel-inspec' title='Cancel Inspection'>Cancel</a></li>
    </ul>
    </div>";; --}}

   {{--  $nestedData['action'] ="<div class='col'>
        <div class='btn-group task-list-action'>
            <div class='dropdown '>
                <a href='#' class='btn btn-transparent border p-2 default-color dropdown-hover p-0' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='icon-options'></i>
                </a>
                <div class='dropdown-menu dropdown-menu-right'>
                    <a class='approved dropdown-item' data-id='{$item->id}' href='#'> <i class='icon-like text-info pr-2'></i> Approve</a>
                    <a class='delivered dropdown-item' data-id='{$item->id}' href='#'><i class='ti-shopping-cart text-success pr-2'></i> Delivered</a>
                    <a class='canceled dropdown-item' data-id='{$item->id}' href='#'><i class='icon-close text-danger pr-2'></i> Canceled</a>
                    <a class='dropdown-item' href='printPDF/{$item->id}'><i class='icon-cloud-download text-success pr-2'></i> Download</a>
                    <a class='dropdown-item' href='items/{$item->id}'><i class='icon-eye text-info pr-2'></i> View</a>
                </div>
            </div>
        </div>
    </div>";; --}}