@extends('layouts.admin.master')
@section('title','Journal Entry | Journal Entry')
@section('page-title','Journal Entry')

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
        <div class="app-body mt-0">

            <!--main contents start-->
            <main class="main-content ml-0">
                <div class="col-md-12">
                        <div class="card-body">
                            <div >
                                <div class="myContainer">
                                    <div class="row" >
                                        <div id="div_main" class=" col-md-12 mt-1" > {{-- start --}}
                                            <div class="card-body">
                                                    <h2 class="text-center form-title mt-1 mb-1">Journal Entry</h2>
                                                <div class="row" >
                                                    <div  class="col-md-3 mb-3">
                                                        <strong><label>Date:</label></strong>
                                                        <input type="date" id="cardDate" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control">
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div  class="col-md-3 mb-3">
                                                        <strong><label >Voucher No.</label></strong>
                                                        <input type="number" id="cardNo" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Ref No.:</label></strong>
                                                        <input id="cardRefNo" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Ref No. Date:</label></strong>
                                                        <input id="cardRefNoDate" type="date" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Vendor:</label></strong>
                                                        <input id="vendor" type="text" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Receive By:</label></strong>
                                                        <input id="receiveBy" type="text" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Address:</label></strong>
                                                        <input id="address" type="text" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div  class="col-md-6 mb-3">
                                                        <strong><label id="">GL Account:</label></strong>
                                                        <select style="border-color: rgb(0, 0, 0);" id="glAccount" class="form-control" >
                                                            <option value=''>--- SELECT GL Account ---</option>
                                                            @foreach ($gl_accounts as  $gl_account)
                                                            <option value='{{ $gl_account->gl_account_code }}'>{{ $gl_account->gl_account_code }}-{{ $gl_account->gl_transaction_level }}</option>
                                                        
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3" >
                                                        <strong><label>Description:</label></strong>
                                                        <input id="description" type="text" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Amount:</label></strong>
                                                        <input id="amount" type="number" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div  class="col-md-3 mb-3">
                                                        <strong><label id="">Mode of Payment:</label></strong>
                                                        <select style="border-color: rgb(0, 0, 0);" id="modeOfPayment" class="form-control" >
                                                            <option value=''>--- Select Payment Method ---</option>
                                                            <option value='CASH'>CASH</option>
                                                            <option value='CHECK'>CHECK</option>
                                                            <option value='ONLINE-PAYMENT'>ONLINE PAYMENT</option>
                                                        </select>
                                                    </div>
                                                    
                                                    
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Bank Name:</label></strong>
                                                        <input id="bankName" type="text" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Account Name:</label></strong>
                                                        <input id="accountName" type="text" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Reference Number:</label></strong>
                                                        <input id="paymentRefNo" type="text" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        <strong><label>Check Number:</label></strong>
                                                        <input id="checkNumber" type="text" style="border-color: rgb(0, 0, 0);" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6 mb-3" >
                                                        <strong><label for="message-text" class="col-form-label">Remarks:</label></strong>
                                                        <textarea class="form-control" id="remarks"></textarea>
                                                    </div>
                                                    <div class="col-md-3 mb-3" >
                                                        
                                                    </div>
                                                    <div class="col-md-3 mt-5" >
                                                        <label for="message-text" class="col-form-label"></label>
                                                        <button id="submit" type="button" style="width:100%" class="btn btn-sm btn-primary"><i class=" icon-cursor pr-1"></i><strong>Sumbit &nbsp;</strong></button>
                                                    </div>

                                                </div>

                                                
                                                

                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <form id="form" action="orders" method="POST">
                <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
            </form>
         
</div>

<script type="text/javascript">
                    
        $(document).on('click','#submit',function () {
        
            var formData = new FormData();
            var token= $('#_token').val();

            formData.append("cardDate", $("#cardDate").val());
            formData.append("cardNo", $("#cardNo").val());
            formData.append("cardRefNo", $("#cardRefNo").val());
            formData.append("cardRefNoDate", $("#cardRefNoDate").val());
            formData.append("vendor", $("#vendor").val());
            formData.append("glAccount", $("#glAccount").val());
            formData.append("description", $("#description").val());
            formData.append("amount", $("#amount").val());
            formData.append("modeOfPayment", $("#modeOfPayment").val());
            formData.append("bankName", $("#bankName").val());
            formData.append("receiveBy", $("#receiveBy").val());
            formData.append("address", $("#address").val());
            formData.append("remarks", $("#remarks").val());
            formData.append("accountName", $("#accountName").val());
            formData.append("paymentRefNo", $("#paymentRefNo").val());
            formData.append('_token', token);

            $.ajax({

                url: 'journalEntry',
                type: 'POST',
                data: formData,
                processing: true,
                contentType: false,
                processData: false,
                beforeSend: function () {

                    $("#submit").prop('disabled', true);

                },
                success: function (arr) {

                    if(arr.message != "err"){
                         toastr.success(arr.title);
                        setTimeout(function(){
                            location.reload();
                        }, 500);
                    }else{
                         toastr.warning(arr.title);
                         $("#submit").prop('disabled', false);
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

        });

</script>

@endsection



