@extends('layouts.inventory.master')
@section('title','Home | Location Mangement')
@section('page-title','Location Mangement')

@section('stylesheets')
{{-- additional style here --}}
@endsection

@section('content')

<style>
    .btn-disable:hover{ 
        cursor: not-allowed;
    }
</style>

<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Location Management</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Product Management</li>
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
                        Product list
                    </div>
                </div>
                @if (isset($permission->edit_product))
                <input type="hidden" id="txt_editproduct" value="{!!$permission->edit_product!!}">                    
                @endif
                <div class="card-header">
                    <div class="card-title">                            
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Location</button>                                                                                
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    <div class="card-body">
                        <table id="lotTable" class="display table table-bordered table-striped" style="width: 100%">
                            <thead>
                            <tr>
                                <th  style="width: 30%">Lot No</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($Lot as $Lot)
                                    <tr>
                                        <td>{{$Lot->lot_no}}</td>
                                        <td>{{$Lot->created_at}}</td>
                                        <td><div class='dropdown'>
                                            <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                                            <span class='caret'></span></button>
                                            <ul class='dropdown-menu'>
                                                <li><a href='#' data-id="{{$Lot->id}}" onclick='btn_action({{$Lot->id}},"edit","Lot")' class='dropdown-item edit_location' title='View PO Details'>Edit</a></li>
                                            </ul></div>
                                            </td>
    
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                           
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card card-shadow mb-4">
                <div class="card-body">
                    <table id="locationTable" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th  style="width: 30%">Location</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($Locations as $Location)
                                <tr>                                  
                                    <td>{{$Location->location}}</td>
                                    <td>{{$Location->created_at}}</td>
                                    <td><div class='dropdown'>
                                        <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                                        <span class='caret'></span></button>
                                        <ul class='dropdown-menu'>
                                            <li><a href='#' data-id="{{$Location->id}}" onclick='btn_action({{$Location->id}},"edit","location")' class='dropdown-item edit_location' title='View PO Details'>Edit</a></li>
                                        </ul></div>
                                        </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                       
                        </tfoot>
                    </table>
                </div>
            </div>
           
            <div class="card card-shadow mb-4">
                <div class="card-body">
                    <table id="rackTable" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>          
                            <th style="width: 30%">Rack</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($Rack as $Rack)
                                <tr>                   
                                    <td>{{$Rack->rack}}</td>
                                    <td>{{$Rack->created_at}}</td>
                                    <td><div class='dropdown'>
                                        <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                                        <span class='caret'></span></button>
                                        <ul class='dropdown-menu'>
                                            <li><a href='#' data-id="{{$Rack->id}}" onclick='btn_action({{$Rack->id}},"edit","rack")' class='dropdown-item edit_location' title='View PO Details'>Edit</a></li>
                                        </ul></div>
                                        </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                       
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card card-shadow mb-4">
                <div class="card-body">
                    <table id="shelfTable" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th  style="width: 30%">shelf</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($ShelfLocation as $ShelfLocation)
                                <tr>
        
                                    <td>{{$ShelfLocation->shelf}}</td>
                                    <td>{{$ShelfLocation->created_at}}</td>
                                    <td><div class='dropdown'>
                                        <button class='btn btn-dark dropdown-toggle' type='button' data-toggle='dropdown'>Action
                                        <span class='caret'></span></button>
                                        <ul class='dropdown-menu'>
                                            <li><a href='#' data-id="{{$ShelfLocation->id}}" onclick='btn_action({{$ShelfLocation->id}},"edit" ,"shelf")' class='dropdown-item edit_location' title='View PO Details'>Edit</a></li>
                                        </ul></div>
                                        </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                       
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- state end-->


    {{-- madal --}}
    @include('inventory.location.newLocationModal') 
    @include('inventory.location.editLocationModal') 
    

</div>
 
<script>
$( document ).ready(function() {
    $('body').on('click', '#product_pdf', function() {

        $.ajax({
                   url: '{{ url('inventory/get-product-details-pdf') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                   },
                   success: function (response) {
                 
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
    });
});

</script>

      <script src="{{asset('public/assets/js/inventory/location.js?v=3')}}"></script>
      <script type="text/javascript">
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 

    function btn_action(id,Transaction,state){
       
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

             $.ajax({
                   url: '{{ url('inventory/get-one-location') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id,
                       'state':state
                       
                   },
                   success: function (response) {
                    console.log(response.lot_no);
                    console.log(response.location);
                    console.log(response.rack);
                    console.log(response.shelf);
                    if(response.lot_no ==undefined){
                        $('.lot_no_edit').hide();
                    }else{
                        $('.lot_no_edit').show();

                    }
                    if(response.location ==undefined){
                        $('.Location_edit').hide();
                    }else{
                        $('.Location_edit').show();
                        
                    }
                    if(response.rack ==undefined){
                      $('.Rack_edit  ').hide();
                    }else{
                        $('.Rack_edit  ').show();
                        
                    }
                    if(response.shelf ==undefined){
                      $('.Shelf_edit  ').hide();
                    }else{
                        $('.Shelf_edit  ').show();
                    }
                    $('#id_edit').val(response.id);                  
                    $('#lot_no_edit').val(response.lot_no);
                    $('#Location_edit').val(response.location);
                    $('#Rack_edit').val(response.rack);
                    $('#Shelf_edit').val(response.shelf);

                    
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
            $('#edit_location_modal').modal('show');
        }
         }
   

   

        
        

          
      </script>

@endsection

