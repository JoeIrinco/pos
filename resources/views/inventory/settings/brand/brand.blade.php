@extends('layouts.inventory.master')
@section('title','Home | Brand Mangement')
@section('page-title','Brand Mangement')

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
                        <small>Vallery Brand Management</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Brand Management</li>
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
                        Brand list
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Add new Brand</button>
                        </div>
                        
                    </div>
                
                <div class="card-body">
                    <table id="ajax-datatable" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Brand Code</th>                    
                            <th>Brand name</th>                    
                            <th>Date Created</th>
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


    {{-- madal --}}
    @include('inventory.settings.brand.newBrandModal') 
    @include('inventory.settings.brand.editBrandModal') 
    

</div>
 


      <script src="{{asset('public/assets/js/inventory/brand.js?v=1')}}"></script>


      
      <script type="text/javascript">
          var token = "{{csrf_token()}}";
          //var auth_id = "{{Auth::id()}}"; 
    function btn_action(id,Transaction){
        console.log(id);
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
                   url: '{{ url('inventory/deletebrand') }}',
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
                          'Brand Details!',
                          'Successfully Deleted!',
                          'success'
                        );
                        window.location.href = 'brand-management';
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
                   url: '{{ url('inventory/get-one-brand') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id
                       
                   },
                   success: function (response) {
                       //console.log(response[0]['id']);
                    $('#id_edit').val(response[0]['id']);
                    $('#brand_edit').val(response[0]['name']);                  
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
            $('#edit_Brand_modal').modal('show');
        }
         }
   

          
      </script>

@endsection

