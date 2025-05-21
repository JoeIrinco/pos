@extends('layouts.inventory.master')
@section('title','Home | Product Inventory History')
@section('page-title','Product Inventory History')

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
                        <small>Product Inventory History</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="../../../../../../../inventory/Product-inventory" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Product Inventory History</li>
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
                        Product Inventory History 
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <button id="print_inventory" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                        </div>
                        
                    </div>
                
                <div class="card-body">
                    <table id="product-list-table" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Transaction Type</th>
                            <th>Quantity</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Unit</th>
                            <th>Lot no</th>
                            <th>Expiration Date</th>
                            <th>Critical Alert</th>
                            <th>Location</th>
                            <th>Rack</th>
                            <th>Shelf</th>                   
                            <th>Transaction Date</th>                   
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

{{-- modal --}}


</div>
      <!--datatables-->
      <script src="{{asset('public/assets/vendor/data-tables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/assets/vendor/data-tables/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('public/assets/js/inventory/productListView.js?v=2')}}"></script>
      <script type="text/javascript">
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 

          
    function btn_action(id,state){
        const id_array = id.split("%");
        if(state=='delete'){
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
                   url: '{{ url('inventory/delete-tranction-history') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id,
                        transId:id_array[1],
                        prodId:id_array[0],
                       
                   },
                   beforeSend: function () {
                       $('.send-loading').show();
                   },
                   success: function (response) {
                     
                    
                       if(response=="deleted"){
                        Swal.fire(
                          'Transaction Deleted!',
                          'Successfully Deleted!',
                          'success'
                        );
                        location.reload();
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
    }
      </script>

@endsection

