@extends('layouts.inventory.master')
@section('title','Home | Purchase Order')
@section('page-title','Purchase Order')

@section('stylesheets')
{{-- additional style here --}}


@endsection

@section('content')



<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Vallery Purchase Order</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Order</li>
                    </ol>
                </div>
               
            </div>
        </div>
    </div>

    <!--page title end-->
    
    <!-- state start-->
    <div class="row">
        <div class=" col-sm-12">
            <div class="card card-shadow mb-4">
                <div class="card-header">
               

    <!-- state start-->
  
      
           
    
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title row">
                               
                            <input id="po_number" name="po_number" disabled type="text" value="{{$po_num}}">    
                                <div class="col-md-2">
                                <select style="width:100%" id="supplier_id" class="form-control"  name="product_name[]">
                                    <option value='0'>-- Select Supplier --</option>
                                </select>
                           </div>&nbsp;&nbsp;

                            @if ($permission->add_product == 1)
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Add Product</button>   &nbsp;&nbsp;
                            @else
                                <button type="button" class="btn btn-dark" style="cursor: not-allowed">Add Product</button>   &nbsp;&nbsp;
                            @endif

                          
                                <button id="Submit" type="button" class="btn btn-dark add_order"><i class=" icon-cursor pr-1"></i><strong>Submit PO&nbsp;</strong></button>
                           
                        </div>
                      
                            
                    </div>
                
                <div class="card-body">
                    <table id="show-hide" class="display dt-init table table-bordered table-striped" cellspacing="0" style="width:100%">
                        <thead>
                        <tr style="border-color: rgb(0, 0, 0);">
                            <th scope="col" style="border-color: rgb(0, 0, 0);">PRODUCT DESCRIPTION</th> 
                            <th scope="col" style="border-color: rgb(0, 0, 0);">UNIT COST</th>                                       
                            <th scope="col" style="border-color: rgb(0, 0, 0);">TOTAL</th>
                         
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
      
    
    <!-- state end-->


    {{-- madal --}}
    @include('inventory.purchaseOrder.addPoModal') 
    
            </div>
        </div>
    </div>
    <!-- state end-->


</div>
<!-- Placed js at the end of the page so the pages load faster -->
{{-- conflict --}}
{{-- <script src="/vallery/public/css2/vendor/jquery/jquery.min.js"></script>
<script src="/vallery/public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script> --}}


<script src="/vallery/public/css2/vendor/popper.min.js"></script>

<script src="/vallery/public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
<script src="/vallery/public/css2/vendor/lobicard/js/lobicard.js"></script>
<script class="include" type="text/javascript" src="/vallery/public/css2/vendor/jquery.dcjqaccordion.2.7.js"></script>
<script src="/vallery/public/css2/vendor/jquery.scrollTo.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!--datatables-->
<script src="/vallery/public/css2/vendor/data-tables/jquery.dataTables.min.js"></script>
<script src="/vallery/public/css2/vendor/data-tables/dataTables.bootstrap4.min.js"></script>



{{-- <!--init scripts--> --}}
{{-- <script src="/vallery/public/css2/js/scripts.js"></script> --}}

<!--toaster-->
<script src="/vallery/public/css2/vendor/toastr-master/toastr.js"></script>
<script src="/vallery/public/css2/vendor/toastr-master/toastr-init.js"></script>


<script type="text/javascript">
// var token = "{{csrf_token()}}";
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
      // console.log(count);
   
       var CSRF_TOKEN = "{{csrf_token()}}";
   
               $('#show-hide').DataTable({
                       processing: true,
                       serverSide: true,
                       scrollY:"400px",
                       scrollX:true,
                       ajax: '{{ url('getPoItems') }}',
                       columns: [
                           { "data": "product_name","orderable": false } ,
                           { "data": "unitCost" },
                           { "data": "total" }
                       
                       ] 
                   });
   
   
                   //select product serverside
                   $( "#productSelect" ).select2({
                       ajax: { 
                       url: 'selectgetproduct_PO',
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

                   //select product serverside
                   $( "#supplier_id" ).select2({
                       ajax: { 
                       url: 'selectgetSupplier',
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
                       url:'{{ url('findProduct_orderlist') }}',
                       data:{'id':prod_id},
                       dataType:'json',//return data will be json
                       success:function(data){
                       
                      
                           if(data['state'] == 0){
                            $('#unit').val(data['data'].unit);
                            $('#showproduct').val(data['data'].product_name);
                            $('#sellingprice').val(data['data'].amount);
                            $('#product_id').val(data['data'].product_id);
                           }
                           if(data['state'] == 1){
                            $('#sellingprice').val(data['data'].capital);
                            $('#unit').val(data['data'].unit);
                            $('#showproduct').val(data['data'].productname);                            
                            $('#product_id').val(data['data'].id);
                           }
                           
                         
                           
                           
                        /*    console.log(data.productname);
                           console.log(data.sellingprice); */
   
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
           formData.append("product_id", $("#product_id").val());
           formData.append('_token', token);
   
                   var valueproduct = $("#showproduct").val();
                   var valueqty = $("#qty").val();
                   var valueunit = $("#unit").val();
                    console.log(valueproduct);
                    console.log(valueqty);
                    console.log(valueunit);

           if (valueproduct && valueqty && valueunit != "" ) {
               $.ajax({
                   
                   url: '{{ url('store_purchase_save_items') }}',
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
                       if(response!="err" && response!="already"){
                           
                               //toastr.success(response.message, response.title);
                               toastr.success('Item Saved','Congratulations!');
                                   set_number ();
                                   var table = $('#show-hide').DataTable();
                                   table.ajax.reload();
                                   var countlog = $('#no').val();
                                   console.log(countlog);
                                   $(".add_item").prop('disabled', false);
                                   $('#showproduct').val('');
                       $('#qty').val('');
                       $('#unit').val('');
                       $('#sellingprice').val('');
                       }else if(response == "already"){
                        swal({
                           title: 'Error!',
                           text: "Error Msg: Product Already Added",
                           timer: 1500,
                           type: "error",
                       });
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
                   url: '{{ url('deletePoStore') }}',
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
       if($("#supplier_id").val()=="0" || $("#supplier_id").val()==0){
             swal({
                               title: 'Warning!',
                               text: "Warning Msg: Supplier Required",
                               timer: 1500,
                               type: "warning",
                           });
       }else{
           var formData = new FormData();
           var token= $('#_token').val();
           formData.append("invoice_no", $("#invoice").val());
           formData.append("created_at", $("#invoiceDate").val());
           formData.append("customer_name", $("#accountName").val());
           formData.append("customer_address", $("#address").val());

           formData.append("po_number", $("#po_number").val());
           formData.append("supplier_id", $("#supplier_id").val());
   
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
           
                       url: '{{ url('save-po') }}',
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
                           
                           if(response!="err" && response!="noOrder"){
   
                                       //toastr.success(response.message, response.title);
                                       toastr.success('Transaction Complete.','Congratulations!');
   
                                       setTimeout(function(){// wait for 5 secs(2)
                                           location.reload(); // then reload the page.(3)
                                       }, 1500);
                                       var table = $('#show-hide').DataTable();
                                       table.ajax.reload();
   
                           } if(response=="noOrder"){                                        
                            alert("No Order")
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
           /* ---------------------------------------------------------Submit Order ENDDDDD---------------------------------------------------------- */
   
   </script>

@endsection

