@extends('layouts.admin.master')
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

    <!--===========app body start===========-->
    <div class="app-body mt-0">
        <!--main contents start-->
        <main class="main-content ml-0">
            <!--page title start-->
            <div class="page-title">
<!--                <h4 class="mb-0"> Journals

                </h4>
                 <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Purchase Order</li>
                </ol>-->
            </div>
            <!--page title end-->
            <div class="col-md-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            Journals
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-info mb-4" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-p-info_3" onclick="myFunction1()"><i class="fa fa-book pr-2"></i>Sales Journal</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-p-info_2" onclick="myFunction2()"><i class="fa fa-file-text pr-2"></i>Cash Receipts Journal</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-p-info_4" onclick="myFunction3()"><i class="icon-compass pr-2"></i> Cash Disbursement Journal</a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-p-info_1" role="tabpanel">
                                <!-- state start-->
            <div class="row">
                <div class=" col-md-3"></div>
                <div class=" col-md-6">
                    <div class="card card-shadow mb-4">

                    </div>
                </div>
                <div class=" col-md-3"></div>
            </div>
            <!-- state end-->

                            </div>
                            <div>{{--  class="tab-pane" id="tab-p-info_2" role="tabpanel" --}}
                                <div class="row">
                                    <div class=" col-md-3"></div>
                                    <div class=" col-md-6">
                                        <div class="card card-shadow mb-4">
                                            <div class="card-header">
                                                <div class="card-title">
                                                   Export to Excel
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form class="picker-form">
                                                    <div class="row">
                                                        <div class="col-md-3 mb-3">
                                                            <strong><label for="validationCustom03">From:</label></strong>
                                                            <input class="form-control" type="date" id="dt_from" onchange="handler(event);"/>
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <strong><label for="validationCustom05">To:</label></strong>
                                                            <input class="form-control" type="date" id="dt_to" placeholder="MM/DD/YYYY" onchange="handler(event);"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mt-3">{{-- cash-receipts-journal --}}
                                                        <a href="export-excel" type="button" class="btn btn-square btn-outline-success" id="myLink"><i class=" fa fa-download pr-2" >{!! "&nbsp;" !!}Download</i> </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-3"></div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane" id="tab-p-info_3" role="tabpanel">
                                <div class="row">
                                    <div class=" col-md-3"></div>
                                    <div class=" col-md-6">
                                        <div class="card card-shadow mb-4">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Export to Excel
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form class="picker-form">
                                                    <div class="row">
                                                        <div class="col-md-3 mb-3">
                                                            <strong><label for="validationCustom03">From:</label></strong>
                                                            <input class="form-control" type="date" id="dt_from" onchange="handler(event);"/>
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <strong><label for="validationCustom05">To:</label></strong>
                                                            <input class="form-control" type="date" id="dt_to" placeholder="MM/DD/YYYY" onchange="handler(event);"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <a href="export-excel" type="button" class="btn btn-square btn-outline-success"><i class=" fa fa-download pr-2" >{!! "&nbsp;" !!}Download</i> </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-3"></div>
                                </div>
                            </div> --}}

                        </div>
                    </div>


                </div>
            </div>
        <form id="form" action="orders" method="POST">
            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">

        </form>
        </main>
        <!--main contents end-->

    </div>
    <!--===========app body end===========-->


</div>


<script>

    function myFunction1() {
        
        document.getElementById('myLink').href="export-excel";

    }
    function myFunction2() {
        
        document.getElementById('myLink').href="cash-receipts-journal";

    }
    function myFunction3() {
        
        document.getElementById('myLink').href="export-excel-cdj";

    }

function handler(e){
    var formData = new FormData();
    var token= $('#_token').val();
    formData.append("from", $("#dt_from").val());
    formData.append("to", $("#dt_to").val());
    formData.append('_token', token);

    $.ajax({
            url: 'updateDateFrom',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.send-loading').show();
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
   alert(e.target.value);
}
function handler(mdt){
    //alert(mdt.target.value);
    var formData = new FormData();
    var token= $('#_token').val();
    formData.append("from", $("#dt_from").val());
    formData.append("to", $("#dt_to").val());
    formData.append('_token', token);

    $.ajax({
            url: 'updateDateFrom',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.send-loading').show();
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
   alert(e.target.value);
}
</script>

@endsection



