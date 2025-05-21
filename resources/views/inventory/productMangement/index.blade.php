@extends('layouts.inventory.master')
@section('title','Home | Prouct Mangement')
@section('page-title','Prouct Mangement')

@section('stylesheets')
{{-- additional style here --}}
@endsection

@section('content')

<style>
    .btn-disable:hover{ 
        cursor: not-allowed;
    }
</style>

<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Vallery Product Management</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Product Management</li>
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
                        Product list
                    </div>
                </div>
                @if (isset($permission->edit_product))
                <input type="hidden" id="txt_editproduct" value="{!!$permission->edit_product!!}">                    
                @endif

                <div class="card card-shadow mb-4">
                  
                    

                    <div class="card-header">
                        <div class="card-title">
                            @if (isset($permission->add_product) && $permission->add_product == 1)
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Product</button>
                            @else
                                <button type="button" class="btn btn-dark btn-disable" data-toggle="modal" disabled>Add New Product</button>
                            @endif
                           
                            <button id="product_pdf" style="margin-left :5px" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> PDF </button>
                            <button id="productInventoryCard" style="margin-left :5px" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Print Inventory Card </button>
                            <!-- <button id="print_po"  style="margin-left :5px" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> EXCELL </button> -->
                        </div>
                        <br>
                        <div class="col-md-2 mb-2 pull-right">
                            <select id="Filter_Product_list" class="form-control pull-right"  name="Filter_Product_list">
                                <option value=''>All</option>
                                <option value='Active'>Active</option>
                                <option value='Phase Out'>Phase Out</option>
                            </select>
                        </div>
                        <div class="pull-right">
                           <label for="Filter_Product_list"> <Strong>Filter</Strong> </label>
                        </div>
                        
                    </div>
                
                <div class="card-body">
                    <table id="ajax-datatable" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>product_code</th>
                            <th>Brand</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>units</th>
                            <th>Location</th>
                            <th>Critical</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                       
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- state end-->


    {{-- madal --}}
    @include('inventory.productMangement.newProductModal') 
    @include('inventory.productMangement.editProductModal') 
    

</div>
 
<script>
$( document ).ready(function() {
    var selectedid="";
    var token = "{{csrf_token()}}";
  
    $('body').on('change', '#brand_add', function() {
        $.ajax({
            url: "{{ url('inventory/brandAutoComplete') }}",
            type: 'post',
            data: {
                _token:token,
                data:$(this).val()
            },
            success: function( data ) {
                console.log(data)
            $('#product_code_add').val(data);
            }
        });


    });

    $('body').on('click', '.productSelect', function() {
        
            
            if ($(this).prop('checked')) {
                selectedid += $(this).attr('data-id')+"/";
            }else{
                selectedid = selectedid.replace("/"+$(this).attr('data-id'),'');
            }
        console.log(selectedid);
    });
    $('body').on('change', '#Filter_Product_list', function() {
        var table = $('#ajax-datatable').DataTable();      
        var data= $(this).val();
        table.destroy();
        $('#ajax-datatable').DataTable({
        "order": [
            [7, "desc"]
        ],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "product-list",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: token,
                data:data
            }
        },
        "columns": [{
                "data": "id"
            },{
                "data": "product_code"
            },
            {
                "data": "brand"
            },
            {
                "data": "productname"
            },
            {
                "data": "product_description"
            },
            
            {
                "data": "unit" 
            },
            {
                "data": "location" 
            },
            {
                "data": "critical_alert" 
            },
            {
                "data": "Status" 
            },
            {
                "data": "created_at" 
            },            {
                "data": "action",
                "searchable": false,
                "orderable": false
            }
        ]

    });
       // alert(data);
    });

    
    $('body').on('click', '#productInventoryCard', function() {
        var state=$('#Filter_Product_list').val();
        if(state==""){
            state="all";
        }
        window.open('../inventory/product-inventory-card/'+selectedid);        
        selectedid="";

        var table = $('#ajax-datatable').DataTable();      
        var data= $(this).val();
        table.destroy();
        $('#ajax-datatable').DataTable({
        "order": [
            [7, "desc"]
        ],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "product-list",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: token,
            }
        },
        "columns": [{
                "data": "id"
            },{
                "data": "product_code"
            },
            {
                "data": "brand"
            },
            {
                "data": "productname"
            },
            {
                "data": "product_description"
            },
            
            {
                "data": "unit" 
            },
            {
                "data": "location" 
            },
            {
                "data": "critical_alert" 
            },
            {
                "data": "Status" 
            },
            {
                "data": "created_at" 
            },            {
                "data": "action",
                "searchable": false,
                "orderable": false
            }
        ]

    });
        
    });
    $('body').on('click', '#product_pdf', function() {
        var state=$('#Filter_Product_list').val();
        if(state==""){
            state="all";
        }
        window.open('../inventory/get-product-details-pdf/'+state);
        
    });
});

</script>

      <script src="{{asset('public/assets/js/inventory/inventory.js?v=3')}}"></script>
      <script type="text/javascript">
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 
          

    function btn_action(id,Transaction){
        console.log(id);
        /* delete */
        if(Transaction=='delete'){
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
                   url: '{{ url('inventory/deleteproduct') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id
                       
                   },
                   beforeSend: function () {
                       $('.send-loading').show();
                   },
                   success: function (response) {
                     
                    
                       if(response=="deleted"){
                        Swal.fire(
                          'Product Details!',
                          'Successfully Deleted!',
                          'success'
                        );
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

        }
        if(Transaction=='edit'){  

             $.ajax({
                   url: '{{ url('inventory/get-one-product') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id
                       
                   },
                   success: function (response) {
                       console.log(response.product[0]['id']);
                    $('#id_edit').val(response.product[0]['id']);
                  
                    $('#brand_edit').val(response.product[0]['brand']);
                    $('#product_code_edit').val(response.product[0]['product_code']);
                    $('#productname_edit').val(response.product[0]['productname']);
                    $('#product_description_edit').val(response.product[0]['product_description']);
                    $('#unit_edit').val(response.product[0]['unit']);
                    $('#status').val(response.product[0]['status']);
                    $('#critical_alert_edit').val(response.product[0]['critical_alert']);
                    $('#location_edit').val(response.product[0]['location']);

                    if(response.product[0]['no_expiration']==1){        
                    console.log(response.product[0]['no_expiration']);
                        $('#no_expiration_edit').attr("checked","checked");
                    }
                    if( response.product[0]['no_lot_no']==1){   
                    console.log(response.product[0]['no_lot_no']);
                        $('#no_lot_no_edit').attr("checked","checked");                        
                    }      
                    console.log(response.product[0]['branch']);
                    $('#branch_edit').val(response.product[0]['branch']);         
                   
                    
                    
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
            $('#edit_product_modal').modal('show');
        }
         }
   

   

        
        

          
      </script>

@endsection

