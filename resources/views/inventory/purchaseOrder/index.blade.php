@extends('layouts.inventory.master')
@section('title','Home | Purchase Order Management')
@section('page-title','Purchase Order Management')

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
                        <small>Vallery Purchase Order Management</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Order Management</li>
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
                        Purchase Order List
                    </div>
                    
                </div>

               
                
                <div class="card-header">
                    <div class="card-title">
                        @if ($permission->pdf_download_polist == 1)
                            <button id="po_list_btn" style="margin-left :5px; width:10%; " class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> PDF </button>
                        @else
                            <button style="margin-left :5px; width:10%; " class="btn-disable btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> PDF </button>
                        @endif
                        
                        
                        <div class="col-md-2 mb-2 pull-right">
                            <select id="Filter_PO_list" class="form-control pull-right"  name="Filter_PO_list">
                                <option value=''>All</option>
                                <option value='Completed'>Completed</option>
                                <option value='Pending'>Pending</option>
                                <option value='Cancel'>Cancel</option>
                            </select>
                        </div>
                        <div class="pull-right">
                           <label for="Filter_PO_list"> <Strong>Filter</Strong> </label>
                        </div>
                    </div>
                    <br>
                    
                    
                </div>
                
                <div class="card card-shadow mb-4">
                 
                
                <div class="card-body">
                    <table id="ajax-datatable" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th>PO Number</th>
                            <th>Order by</th>                            
                            <th>Total Price</th>
                            <th>Status</th>  
                            <th>Remarks</th>                     
                            <th>Order Date</th>
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
    @include('inventory.purchaseOrder.view_modal_po') 
    @include('inventory.purchaseOrder.receive_po') 
    

</div>
 


      <script src="{{asset('public/assets/js/inventory/po-list.js?v=4')}}"></script>
      <script type="text/javascript">
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 

        $('body').on('change', '#Filter_PO_list', function() {
        var table = $('#ajax-datatable').DataTable();      
        var data= $(this).val();
        table.destroy();
        
        
    $('#ajax-datatable').DataTable({       
       "order": [
           [5, "desc"]
       ],
       "processing": true,
       "serverSide": true,
       "ajax": {
           "url": "po-list",
           "dataType": "json",
           "type": "POST",
           "data": {
               _token: token,
               data:data
           }
       },
       "columns": [{
               "data": "po_num"
           },
           {
               "data": "user_name"
           },
           {
               "data": "total_price"
           },
           {
               "data": "status"
           },
           {
               "data": "comment" 
           },
           
           {
               "data": "created_at" 
           },
           {
               "data": "action",
               /* "searchable": false, */
               "orderable": false
           }
       ]

    });
    });
          $("#print_po" ).click(function() {
              var id =  $("#print_po" ).val();
              window.open('../inventory/get-po-details-pdf/'+id);
          
        });
    function btn_action(id,Transaction){
        console.log(id);
        
        if(Transaction=='receive_po'){  
            window.location = "receive-po/" + id
          //  $('#receive_POModalView').modal('show');
        }
        if(Transaction=='view'){  

            $.ajax({
                   url: '{{ url('inventory/get-po-details') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id
                   },
                   success: function (response) {
                    $('.proj_added_row').remove();
                    console.log(response);
                       console.log(response['po'].name);                       
                       $('#supplier_name').text(response['po'].name);
                       $('#supplier_address').text(response['po'].address);                       
                       $('#print_po').val(response['po'].id);
                       $('#po_number').text(response['po'].po_num);
                       $('#Status').text(response['po'].user_name);
                       $('#total_price').text(response['po'].total_price);
                       $('#orderBy').text(response['po'].status);
                       $('#oderDate').text(response['po'].created_at);   
             
                     
                       
                       response['product'].forEach(element => {
                        $('#table_view_project> tbody:last-child').append('<tr style="background-color:lightgrey" class="proj_added_row">' +
                        '<th colspan="4"><h4>Product Details</h4></th>' +
                        '</tr>' +
                        '<tr class="proj_added_row">' +
                        '<th>Product Name :</th>' +
                        '<td id="product_name">' +element.product_name  +' '+ element.brand +'</td>' +
                        '<th>Product Code :</th>' +
                        '<td id="product_code">' + element.product_code + '</td>' +
                        '</tr>' +

                        '<tr class="proj_added_row">' +
                        '<th>Description :</th>' +
                        '<td id="qunatity">' + element.product_description + '</td>' +
                        '<th>Quantity :</th>' +
                        '<td id="amount">' + element.quantity + '</td>' +
                        '</tr>' +
                        '<tr class="proj_added_row">' +
                        '<th>Amount :</th>' +
                        '<td id="amount">' + element.amount + '</td>' +
                        '<th>Total Amount :</th>' +
                        '<td id="totalAmount" colspan="3">' +  element.total+ '</td>' +
                        '</tr>');
                       });
                       //console.log(response[0]['id']);                   
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

            $('#POModalView').modal('show');
        }
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
           // window.location = "{{url('inventory/edit-po"+id+"')}}";
            window.location = "edit-po/" + id
        }
        }
   
        $('body').on('click', '#po_list_btn', function() {
            var state=$('#Filter_PO_list').val();
            if(state==""){
                state="all";
            }
            window.open('../inventory/get-po-list-pdf/'+state);

        });
          
      </script>

@endsection

