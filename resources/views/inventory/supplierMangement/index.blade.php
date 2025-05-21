@extends('layouts.inventory.master')
@section('title','Home | Supplier Mangement')
@section('page-title','Supplier Mangement')

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
                        <small>Vallery Supplier Management</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Supplier Management</li>
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
                        Supplier list
                    </div>
                    
                </div>
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        @if(isset($permission) && $permission->add_new_supplier == 1)
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Supplier</button>
                        @else
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg" disabled>Add New Supplier</button>
                        @endif
                        <div class="card-title">
                        </div>
                        
                    </div>
                
                <div class="card-body">
                    <table id="ajax-datatable" class="display table table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Supplier Contact Person</th>
                            <th>Supplier Address</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Landline</th>
                            <th>Tin No.</th>
                            <th>Payment Terms</th>
                            <th>Status</th>
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
    @include('inventory.supplierMangement.newSupplierModal') 
    @include('inventory.supplierMangement.editSupplierModal') 
    

</div>
 


      <script src="{{asset('public/assets/js/inventory/supplier.js?v=3')}}"></script>
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
                   url: '{{ url('inventory/get-one-supplier') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id
                       
                   },
                   success: function (response) {
                       console.log(response[0]);
                    $('#id_edit').val(response[0]['id']);
                    $('#name_edit').val(response[0]['name']);
                    $('#supplier_email_edit').val(response[0]['email']);
                    $('#contact_person_edit').val(response[0]['contact_person']);
                    $('#address_edit').val(response[0]['address']);
                    $('#mobile_no_edit').val(response[0]['mobile_no']);
                    $('#landline_edit').val(response[0]['landline']);
                    $('#tin_edit').val(response[0]['tin']);
                    $('#payment_term_edit').val(response[0]['payment_term']);    
                    $('#status_edit').val(response[0]['status']);      
                                  
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
            $('#edit_product_modal').modal('show');
        }
         }
   

          
      </script>

@endsection

