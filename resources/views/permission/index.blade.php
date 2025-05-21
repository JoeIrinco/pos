@extends('permission.inventory.master')
@section('title','Home | Purchase Order Management')
@section('page-title','Purchase Order Management')

@section('stylesheets')
{{-- additional style here --}}

@endsection


<style>
    .btn-disable:hover{ 
        cursor: not-allowed;
    }

    .dropdown-menu li{
        margin-right:10px;
        cursor: pointer;
        padding-left: 10px;
    }

    .dropdown-menu .li-enabled:hover{
        background-color: #1ca61c;
    }

    .disabled:hover {
        cursor: not-allowed;
        background-color: #EBEBE4;
    }
    .dropdown-menu a {
        display:block;
    }

</style>

@section('content')

<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> User Permission
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">POS</a></li>
                        <li class="breadcrumb-item active">User Permission</li>
                    </ol>
                </div>
               
            </div>
        </div>
    </div>

    <!--page title end-->
    
    <!-- state start-->
    
    <div class="row">
        <div class="col-md-12 ">
            <div class="col-md-12 padding-b-25">
                <div class = "table-responsive">
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
                            @forelse ($users as $user)
                                <tr>
                                    <td class="text-left">{{$user->name}}</td>
                                    <td class="text-left">{{$user->email}}</td>

                                    @if($user->is_admin == 1)
                                        <td class="text-left">Admin</td>
                                    @elseif($user->is_admin == 2)
                                        <td class="text-left">Inventory</td>
                                    @elseif($user->is_admin == 0)
                                        <td class="text-left">User</td>
                                    @endif
                                    
                                    <td class="text-left">{{$user->created_at}}</td>
                                    <td class="text-left">{{$user->updated_at}}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" data-toggle="dropdown">Action<span class="caret"></span></button>
                                            <ul class="dropdown-menu">    
                                                @if($user->is_admin == 1)
                                                    <li><a>Pending</a></li>
                                                @elseif($user->is_admin == 2)
                                                    @if ($user->user_id == null)
                                                        <li class="li-enabled"><a data-toggle="modal" data-target="#new_permission" data-id="{!!$user->users_id!!}" class="btn-new-inventory" title="View" >Add</a></li>
                                                        <li class="disabled"><a>Edit</a></li>
                                                        <li class="disabled"><a>Delete</a></li>
                                                    @else
                                                        <li class="disabled"><a>Add</a></li>
                                                        <li class="li-enabled"><a data-toggle="modal" data-target="#edit_permission" data-id="{!!$user->users_id!!}" class="btn-edit-inventory" title="Edit" >Edit</a></li>
                                                        <li class="li-enabled"><a data-id="{!!$user->users_id!!}" class="btn-delete" title="Delete" >Delete</a></li>
                                                    @endif
                                                @elseif($user->is_admin == 0)
                                                    <li><a>Pending</a></li>
                                                @endif                                                             
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p>No users</p>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('permission.inventory.addpermission');
@include('permission.inventory.editpermission');




<script>
    $(document).ready(function () {
        $('#user_permission_table').DataTable();

        $(document).on("click", ".btn-edit-inventory", function () {
            var myBookId = $(this).data('id');
            $("#edit_permission #edit_inventory_id").val( myBookId );
        });

        $(document).on("click", ".btn-new-inventory", function () {
            var myBookId = $(this).data('id');
            $("#new_permission #edit_inventory_id").val( myBookId );
        });
    });

    function form_submit() {
        document.getElementById("edit_permission").submit();
    } 
</script>

@endsection





