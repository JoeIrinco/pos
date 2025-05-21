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
    {{-- <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <!--custom css-->
    <link href="public/css2/css/main.css" rel="stylesheet">
{{-- sweet alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                            <li><a href="orders">Manage P.O.</a></li>
                        </ul>
                    </li>

                    

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" icon-grid"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li class="sub-menu">
                                    <li><a href="{{ route('register') }}">{{ __('Register User') }}</a></li>
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
                    <li class="breadcrumb-item active">Client List</li>
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
                                    
                                    <div class="row">
                                        <div class="col-md-10">
                                            Client List
                                        </div>
                                        <div class="col-md-2 ">
                                            <button  class="btn btn-success shadow btn-s sharp mr-1 addnew_btn">Add New</button>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="table-show-hide">
                                    <strong class="mr-3">Toggle column:</strong>
                                    <a class="toggle-vis" data-column="0">P.O NO.</a> - <a class="toggle-vis" data-column="1">Account Name</a> - 
                                    <a class="toggle-vis" data-column="2">Address</a> - <a class="toggle-vis" data-column="3">Contact Person</a> 
                                    - <a class="toggle-vis" data-column="4">Contact No.</a> - <a class="toggle-vis" data-column="5">Order Date</a>
                                    - <a class="toggle-vis" data-column="6">Sales Agent</a>
                                </div> --}}
                                <table id="show-hide" class="display dt-init table table-bordered table-striped " cellspacing="0" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th >P.O NO.</th>
                                        <th>Account Name</th>
                                        <th>Address</th>
                                        <th>Contact Person</th>
                                        <th>Contact No.</th>
                                        <th>Area Code</th>
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
                                        <th>Area Code</th>
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

{{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
    <div class="card-body">
        <div class="modal fade bd-example-modal-lg" id="modalbody" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Client Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class=" col-md-12">
                            <div class="mb-4">
                                
                                        <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Account Name:</label>
                                                <input type="text" id="clientname" name="customer_address" class="text-uppercase form-control prod_price" placeholder="Account Name *" >
                                            </div>
                                        </div>
                                        <div class="row">   
                                            <div class="form-group col-md-10 mb-3">
                                                <label>Address:</label>
                                                <input type="text" id="clientaddress" name="customer_address" class="text-uppercase form-control prod_price" placeholder="Address *" >
                                            </div>
                                            <div class="form-group col-md-2 mb-3">
                                                <label>Area Code:</label>
                                                <input type="text" id="areacode" name="area_code" class="text-uppercase form-control prod_price" placeholder="Area Code *" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="exampleInputEmail1">Contact Person:</label>
                                                <input type="text" id="clientcontactperson" name="customer_contact_person" class="text-uppercase form-control" placeholder="Contact Person *" >
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Contact Number:</label>
                                                <input type="text" id="clientcontactnumber" name="customer_contact_number" class="form-control" placeholder="CONTACT NUMBER *" >
                                            </div>
                                        </div>
                                        <div class="row">                
                                            
                                        </div>    
                                        
                                
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="save" type="button" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}



{{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
    MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}
    <div class="card-body">
        <div class="modal fade bd-example-modal-lg" id="modalbodyforupdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Client Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class=" col-md-12">
                            <div class="mb-4">
                                @csrf
                                        <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
                                        <input type="hidden" name="idforupdateclientid" id="idforupdateclientid"/>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Account Name:</label>
                                                <input type="text" id="idforupdateclientname" name="idforupdateclientname" class="text-uppercase form-control prod_price" placeholder="Account Name *" >
                                            </div>
                                        </div>
                                        <div class="row">   
                                            <div class="form-group col-md-10 mb-3">
                                                <label>Address:</label>
                                                <input type="text" id="idforupdateclientaddress" name="idforupdateclientaddress" class="text-uppercase form-control prod_price" placeholder="Address *" >
                                            </div>
                                            <div class="form-group col-md-2 mb-3">
                                                <label>Area Code:</label>
                                                <input type="text" id="idforupdateareacode" name="idforupdateareacode" class="text-uppercase form-control prod_price" placeholder="Area Code *" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="exampleInputEmail1">Contact Person:</label>
                                                <input type="text" id="idforupdateclientcontactperson" name="idforupdateclientcontactperson" class="text-uppercase form-control" placeholder="Contact Person *" >
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Contact Number:</label>
                                                <input type="text" id="idforupdateclientcontactnumber" name="idforupdateclientcontactnumber" class="form-control" placeholder="CONTACT NUMBER *" >
                                            </div>
                                        </div>   
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="modalUpdate" type="button" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--  MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL
MODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODALMODAL --}}

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

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script> --}}

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
                ajax: '{{ url('get-clients') }}',
                 columns: [
                    { "data": "clientid" },
                    { "data": "clientname" },
                    { "data": "clientaddress" },
                    { "data": "clientcontactperson" },
                    { "data": "clientcontactnumber" },
                    { "data": "areacode" },
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

//-------------------------SHOW MODAL ADD CLIENT START-----------------------------------------------------------
        $(document).on('click','.addnew_btn',function (e) {
            event.preventDefault();
            $.ajax({
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    //alert('show add modal')
                    
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
//-------------------------SHOW MODAL ADD CLIENT END-----------------------------------------------------------


//-------------------------SHOW MODAL AND GET ATTRIBUTES START-----------------------------------------------------------
$(document).on('click','.update_btn',function (e) {
            event.preventDefault();
            let href = $(this).attr('data-id');
            console.log(href);
            $.ajax({
                url: 'client/'+href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    console.log(result[0].clientname);
                  
                    $('#idforupdateclientid').val(href);
                    $('#idforupdateclientname').val(result[0].clientname);
                    $('#idforupdateclientaddress').val(result[0].clientaddress);
                    $('#idforupdateclientcontactnumber').val(result[0].clientcontactnumber);
                    $('#idforupdateclientcontactperson').val(result[0].clientcontactperson);
                    $('#idforupdateareacode').val(result[0].areacode);
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
//-------------------------SHOW MODAL AND GET ATTRIBUTES END-----------------------------------------------------------
var closemodal = function(){
    $('#modalbodyforupdate').modal('hide');
        }
//--------------------------UPDATE INSIDE MODAL---------------------------------------------------------
$("#modalUpdate").on('click', function(e){
                   var idforupdateclientid = $('#idforupdateclientid').val();
                   var idforupdateclientname = $('#idforupdateclientname').val();
                   var idforupdateclientaddress = $('#idforupdateclientaddress').val();
                   var idforupdateclientcontactnumber = $('#idforupdateclientcontactnumber').val();
                   var idforupdateclientcontactperson = $('#idforupdateclientcontactperson').val();
                   var idforupdateareacode = $('#idforupdateareacode').val();
   
                   if(idforupdateclientid != '' &&  idforupdateclientname  != '' && idforupdateclientaddress != '' && idforupdateclientcontactnumber != '' && idforupdateclientcontactperson != '' && idforupdateareacode != ''){
                       $.ajax({
                       url: 'updateClient',
                       type: 'post',
                       
                       data: {
                               "_token": "{{ csrf_token() }}",
                               clientid: idforupdateclientid,
                               clientname: idforupdateclientname,
                               clientaddress: idforupdateclientaddress,
                               clientcontactnumber: idforupdateclientcontactnumber,
                               clientcontactperson: idforupdateclientcontactperson,
                               areacode: idforupdateareacode
                           },
                       success: function(response){
                           //alert(response);
                           Swal.fire(
                                    'Success!',
                                    'Msg success: Data updated successfuly.',
                                    'success'
                                    )
                                    closemodal();
                            $('#idforupdateclientid').val('');
                            $('#idforupdateclientname').val('');
                            $('#idforupdateclientaddress').val('');
                            $('#idforupdateclientcontactnumber').val('');
                            $('#idforupdateclientcontactperson').val('');
                            $('#idforupdateareacode').val('');
                            
                            /* table.ajax.reload(); */
                            var table = $('#show-hide').DataTable();
                            table.ajax.reload();
                       }
                       });
                   }else{
                       //alert('cannot be null');
                       Swal.fire(
                                    'Warning!',
                                    'Warning Msg: All information are required.',
                                    'warning'
                                    )
                   }
                           });
   //--------------------------UPDATE INSIDE MODAL END---------------------------------------------------------


//-------------------------save after add product----------------------------------------------
$(document).on('click','#save',function () {
            var formData = new FormData();
            var token= $('#_token').val();
            formData.append("clientname", $("#clientname").val());
            formData.append("clientaddress", $("#clientaddress").val());
            formData.append("clientcontactnumber", $("#clientcontactnumber").val());
            formData.append("clientcontactperson", $("#clientcontactperson").val());
            formData.append("areacode", $("#areacode").val());
            formData.append('_token', token);
    
            var valueclientname = $("#clientname").val();
            var valueclientaddress = $("#clientaddress").val();
            var valueclientcontactnumber = $("#clientcontactnumber").val();
            var valueclientcontactperson = $("#clientcontactperson").val();
            var valueareacode = $("#areacode").val();
    
            if (valueclientname && valueclientaddress && valueclientcontactnumber && valueclientcontactperson && valueareacode != "" ) {
                $.ajax({
                    
                    url: 'save_clients',
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
                                    
                                    $("#clientname").val('');
                                    $("#clientaddress").val('');
                                    $("#clientcontactnumber").val('');
                                    $("#clientcontactperson").val('');
                                    $("#areacode").val('');
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
    
                }else{
                                    
                    Swal.fire(
                                    'Warning!',
                                    'Warning Msg: All fields are required!',
                                    'warning'
                                    );
                }
    
        });
//-------------------------save after add product ENDDDDDDD----------------------------------------------





        } );
    </script>
</body>

</html>