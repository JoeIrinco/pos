<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mosaddek.com/theme/diverse/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2020 14:24:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>Return Slip</title>

    <!--google font-->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <!--common style-->
    <link href="{{asset("public/css2/vendor/bootstrap/css/bootstrap.min.css" )}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/lobicard/css/lobicard.css")}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/simple-line-icons/css/simple-line-icons.css")}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/themify-icons/css/themify-icons.css")}}" rel="stylesheet">
    <link href="{{asset("public/css2/vendor/weather-icons/css/weather-icons.min.css")}}" rel="stylesheet">

    <!--custom css-->
    <link href="{{asset("public/css2/css/main.css")}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->

</head>


<body class="app header-fixed left-sidebar-hidden right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

    <!--===========header start===========-->
    @include('layouts.admin.header')
    <!--===========header end===========-->

    <!--===========app body start===========-->
    <div class="app-body">

        @include('layouts.admin.sidebar')

        <!--main contents start-->
        <main class="main-content">

            <div class="container-fluid">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="card card-shadow mb-4 mt-4">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-sm-6 mb-5">
                                        <h5>Vallery Enterprises</h5>
                                        <span><i>Access in medical supply</i></span> <br/>

                                        <br/>
                                        <span>Mabini St., Quezon Dist.,</span> <br/>
                                        <span>Cabanatuan City, Nueva Ecija</span> <br/>
                                        <span class="pr-2">Phone: (044)958 9575</span>
                                        <span>Fax: 432 1231 3456</span>
                                    </div>
                                    <div class="col-sm-6 text-md-right mb-5">
                                        <h3>Return Slip</h3>
                                        <br/>
                                        <br/>
                                        <span>Return Slip No.</span> <br/>
                                        <span>Date: December 16, 2017</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <h6>Account Name: 123123123123123123123</h6>

                                        <span></span> <br/>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <h6>Reason for return:</h6>
                                        <span></span> <br/>
                                    </div>
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead >
                                            <tr>
                                                <th scope="col">S.I / O.F NO.</th>
                                                <th scope="col">NO. OF ITEMS</th>
                                                <th scope="col">ITEMS DESCRIPTION</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($store_items as $store_item)
                                                <tr>
                                                    <td>{{ $store_item->invoice_no}}</td>
                                                    <td>{{ $store_item->quantity}}</td>
                                                    <td>{{ $store_item->brand}} {{ $store_item->product_name}} &nbsp;{{ $store_item->product_description}} </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="border p-4"><Strong>Note:</Strong>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur id illo incidunt, iste libero quisquam? A aut cumque fuga fugit iusto libero officia optio quasi, quisquam saepe voluptate voluptatibus voluptatum.
                                            <br/>
                                            <br/>
                                            <strong class="f12">Thanks for your business</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- state end-->

            </div>
        </main>
        <!--main contents end-->

        <!--right sidebar start-->
        <aside class="right-sidebar">

            <!--notification widget start-->
            <div class="widget">
                <h3 class="mb-4 widget-title">Notification</h3>

                <div class="notification-list">
                    <ul class="list-unstyled">
                        <li>
                            <div class="nt-thumb mr-3">
                                <img src="assets/img/n1.png" alt=""/>
                            </div>
                            <div class="nt-info">
                                <a href="#"  class="nt-title">Diverse Ltd.</a>
                                <small class="text-muted">2 days ago</small>
                                <p><a href="#">www.diverse-test.com</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="nt-thumb mr-3">
                                <img src="assets/img/n3.png" alt=""/>
                            </div>
                            <div class="nt-info">
                                <a href="#"  class="nt-title">Black Friday Discount Offer</a>
                                <small class="text-muted">2 days ago</small>
                                <p>Nam libero tempore cum soluta nobis est eligendi.</p>
                            </div>
                        </li>

                        <li>
                            <div class="nt-thumb mr-3">
                                <img src="assets/img/n2.png" alt=""/>
                            </div>
                            <div class="nt-info">
                                <a href="#"  class="nt-title">Task Failed</a>
                                <small class="text-muted">2 days ago</small>
                                <p>Error: Invalid command found ... after [this class]</p>
                            </div>
                        </li>

                        <li>
                            <div class="nt-thumb mr-3">
                                <img src="assets/img/n4.png" alt=""/>
                            </div>
                            <div class="nt-info">
                                <a href="#"  class="nt-title">John Doe</a>
                                <small class="text-muted">3 days ago</small>
                                <p>Send you a contact request.</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!--notification widget end-->

            <!--Active log widget start-->
            <div class="widget">
                <h3 class="mb-4 widget-title">Activity Log</h3>
                <div class="baseline baseline-border">
                    <div class="baseline-list">
                        <div class="baseline-info">
                            <div><a href="#" class="default-color"><strong>John Tasi</strong></a> Prepare for the Meeting <span class="badge badge-pill badge-success">status</span></div>
                            <span class="text-muted">10:00 PM Sat, 10 Jan 2018</span>
                        </div>
                    </div>
                    <div class="baseline-list baseline-border baseline-primary">
                        <div class="baseline-info">
                            <div>Video conference to client</div>
                            <span class="text-muted">05:00 PM Sun, 02 Feb 2018</span>
                        </div>
                    </div>
                    <div class="baseline-list  baseline-border baseline-success">
                        <div class="baseline-info">
                            <div><a href="#" class="default-color"><strong>Tnisha</strong></a> Submit a blog post <a href="#" class="">best admin template in 2018.</a></div>
                            <span class="text-muted">10:00 PM Sat, 10 Jan 2018</span>
                        </div>
                    </div>
                    <div class="baseline-list  baseline-border baseline-warning">
                        <div class="baseline-info">
                            <div><a href="#" class="default-color"><strong>New Request</strong></a> 10 user request to approve or remove</div>
                            <span class="text-muted">10:00 PM Sat, 10 Jan 2018</span>
                        </div>
                    </div>
                    <div class="baseline-list  baseline-border baseline-info">
                        <div class="baseline-info">
                            <div><a href="#" class="default-color"><strong>Mark Henry</strong></a> added your friend list now</div>
                            <span class="text-muted">10:00 PM Sat, 10 Jan 2018</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--Active log widget end-->

            <!--stock widget start-->
            <div class="widget">
                <h3 class="mb-4 widget-title">Stocks</h3>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>DOW</td>
                            <td>1999</td>
                            <td>
                                <span class="badge badge-pill badge-primary">+ 0.10%</span>
                            </td>
                        </tr>
                        <tr>
                            <td>AAPL</td>
                            <td>1299</td>
                            <td>
                                <span class="badge badge-pill badge-success">- 0.50%</span>
                            </td>
                        </tr>
                        <tr>
                            <td>SBUX</td>
                            <td>1099</td>
                            <td>
                                <span class="badge badge-pill badge-danger">+ 0.20%</span>
                            </td>
                        </tr>
                        <tr>
                            <td>NKE</td>
                            <td>2199</td>
                            <td>
                                <span class="badge badge-pill badge-warning">+ 1.25%</span>
                            </td>
                        </tr>
                        <tr>
                            <td>YOO</td>
                            <td>999</td>
                            <td>
                                <span class="badge badge-pill badge-info">+ 3.00%</span>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!--stock widget end-->

        </aside>
        <!--right sidebar end-->

    </div>
    <!--===========app body end===========-->

    <!--===========footer start===========-->

    <!--===========footer end===========-->


    <!-- Placed js at the end of the page so the pages load faster -->
    <script src="{{asset("public/css2/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js")}}"></script>
    <script src="{{asset("public/css2/vendor/popper.min.js")}}"></script>
    <script src="{{asset("public/css2/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js")}}"></script>
    <script src="{{asset("public/css2/vendor/lobicard/js/lobicard.js")}}"></script>
    <script class="include" type="text/javascript" src="{{asset("public/css2/vendor/jquery.dcjqaccordion.2.7.js")}}"></script>
    <script src="{{asset("public/css2/vendor/jquery.scrollTo.min.js")}}"></script>



    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--init scripts-->
    <script src="{{asset("public/css2/js/scripts.js")}}"></script>

</body>

<!-- Mirrored from mosaddek.com/theme/diverse/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2020 14:24:52 GMT -->
</html>
