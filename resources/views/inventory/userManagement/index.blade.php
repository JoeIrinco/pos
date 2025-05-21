@extends('layouts.inventory.master')
@section('title','Home | User Mangement')
@section('page-title','Users Mangement')

@section('stylesheets')
{{-- additional style here --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard
                        <small>Vallery Users Management</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">User Management</li>
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
                        <div class="row">
                            <div class="col-sm-6">
                                User list
                            </div>
                                                        
                        </div>
                       
                     
                    </div>
                    
                </div>

                 
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            {{-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".new-userdata">Add new User</button> --}}
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".new-user">Add new User</button>
                        </div>
                        
                    </div>
                
                <div class="card-body">
                   <table id="user_permission_table" class="table table-condensed cell-border  small dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="text-left">Name</th>
                                <th class="text-left">Email</th>
                                <th class="text-left">Role</th>
                                <th class="text-left">Date Created</th>
                                <th class="text-left">Date Modified</th>
                                <th class="text-center">Permission</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- state end-->


    {{-- madal --}}
    @include('inventory.userManagement.addUserdata')
    @include('inventory.userManagement.editUserdata')
    @include('inventory.userManagement.addpermission')
    @include('inventory.userManagement.editpermission')

    @include('inventory.userManagement.addpermission_pos')
    @include('inventory.userManagement.editpermission_pos')

    
    
    
    
    
    
    <script>


    $( document ).ready(function() {
        
        var data="";
        datarepo(data);
        $('body').on('change', '#selectUserType', function() {
           
    });

    function datarepo(data){
        /* var table = $('#user_permission_table').DataTable();      
            var data= $(this).val();
            table.destroy(); */
            $('#user_permission_table').DataTable({
            "order": [
                [3, "desc"]
            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "../user-data-filter",
                "dataType": "json",
                "type": "POST",
                "data": {
                    _token: token,
                    data:data
                }
            },
            "columns": [{
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "role"
                },
                {
                    "data": "created_at"
                },

                {
                    "data": "updated_at" 
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                }
            ]

        });
        //alert(data);
    }

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
           

           
      
          //  $('#user_permission_table').DataTable();
            
            $(document).on("click", ".btn-new-permission", function () {
                var myBookId = $(this).data('id');
                const myArray = myBookId.split("%");
                var user_id = myArray[0];
                if(myArray[1]==2){                    
               
                $('.add_user_id').val(user_id);
                $('#new_permission').modal('show');
               
                }else if(myArray[1]==1){       
                    console.log(myArray[0]);
                console.log(myArray[1]);                                                     
                    $('#pos_new_permission').modal('show');
                    $('#pos_user_id').val(user_id);
                }
                
            });


            $(document).on("click", ".btn-edit-inventory", function () {
                var myBookId = $(this).data('id');
                const myArray = myBookId.split("%");
                console.log(myArray[0]);
                console.log(myArray[1]);
                if(myArray[1]==2){                    
                var user_id = myArray[0];
                $('#user_id_edit').val(user_id);

                $.ajax({
                url: '{{ url("/get-one-user") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id':user_id
                },
                success: function (response) {  
                    console.log(response[0].purchase_order_list);
                    $('#permission_id_edit').val(response[0].id);
                    $('#add_product_edit').prop('checked',response[0].add_product);
                    $('#edit_product_edit').prop('checked',response[0].edit_product);
                    $('#view_polist_edit').prop('checked',response[0].view_polist);
                    $('#receive_polist_edit').prop('checked',response[0].receive_polist);
                    $('#edit_polist_edit').prop('checked',response[0].edit_polist);
                    $('#add_new_supplier_edit').prop('checked',response[0].add_new_supplier);
                    $('#edit_supplier_edit').prop('checked',response[0].edit_supplier);
                    $('#delete_supplier_edit').prop('checked',response[0].delete_supplier);
                    $('#submit_po_form_edit').prop('checked',response[0].submit_po_form);
                    $('#add_product_form_edit').prop('checked',response[0].add_product_form);
                    $('#edit_purchase_order').prop('checked',response[0].purchase_order);
                    $('#edit_inventory').prop('checked',response[0].inventory);
                    $('#edit_product_manual_adjust').prop('checked',response[0].product_manual_adjust);
                    $('#edit_product_management').prop('checked',response[0].product_management);
                    $('#edit_supplier_management').prop('checked',response[0].supplier_management);
                    $('#edit_setting').prop('checked',response[0].setting);

                    $('#edit_purchase_order_list').prop('checked',response[0].purchase_order_list);
                    $('#edit_purchase_order_form').prop('checked',response[0].purchase_order_form);
                    $('#edit_purchase_invoice_list').prop('checked',response[0].purchase_invoice_list);
                    $('#edit_product_inventory').prop('checked',response[0].product_inventory);
                    $('#edit_near_expiry_product_list').prop('checked',response[0].near_expiry_product_list);
                    $('#edit_critical_level_product_list').prop('checked',response[0].critical_level_product_list);
                    $('#edit_product_manual_add_list').prop('checked',response[0].product_manual_add_list);
                    $('#edit_add_minus_product_qty').prop('checked',response[0].add_minus_product_qty);
                    $('#edit_import_product_data').prop('checked',response[0].import_product_data);
                    $('#edit_adjust_product_price_manual').prop('checked',response[0].adjust_product_price_manual);
                    $('#edit_branches_management').prop('checked',response[0].branches_management);
                    $('#edit_units_management').prop('checked',response[0].units_management);
                    $('#edit_location_management').prop('checked',response[0].location_management);
                    $('#edit_user_management').prop('checked',response[0].user_management);
                    $('#edit_product_list').prop('checked',response[0].product_list);
                    $('#edit_supplier_list').prop('checked',response[0].supplier_list);
                    $('#edit_deleteRequest').prop('checked',response[0].requestDelete);
                    $('#edit_deleteRequest_nav').prop('checked',response[0].requestDelete_nav);

                    $('#edit_delete_details').prop('checked',response[0].deleteAddManualDetails);
                    $('#edit_details').prop('checked',response[0].editAddManualDetails);
                    
                    
                    

                    //console.log(response[0]);
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
                $('#edit_permission').modal('show');
            
                }else if(myArray[1]==1){
                    var user_id = myArray[0];
                $('#user_id_edit').val(user_id);

                $.ajax({
                url: '{{ url("/get-one-user") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id':user_id
                },
                success: function (response) {  
                    console.log(response[0].purchase_order_list);
                    $('#edit_pos_user_id').val(response[0].id)
                    $('#edit_pos_Store').prop('checked',response[0].store)
                    $('#edit_pos_dashboard').prop('checked',response[0].dashboard)
                    $('#edit_pos_pos').prop('checked',response[0].pos)
                    $('#edit_pos_generate_report').prop('checked',response[0].general_report)
                    $('#edit_pos_transaction_history').prop('checked',response[0].transaction_history)
                    $('#edit_pos_AR').prop('checked',response[0].ar)
                    $('#edit_pos_pending_Document').prop('checked',response[0].pending_document)

                    //console.log(response[0]);
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
                    $('#pos_edit_permission').modal('show');
                }
                
            });
    
            $(document).on("click", ".btn-new-inventory", function () {
                var myBookId = $(this).data('id');
                $("#new_permission #edit_inventory_id").val( myBookId );
            });

            
            $('body').on('click','.edit_user',function() {
                         var user_id = $(this).attr("data-id");
                        $.ajax({
                           type:'POST',
                           url:'{{ url('inventory/edit-user-management') }}',
                           data:
                           {
                            user_id:user_id
                            },
                           success:function(data){
                            
                            $('#user_id').val(data.id);
                                $('#edit_name').val(data.name);
                                $('#edit_email').val(data.email);
                                $('#edit_is_admin').val(data.is_admin);
                                //$('#edit_areacode').val(data.areacode);
                                $('#edit_position').val(data.position);
                            $('.edit-user').modal('show');
                           
                          },
                          error: function(){
                            alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                          }
                        });
               
            });

            $( "#updateUserData" ).click(function() {
                
                            var user_id = $('#user_id').val();
                            var edit_name = $('#edit_name').val();
                            var edit_email = $('#edit_email').val();
                            var edit_is_admin = $('#edit_is_admin').val();
                           // var edit_areacode = $('#edit_areacode').val();
                            var edit_password = $('#edit_password').val();                
                            var edit_position = $('#edit_position').val();                
                        $.ajax({
                           type:'POST',
                           url:'{{ url('inventory/update-user-management') }}',
                           data:
                           {
                            user_id:user_id,
                            name:edit_name,
                            email:edit_email,
                            is_admin:edit_is_admin,
                            //areacode:edit_areacode,
                            position:edit_position,
                            password:edit_password
                            },
                           success:function(data){

                            swal({
                        title: 'Success!',
                        text: 'Successfully Updated',
                        timer: 1500,
                        type: "success",
                        }, function () {
                            window.location.href = 'user-management';
                        });
                          },
                          error: function(){
                            alert("Error: Server encountered an error. Please try again or contact your system administrator.");
                          }
                        });
               
            });

        
    });

        
        function form_submit() {
            document.getElementById("edit_permission").submit();
        } 
    </script>
    
    @endsection