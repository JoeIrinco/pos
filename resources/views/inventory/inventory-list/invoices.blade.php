@extends('layouts.inventory.master')
@section('title','Home | Purchased Invoices List')
@section('page-title','Purchased Invoices List')

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
                        <small>Purchased Invoices List</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Purchased Invoices List</li>
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
                        Purchased Invoices List
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
               {{--      <div class="card-header">
                        <div class="card-title">
                            <button id="print_po" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                        </div>
                        
                    </div> --}}
                
                <div class="card-body">
                    <table id="invoice-table" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>      
                            <th>Invoice</th>                  
                            <th>PO</th>                                                      
                            <th>Product Count Received</th>                            
                            <th>Date Receive</th>
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
      <script src="{{asset('public/assets/js/inventory/invoice.js?v=1')}}"></script>
      <script type="text/javascript">
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 

        $('body').on('click', '.btn_action', function() {
            var type = $(this).attr("data-action");
            var data = $(this).attr("data-id");

            if(type=='download'){
                window.open('../inventory/invoice-data-pdf/'+data);
            }

            if(type=='return'){  
                window.location = "return-view-page/" + data;
            }
            else if(type=='edit'){  
                window.location = "edit-invoice/" + data;
            }
        }); 
        
      </script>

@endsection

