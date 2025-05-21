@extends('layouts.inventory.master')
@section('title','Home | Product Price Adjust')
@section('page-title','Product Price Adjust')

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
                        <small>Product Price Adjust</small>
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
                        Product Price Adjust
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    <div class="card-header">
{{--                         <div class="card-title">
                            <button id="print_product_manual" class="btn btn-dark pull-right" type="button" ><i class="fa fa-file-pdf-o"></i> Download PDF </button>
                        </div> --}}
                      {{--   <select name="" class="form-control" id="filter">
                            <option value="all">all</option>
                            <option value="Edited">Edited</option>
                            <option value="Not Edited">Not Edited</option>
                        </select> --}}
                        
                    </div>
                
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
@include('inventory.productManualAdd.edit-price') 

</div>
      <!--datatables-->
      <script src="{{asset('public/assets/vendor/data-tables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/assets/vendor/data-tables/dataTables.bootstrap4.min.js')}}"></script>
      {{-- <script src="{{asset('public/assets/js/inventory/productList.js?v=1')}}"></script> --}}
      <script type="text/javascript">
          var token = "{{csrf_token()}}";

          $('body').on('click', '#print_product_manual', function() {
            window.open('../inventory/product-inventory-data-pdf-manual');
        
            });
    dataload("all");
    function dataload(filter){
       
        $('#product-list-table').DataTable({
        "order": [
            [0, "desc"]
        ],
        /* "processing": true, */
        "bProcessing": true,
        "serverSide": true,
        "ordering": true,
        "ajax": {
            "url": "product-price-adjust-data",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: token,
                filter: filter
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
            },
                     
            {
                "data": "action",
                "searchable": false,
                "orderable": false
            }
        ]

    });
    }


    function btn_action(id,capital,selling){    
       $('#receive_POModalView').modal('show');
       $('#capital').val(capital);
       $('#selling').val(selling);
       $('#productID').val(id);
       
    }


/*     $('#filter').change(function(){
        $('#product-list-table').DataTable().destroy();	
        var filter = $(this).val();
        dataload(filter);
    }); */


    $('body').on('change', '#filter', function() {
        var table = $('#product-list-table').DataTable();      
        var data= $(this).val();
            dataload(data);
            var table = $('#product-list-table').DataTable();    
            table.destroy();
    });

    
    $('#submit').click(function(){

       var capital = $('#capital').val();
       var selling =  $('#capital').val();
       var id = $('#productID').val();
        $.ajax({
                   url: '{{ url('inventory/product-price-adjust-update') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id,
                       'capital':capital,
                       'selling':selling,
                       
                   },
                   beforeSend: function () {
                                             
                   },
                   success: function (response) {
                    if(response=="ok"){
                       
                        alert("Price Updated");
                       
                        dataload();
                        var table = $('#product-list-table').DataTable();    
                        table.destroy();
                    }
                   },
                   error: function (error) {

                   }
               });
    })
      </script>

@endsection

