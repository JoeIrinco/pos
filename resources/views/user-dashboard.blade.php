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

    <title>Vallery Enterprises</title>

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
<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

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
                
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" ti-pencil-alt"></i>
                            <span>Orders</span>
                        </a>
                        <ul class="sub">
                            {{-- @if(Auth::user()->is_admin==0) --}}
                            <li><a  href="user-dashboard">Add Orders</a></li>
                            

                            <li><a  href="#">Upload P.O.</a></li>
                            <li><a  href="myorders">My Orders</a></li>
                        </ul>
                    </li>

                    

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" icon-grid"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li class="sub-menu">
                                    
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
                    <small>{{ Auth::user()->name ?? '' }}</small> 
                </h4>
                <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Purchase Order</li>
                </ol>
            </div>
            <!--page title end-->
            
        <form id="form" action="orders" method="POST">
            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
            <div class="container-fluid">

                <!-- state start-->
                <div class="row">
                    <div class=" col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title">
                                    Client Information
                                </div>
                            </div>
                            <div class="card-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Name:</label>
                                        {{-- <select type="text" id="clientinfo" class="form-control select2 option_s2" placeholder="Account Name *" required="">
                                            <option value=""> -- Select One --</option>
                                                    @foreach ($clientlist as $client)
                                                        <option value="{{ $client->clientid }}">{{ $client->clientname }}</option>
                                                    @endforeach
                                        </select> --}}
                                        <select id="clientinfo" class="form-control clientinfoafterajaxsuccess"  >
                                            <option value='0'>-- Select Client --</option>
                                          </select>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input type="text" id="info2" name="customer_address" class="text-uppercase form-control prod_price" placeholder="Address *" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact Person:</label>
                                        <input type="text" id="info3" name="customer_contact_person" class="text-uppercase form-control" placeholder="Contact Person *" required="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number:</label>
                                        <input type="text" id="info4" name="customer_contact_number" class="form-control" placeholder="CONTACT NUMBER *" required="">
                                    </div>
                                    <input type="text" hidden name="customer_name" id="info1" class="form-control"  required="">
                                    <input type="text" hidden value ="{{Auth::id()?? ''}}" id="senderid" name="senderid" class="form-control"  required="">
                                    <input type="text" hidden value ="{{Auth::user()->name ?? ''}}" id="sendername" name="sendername" class="form-control" >
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks:</label>
                                        <textarea class="form-control" rows="3" id="remarks" name="remarks"></textarea>
                                    </div>
                                    <button type="button" id="submitorder" {{-- type="submit"  value="Submit" --}} class="btn btn-success add_order">Submit</button>
                                    {{-- <a class="btn btn-info add_item">Add Item</a> --}}
                            </div>
                        </div>
                    </div>

                 {{--    -------------------------------------------------------------------------------- --}}
                 {{--    -------------------------------------------------------------------------------- --}}
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
                                    Add Order
                                </div>
                            </div>

                            
                            <div class="card-body ">
                                
                                    <div class="row">
                                        {{-- <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Item #</label><label for="validationCustom03"></label>
                                            <input class="input" id="no" required="" readonly>
                                        </div> --}}
                                        <input class="input" hidden id="no" value={{ $count }} required="" readonly>
                                        <div class="col-md-12 mb-3">
                                            <label >Product Description</label>
                                            <select id="productSelect" class="form-control"  name="product_name[]">
                                                <option value='0'>-- Select Product --</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom03">Quantity</label>
                                            <input type="number" id="qty" name="quantity[]" class="form-control" >
                                            <input type="text" hidden  id="showproduct" class="form-control" >
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04">Unit</label>
                                            <input type="text" id="unit" name="unit[]" class="form-control prod_price" readonly>
                                            
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05">Price</label>
                                            <input type="number" id="price" name="amount[]" class="form-control" >
                                            
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <a class="btn btn-info add_item" >Add Item</a>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div id="tool-placeholder"></div>
                               

                </div>

                <!-- state end-->
                

<!-- start table-->

<div class="card card-shadow mb-4">
    <div class="card-header">
        <div class="card-title">
            Order List
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
                <th scope="col">Action</th>
                
            </tr>
            </thead>
            {{-- <tbody>
                @foreach($items as $item)
            <tr id="dataTr{{  $item->id }}">
                
                <td name="quantity[]">{{ $item->quantity }}</td>
                <td name="unit[]">{{ $item->unit }}</td>
                <td name="product_name[]">{{ $item->product_name }}</td>
                <td name="amount[]">{{ $item->amount }}</td>
                <td ><div class="d-flex">
                    <a href="#" id="delete" class="btn btn-danger shadow btn-m sharp" data-id="{{  $item->id }}" value={{  $item->id }}>Delete</a>
                </div></td>
                
            </tr>
            @endforeach
            </tbody> --}}
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
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

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

//select client info serverside
      $( "#clientinfo" ).select2({
        ajax: { 
          url: 'selectgetclient',
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
//--------------------------------------- START Client Info Select 2 START --------------------------------------- 
$(document).ready(function(){
    var count = $('#no').val();
    var count1 = $('#no2').val();
    var count2 = $('#no3').val();
    console.log(count);
    console.log(count1);
    console.log(count2);

    var set_number3 = function(){
                var num1 = $('#no').val();
                num1++;
                $('#no').val(num1);
    }
    var delete_set_number = function(){
                var num1 = $('#no').val();
                num1--;
                $('#no').val(num1);
    }
                /* $(document).on('click', '#submitorder', function (e) {
                        e.preventDefault(); 
                        var data = $(this).serialize();
                        
                            
                            var counts=$("#no").val();
                            var counts2 = $("#no2").val();
                            var counts3 = $("#no3").val();
                            var clientname = $("#info1").val();
                            var clientaddress = $("#info2").val();
                            var clientcontactnumber = $("#info3").val();
                            var clientcontactperson = $("#info4").val();
                            if (clientname && clientaddress && clientcontactnumber && clientcontactperson != "" ){
                                if(counts !=0){
                                    //alert('pogi ako, sucess na send mo na');
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

                                                $('[id^=form]').submit();
                                                Swal.fire(
                                                'Congratulation!',
                                                'Your Purchase Order has been Placed.',
                                                'success'
                                                )
                                            }

                                            });
                                }else{
                                    //alert('panget ka, wala k pang order');
                                    Swal.fire(
                                'Please Check Your Order!',
                                'you dont have order yet.',
                                'warning'
                                ) 
                                }
                            }else{
                                //alert('panget ka, kumpletuhin mo kasi muna yung info bago mo i send');
                                Swal.fire(
                                'Some information are required',
                                'Account Name, Address, Contact Number, Contact Person cannot be null!',
                                'warning'
                                );
                            }
    }); */

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
                url: 'removedata',
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
                                delete_set_number();
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
 

    /* ---------------------------------------------------------add item STARTTTTTT---------------------------------------------------------- */
    $(document).on('click','.add_item',function () {
        var formData = new FormData();
        var token= $('#_token').val();
        formData.append("productSelect", $("#showproduct").val());
        formData.append("qty", $("#qty").val());
        formData.append("unit", $("#unit").val());
        formData.append("price", $("#price").val());   
        formData.append('_token', token);

                var valueproduct = $("#showproduct").val();
                var valueqty = $("#qty").val();
                var valueunit = $("#unit").val();

        if (valueproduct && valueqty && valueunit != "" ) {
            $.ajax({
                
                url: 'save-items',
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
                         Swal.fire(
                                'Congratulations!',
                                'Your Purchase Order has been Placed.',
                                'success'
                                );
                               
                                set_number3 ();
                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();

                    }
                  
                                
                    
                    $('#showproduct').val('');
                    $('#qty').val('');
                    $('#unit').val('');
                    $('#price').val('');

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
        /* ---------------------------------------------------------add item ENDDDDD---------------------------------------------------------- */


        /* ---------------------------------------------------------change client info STARTTT---------------------------------------------------------- */
    $(document).on('change','#clientinfo',function () {
    
			var prod_id=$(this).val();
            var test = $("#info1").val();
            console.log(test);
			console.log(prod_id);
			$.ajax({
				type:'get',
				url:'{{ url('findClientInfo') }}',
				data:{'clientid':prod_id},
				dataType:'json',//return data will be json
				success:function(data){
                    
					
                   console.log(data.clientname);
                    $('#info1').val(data.clientname)
                    $('#info2').val(data.clientaddress)
                    $('#info3').val(data.clientcontactperson)
                    $('#info4').val(data.clientcontactnumber)
				

				},
				error:function(){

				}
			});
		});


        var val = 1;
 var productselect = '#productSelect';

$(document).on('change',productselect,function () {
    
			var prod_id=$(this).val();
			console.log(prod_id);
			
			$.ajax({
				type:'get',
				url:'{{ url('findProductList') }}',
				data:{'item_number':prod_id},
				dataType:'json',//return data will be json
				success:function(data){
                    $('#unit').val(data.unit)
                    $('#showproduct').val(data.product_name)
                    console.log(data.unit);
                    console.log(data.product_name);
				},
				error:function(){

				}
			});
		});
    /* ---------------------------------------------------------change client end---------------------------------------------------------- */

});
    //---------------------------------------  END Client Info Select 2 END--------------------------------------- 


  

 /* function selectRefresh() {
  $('.option_s2').select2({ //apply select2 to my element
        placeholder: "Search product",
        allowClear: true
    });
} 


$(document).ready(function() {
    selectRefresh();
 
}); */
    /* ------------------------------------------------------------------SWAL SUBMIT----------------------------------------------- */



    /* ------------------------------------------------------------------SWAL SUBMIT----------------------------------------------- */

    /* ------------------------------------------DELETE START--------------------------------------------------------- */

    

    /* ------------------------------------------DELETE START--------------------------------------------------------- */

/* ---------------------------------------------------------add item STARTTTTTT---------------------------------------------------------- */
$(document).on('click','.add_order',function () {
        var formData = new FormData();
        var token= $('#_token').val();
        formData.append("clientid", $("#clientinfo").val());
        formData.append("customer_name", $("#info1").val());
        formData.append("customer_address", $("#info2").val());
        formData.append("customer_contact_person", $("#info3").val());
        formData.append("customer_contact_number", $("#info4").val());
        formData.append("remarks", $("#remarks").val());
        formData.append("senderid", $("#senderid").val());
        formData.append("sendername", $("#sendername").val());    
        formData.append('_token', token);

        var valueaccountname = $("#info1").val();
        var valueaddress = $("#info2").val();
        var valuecontactperson = $("#info3").val();
        var valuecontactnumber = $("#info4").val();
        var counts=$("#no").val();
        if (valueaccountname && valueaddress && valuecontactperson && valuecontactnumber != "" ) {
            if(counts !=0){
                    //alert('pogi ako, sucess na send mo na');
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

                                /* $('[id^=form]').submit(); */
                                $.ajax({
                
                url: 'save-orders',
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
                        //$('#data_table tr:last').after(response);
                         Swal.fire(
                                'Congratulations!',
                                'Your Purchase Order has been Placed.',
                                'success'
                                );
                                $('#clientinfo').val('');
                                $('#info2').val('');
                                $('#info3').val('');
                                $('#info4').val('');
                                $('#remarks').val('');
                                $('#no').val('');
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
                                                /* Swal.fire(
                                                'Congratulation!',
                                                'Your Purchase Order has been Placed.',
                                                'success'
                                                ) */
                                            }

                                            });
                                }else{
                                    //alert('panget ka, wala k pang order');
                                    Swal.fire(
                                'Please Check Your Order!',
                                'you dont have order yet.',
                                'warning'
                                ) 
                                }

            }else{
                                
                Swal.fire(
                                'Some information are required',
                                'Product, Unit, Qty cannot be null!',
                                'warning'
                                );
            }

    });
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
<!--[if lt IE 9]>
<script src="assets/vendor/modernizr.js"></script>
<![endif]-->

<!--init scripts-->
<script src="public/css2/js/scripts.js"></script>

<!--select2-->
<script src="public/css2/vendor/select2/js/select2.min.js"></script>
<script src="public/css2/vendor/select2-init.js"></script>

</html>
