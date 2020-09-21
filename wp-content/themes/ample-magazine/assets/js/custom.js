jQuery(function(jQuery) {
	"use strict";

	var winwidth = jQuery(window).width();
	/* nav bar fixed */
	jQuery(window).scroll(function () {



		if (jQuery(window).scrollTop() > 200) {
			jQuery('.main-menu').addClass('navbar-fixed-top');
		}

		if (jQuery(window).scrollTop() < 201) {
			jQuery('.main-menu').removeClass('navbar-fixed-top');
		}



		
	});

	/* scroll to top */
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 600) {
			jQuery('.scrollup').fadeIn();
		} else {
			jQuery('.scrollup').fadeOut();
		}
	});

	jQuery('.scrollup').click(function () {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 1400);
		return false;
	});




//Primary Nav in both scene

	var windowWidth = jQuery(window).width();
	var nav = "li.menu-item";
	//    for sub menu arrow

	//    for sub menu arrow
	jQuery('.menu-item >li:has("ul")>a').each(function() {
		jQuery(this).addClass('below');
	});
	jQuery('ul:not(li.menu-item)>li:has("ul")>a').each(function() {
		jQuery(this).addClass('side');
	});




	/* menu classes */

	if (winwidth >= 768) {
		jQuery( "li.menu-item" ).hover(function() {  // mouse enter
			jQuery( this ).find( " > .sub-menu" ).show(); // display immediate child

		}, function(){ // mouse leave
			if ( !jQuery(this).hasClass("current_page_item") ) {  // check if current page
				jQuery( this ).find( ".sub-menu" ).hide(); // hide if not current page
			}
		});
	}

	if (winwidth >= 768) {
		jQuery( "li.page_item" ).hover(function() {  // mouse enter
			jQuery( this ).find( " > .page_item_has_children" ).show(); // display immediate child

		}, function(){ // mouse leave
			if ( !jQuery(this).hasClass("current_page_item") ) {  // check if current page
				jQuery( this ).find( ".page_item_has_children" ).hide(); // hide if not current page
			}
		});
	}

	/*==================================
	 Responsive menu
	 ==================================*/

	if (winwidth <= 767) {
		jQuery('.nav.navbar-nav li.menu-item-has-children,.nav.navbar-nav li.page_item_has_children').append('<span class="dropdown-icon"><i class="fas fa-caret-down"><i></span>');

		jQuery('.nav.navbar-nav li.menu-item-has-children span.dropdown-icon,.nav.navbar-nav li.page_item_has_children span.dropdown-icon').on('click', function (e) {
			e.preventDefault();
			console.log('click');
			jQuery(this).siblings('.nav.navbar-nav li.menu-item-has-children ul.sub-menu,.nav.navbar-nav li.page_item_has_children ul.children').slideToggle(300);
		});

	} else {
		jQuery('.nav.navbar-nav li.menu-item-has-children, .nav.navbar-nav li.page_item_has_children').find('span').css('display', 'none');
	};


	jQuery('.nav-tabs[data-toggle="tab-hover"] > li > a').hover( function(){
		jQuery(this).tab('show');
	});


	/* ----------------------------------------------------------- */
	/*  Main slideshow
	 /* ----------------------------------------------------------- */

	jQuery('#main-slide').carousel({
		pause: true,
		interval: 100000,
	});


	/* ----------------------------------------------------------- */
	/*  Site search
	 /* ----------------------------------------------------------- */



	jQuery('.nav-search').on('click', function () {
		jQuery('.search-block').fadeIn(350);
	});

	jQuery('.search-close').on('click', function(){
		jQuery('.search-block').fadeOut(350);
	});



	/* ----------------------------------------------------------- */
	/*  Owl Carousel
	 /* ----------------------------------------------------------- */

	//breaking top section

	jQuery(".breaking-slide").owlCarousel({

		loop:true,
		animateIn: 'fadeIn',
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		nav:true,
		margin:30,
		dots:false,
		mouseDrag:false,
		slideSpeed:500,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		items : 1,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			}
		}

	});


	//Latest news slide

	jQuery(".latest-news-slide").owlCarousel({

		loop:false,
		animateIn: 'fadeInLeft',
		autoplay:false,
		autoplayHoverPause:true,
		nav:true,
		margin:30,
		dots:false,
		mouseDrag:false,
		slideSpeed:500,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		items : 6,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			}
		}

	});

	
/* fixed nav bar */
jQuery('#wpadminbar').css('position', 'fixed');
	

	

	/* for closing search box*/
	jQuery('.search-block').focusout(function (e) {
		jQuery('.search-block').css('display', 'none');
		e.preventDefault();
	})

/*AFTER LAST MENU CLOSED */
	jQuery('.last-menu').focusout(function (e) {
		jQuery(".navbar-collapse.collapse.in").collapse('hide');
		e.preventDefault();
	})



	//Featured slide

	jQuery(".main-slider").owlCarousel({

		loop:true,
		animateOut: 'fadeOut',
		autoplay:true,
		autoplayHoverPause:true,
		nav:true,
		margin:0,
		dots:true,
		mouseDrag:true,
		touchDrag:true,
		slideSpeed:500,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		items : 1,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			}
		}

	});



//sticky sidebar
	var at_body = jQuery("body");
	var at_window = jQuery(window);

	if(at_body.hasClass('at-sticky-sidebar')){
		if(at_body.hasClass('sidebar-right')){
			jQuery('#secondary, #primary').theiaStickySidebar();
		}
		else{
			jQuery('#secondary, #primary').theiaStickySidebar();
		}
	}
	/*marquee ticker */

	jQuery(function (){

		jQuery('.simple-marquee-container').SimpleMarquee({
				duration:100000,
				gap: 30,
				delayBeforeStart: 0,
				direction: 'left',
				duplicated: true,
				pauseOnHover: true
			}

		);

	});

	/* for closing color for descriotion */

		jQuery('.green .menu-description').css('background', '#0aa500');
	    jQuery('.red .menu-description').css('background', '#dd3333');
	    jQuery('.orange .menu-description').css('background', '#ff751a');
	    jQuery('.yellow .menu-description').css('background', ' #ffff1a');
	    jQuery('.blue .menu-description').css('background', ' #0000ff');









}(jQuery));