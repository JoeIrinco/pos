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
                    <h4 class="mb-0"> Profile
                        <small>Vallery Users Profile</small>
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
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


                <div class="container text-center">
                
                  
                        <form class="form-lock" id="userForm" action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="lock-user text-center mb-4">
                            <img class="rounded-circle" src="../../public/image/profile/{{Auth::user()->profile_path}}" alt="" width="200"/>
                            <h6 class="mt-3">{{Auth::user()->name}}</h6>
                        </div>
                        {{-- <input class="form-group" type="file" name="" id="profile"> --}}
                   
                        <input type="hidden" id="userId" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="file" class="form-control form-control-sm" name="image">
                                </div>
                            </div>
                           
                            
                                  <div class="form-group row">
                                    <label for="fname" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname"  name="fname" placeholder="Full Name"  value="{{Auth::user()->name}}">
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="position" class="col-sm-3 col-form-label">Position</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="position" name="position" placeholder="Position"  value="{{Auth::user()->position}}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="position" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="position" class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                    </div>
                                </div>

                          
                        </div>
                        <div class="change-user">
                            <button type="submit" class="form-group btn btn-primary">Update User</button>
    
                        </div>
                    </form>
               
                
                </div>
            </div>    
        </div>
    </div>
 
    
    
    
    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
           $(document).ready(function () {

           
            $('body').on('submit', '#userForm', function (event) {
                
                event.preventDefault();
                console.log('Product Add submitting...');
                $.ajax({
                    url: "{{ url('inventory/updateProfile') }}",
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('.send-loading').show();
                    },
                    success: function (response) {
                       if(response>0 && response!="password"){
                        swal({
                            title: 'Success!',
                            text: 'Successfully Added',
                            timer: 1500,
                            type: "success",
                        }, function () {
                            location.reload();
                        });
                       }
                       if(response=="password"){
                        swal({
                            title: 'Error!',
                            text: "Error Msg: Password Not Mattch",
                            timer: 1500,
                            type: "error",
                        })
                       }
                      
    
                    },
                    error: function (error) {
                        console.log('Product Add submitting error...');
                        console.log(error);
                        console.log(error.responseJSON.message);
                        $('.send-loading').hide();
                        swal({
                            title: 'Error!',
                            text: "Error Msg: " + error.responseJSON.message + "",
                            //timer: 1500,
                            type: "error",
                        })
                    }
                });
            });
        });
    
    </script>
    
    @endsection