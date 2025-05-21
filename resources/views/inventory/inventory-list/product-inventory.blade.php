@extends('layouts.inventory.master')
@section('title', 'Home | Product Inventory')
@section('page-title', 'Product Inventory')

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
                            <small>Product Inventory</small>
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
                            Product Inventory
                        </div>

                    </div>
                    <div class="card card-shadow mb-4">
                        <div class="card-header">
                            <div class="row">



                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control "   id="searchBox" placeholder="Search with date" aria-label="Right Icon" aria-describedby="dp-ig">          
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group date dpYears" data-date-viewmode="years"
                                            data-date-format="dd-mm-yyyy" data-date="{{ $now }}">
                                            <input type="text" class="required_input form-control " style=" cursor: pointer !important; background-color:white" readonly id="datepick"
                                                placeholder="{{ $now }}" aria-label="Right Icon"
                                                aria-describedby="dp-ig">
                                            <div class="input-group-append">
                                                <button id="dp-ig" class="btn btn-outline-secondary"
                                                    type="button"><i class="fa fa-calendar f14"></i></button>
                                            </div>
                                        </div>  
                                        </div>
                                    </div>
                                                          
                                                                     
                                </div>
                                <div class="col-md-1">
                                    <button id="loadDataBtn" class="btn btn-dark pull-right">Load Data</button>    
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="card-title">
                                        <button id="print_inventory" class="btn btn-dark pull-right" type="button"><i
                                                class="fa fa-file-pdf-o"></i> Download Excel </button>                                        
                                    </div>
                                    
                                </div>
                            </div>





                        </div>

                        <div class="card-body">
                            <table id="product-list-table" class="display table table-bordered table-striped"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        {{-- <th>Transaction</th> --}}
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
        <script src="{{ asset('public/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
        {{-- <script src="{{asset('public/assets/js/inventory/productList.js?v=2')}}"></script> --}}

        <script type="text/javascript" src="{{ asset('public/assets/datepicker/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/assets/datepicker/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/assets/datepicker/daterangepicker.min.js') }}"></script>


        {{--   <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> --}}


        <script type="text/javascript">
            var startDate = "";
            var endtDate = "";
            var searchBox = "";

            $(document).ready(function() {
                $('#loadDataBtn').click(function(){
                    endtDate = $('#datepick').val()
                    searchBox = $('#searchBox').val()

                    datatable_function(token, endtDate,searchBox);
                });
                datatable_function(token,  endtDate,searchBox);

              
            });
        </script>

        <script type="text/javascript">
            var token = "{{ csrf_token() }}";


            //var auth_id = "{{ Auth::id() }}"; 



            $('body').on('click', '#print_inventory', function() {
                //window.open('../inventory/product-inventory-data-pdf'); pdf
                if(endtDate!=""){
                    window.open('../inventory/product-inventory-data-pdf/'+endtDate);
                }else{
                     window.open('../inventory/product-inventory-data-pdf-all');
                }
                

            });

            function btn_action(id, types) {
                const id_array = id.split("%");
                if (id_array[5] == "N/A") {
                    id_array[5] = "NA"
                }

                if (id_array[4] == "N/A") {
                    id_array[5] = "NA"
                }
                if (types == "relocate") {
                    location.href = "../inventory/relocation/" + id_array[0] + "/" + id_array[1] + "/" + id_array[
                        2] + "/" + id_array[3] + "/" + id_array[4] + "/" + id_array[5];
                } else if (types == 'view') {
                    location.href = "../inventory/product-inventory-view/" + id_array[0] + "/" + id_array[1] + "/" + id_array[
                        2] + "/" + id_array[3] + "/" + id_array[4] + "/" + id_array[5];
                }
            }

            function datatable_function(token, endtDate) {
                $('#product-list-table').DataTable({
                    "order": [
                        [0, "desc"]
                    ],
                    /* "processing": true, */
                    "bProcessing": true,
                    "serverSide": true,
                    "ordering": true,
                    "destroy": true,
                    "ajax": {
                        "url": "Product-inventory-data",
                        "dataType": "json",
                        "type": "POST",
                        "data": {
                            _token: token,
                            end: endtDate,
                            searchBox:searchBox
                        }
                    },
                    "columns": [{
                            "data": "quantity"
                        },
                        {
                            "data": "product_code"
                        },
                        {
                            "data": "productname"
                        },
                        {
                            "data": "brand"
                        },

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
                            "data": "critical"
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
                            "data": "action",
                            "searchable": false,
                            "orderable": false
                        }
                    ]

                });
            }
        </script>

    @endsection
