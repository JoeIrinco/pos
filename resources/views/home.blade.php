<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->  


<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<!-- Site Title -->
    <title>Home</title>
	 <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="public/css3/css/bootstrap.min.css">	
    <!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"> 
	<!--Favicon for this site -->
	{{-- <link rel="icon" type="public/css3/image/ico" href="public/css3/img/favicon.html"/>	 --}}
	<link rel="icon" type="image/png" size="16x16" href="{{ asset('public/image/vallery-logo-only.png') }}">
    <!-- animate CSS -->
	<link rel="stylesheet" href="public/css3/css/animate.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="public/css3/font/font-awesome.min.css">			
	<!-- main CSS -->
    <link rel="stylesheet" href="public/css3/css/style.css">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Minton - One Page Parallax Template">
		<meta name="keywords" content="agency, business, corporate, creative, html5, modern, multipurpose, One Page, parallax, startup ">
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="public/css4/bootstrap/css/bootstrap.min.css">		
<!-- Google Font -->
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"> 	
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="public/css4/bootstrap/css/bootstrap.min.css">	
    <!-- Font Awesome CSS -->
		<link rel="stylesheet" href="public/css4/fonts/font-awesome.min.css">
		<link rel="stylesheet" href="public/css4/fonts/themify-icons.css">
		<!--- owl carousel Css-->
		<link rel="stylesheet" href="public/css4/owlcarousel/css/owl.carousel.css">
		<link rel="stylesheet" href="public/css4/owlcarousel/css/owl.theme.css">
		<!--slicknav Css-->
        <link rel="stylesheet" href="public/css4/css/slicknav.css">		
		<!-- Venobox CSS -->
		<link rel="stylesheet" href="public/css4/css/venobox.css">			
		<!-- MAGNIFIC CSS -->
		<link rel="stylesheet" href="public/css4/css/magnific-popup.css">					
		<!-- Style CSS -->		
		<link rel="stylesheet" href="public/css4/css/portfolio.css">			
		<link rel="stylesheet" href="public/css4/css/style.css">			


		

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

		<!-- START PRELOADER -->
		<div class="preloader">
			<div class="spinner">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
        <!-- END PRELOADER -->	
        
<!-- START NAV BAR -->
<div id="navigation"  class="fixed-top navbar-light bg-faded site-navigation">		
    <div class="container">
        <div class="row menu_bg">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="site-logo">
                    <a class="navbar-logo" href="index.html"><img src="public/image/home-nav-logo.png" alt=""></a>
                </div>
            </div><!--- END Col -->					
            <div class="col-lg-10 col-md-9 col-sm-8">
                <div class="header_right">
                    <nav id="main-menu" class="ml-auto">
                        <ul>
							@guest
							<li><a></a></li>
							<li><a href="">Home</a></li>
							<li><a href="login">Login</a></li>
							@endguest

						  @auth
						  @if(Auth::user()->is_admin==0)
						  <li><a></a></li>
						  <li><a href="home">Home</a></li>
						  <li><a href="pos">POS</a></li>
						  <li><a href="{{ route('logout') }}"
							onclick="event.preventDefault();
										  document.getElementById('logout-form').submit();">
							 {{ __('Logout') }}</a>

						 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							 @csrf
						 </form>
						</li>
						  @else
						  <li><a></a></li>
						  <li><a href="home">Home</a></li>
						  <li><a href="pos">POS</a></li>
						  <li><a href="{{ route('logout') }}"
							onclick="event.preventDefault();
										  document.getElementById('logout-form').submit();">
							 {{ __('Logout') }}</a>

						 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							 @csrf
						 </form>
						</li>
						@endif
						  @endauth
						  
                        </ul>
                    </nav>
                    <div id="mobile_menu"></div>
                </div>
            </div><!--- END COL -->					
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</div> 	  
<!-- END  NAV BAR -->

        
		<!-- START  HOME DESIGN -->
		<header id="home" class="hero" style="background/* -image */: /* url(img/bg.jpg) */ green;  background-size:cover; background-position: center center;background-attachment:fixed;">
            <div id="particles-js"></div>
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12 col-sm-12 col-xs-12 wow zoomIn">
						<img src="public/image/vallery-logo-only.png" class="img-fluid image-container img" alt="" />
						<h1>VALLERY ENTERPRISES</h1>
                        <p><i>ACCESS IN MEDICAL SUPPLIES</i></p>
                        <p>SINCE 1999</p>
					</div><!--- END COL -->				
				</div><!--- END ROW -->					
			</div><!--- END CONTAINER -->
		</header>	
		<!-- END  HOME DESIGN -->	
        








        <!-- ADDRESS -->
		<div class="address section-padding">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-4 col-sm-6 col-xs-12">
						<div class="single_address">
							<div class="address_br"><span class="ti-mobile"></span></div>
							<h4>Phone</h4>
							<p>(044) 958 9575<br></p>
						</div>
					</div><!--- END COL -->
					<div class="col-lg-4 col-sm-6 col-xs-12">
						<div class="single_address">
							<div class="address_br"><span class="ti-email"></span></div>
							<h4>Email</h4>
							<p>valleryenterprises@gmail.com<br></p>
						</div>
					</div><!--- END COL -->
					<div class="col-lg-4 col-sm-6 col-xs-12">
						<div class="single_address">
							<div class="address_br"><span class="ti-location-pin"></span></div>
							<h4>Address</h4>
							<p>Cabanatuan City, Nueva Ecija</p>
						</div>
					</div><!--- END COL -->	
				</div><!--- END ROW -->	
			</div><!--- END CONTAINER -->
		</div>
		<!-- END ADDRESS -->			

		<!-- START CONTACT -->
		<section id="contact" class="contact_us section-padding">
			<div class="container">
				<div class="row contact_us_bg">
					<div class="col-lg-7 col-sm-12 col-xs-12">
						<div class="contact">
							<h4>How can we help you?</h4>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
							<form class="form" name="enq" method="post" action="http://ekramit.net/tf/minton-item/minton/contact.php" onsubmit="return validation();">
								<div class="row">
									<div class="form-group col-md-6">
										<input type="text" name="name" class="form-control" placeholder="Name" required="required">
									</div>
									<div class="form-group col-md-6">
										<input type="email" name="email" class="form-control" placeholder="Email" required="required">
									</div>
									<div class="form-group col-md-12">
										<input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
									</div>
									<div class="form-group col-md-12">
										<textarea rows="6" name="message" class="form-control" placeholder="Your Message" required="required"></textarea>
									</div>
									<div class="col-md-12 text-center">
										<button type="submit" value="Send message" name="submit" id="submitButton" class="btn btn-lg main_btn" title="Submit Your Message!">Send Message</button>
									</div>
								</div>
							</form>
						</div>
					</div><!-- END COL  -->	
					<div class="col-lg-5 col-sm-12 col-xs-12">	
						<div class="map">
							<iframe src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJCcd-FyQplzMRe9DML-c8D0o&key=AIzaSyBBtZfD5YLAGkqYgZ3KN8efAjnWWnt1UgI" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>	
					</div><!-- END COL  -->					
				</div><!-- END ROW -->
			</div><!-- END CONTAINER -->
		</section>
        <!-- END CONTACT -->		
        
		<!-- START FOOTER BOTTOM -->
		{{-- <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<p class="footer_copyright">&copy; 2021 All Rights Reserved.</p>	
					</div><!--- END COL -->
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</footer> --}}
		<!-- END FOOTER BOTTOM-->

	<!-- jQuery -->
	<script src="public/css3/js/jquery-1.12.4.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="public/css/css3/bootstrap.min.js"></script>
	<!-- stellar js -->
	<script src="public/css3/js/jquery.stellar.min.js"></script>
		<!-- PARTICLE JS -->
			<script src="public/css3/js/particles.min.js"></script>	
			<script src="public/css3/js/app.js"></script>		
		<!-- MAGNIFICANT JS -->
			<script src="public/css3/js/jquery.magnific-popup.min.js"></script>	
	<!-- WOW - Reveal Animations When You Scroll -->
    <script src="public/css3/js/wow.min.js"></script>
	<!-- scripts js -->
	<script src="public/css3/js/scripts.js"></script>
	<script type="text/javascript">
	/*preloader*/
		$(window).load(function() { 
			$('.status').fadeOut();
			$('.preloader').delay(350).fadeOut('slow'); 
		}); 
	/*End preloader*/
	</script>
	<script type="text/javascript">
		/*wow animation*/
			new WOW().init();	
		/*End wow animation*/
    </script>	
    
    

    <!-- Latest jQuery -->
			<script src="public/css4/js/jquery-1.12.4.min.js"></script>
            <!-- Latest compiled and minified Bootstrap -->
                <script src="public/css4/bootstrap/js/bootstrap.min.js"></script>
            <!-- modernizer JS -->		
                <script src="public/css4/js/modernizr-2.8.3.min.js"></script>																		
            <!-- owl-carousel min js  -->
                <script src="public/css4/owlcarousel/js/owl.carousel.min.js"></script>
            <!-- jquery nav -->
                <script src="public/css4/js/jquery.nav.js"></script>	
            <!-- jquery.slicknav -->
                <script src="public/css4/js/jquery.slicknav.js"></script>	
            <!-- jquery.smooth-scroll -->
                <script src="public/css4/js/smooth-scroll.js"></script>			
            <!-- magnific-popup js -->               
                <script src="public/css4/js/jquery.magnific-popup.min.js"></script>			
            <!-- jquery mixitup js -->   
                <script src="public/css4/js/jquery.mixitup.js"></script>	
            <!-- Venobox JS -->	
                <script src="public/css4/js/venobox.min.js"></script>			
            <!-- PARTICLE JS -->
                <script src="public/css4/js/particles.min.js"></script>	
                <script src="public/css4/js/app.js"></script>				
            <!-- stellar js -->
                <script src="public/css4/js/jquery.stellar.min.js"></script>	
            <!-- jquery appear js -->
                <script src="public/css4/js/jquery.appear.js"></script>			
            <!-- countTo js -->
                <script src="public/css4/js/jquery.inview.min.js"></script>				
            <!-- scrolltopcontrol js -->
                <script src="public/css4/js/scrolltopcontrol.js"></script>												
            <!-- ripples js -->	
                <script src="public/css4/js/ripples-min.js"></script>		
            <!-- scripts js -->
                <script src="public/css4/js/scripts.js"></script>

</body>

</html>