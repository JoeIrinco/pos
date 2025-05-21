@extends('layouts.inventory.master')
@section('title','Home | Nearly Expire Product Lsit')
@section('page-title','Nearly Expire Product Lsit')

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
                        <small>Nearly Expire Product</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Invertory</li>
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
                        Nearly Expire Product Lsit
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <button id="print_nearExpire" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                        </div>
                        
                    </div>
                
                <div class="card-body">
                    <table id="expired-product-table" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Quantity</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>PO</th>
                            <th>Invoice</th>
                            <th>Lot</th>
                            <th>Location</th>
                            <th>Expiration Date</th>
                            <th>Date Order</th>
                            <th>Date Receive</th>
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
      <script src="{{asset('public/assets/js/inventory/expiredProducts.js?v=1')}}"></script>
      <script type="text/javascript">
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 

          $('body').on('click', '#print_nearExpire', function() {
            /* alert("Not Yet Ready"); */
        window.open('../inventory/get-expired-Product-pdf');        
        });

      </script>

@endsection

