<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vallery Enterprises</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/image/vallery-logo-only.png')}}">
    {{-- <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet"> --}}
    
     
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
            Nav header start
        ***********************************-->
        <div class="nav-header">

            <a  class="brand-logo" href="/">
            <img src="{{ asset('public/image/vallery-logo-only.png')}}" class=" center img-fluid">
            <img class="logo-abbr" src="{{ asset('public/images/logo-white.png')}}" alt="">
            <img class="logo-compact" src="{{ asset('public/images/logo-text-white.png')}}" alt="">
            <img class="brand-title" src="{{ asset('public/images/logo-text-white.png')}}" alt="">
          </a>
          
           

           <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
			
		
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                       

                            <div class="row code mx-0">
                                <div class="col-sm-12 p-md-0">
                                    <div class="row mx-0">
                                        <h4>Hi, {{ Auth::user()->name }}, welcome back!</h4>
                                        <span></span>
                                    </div>
                                </div>
                                
                            </div>


                        

                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#">
                                    <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                                    <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                                </a>
							</li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/><path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/></g></svg>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="true">
                            <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
							<li><a href="{{ route('register') }}">{{ __('Register User') }}</a></li>
							<li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}</a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-label">Apps</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><polygon fill="#000000" opacity="0.3" points="5 7 5 15 19 15 19 7"/>       <path d="M11,19 L11,16 C11,15.4477153 11.4477153,15 12,15 C12.5522847,15 13,15.4477153 13,16 L13,19 L14.5,19 C14.7761424,19 15,19.2238576 15,19.5 C15,19.7761424 14.7761424,20 14.5,20 L9.5,20 C9.22385763,20 9,19.7761424 9,19.5 C9,19.2238576 9.22385763,19 9.5,19 L11,19 Z" fill="#000000" opacity="0.3"/><path d="M5,7 L5,15 L19,15 L19,7 L5,7 Z M5.25,5 L18.75,5 C19.9926407,5 21,5.8954305 21,7 L21,15 C21,16.1045695 19.9926407,17 18.75,17 L5.25,17 C4.00735931,17 3,16.1045695 3,15 L3,7 C3,5.8954305 4.00735931,5 5.25,5 Z" fill="#000000" fill-rule="nonzero"/></g></svg>
							<span class="nav-text">Apps</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="orders">Manage P.O.</a></li>
                        </ul>
                    </li>
                    <li>{{-- <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/><path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/></g></svg>
							
						</a> --}}
                        
                    </li>
                    
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div><p></p></div>
        <div class="content-body">
            
                   
                    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                      
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
                                              
                                                    
                                                    
                                                    @foreach($order as $orders)
                                                    <tr>
                                                        <td>{{ $orders->id}}</td>
                                                        <td>{{ $orders->customer_name}}</td>
                                                        <td>{{ $orders->customer_address}}</td>
                                                        <td>{{ $orders->customer_contact_person}}</td>
                                                        <td>{{ $orders->customer_contact_number}}</td>
                                                        <td>{{ $orders->created_at}}</td>
                                                        
                                                             <td>
                                                                <div class="d-flex">
                                                                    <a href="items/{{$orders->id}}" class="btn btn-primary shadow btn-m sharp mr-1">{{-- <i class="fa fa-eye"></i> --}}View</a>
                                                                    {{-- <a href="/printDirect/{{$orders->id}}" class="btn btn-success  btn-m sharp mr-1">Print</a> --}}
                                                                    <a href="printPDF/{{$orders->id}}" class="btn btn-info  btn-m shadow sharp mr-1">{{-- <i class="fa fa-pencil"></i> --}}<i class="fa fa-download"></i></a>
                                                                    <a href="#" class="btn btn-danger shadow btn-m sharp"><i class="fa fa-trash"></i></a>
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
                        
                    </div>

                </div>
					
			 
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Christian Fernandez</a> 2020</p>
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


    <script src="{{ asset('public/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('public/js/custom.min.js') }}"></script>


 <!-- Required vendors -->
 <script src="{{ asset('public/js/deznav-init.js') }}"></script>


	<!-- Apex Chart -->
	{{-- <script src="vendor/apexchart/apexchart.js"></script> --}}
	
    <!-- Vectormap -->
	<!-- Chart piety plugin files -->
    {{-- <script src="vendor/peity/jquery.peity.min.js"></script> --}}
	
    <!-- Chartist -->
    {{-- <script src="vendor/chartist/js/chartist.min.js"></script> --}}
	
	<!-- Dashboard 1 -->
	{{-- <script src="js/dashboard/dashboard-1.js"></script> --}}
	<!-- Svganimation scripts -->
	{{-- <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script> --}}

    <!-- Datatable -->
    <script src="{{ asset('public/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Svganimation scripts -->
    {{-- <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script> --}}
    
	<script>
	(function($) {
		"use strict"

		var direction =  getUrlParams('dir');
		if(direction != 'rtl')
		{direction = 'ltr'; }
		
		new dezSettings({
			typography: "roboto",
			version: "light",
			layout: "vertical",
			headerBg: "color_1",
			navheaderBg: "color_3",
			sidebarBg: "color_1",
			sidebarStyle: "mini",
			sidebarPosition: "fixed",
			headerPosition: "fixed",
			containerLayout: "wide",
			direction: direction
		}); 

	})(jQuery);	
	</script>
</body>

</html>