@extends('layouts.inventory.master')
@section('title','Home | Product Manual Add List')
@section('page-title','Product Manual Add List')

@section('stylesheets')
{{-- additional style here --}}
<style>

</style>


@endsection

@section('content')

<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Product Manual Add List</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Product-List</li>
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
                        Product Manual Add List
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <button id="print_product_manual" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                        </div>
                        
                    </div>
                
                <div class="card-body yscroll">
                    <table id="product-list-table" class="display table table-bordered table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Process By</th>
                            <th>Quantity</th>
                            <th>Invoice Number</th>
                            <th>PO Number</th>
                           <th>Product Details</th>
                            {{--  <th>Product Name</th>
                            <th>Brand</th> --}}
                            <th>Unit</th>
                            <th>Lot no</th>
                            <th>Expiration Date</th>
                            <th>Location</th>
                            <th>Rack</th>
                            <th>Shelf</th> 
                            <th>Transaction Type</th>
                            <th>Remarks</th>                   
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
      {{-- <script src="{{asset('public/assets/js/inventory/productList.js?v=1')}}"></script> --}}
      <script type="text/javascript">
          var token = "{{csrf_token()}}";

          ;
          $('body').on('click', '#print_product_manual', function() {
        window.open('../inventory/product-inventory-data-pdf-manual');
        
    });
    $('#product-list-table').DataTable({
        "order": [
            [0, "desc"]
        ],
        /* "processing": true, */
        "bProcessing": true,
        "serverSide": true,
        "ordering": true,
        "scrollX":true,
        
        "ajax": {
            "url": "data-addProductInventory",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: token
            }
        },
        "columns": [{
                "data": "name"
            },
            {
                "data": "quantity"
            },
            {
                "data": "invoice_num"
            },
            {
                "data": "po_id"
            },
            
            {
                "data": "product_code"
            },
         /*    {
                "data": "productname"
            },
            {
                "data": "brand"
            }, */
            
            {
                "data": "unit" 
            },
            {
                "data": "lot_no"
            },
            {
                "data": "exp" 
            },
            {
                "data": "location"
            },
            {
                "data": "rack"
            },
            
            {
                "data": "shelf" 
            }, 
            {
                "data": "transaction_type" 
            },  
            {
                "data": "remarks"
            },     
            {
                "data": "action",
                "searchable": false,
                "orderable": false
            }
        ]

    });

    function btn_action(id,state){
        if(state=='Delete'){
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
                   url: '{{ url('inventory/delete-addProductInventory') }}',
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
                          'Manual Add Product Details!',
                          'Successfully Deleted!',
                          'success'
                        );
                        window.location.href =  '../inventory/list-addProductInventory';
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

        }else if(state=='Edit'){
            location.href = "edit-adjustment/"+id;
        }

    }
      </script>

@endsection

