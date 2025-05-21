@extends('layouts.inventory.master')
@section('title','Home | Product Quantity Import')
@section('page-title','Product Quantity Import')

@section('stylesheets')
{{-- additional style here --}}

@endsection


<style>
    .btn-disable:hover{ 
        cursor: not-allowed;
    }
</style>

@section('content')

<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Product Quantity Import</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Product Quantity Manual Add</li>
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
                    <div class="card-title">
                    Product Quantity Import
                    </div>
                    
                </div>

               
                
                <div class="card-header">
                    
                
                <div class="card card-shadow mb-12">
                    <div class="card-title">
                        <form  id="ExportForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="file">Import Product</label>         
                            <input type="file" name="file" id="file" class="form-control">     
                            <br>       
                            <button id="importbtn" style="margin-left :5px; width:10%; " class="btn btn-dark" type="submit" ><i class="fa fa-file-pdf-o"></i> Import Product </button>                   
                        </form>           
                        
                    </div>
            </div>
        </div>
    </div>
    <!-- state end-->


    {{-- madal --}}

    

</div>
 


     {{--  <script src="{{asset('public/assets/js/inventory/po-list.js?v=4')}}"></script> --}}
      <script>
          var CSRF_TOKEN = "{{csrf_token()}}";
           $(document).ready(function(){
      

            $('#ExportForm').on('submit', function(event){  
           event.preventDefault();  
           $.ajax({  
                url:"{{ url('import') }}",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){  
                     if(data == "success"){
                         alert("Success");
                         window.location.href =  '../inventory/Product-inventory';
                     }else{
                        alert("Failed");
                     }
                }  
           });  
            }); 

             
            $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
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
                   
                   $( "#AddManualProduct" ).click(function() {
                    var productSelect= $('#productSelect').val();
                    var OrderPrice= $('#OrderPrice').val();
                    var qunatity_po= $('#qunatity_po').val();
                    var lot_no= $('#lot_no').val();
                    var exp_date= $('#exp_date').val();
                    var location_po= $('#location_po').val();
                    var rock_po= $('#rock_po').val();
                    var shelf_po= $('#shelf_po').val();
                    $.ajax({
                           type:'POST',
                           url:'{{ url('inventory/save-addProductInventory') }}',
                           data:
                           {
                            productSelect:productSelect,
                            OrderPrice:OrderPrice,
                            qunatity_po:qunatity_po,
                            lot_no:lot_no,
                            exp_date:exp_date,
                            location_po:location_po,
                            rock_po:rock_po,
                            shelf_po:shelf_po
                            },
                           success:function(data){
                            if(data=="okay"){
                                swal({
                                    title: 'Success!',
                                    text: 'Successfully Set',
                                    timer: 1500,
                                    type: "success",
                                }, function () {
                                    window.location.href =  '../inventory/list-addProductInventory';
                                });
                            }
                           
                          },
                          error: function(){
                            alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                          }
                        });
                   });
                   $( "#productSelect" ).change(function() {
                       var id = $(this).val();
                 
                        $.ajax({
                           type:'POST',
                           url:'{{ url('inventory/get-one-product') }}',
                           data:
                           {
                            id:id
                            },
                           success:function(data){
                            

                            
                            if(data[0].no_expiration == 1){
                                 $(".expirationDiv").hide();
                            }else{
                                $(".expirationDiv").show();
                            }
                            if(data[0].no_lot_no == 1){
                                 $(".lotDiv").hide();
                            }else{
                                $(".lotDiv").show();

                            }   
                            
                            $("#OrderPrice").val(data[0].selling_price);
                            console.log(data[0]);  
                            console.log(data[0].no_lot_no);                            
                          },
                          error: function(){
                            alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                          }
                        });
                    });
           });
           
            
      </script>

@endsection

