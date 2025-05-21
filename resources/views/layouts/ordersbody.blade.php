
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from motaadmin.dexignlab.com/xhtml/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Nov 2020 12:56:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vallery Enterprises</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Datatable -->
    <link href="{{ asset('public/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    	<link href="{{ asset('public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

     

       




        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->

                    

                    
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order List</h4>
                            </div>
                    

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">

                                        <thead>
                                            <tr>
												
                                                <th >P.O NO.</th>
                                                <th>Account Name</th>
                                                <th>Address</th>
												<th>Contact Person</th>
												<th>Contact No.</th>
												<th>Order Date</th>
												<th>Action</th>
												
												
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                                {{-- <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td> --}}
                                                {{-- <td>Tiger Nixon</td>
                                                <td>Architect</td>
                                                <td>Male</td>
                                                <td>M.COM., P.H.D.</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
												<td>2011/04/25</td> --}}
												
                                                {{-- @foreach($order as $key=>$data)
                                                <tr>
													<td>{{++$key}} </td>
                                                    <td>{{$data->customer_name}} </td>
                                                    <td><a href="/items/{{$data->id}}">{{$data->id}} </a></td>
                                                    
                                                         <td>
                                                            <div class="d-flex">
                                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                            </div>										
                                                        </td> 
                                                </tr>
												@endforeach --}}	
												
												@foreach($order as $orders)
												<tr>
													<td>{{ $orders->id}}</td>
													<td>{{ $orders->customer_name}}</td>
													<td>{{ $orders->customer_address}}</td>
													<td>{{ $orders->customer_contact_person}}</td>
													<td>{{ $orders->customer_contact_number}}</td>
													<td>{{ $orders->created_at}}</td>
													{{-- <td><a href="/items/{{$orders->id}}">{{$orders->id}} </a></td> --}}
                                                         <td>
                                                            <div class="d-flex">
																<a href="items/{{$orders->id}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                                                <a class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                            </div>										
                                                        </td> 
													</tr>
												@endforeach	
												
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					
		 <!--**********************************
            Content body end
        ***********************************-->			





        <!--**********************************
            Content body end
        ***********************************-->





        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a target="_blank">Christian Fernandez</a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->


    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    

	<!-- Apex Chart -->
	{{-- <script src="vendor/apexchart/apexchart.js"></script> --}}
    


    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

	<!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>

</body>


<!-- Mirrored from motaadmin.dexignlab.com/xhtml/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Nov 2020 12:56:51 GMT -->
</html>
