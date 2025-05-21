<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mosaddek.com/theme/diverse/table-datatable-show-hide.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2020 14:24:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>VL | Add Product</title>

    <!--google font-->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <!--common style-->
    <link href="{{ asset('public/css2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/lobicard/css/lobicard.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/themify-icons/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css2/vendor/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!--bs4 data table-->
    <link href="{{ asset('public/css2/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet"> --}}


    <!--custom css-->
    <link href="{{ asset('public/css2/css/main.css') }}" rel="stylesheet">

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
                    <li class="breadcrumb-item"><a href="#" class="default-color">Admin</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div>
            <!--page title end-->


            <div class="container-fluid">

                <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
            

            <div id="div1" class=" col-md-12 main new-wrap qwerty0">
                        
                <div class="card card-shadow mb-4">
                    {{-- <div class="card-header">
                        <div class="card-title">
                            <a href="#" class="btn btn-danger remove shadow btn-xs sharp">Remove Item  <i class="fa fa-trash"></i></a>

                            <a href="#" id="addtotable" class="btn btn-danger shadow btn-xs sharp">Place Order  <i class="fa fa-trash"></i></a>
                        </div>
                    </div> --}}
                    <div class="card-header">
                        <div class="card-title">
                            Add Product
                        </div>
                    </div>

                    
                    <div class="card-body ">
                        
                            <div class="row">
                                {{-- mark --}}
                                <div class="col-md-9 mb-3">
                                    <label >Product Description</label>
                                    <input id="product_name" class="form-control select2 option_s2"  name="product_name[]"  >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">Unit</label>
                                    <input type="text" id="unit" name="unit[]" class="form-control prod_price">
                                    
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <button id="save_items" class="btn btn-success">Add Item</button>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
{{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
<div class="card-body">
                <div class="modal fade" id="modalbody" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel5">Update Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="updateForm">
                                    @csrf
                                    <input type="hidden" name="item_number" id="item_number"/>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Product Description:</label>
                                        <input type="text" class="form-control" name="updateProduct" id="updateProduct">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Unit:</label>
                                        <input type="text" class="form-control" name="updateUnit" id="updateUnit">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="modalUpdate" type="button" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
{{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}

                <!-- state start-->

                <div class="row">
                    <div class=" col-sm-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Product List
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="table-show-hide">
                                    <strong class="mr-3">Toggle column:</strong>
                                    <a class="toggle-vis" data-column="0">Item #</a> - <a class="toggle-vis" data-column="1">Product Description</a> - 
                                    <a class="toggle-vis" data-column="2">Unit</a> - <a class="toggle-vis" data-column="3">Action</a>
                                </div> --}}
                                <table id="show-hide" class="display table table-bordered table-striped dt-init  {{-- table-bordered table-striped --}}" cellspacing="0" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th >P.O NO.</th>
                                        <th>Product Description</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th >P.O NO.</th>
                                        <th>Product Description</th>
                                        <th>Unit</th>
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
    <script src="{{ asset('public/css2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/lobicard/js/lobicard.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('public/css2/vendor/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/jquery.scrollTo.min.js') }}"></script>

    <!--datatables-->
    <script src="{{ asset('public/css2/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/css2/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script> --}}

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--init scripts-->
    <script src="{{ asset('public/css2/js/scripts.js') }}"></script>


    <script>

        
        $(document).ready(function() {

            /* var table = $('#show-hide').DataTable( {
                "scrollY": "400px",
                "paging": false
            } ); */
            /* $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();

                // Get the column API object
                var column = table.column( $(this).attr('data-column') );

                // Toggle the visibility
                column.visible( ! column.visible() );
            } ); */
                    $('#show-hide').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('get-records') }}',
                columns: [
                    { "data": "item_number" },
                    { "data": "product_name" },
                    { "data": "unit" },
                    { "data": "action",
                      "searchable": false,
                      "orderable": false
                                }
                ]
            });
//-------------------------save after add product----------------------------------------------
            $(document).on('click','#save_items',function () {
            var formData = new FormData();
            var token= $('#_token').val();
            formData.append("product_name", $("#product_name").val());
            formData.append("unit", $("#unit").val());
            formData.append('_token', token);
    
            var valueproduct_name = $("#product_name").val();
            var valueunit = $("#unit").val();
    
            if (valueproduct_name && valueunit != "" ) {
                $.ajax({
                    
                    url: 'save-product',
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
                            $('#show-hide tr:last').after(response);
                             Swal.fire(
                                    'Congratulations!',
                                    'Your Purchase Order has been Placed.',
                                    'success'
                                    );
                                    
                                    $("#product_name").val('');
                                    $("#unit").val('');
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
    
                }else{
                                    
                    Swal.fire(
                                    'Some information are required',
                                    'Product, Unit cannot be null!',
                                    'warning'
                                    );
                }
    
        });
//-------------------------save after add product ENDDDDDDD----------------------------------------------


//-------------------------SHOW MODAL AND GET ATTRIBUTES START-----------------------------------------------------------
        $(document).on('click','.update_btn',function (e) {
            event.preventDefault();
            let href = $(this).attr('data-id');
            console.log(href);
            /* jQuery.noConflict(); */
            $.ajax({
                url: 'product/'+href,//'{{ url('getProductById') }}',
                //type: 'POST',
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    console.log(result[0].product_name);
                    
                    $('#item_number').val(href);
                    $('#updateProduct').val(result[0].product_name);
                    $('#updateUnit').val(result[0].unit);
                    $('#modalbody').modal("show");
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
//-------------------------SHOW MODAL AND GET ATTRIBUTES END-----------------------------------------------------------
var closemodal = function(){
    $('#modalbody').modal('hide');
        }
//------------
//--------------------------UPDATE INSIDE MODAL---------------------------------------------------------
         $("#modalUpdate").on('click', function(e){
                   
                //var edit_id = $(this).data('data-id');

                var item_number = $('#item_number').val();
                var product = $('#updateProduct').val();
                var unit = $('#updateUnit').val();

                if(product != '' && unit != ''){
                    $.ajax({
                    url: 'updateProduct',
                    type: 'post',
                    
                    data: {
                            "_token": "{{ csrf_token() }}",
                            item_number: item_number,
                            product_name: product,
                            unit: unit
                        },
                    success: function(response){
                        //alert(response);
                        Swal.fire(
                                    'Success!',
                                    'Msg success: Data updated successfuly.',
                                    'success'
                                    )
                                    closemodal();
                                     item_number = $('#item_number').val();
                                     product = $('#updateProduct').val();
                                     unit = $('#updateUnit').val();
                                    
                                     var table = $('#show-hide').DataTable();
                                     table.ajax.reload();
                    }
                    });
                }else{
                    alert('cannot be null');
                }
                        });
//--------------------------UPDATE INSIDE MODAL END---------------------------------------------------------
         








        });
    </script>
</body>

</html>




