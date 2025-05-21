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
@include('store.modals.edit-transaction-modal')
@include('store.modals.cancel-modal')
<!--    <div class="container-fluid">
        <div class="app-body mt-0">

            &lt;!&ndash;main contents start&ndash;&gt;
            <main class="main-content ml-0">-->
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="page-title">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-8">
                                                <h4 class="mb-0"> Transaction History
                                                </h4>
                                                <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                                                    <li class="breadcrumb-item"><a href="#" class="default-color">POS</a></li>
                                                    <li class="breadcrumb-item active">Transaction History</li>
                                                </ol>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                        <div class="myContainer">

                                            {{-- newwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww --}}

                                            <div class="row" >
                                                    <div id="div_main" class=" col-md-6 mt-1" style="display: block">


                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <div class="col-md-12 mt-1">
                                                            
                                                        </div>
                                                        <div class="card-body">
                                                                <table id="show-hide" class="display dt-init table table-bordered table-striped table-responsive"{{-- id="data_table" class="table table-responsive" --}}>
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
                                                                </table>
                                                                <br/>
                                                                <br/>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                            </div>
                        </div>

<script src="{{asset("public/css2/vendor/jquery/jquery.min.js")}}"></script>
<script type="text/javascript">

$(document).on('click', '.delete', function(){

        var id = $(this).data("id");
        var status = $(this).data("status");
        var value = $(this).data("value");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'info',
            popup: '',
            animation: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var token= $('#_token').val();
            $.ajax({
                url: 'delete',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id':id,
                    'status':status

                },
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {

                    if(response.message = 'err'){

                        toastr.warning(response.title);

                    }if(response.message = 'success'){

                        toastr.success(response.title);
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

        }
        });

    });
    $(document).on('click', '.save', function(){

        var id = $('#transaction_id').text();
        var cancelled_date = $('#cancel_date').val();
        if(cancelled_date == ''){
            toastr.warning('','Please Select Date');
        }else{

            var token= $('#_token').val();
            $.ajax({
                url: 'cancel',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id':id,
                    'cancel_date':cancelled_date

                },
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {
                    
                    if(response.message = 'err'){
                        toastr.warning(response.title);
                    }else{

                        toastr.success(response.title);
                        var table = $('#show-hide').DataTable();
                        table.ajax.reload();
                        $('#transaction_id').text('');
                        $('#cancel_date').val('');
                        $('#cancel-modal').modal('hide');

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

    $(document).on('click', '.cancel', function(){

        var id = $(this).data("id");
        var value = $(this).data("value");
        $('#cancel-modal').modal("show");
        $('#transaction_id').text(id);
        /* Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'info',
            popup: '',
            animation: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var token= $('#_token').val();
            $.ajax({
                url: 'cancel',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id':id

                },
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {

                    toastr.success(response.title);
                    table.ajax.reload();

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
        }); */
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

    $('.left-sidebar-toggler').click( function(){
        $( ".change-size" ).toggleClass( "col-md-12" );
        $( ".change-size" ).toggleClass( "col-md-10" );
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#show-hide').DataTable({
            processing: true,
            serverSide: true,
            responsive:true,
            autoWidth:false,
            autoHeight:true,
            /* scrollY:"600px",
            scrollX:"600px", */
            ajax: '{{ url('storeGetTransactionHistory') }}',
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
                    "data": "payment"
                    },
                {
                    "data": "reference_no"
                    },
                {
                    "data": "total_orders"
                    },
                {
                    "data": "encoder"
                    },
                {
                    "data": "created_at"
                    },
                {
                    "data": "status"
                    },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                    }
            ]
        });
                    
                var transactionselect = '#payment_type';
                    $(document).on('change',transactionselect,function () {
                        alert('oks');
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


                
    $(document).on('click', '#edit_transaction', function(){
        $('#edit').modal("show");
        
        /* alert('ok'); */
        var id = $(this).data("id");
        console.log(id);
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
                    $('#display_total').val(result.client[0].final_total);
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

    });
</script>
@endsection





