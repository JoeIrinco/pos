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
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
        <!--page title start-->
        <div class="page-title">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-8">
                        <h4 class="mb-0"> Dashboard
                            <small>statistics, charts many more</small>
                        </h4>
                        <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                            <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-4">
                        <div class="btn-group float-right ml-2">
                        </div>
                        <div class="btn-group float-right"><div class="row" >
                                <div class="col-md-3 mb-3">
                                    <strong><label>Date:</label></strong>
                                    <input id = "dt" type="date" value="<?php echo date('Y-m-d'); ?>" onchange="handler(event);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--page title end-->


        <div class="container-fluid">

            <div class="card card-shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        Monthly Goal
                    </div>
                </div>
                <div class="card-body">
                    <p>3,000,000<Strong> Total Sales</Strong> / 4,000,000 <Strong>Quota</Strong></p>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                </div>
            </div>

            <!--state widget start-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="icon-basket-loaded text-info f30"></i>
                            <h6 class="mb-0 mt-3">Order Placed</h6>
                            <p id="label_today_transaction" class="f12 mb-0">{{ $format = number_format($today_transaction) }} New Order Placed</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="fa fa-money text-success f30"></i>
                            <h6 class="mb-0 mt-3">Sale</h6>
                            <p id="label_today_sell" class="f12 mb-0"><span>&#8369;</span>{{ /*$format = number_format(*/$today_sell/*)*/ }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="icon-wallet text-primary f30"></i>
                            <h6 class="mb-0 mt-3">Cash</h6>
                            <p id="label_today_cash" class="f12 mb-0"><span>&#8369;</span>{{ /*$format = number_format(*/$today_cash/*)*/ }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="fa fa-credit-card text-success f30"></i>
                            <h6 class="mb-0 mt-3">Check</h6>
                            <p id="label_today_check"class="f12 mb-0"><span>&#8369;</span>{{ $format = number_format($today_check) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="fa fa-credit-card-alt text-info f30"></i>
                            <h6 class="mb-0 mt-3">Card (Debit)</h6>
                            <p id="label_today_card_debit" class="f12 mb-0"><span>&#8369;</span>{{ $format = number_format($today_card_debit) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="fa fa-credit-card-alt text-danger f30"></i>
                            <h6 class="mb-0 mt-3">Card (Credit)</h6>
                            <p id="label_today_card_credit" class="f12 mb-0"><span>&#8369;</span>{{ $format = number_format($today_card_credit) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="fa fa-credit-card-alt text-danger f30"></i>
                            <h6 class="mb-0 mt-3">Gcash</h6>
                            <p id="label_today_gcash" class="f12 mb-0"><span>&#8369;</span> {{ $format = number_format($today_gcash) }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class=" icon-badge text-success f30"></i>
                            <h6 class="mb-0 mt-3">Paymaya</h6>
                            <p id="label_today_paymaya" class="f12 mb-0"><span>&#8369;</span> {{ $format = number_format($today_paymaya) }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="fa fa-credit-card-alt text-danger f30"></i>
                            <h6 class="mb-0 mt-3">Online Transaction</h6>
                            <p id="label_today_online_transaction" class="f12 mb-0"><span>&#8369;</span> {{ $format = number_format($today_online) }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card card-shadow">
                        <div class="card-body ">
                            <i class="fa fa-credit-card-alt text-danger f30"></i>
                            <h6 class="mb-0 mt-3">Unpaid Transaction</h6>
                            <p id="unpaid" class="f12 mb-0"><span>&#8369;</span> {{ $collection }} </p>
                        </div>
                    </div>
                </div>
            {{--{{ $format = number_format($collection ?? '') }}--}}
            <!--                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class=" icon-badge text-success f30"></i>
                                <h6 class="mb-0 mt-3">Unpaid</h6>
                                <p id="label_today_unpaid" class="f12 mb-0">&#8369;  {{ $format = number_format($today_unpaid) }} <span class="float-right text-success"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class=" icon-badge text-success f30"></i>
                                <h6 class="mb-0 mt-3">Daily Profit</h6>
                                <p id="label_today_profit" class="f12 mb-0">$9887 This Daily Profit <span class="float-right text-success"><i class=" ti-arrow-circle-up"></i></span></p>
                            </div>
                        </div>
                    </div>-->
            </div>
            <!--state widget end-->
            <div class="row">
                <!--Report widget start-->
                <div class="col-md-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header">
                            <div class="card-title">
                                {{--  Sales Statistics --}}
                            </div>
                        </div>
                        {{-- cointainer graph--}}
                        <div id="sales-chart-container" style="height: 300px;"></div>
                        <div class="card-header">
                            <div class="card-title">
                                {{--  Sales Statistics --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--Report widget end-->
            </div>

        </div>
        <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">

        <script>
            const salesChart = new Chartisan({
                el: '#sales-chart-container',
                url: "@chart('line_chart')",
                hooks: new ChartisanHooks()
                    .colors()
                    /* .datasets(['line','bar']) */
                    /* .datasets([{type:'line',fill:false, borderColor:'green'},'bar']) */
                    .datasets([{type:'line',fill:false, borderColor:'green'},'bar'])
                    .title({
                        display:true,text:'Daily Sales Statistics',fontSize:25
                    })
            });

            function handler(e){
                var formData = new FormData();
                var token= $('#_token').val();
                formData.append("dt", $("#dt").val());
                formData.append('_token', token);
                $.ajax({
                    url: 'updateDashboard',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('.send-loading').show();
                    },
                    success: function (response) {
                        /*alert('ok');*/
                        $('#label_today_transaction').text(response.today_transaction); //console.log(response.today_transaction);
                        $('#label_today_sell').text(response.today_sell);//console.log(response.today_sell);
                        $('#label_today_cash').text(response.today_cash);//console.log(response.today_cash);
                        $('#label_today_check').text(response.today_check);//console.log(response.today_card_debit);
                        $('#label_today_card_debit').text(response.today_card_debit);//console.log(response.today_card_credit);
                        $('#label_today_card_credit').text(response.today_card_credit);//console.log(response.today_check);
                        $('#label_today_gcash').text(response.today_gcash);//console.log(response.today_check);
                        $('#label_today_paymaya').text(response.today_paymaya);//console.log(response.today_check);
                        $('#label_today_online_transaction').text(response.today_onlinetransfer);//console.log(response.today_check);
                        $('#label_today_unpaid').text(response.today_unpaid);//console.log(response.today_check);
                        $('#label_today_profit').text('ready for future update');//console.log(response.today_check);

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
