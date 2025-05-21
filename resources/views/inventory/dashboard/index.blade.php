@extends('layouts.inventory.master')
@section('title','Home | Inventory')
@section('page-title','Inventory')

@section('stylesheets')
{{-- additional style here --}}
@endsection

@section('content')


    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Vallery Inventory</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Inventory</li>
                    </ol>
                </div>
               
            </div>
        </div>
    </div>

    <!--page title end-->


    <div class="container-fluid">

        <!--state widget start-->
        <div class="row">
            {{-- <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        <i class="icon-people text-primary f30"></i>
                        <h6 class="mb-0 mt-3">New Users</h6>
                        <p class="f12 mb-0">32 New Users</p>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-4 col-sm-6 mb-4">
                <a href="{{ url('inventory/purchase_order-list') }}">
                <div class="card card-shadow">
                    <div class="card-body ">
                        <i class="icon-basket-loaded text-info f30"></i>
                        <h6 class="mb-0 mt-3">Pending PO</h6>
                        <p class="f12 mb-0">{{$poPendingCount}} Pending order</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-4 col-sm-6 mb-4">
                <a href="{{ url('inventory/expired-Product') }}">
                <div class="card card-shadow">
                    <div class="card-body ">
                        <i class=" icon-handbag text-danger f30"></i>
                        <h6 class="mb-0 mt-3">Neary Expiry Product</h6>
                        <p class="f12 mb-0">Have {{$expiredCount}} Neary to Expire Product</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-4 col-sm-6 mb-4">
            <a href="{{ url('inventory/critical-Product') }}">
                <div class="card card-shadow">
                    <div class="card-body ">
                        <i class=" icon-badge text-success f30"></i>
                        <h6 class="mb-0 mt-3">Critical Level Product</h6>
                        <p  class="f12 mb-0 critical_count"></p>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-xl-12 col-sm-12 mb-12 ">
                
            <div class="row">
                <div class=" col-sm-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header">
                            <div class="card-title">
                                Latest Price list
                            </div>
                            
                        </div>
                        <div class="card card-shadow mb-4">
                                    
                        <div class="card-body">
                            <table id="product-list-table" class="display table table-bordered table-striped" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Capital</th>
                                    <th>Selling Price</th>
                                    <th>Brand</th>
                                    <th>Product Code</th>
                                    <th>productname</th>
                                    <th>Product Description</th>
                                    <th>Date Updated</th>
                                    
                                   
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
        
        </div>
        </div>
        <!--state widget end-->
        </div>
        <!--state widget end-->

    </div>
    <script src="{{asset('public/assets/vendor/data-tables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/data-tables/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript">
     var token = "{{csrf_token()}}";
        dataload();
           function dataload(){
              
               $('#product-list-table').DataTable({
               "order": [
                   [6, "desc"]
               ],
               /* "processing": true, */
               "bProcessing": true,
               "serverSide": true,
               "ordering": true,
               "ajax": {
                   "url": "inventory/product-price-adjust-data-dashboard",
                   "dataType": "json",
                   "type": "POST",
                   "data": {
                       _token: token
                   }
               },
               "columns": [{
                       "data": "capital"
                   },
                   {
                       "data": "selling_price"
                   },
                   {
                       "data": "brand"
                   },
                   {
                       "data": "product_code"
                   },
                   
                   {
                       "data": "productname" 
                   }, 
                   {
                       "data": "product_description" 
                   },{
                       "data": "updated_at" 
                   }
               ]
       
           });
           }

    </script>
@endsection