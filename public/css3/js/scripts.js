/*
Author       : Theme_ocean.
Template Name: Stella - Multipurpose Business Template
Version      : 1.0
*/
(function($) {
	'use strict';
	
	jQuery(document).on('ready', function(){
	
		/*PRELOADER JS*/
		$(window).on('load', function() { 
			$('.status').fadeOut();
			$('.preloader').delay(350).fadeOut('slow'); 
		}); 
		/*END PRELOADER JS*/		
		
		/*START MENU JS*/
			$('a.page-scroll').on('click', function(e){
				var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 50
				}, 1500);
				e.preventDefault();
			});		

			$(window).on('scroll', function() {
			  if ($(this).scrollTop() > 100) {
				$('.menu-top').addClass('menu-shrink');
			  } else {
				$('.menu-top').removeClass('menu-shrink');
			  }
			});
		
			$(document).on('click','.navbar-collapse.in',function(e) {
			if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
				$(this).collapse('hide');
			}
			});				
		/*END MENU JS*/			

		/* START COUNTDOWN JS*/
		$('.counter_feature').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
			if (visible) {
				$(this).find('.counter-num').each(function () {
					var $this = $(this);
					$({ Counter: 0 }).animate({ Counter: $this.text() }, {
						duration: 2000,
						easing: 'swing',
						step: function () {
							$this.text(Math.ceil(this.Counter));
						}
					});
				});
				$(this).unbind('inview');
			}
		});
		/* END COUNTDOWN JS */
		
		/*SSTART SKILL JS*/
		$(function() {
			$(".skill-knob").knob({
				'min':0,
				'max':100,
				'width': 180,
				'height': 180,
				'readOnly': true,
				'lineCap': 'round',
				'displayPrevious': true,
				'angleOffset': 0,
				'bgColor': '#f7f7f7',
				'fgColor': '#2a80b9',
				'thickness': 0.15
			});
					
			/* Skill way point */
			$('.skill-item').waypoint(function(down){
				$('.skill-knob').each(function(){
				var $skill_knob = $(this);
					
					// Check knob value
					if($skill_knob.val() == 0){
						$({value: 0}).animate({value: $skill_knob.attr("data-end")}, {
							duration: 2000,
							easing:'swing',
							step: function() 
							{
								$skill_knob.val(Math.ceil(this.value)).trigger('change');
								$skill_knob.val($skill_knob.val() + '%');
							}
						})
					}
				});
			}, { offset: '90%' });
		});	
		/*END SKILL JS*/			
		
		/*START MIXITUP JS*/
			$('.work_all_item').mixItUp();
	
			// jQuery Lightbox
			$('.lightbox').venobox({
				numeratio: true,
				infinigall: true
			});	
		/*END MIXITUP JS*/		

		/*START VIDEO JS*/
		 function autoPlayYouTubeModal() {
			var trigger = $("body").find('[data-toggle="modal"]');
			trigger.on("click",function() {
			  var theModal = $(this).data("target"),
				videoSRC = $('#video-modal iframe').attr('src'),
				videoSRCauto = videoSRC + "?autoplay=1";
			  $(theModal + ' iframe').attr('src', videoSRCauto);
			  $(theModal + ' button.close').on("click",function() {
				$(theModal + ' iframe').attr('src', videoSRC);
			  });
			  $('.modal').on("click",function() {
				$(theModal + ' iframe').attr('src', videoSRC);
			  });
			});
		  }
		  autoPlayYouTubeModal();
		/*END VIDEO JS*/
		
		/*START PARTNER LOGO*/
		$('.partner').owlCarousel({
		  autoPlay: 5000, //Set AutoPlay to 3 seconds
		  items : 5,
		  itemsDesktop : [1199,3],
		  itemsDesktopSmall : [979,3]
		});
		/*END PARTNER LOGO*/	
		
		/*START GOOGLE MAP*/
		function initialize() {
		  var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			center: new google.maps.LatLng(23.810332, 90.41251809999994)
		  };
		  var map = new google.maps.Map(document.getElementById('map'),
			  mapOptions);
		  var marker = new google.maps.Marker({
			position: map.getCenter(),
			icon: 'assets/img/map_pin.png',
			map: map
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);	
		/*END GOOGLE MAP*/
			
	}); 	

	/* START PARALLAX JS */
	(function () {

		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		 
		} else {
			$(window).stellar({
				horizontalScrolling: false,
				responsive: true
			});
		}

	}());
	/* END PARALLAX JS  */		
		
				
})(jQuery);


  

