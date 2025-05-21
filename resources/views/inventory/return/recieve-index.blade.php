@extends('layouts.inventory.master')
@section('title','Home | Product Replaced List')
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
                        <small>Product Replaced List</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Product Replaced List</li>
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
                        Product Replaced List
                    </div>
                    <input type="hidden" id="InvoiceNUmber" value="{{$details->invoice_num}}">
                    <br>
                    <P><strong>Return Product:</strong> {{$details->productname}} {{$details->product_description}}</P> 
                    <P><strong>Quantity Return:</strong> {{$details->quantity}} <br><strong>Quantity Recieve:</strong> {{$returnDatalist->receivePRoduct}}</P> 
                    
                    <button id="print_replace" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                    
                </div>
                <div class="card card-shadow mb-4">
              
                
                <div class="card-body">
                    <table id="receive-datta-list" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>      
                            <th>Quantity</th>                                           
                            <th>Invoice</th>                  
                            <th>PO</th>                                                      
                            <th>Product</th>                            
                            <th>Supplier</th>                            
                            <th>Lot</th>                                                
                            <th>Expiration</th>
                            <th>Recieve By</th>
                            <th>Recieve Date</th>
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
   

      
      <script type="text/javascript">

      $('#print_replace').click(function(){
        
        window.open('../replace-print/'+$('#InvoiceNUmber').val());
      });
        $('#receive-datta-list').DataTable({
            "order": [
            [0, "desc"]
        ],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../replace-data-list",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: '{{ csrf_token() }}',
                id :'{{$details->id}}'
            }
        },
        "columns": [{
                "data": "quantity"
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
                "data": "created_at" 
            },{
                "data": "action" 
            }
        ]
        });

        
        $('body').on('click', '#deleteBtn', function(){
         swal({
          title: "Are you sure?",
          text: "But you will still be able to retrieve this Data.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, archive it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
           var id =  $('#deleteBtn').attr("data-id");           
            $.ajax({
                        url: '{{ url('inventory/delete-replacement') }}',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id':id,
                            'requestId': '{{$requestId}}'
                        },
                        beforeSend: function () {
                            $('.send-loading').show();
                        },
                        success: function (response) {
                            if(response=="deleted"){
                                alert("Transaction Success");
                                location.href = "../../inventory/return-list";
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
          } else {
            swal("Cancelled", "Your Data file is safe :)", "error");
          }
        });
    });

      /*     var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 
        function btn_action(data,type){
            if(type=='download'){
                window.open('../inventory/invoice-data-pdf/'+data);
            }

            if(type=='return'){  
                window.location = "invoice-list-return/" + data;
            }
        } */
      </script>

@endsection

