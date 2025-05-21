@extends('layouts.inventory.master')
@section('title','Home | Purchased Invoices List')
@section('page-title','Request Return List')

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
                        <small>Request Return List</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Request Return List</li>
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
                        Request Return List

                        <select class="form-control pull-right col-md-4"  name="selectState" id="selectState">
                            <option value="">Select Transaction Type</option>
                            <option value="REPLACEMENT_P_PO">For Replacement</option>
                            <option value="RETURN_P_PO">For Return</option>
                        </select>
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                           {{--  <button id="print_po" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                            <select class="form-control pull-right col-md-4"  name="selectState" id="selectState">
                                <option value="">Select Transaction Type</option>
                                <option value="replacement">For Replacement</option>
                                <option value="return">For Return</option>
                            </select> --}}
                        </div>
                        
                    </div>
                
                <div class="card-body">
                    <table id="invoice-table" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>      
                            <th>Quantity</th>                            
                            <th>Remaining</th>                  
                            <th>Invoice</th>                  
                            <th>PO</th>                                                      
                            <th>Product</th>                            
                            <th>Supplier</th>                            
                            <th>Lot</th>                                                
                            <th>Expiration</th>
                            <th>Username</th>
                            <th>Transaction Type</th>
                            <th>Remarks</th>
                            <th>Status</th>
                            <th>Request Date</th>
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
   

      <script src="{{asset('public/assets/js/inventory/return-replace-list.js')}}"></script>
<script type="text/javascript">

var state ="";
var token = "{{csrf_token()}}";
$('#selectState').change(function(){     
    var table = $('#invoice-table').DataTable();      
    table.destroy();  
    console.log($(this).val());    
    dataTable_function($(this).val());
});

        
function dataTable_function(state){  
    
    $('#invoice-table').DataTable({
            "order": [
            [0, "desc"]
        ],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "return-list-data",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: '{{ csrf_token() }}',
                state:state
            }
        },
        "columns": [{
                "data": "quantity"
            },{
                "data": "remaining"
            },
            {
                "data": "invoice"
            },
            {
                "data": "po"
            },
            {
                "data": "productName"
            },
            {
                "data": "supplier_name" 
            },
            {
                "data": "lot" 
            },
            {
                "data": "expiration_date" 
            }, {
                "data": "name" 
            }, 
            {
                "data": "transactionType" 
            }, 
            {
                "data": "remarks" 
            }, {
                "data": "status" 
            },
            {
                "data": "created_at" 
            },
             {
                "data": "action",
                "searchable": false,
                "orderable": false
            }
        ]
        });
}

          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 
        function btn_action(data,type){
            if(type=='download'){
                window.open('../inventory/invoice-data-pdf/'+data);
            }

            if(type=='return'){  
                window.location = "invoice-list-return/" + data;
            }
        }

        function myFunction(data){
                    swal({
          title: "Are you sure?",
          text: "Return this Product to supplier",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, Return it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              
            $.ajax({
                url: "{{ url('inventory/returnItem') }}",
                type: 'POST',
                data: {
                    _token:"{{ csrf_token() }}",
                    id: data
                },
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {
                    if(response=="ok"){
                        swal("Returned!", "This product Returned", "success");
                    }else{
                        swal("NO Change", "Product not Return", "error");
                    }
                    
                },
                error: function (error) {
                    console.log('Product Add submitting error...');
                    console.log(error);
                    console.log(error.responseJSON.message);
                    $('.send-loading').hide();
                    swal({
                        title: 'Error!',
                        text: "Error Msg: " + error.responseJSON.message + "",
                        //timer: 1500,
                        type: "error",
                    })
                }
            });

           
          } else {
            swal("Cancelled", "Product no Return", "error");
          }
        });
        }

        
        function myFunction_rejected(data){
                    swal({
          title: "Are you sure?",
          text: "Rejected by supplier",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, Reject it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              
            $.ajax({
                url: "{{ url('inventory/rejectedItem') }}",
                type: 'POST',
                data: {
                    _token:"{{ csrf_token() }}",
                    id: data
                },
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {
                    if(response=="ok"){
                        swal("Rejected!", "This Product Rejected to return/Replace", "success");
                        location.reload();
                    }else{
                        swal("NO Change", "Product not Rejected", "error");
                    }
                    
                },
                error: function (error) {
                    console.log('Product Add submitting error...');
                    console.log(error);
                    console.log(error.responseJSON.message);
                    $('.send-loading').hide();
                    swal({
                        title: 'Error!',
                        text: "Error Msg: " + error.responseJSON.message + "",
                        //timer: 1500,
                        type: "error",
                    })
                }
            });

           
          } else {
            swal("Cancelled", "Product no Return", "error");
          }
        });
        }


        function myFunction_delete(data){
                    swal({
          title: "Are you sure?",
          text: "Want to Delete this Reques",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, Delete it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
              
            $.ajax({
                url: "{{ url('inventory/delelteItem') }}",
                type: 'POST',
                data: {
                    _token:"{{ csrf_token() }}",
                    id: data
                },
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {
                    if(response=="ok"){
                        swal("Rejected!", "This Request Deleted to return/Replace", "success");
                        location.reload();
                    }else{
                        swal("NO Change", "Warning", "error");
                    }
                    
                },
                error: function (error) {
                    console.log('Product Add submitting error...');
                    console.log(error);
                    console.log(error.responseJSON.message);
                    $('.send-loading').hide();
                    swal({
                        title: 'Error!',
                        text: "Error Msg: " + error.responseJSON.message + "",
                        //timer: 1500,
                        type: "error",
                    })
                }
            });

           
          } else {
            swal("Cancelled", "Product no Return", "error");
          }
        });
        }

      </script>

@endsection

