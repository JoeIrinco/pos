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

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Pending Documents
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">POS</a></li>
                        <li class="breadcrumb-item active">Pending Documents</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!--page title end-->

    <!-- state start-->
    <div class="row">
        <div class="col-md-12 ">
            <div class="col-md-12 padding-b-25 change-size">
                <div class = "table-responsive">
                    <table id="show-hide" class="display dt-init table table-bordered table-striped" cellspacing="0" style="width: 100%">
                        <thead>
                            <tr>
                                <th scope="col">Transaction No.</th>
                                <th scope="col">Transaction Type</th>
                                <th scope="col">Invoice No.</th>
                                <th scope="col">Account Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="row">
        <div class="col-md-12 ">
            <div class="col-md-12 padding-b-25 change-size">
                <div class = "table-responsive">
                    <table id="show-hide" class="display dt-init table table-bordered table-striped" cellspacing="0" style="width: 100%">
                        <thead>
                        <tr>
                            <th scope="col">Transaction No.</th>
                            <th scope="col">Transaction Type</th>
                            <th scope="col">Invoice No.</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Reference No.</th>
                            <th scope="col">Total</th>
                            <th scope="col">Encoder</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>-->
</div>
@endsection

<script src="{{asset("public/css2/vendor/jquery/jquery.min.js")}}"></script>
<script type="text/javascript">


        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            });


        $(document).on('click','.update_btn',function (e) {
            event.preventDefault();
            let href = $(this).attr('data-id');
            console.log(href);
            $.ajax({
                url: 'AccountReceivable/'+href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#nic').val('');
                    $('#atcSelect1').val('');
                    $('#atcSelect2').val('');
                    console.log(result.client[0].atc1);
                    console.log(result.client[0].atc2);
                    $('#display_transaction_id').text(result.client[0].transaction_id);
                    $('#display_client_name').text(result.client[0].customer_name);
                    $('#display_invoice_no').text(result.client[0].invoice_no);
                    $('#display_transaction').text(result.client[0].transaction_type);
                    $('#display_invoice_type').text(result.client[0].invoice_type);
                    $('#display_total').text(result.client[0].final_total);
                    $('#display_balance').text(result.client[0].final_total - result.payment);
                    $('#nic').val(result.client[0].tin);
                    $('#atcSelect1').val(result.client[0].atc1);
                    $('#atcSelect2').val(result.client[0].atc2);



                    if(result.client[0].invoice_type == "PRIVATE"){

                        document.getElementById("div_atc1").style.display = "block";
                        document.getElementById("div_atc2").style.display = "none";
                        document.getElementById("div_tin").style.display = "block";

                    }
                    if(result.client[0].invoice_type == "GOVERNMENT"){

                        document.getElementById("div_atc1").style.display = "block";
                        document.getElementById("div_atc2").style.display = "block";
                        document.getElementById("div_tin").style.display = "block";

                    }
                    if(result.client[0].invoice_type == "REGULAR" || result.client[0].invoice_type == "SENIOR" || result.client[0].invoice_type == "PWD"){

                        document.getElementById("div_atc1").style.display = "none";
                        document.getElementById("div_atc2").style.display = "none";
                        document.getElementById("div_tin").style.display = "none";

                    }

                    $('#modalbodyforupdate').modal("show");

                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        $(document).ready(function(){

            toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $('#show-hide').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollY:"370px",
                    scrollX:true,
                    ajax: '{{ url('getPendingDocuments') }}',
                    columns: [
                        {
                            "data": "id",
                            },
                        {
                            "data": "transaction_type",
                            },
                        {
                            "data": "invoice_no",
                            },
                        {
                            "data": "customer_name",
                            },
                        {
                            "data": "action",
                            "searchable": false,
                            "orderable": false
                            }
                    ]
                });
            });

                $(document).on('click','.incomplete',function () {

                    $('#nic').val('000-000-000-000');

                });

                $(document).on('click','#save',function () {

                var formData = new FormData();
                var token= $('#_token').val();
                formData.append("transaction_id", $("#display_transaction_id").text());
                formData.append("tin", $("#nic").val());
                formData.append("display_invoice_type", $("#display_invoice_type").text());

                formData.append("atcSelect1", $("#atcSelect1").val());
                formData.append("atcSelect2", $("#atcSelect2").val());



                formData.append('_token', token);

                    $.ajax({
                        url: 'updateDocuments',
                        type: 'POST',
                        data: formData,
                        processing: true,
                        serverSide: true,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('.send-loading').show();
                        },
                        success: function (response) {

                            if(response.message !="err"){

                                toastr.success(response.title);
                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();
                            }
                            else{

                                toastr.warning(response.title);
                                var table = $('#show-hide').DataTable();
                                table.ajax.reload();
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

                    jQuery(function($){
                            $("#nic").mask("999-999-999-999");

                        });
</script>






