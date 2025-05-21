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

    .show-hide {
        font-size: 10px;
    }

</style>

@section('content')
@include('store.modals.payment-modal')
@include('store.modals.payment-modal-req')
<div class="container-fluid">

    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Account Receivable
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="#" class="default-color">POS</a></li>
                        <li class="breadcrumb-item active">Account Receivable</li>
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
                <div class="table-responsive">
                        <table id="show-hide" class="display dt-init table table-bordered table-striped" cellspacing="0" style="width: 100%">
                            <thead>
                            <tr>
                                <th scope="col">Transaction No.</th>
                                <th scope="col">Transaction Type</th>
                                <th scope="col">Invoice No.</th>
                                <th scope="col">Account Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Encoder</th>
                                <th scope="col">Date</th>
                                <th scope="col">Terms</th>
                                <th scope="col">Due</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                        </table>
                        <br/>
                        <br/>
                </div>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">

        $('.left-sidebar-toggler').click( function(){
            $( ".change-size" ).toggleClass( "col-md-12" );
            $( ".change-size" ).toggleClass( "col-md-10" );
        });

        $(document).on('click','.not_applicable',function () {

            $(".pending").prop('disabled', true);
            $("#atcSelect1").prop('disabled', true);
            $("#atcSelect2").prop('disabled', true);
            $("#atcSelect1").val('');
            $("#atcSelect2").val('');

        });
        $(document).on('click','.pending',function () {

            $(".not_applicable").prop('disabled', true);
            $("#atcSelect1").prop('disabled', true);
            $("#atcSelect2").prop('disabled', true);
            $("#atcSelect1").val('');
            $("#atcSelect2").val('');

        });


        $(document).ready(function(){

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            });

        /*$(document).on('click','#pickItem',function (e) {

            $('#modalbodyselectproduct').modal("show");

        });*/

        $(document).on('click','.submit_payment',function () {

            var formData = new FormData();
            var token= $('#_token').val();
            formData.append("id", $("#display_id").text());
            formData.append("transaction_id", $("#display_transaction_id").text());
            formData.append("display_client_name", $("#display_client_name").text());
            formData.append("display_invoice_no", $("#display_invoice_no").text());
            formData.append("display_transaction", $("#display_transaction").text());
            formData.append("display_total", $("#display_total").text());
            formData.append("display_balance", $("#display_balance").text());
            formData.append("payment_type", $("#payment_type").val());
            formData.append("input_check_number", $("#input_check_number").val());
            formData.append("input_bank", $("#input_bank").val());
            formData.append("input_check_date", $("#input_check_date").val());
            formData.append("input_ref", $("#input_ref").val());
            formData.append("input_account_name", $("#input_account_name").val());
            formData.append("input_amount", $("#input_amount").val());
            formData.append("input_payment_method", $("#input_payment_method").val());
            formData.append("input_payment_status", $("#input_payment_status").val());
            formData.append("display_invoice_type", $("#display_invoice_type").text());
            formData.append("input_other_bank", $("#input_other_bank").val());
            formData.append("other_payment_or_no", $("#other_payment_or_no").val());
            formData.append("other_payment_other_payment", $("#other_payment_other_payment").val());
            formData.append("other_payment_description", $("#other_payment_description").val());
            formData.append("payment_remarks", $("#payment_remarks").val());
            formData.append("other_payment_date", $("#other_payment_date").val());
            formData.append("tin", $("#nic").val());
            formData.append("atcSelect1", $("#atcSelect1").val());
            formData.append("atcSelect2", $("#atcSelect2").val());
            formData.append("input_ref", $("#input_ref").val());
            input_ref

            formData.append('_token', token);
            $.ajax({
                url: 'updatePayment',
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

                        $('#modalbodyforupdate').modal('hide');
                        $('#return_modal_body').modal('hide');
                        
                        
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 500);
                        toastr.success(response.title);
                        /* var table = $('#show-hide').DataTable();
                        table.ajax.reload(); */

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
                    console.log(result.client[0].customer_name)
                    console.log(result.client[0].invoice_no)
                    console.log(result.client[0].transaction_type)
                    console.log(result.client[0].balance)
                    console.log(result.client[0].invoice_type)
                    console.log(result.client[0].transaction_id + "eqweqweqwe")
                    console.log(result.client[0].atc1)
                    console.log(result.client[0].atc2)
                    console.log(result.client[0].tin)
                    console.log(result.payment)

                    $('#display_id').text(result.client[0].id);
                    $('#display_transaction_id').text(result.client[0].transaction_id);
                    $('#display_client_name').text(result.client[0].customer_name);
                    $('#display_invoice_no').text(result.client[0].invoice_no);
                    $('#display_transaction').text(result.client[0].transaction_type);
                    $('#display_invoice_type').text(result.client[0].invoice_type);
                    $('#display_total').text(result.client[0].final_total);
                    $('#nic').val(result.client[0].tin);
                    $('#atcSelect1').val(result.client[0].atc1);
                    $('#atcSelect2').val(result.client[0].atc2);
                    $('#display_balance').text((result.client[0].final_total - result.payment).toFixed(2));

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

                    $('#input_amount').val('');
                    $('#input_check_number').val('');
                    $('#input_bank').val('');
                    $('#input_other_bank').val('');
                    $('#input_check_date').val('');
                    $('#input_account_name').val('');
                    $('#input_ref').val('');
                    $('#payment_type').val('');

                    document.getElementById("div_check_number").style.display = "none";
                    document.getElementById("div_bank").style.display = "none";
                    document.getElementById("div_check_date").style.display = "none";
                    document.getElementById("div_reference_number").style.display = "none";
                    document.getElementById("div_account_name").style.display = "none";
                    /*document.getElementById("div_amount").style.display = "none";*/
                    document.getElementById("div_other_bank").style.display = "none";
                    /* document.getElementById("div_other_bank_back").style.display = "none"; */
                    null_last_page ();

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
            ajax: '{{ url('storeGetAr') }}',
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
                    "data": "customer_address"
                    },
                {
                    "data": "status"
                    },
                {
                    "data": "total_orders"
                    },
                {
                    "data": "balance"
                    },
                {
                    "data": "encoder"
                    },
                {
                    "data": "created_at"
                    },
                {
                    "data": "terms"
                    },
                {
                    "data": "terms_end"
                    },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                    }
            ]
        });
    });



                    var transactionselect = '#payment_type';
                    $(document).on('change',transactionselect,function () {

                    var type=$(this).val();
                    $.ajax({
                        type:'get',
                        url:'{{ url('storefindTotalPrice') }}',
                        data:{'type':type},
                        dataType:'json',//return data will be json
                        success:function(data){
                            if(type === ''){

                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "none";
                                /*document.getElementById("div_amount").style.display = "none";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                           }
                            if(type === 'value_cash'){

                                $('#input_payment_method').val('CASH');
                                $('#input_payment_status').val('');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "none";
                                /*document.getElementById("div_amount").style.display = "block";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                           }
                            if(type === 'value_check'){

                                $('#input_payment_method').val('CHECK');
                                $('#input_payment_status').val('');
                                document.getElementById("div_check_number").style.display = "block";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "block";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "none";
                                /*document.getElementById("div_amount").style.display = "block";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }if(type === 'value_debit'){

                                $('#input_payment_method').val('CARD');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "block";
                                /*document.getElementById("div_amount").style.display = "block";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }if(type === 'value_credit'){

                                $('#input_payment_method').val('CARD');
                                $('#input_payment_status').val('CREDIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "none";
                                document.getElementById("div_account_name").style.display = "block";
                                /*document.getElementById("div_amount").style.display = "block";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }if(type === 'value_gcash'){

                                $('#input_payment_method').val('GCASH');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "block";
                                document.getElementById("div_account_name").style.display = "block";
                                /*document.getElementById("div_amount").style.display = "block";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }if(type === 'value_paymaya'){

                                $('#input_payment_method').val('PAYMAYA');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "none";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "block";
                                document.getElementById("div_account_name").style.display = "block";
                                /*document.getElementById("div_amount").style.display = "block";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }if(type === 'value_deposit'){

                                $('#input_payment_method').val('DEPOSIT');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "block";
                                document.getElementById("div_account_name").style.display = "block";
                                /*document.getElementById("div_amount").style.display = "block";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }if(type === 'value_online_transfer'){

                                $('#input_payment_method').val('ONLINE BANK TRANSFER');
                                $('#input_payment_status').val('DEBIT');
                                document.getElementById("div_check_number").style.display = "none";
                                document.getElementById("div_bank").style.display = "block";
                                document.getElementById("div_check_date").style.display = "none";
                                document.getElementById("div_reference_number").style.display = "block";
                                document.getElementById("div_account_name").style.display = "block";
                                /*document.getElementById("div_amount").style.display = "block";*/
                                document.getElementById("div_other_bank").style.display = "none";
                                document.getElementById("div_other_bank_back").style.display = "none";
                                null_last_page ();

                            }
                        },
                        error:function(){

                        }
                    });
                });

                $(document).on('click','.select_again',function () {

                    document.getElementById("div_other_bank").style.display = "none";
                    document.getElementById("div_bank").style.display = "block";
                    $('#input_other_bank').val('');
                    $('#input_bank').val('');

                });

                $(document).on('click','.incomplete',function () {

                $('#nic').val('');

                });

                $(document).on('click','#save',function () {
                    $('#return_modal_body').modal("show");

                });


                    var inputbank = '#input_bank';
                    $(document).on('change',inputbank,function () {

                            var type=$(this).val();
                            console.log(type);

                                if(type === 'Other Bank'){

                                    document.getElementById("div_other_bank").style.display = "block";
                                    document.getElementById("div_bank").style.display = "none";
                                    $('#input_bank').val('');

                                }

                        });

                var null_last_page = function(){

                //null all input

                $('#input_check_number').val('');
                $('#input_bank').val('');
                $('#input_check_date').val('');
                $('#input_ref').val('');
                $('#input_account_name').val('');
                $('#input_amount').val('');
                $('#input_other_bank').val('');

                }

                    jQuery(function($){
                            $("#nic").mask("999-999-999-999");

                        });
</script>

@endsection





